<?php
App::uses('AppController', 'Controller');
/**
 * Shops Controller
 *
 * @property Shop $Shop
 * @property PaginatorComponent $Paginator
 */
class ShopsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
    public $uses = array('Shop', 'UserLikeCoupon', 'UserFollowShop');

/**
 * index method
 *
 * @return void
// */
//	public function index() {
//		$this->Shop->recursive = 0;
//		$this->set('shops', $this->Paginator->paginate());
//	}

    public function ajax_addFollowShop($id) {
        $msg = "OK";
        $status = "OK";
        $userId = $this->UserAuth->getUserId();
		if (!$this->Shop->exists($id)) {
            $status = "ERROR";
            $msg = "shop id error";
		} elseif(!$this->UserFollowShop->deleteUserFollow($userId, $id))  {
            $status = "ERROR";
            $msg = "error in cleaning step in adding";
        } elseif(!$this->UserFollowShop->addUserFollow($userId, $id)) {
            $status = "ERROR";
            $msg = "error in adding step in adding";
        }
        $this->set(array('msg'=>$msg, "status"=>$status, 
            '_serialize' => array("status", "msg")));  
    }

    public function ajax_deleteFollowShop($id) {
        $msg = "OK";
        $status = "OK";
        $userId = $this->UserAuth->getUserId();
		if (!$this->Shop->exists($id)) {
            $status = "ERROR";
            $msg = "shop id error";
	    }elseif(!$this->UserFollowShop->deleteUserFollow($userId, $id))  {
            $status = "ERROR";
            $msg = "error in deleting";
        } 
        $this->set(array('msg'=>$msg, "status"=>$status, 
            '_serialize' => array("status", "msg")));  
    }


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
// */
//	public function view($id = null) {
//		if (!$this->Shop->exists($id)) {
//			throw new NotFoundException(__('Invalid shop'));
//		}
//		$options = array('conditions' => array('Shop.' . $this->Shop->primaryKey => $id));
//		$this->set('shop', $this->Shop->find('first', $options));
//	}

    public function viewShop($id) {
        $userId = $this->UserAuth->getUserId();
        $likedList = $this->UserLikeCoupon->find('all', array('conditions'=>array('user_id' => $userId)));    
        $likedIdList = array(); 
        foreach($likedList as $l) {
            $likedIdList[] = $l['UserLikeCoupon']['coupon_id'];
        }
        $this->Shop->recursive = 2;
		if (!$this->Shop->exists($id)) {
			throw new NotFoundException(__('Invalid shop'));
		}
		$options = array('conditions' => array('Shop.' . $this->Shop->primaryKey => $id));

        $shop = $this->Shop->find('first', $options);
        foreach($shop['Coupon'] as $k => $v) {
            if(in_array($v['id'], $likedIdList)){
                $shop['Coupon'][$k]['iLiked'] = true;
            } else {
                $shop['Coupon'][$k]['iLiked'] = false;
            }
        }
        
        $options = array('conditions' => array('user_id'=>$userId, 'shop_id'=>$id));

        if($this->UserFollowShop->find('count', $options)) {
            $isFollowed = True;
        } else {
            $isFollowed = False;
        }

		$this->set('shop', $shop);
		$this->set('isFollowed', $isFollowed);
    }


/**
 * add method
 *
 * @return void
// */
//	public function add() {
//		if ($this->request->is('post')) {
//			$this->Shop->create();
//			if ($this->Shop->save($this->request->data)) {
//				$this->Flash->success(__('The shop has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Flash->error(__('The shop could not be saved. Please, try again.'));
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
//		if (!$this->Shop->exists($id)) {
//			throw new NotFoundException(__('Invalid shop'));
//		}
//		if ($this->request->is(array('post', 'put'))) {
//			if ($this->Shop->save($this->request->data)) {
//				$this->Flash->success(__('The shop has been saved.'));
//				return $this->redirect(array('action' => 'index'));
//			} else {
//				$this->Flash->error(__('The shop could not be saved. Please, try again.'));
//			}
//		} else {
//			$options = array('conditions' => array('Shop.' . $this->Shop->primaryKey => $id));
//			$this->request->data = $this->Shop->find('first', $options);
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
//		$this->Shop->id = $id;
//		if (!$this->Shop->exists()) {
//			throw new NotFoundException(__('Invalid shop'));
//		}
//		$this->request->allowMethod('post', 'delete');
//		if ($this->Shop->delete()) {
//			$this->Flash->success(__('The shop has been deleted.'));
//		} else {
//			$this->Flash->error(__('The shop could not be deleted. Please, try again.'));
//		}
//		return $this->redirect(array('action' => 'index'));
//	}
}
