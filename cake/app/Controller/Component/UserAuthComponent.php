<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
class UserAuthComponent extends Component {
	/**
	 * This component uses following components
	 *
	 * @var array
	 */
	var $components = array('Session', 'Cookie', 'RequestHandler');
	/**
	 * configur key
	 *
	 * @var string
	 */
	var $configureKey='User';

	function initialize(Controller $controller) {

	}

	function __construct(ComponentCollection $collection, $settings = array()) {
		parent::__construct($collection, $settings);
	}

	function startup(Controller $controller = null) {

	}


    function redirectLogin(&$c) {
        $cUrl = '/'.$c->params->url;
        if(!empty($_SERVER['QUERY_STRING'])) {
        	$rUrl = $_SERVER['REQUEST_URI'];
        	$pos =strpos($rUrl, $cUrl);
        	$cUrl=substr($rUrl, $pos, strlen($rUrl));
        }
        $c->Session->write('Usermgmt.OriginAfterLogin', $cUrl);
        $c->redirect('/login');
    }
	/**
	 * Called before the controller action.  You can use this method to configure and customize components
	 * or perform logic that needs to happen before each controller action.
	 *
	 * @param object $c current controller object
	 * @return void
	 */
	function beforeFilter(&$c) {
        $this->c = $c;
		UsermgmtInIt($this);
        //todo make it more clear 
        // set user info here
        if($c->userAgent == 'wechat') { // update location ?
        }

		$user = $this->__getActiveUser();

        //??
		$pageRedirect = $c->Session->read('permission_error_redirect');
		$c->Session->delete('permission_error_redirect');

		$controller = $c->params['controller'];
		$action = $c->params['action'];
		$actionUrl = $controller.'/'.$action;

		$permissionFree = array('users/login', 'users/logout', 'users/register', 'users/userVerification', 'users/forgotPassword', 'users/activatePassword', 'pages/display', 'users/accessDenied', 'users/emailVerification', '/');

        if (!$this->isLogged() ) { //redirect to login
			App::import("Model", "User");
			$userModel = new User;
            $options = array('conditions' => array('id' => 1));
			$myUser = $userModel->find("first", 'options');
            $this->login($myUser);
            //logged in 

            $c->log('permission: actionUrl-'.$actionUrl, LOG_DEBUG);
            $c->Session->write('permission_error_redirect','/');
            $c->Session->setFlash(__('您需要登陆才能看这个页面哦...'));
            $cUrl = '/'.$c->params->url;
            if(!empty($_SERVER['QUERY_STRING'])) {
            	$rUrl = $_SERVER['REQUEST_URI'];
            	$pos =strpos($rUrl, $cUrl);
            	$cUrl=substr($rUrl, $pos, strlen($rUrl));
            }
            $c->Session->write('Usermgmt.OriginAfterLogin', $cUrl);
            $c->redirect('/');
        } else {//logged
            $this->setUser($c);
        }
	}

	/**
	 * Used to set user in context of cakephp views
	 *
	 * @access public
	 * @return boolean
	 */
	public function setUser(&$c) {
		$user = $this->Session->read('UserAuth');
        $c->set('_username', $user['User']['username']);
	}
	/**
	 * Used to check whether user is logged in or not
	 *
	 * @access public
	 * @return boolean
	 */
	public function isLogged() {
		return ($this->getUserId() !== null);
	}
	/**
	 * Used to get user from session
	 *
	 * @access public
	 * @return array
	 */
	public function getUser() {
		return $this->Session->read('UserAuth');
	}

	/**
	 * Used to get user id from session
	 *
	 * @access public
	 * @return integer
	 */
	public function getUserId() {
		return $this->Session->read('UserAuth.User.id');
	}
	/**
	 * Used to maintain login session of user
	 *
	 * @access public
	 * @param mixed $type possible values 'guest', 'cookie', user array
	 * @param string $credentials credentials of cookie, default null
	 * @return array
	 */
	public function login($type = 'guest', $credentials = null) {
		$user=array();
		if (is_string($type) && ($type=='guest')) {
			App::import("Model", "User");
			$userModel = new User;
			$user = $userModel->authsomeLogin($type, $credentials);
		} elseif (is_array($type)) {
			$user = $type;
            //update last login
			App::import("Model", "User");
            //$user['User']['last_login'] = date("Y-m-d H:i:s");
			$userModel = new User;
            $userModel->save($user);

		}
		Configure::write($this->configureKey, $user);
		$this->Session->write('UserAuth', $user);
		return $user;
	}
	/**
	 * Used to delete user session and cookie
	 *
	 * @access public
	 * @return void
	 */
	public function logout() {
		$this->Session->delete('UserAuth');
		Configure::write($this->configureKey, array());
		$this->Cookie->delete(LOGIN_COOKIE_NAME);
	}
	/**
	 * Used to persist cookie for remember me functionality
	 *
	 * @access public
	 * @param string $duration duration of cookie life time on user's machine
	 * @return boolean
	 */
	//public function persist($duration = '2 weeks') {
	public function persist($duration = '1 day') {
		App::import("Model", "Usermgmt.User");
		$userModel = new User;
		$token = $userModel->authsomePersist($this->getUserId(), $duration);
		$token = $token.':'.$duration;
		return $this->Cookie->write(
			LOGIN_COOKIE_NAME,
			$token,
			true, // encrypt = true
			$duration
		);
	}
	/**
	 * Used to check user's session if user's session is not available 
     * then it tries to get login from cookie if it exist
	 *
	 * @access private
	 * @return array
	 */
	private function __getActiveUser() {
		$user = Configure::read($this->configureKey);
		if (!empty($user)) {
			return $user;
		}

		$this->__useSession() || $this->__useGuestAccount();

		$user = Configure::read($this->configureKey);
		if (is_null($user)) {
			throw new Exception(
				'Unable to initilize user'
			);
		}
		return $user;
	}
	/**
	 * Used to get user from session
	 *
	 * @access private
	 * @return boolean
	 */
	private function __useSession() {
		$user = $this->getUser();
		if (!$user) {
			return false;
		}
		Configure::write($this->configureKey, $user);
		return true;
	}
	/**
	 * Used to get login from cookie
	 *
	 * @access private
	 * @return boolean
	 */
	private function __useCookieToken() {
		$token = $this->Cookie->read(LOGIN_COOKIE_NAME);
		if (!$token) {
			return false;
		}
		$user=false;
		// Extract the duration appendix from the token
		if(strpos($token, ":") !==false) {
			$tokenParts = split(':', $token);
			$duration = array_pop($tokenParts);
			$token = join(':', $tokenParts);
			$user = $this->login('cookie', compact('token', 'duration'));
			// Delete the cookie once its been used
		}
		$this->Cookie->delete(LOGIN_COOKIE_NAME);
		if (!$user) {
			return;
		}
		$this->persist($duration);
		return (bool)$user;
	}
	/**
	 * Used to get login as guest
	 *
	 * @access private
	 * @return array
	 */
	private function __useGuestAccount() {
		return $this->login('guest');
	}

}
