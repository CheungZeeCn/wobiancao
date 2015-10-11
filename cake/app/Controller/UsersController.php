<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
    public $uses = array('User', 'UserHasCoupon', 'UserFollowShop', 'Shop');

/**
 * index method
 *
 * @return void
// */
//	public function index() {
//		$this->User->recursive = 0;
//		$this->set('users', $this->Paginator->paginate());
//	}
//
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
// */
//	public function view($id = null) {
//		if (!$this->User->exists($id)) {
//			throw new NotFoundException(__('Invalid user'));
//		}
//		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
//		$this->set('user', $this->User->find('first', $options));
//	}

	public function viewMyPage() {
        $this->recursive = 0;
        $userId = $this->UserAuth->getUserId();

        $options = array('conditions' => array('user_id' => $userId));

        $count = $this->UserHasCoupon->find('count', $options);
		$user = $this->User->findById($userId);
        $this->set('user', $user);
        $this->set('count', $count);
	}

	public function viewMyShops() {
        $this->User->recursive = 2;
        $this->User->bindModel(
            array(
                'hasMany' => array(
                    'UserFollowShop' => array(
                        'className' => 'UserFollowShop'
                    )
                )
            )
        );
        $this->Shop->bindModel(
            array(
                'hasMany' => array(
                    'UserFollowShop' => array(
                        'className' => 'UserFollowShop'
                    )
                )
            )
        );
        $this->UserFollowShop->bindModel(
            array(
                'belongsTo' => array(
                    'User', 'Shop'   
                )
            )
        );

        $userId = $this->UserAuth->getUserId();
		$user = $this->User->findById($userId);

        $this->set('user', $user);
	}

	public function viewMyCoupons() {
        $this->User->recursive = 2;
        $this->User->bindModel(
            array(
                'hasMany' => array(
                    'UserHasCoupon' => array(
                        'className' => 'UserHasCoupon',
                        'order' => 'UserHasCoupon.id DESC'
                    )
                )
            )
        );
        $this->Shop->bindModel(
            array(
                'hasMany' => array(
                    'UserHasCoupon' => array(
                        'className' => 'UserHasCoupon'
                    )
                )
            )
        );
        $this->UserHasCoupon->bindModel(
            array(
                'belongsTo' => array(
                    'User', 'Shop'   
                )
            )
        );

        $userId = $this->UserAuth->getUserId();
		$user = $this->User->findById($userId);

        $this->set('user', $user);
	}

/**
 * add method
 *
 * @return void
// */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->User->create();
//			if ($this->User->save($this->request->data)) {
//				$this->Flash->success(__('The user has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Flash->error(__('The user could not be saved. Please, try again.'));
//			}
//		}
//	}
//
///**
// * edit method
// *
// * @throws NotFoundException
// * @param string $id
// * @return void
// */
//	public function edit($id = null) {
//		if (!$this->User->exists($id)) {
//			throw new NotFoundException(__('Invalid user'));
//		}
//		if ($this->request->is(array('post', 'put'))) {
//			if ($this->User->save($this->request->data)) {
//				$this->Flash->success(__('The user has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Flash->error(__('The user could not be saved. Please, try again.'));
//			}
//		} else {
//			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
//			$this->request->data = $this->User->find('first', $options);
//		}
//	}
//
///**
// * delete method
// *
// * @throws NotFoundException
// * @param string $id
// * @return void
// */
//	public function delete($id = null) {
//		$this->User->id = $id;
//		if (!$this->User->exists()) {
//			throw new NotFoundException(__('Invalid user'));
//		}
//		$this->request->allowMethod('post', 'delete');
//		if ($this->User->delete()) {
//			$this->Flash->success(__('The user has been deleted.'));
//		} else {
//			$this->Flash->error(__('The user could not be deleted. Please, try again.'));
//		}
//		return $this->redirect(array('action' => 'index'));
//	}
}
