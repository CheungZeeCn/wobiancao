<?php
App::uses('AppController', 'Controller');
/**
 * Coupons Controller
 *
 * @property Coupon $Coupon
 * @property PaginatorComponent $Paginator
 */
class CouponsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'RequestHandler');
    public $uses = array( 'Coupon', 'UserLikeCoupon', 'UserHasCoupon', 'CouponsCategory');


/**
 * index method
 *
 * @return void
 */
	//public function index() {
	//	$this->Coupon->recursive = 0;
	//	$this->set('coupons', $this->Paginator->paginate());
	//}

    public function ajax_addHasCoupon($id) {
        $msg = "OK";
        $status = "OK";
        $userId = $this->UserAuth->getUserId();
	    if(!$this->UserHasCoupon->deleteUserHas($userId, $id))  {
            $status = "ERROR";
            $msg = "error in cleaning step in adding";
        }
	    elseif(!$this->UserHasCoupon->addUserHas($userId, $id)) {
            $status = "ERROR";
            $msg = "error in adding step in adding";
        }
        $this->set(array('msg'=>$msg, "status"=>$status, 
            '_serialize' => array("status", "msg")));  
    }

    public function addHasCouponRedirect($id) {
        $msg = "OK";
        $status = "OK";
        $userId = $this->UserAuth->getUserId();
	    if(!$this->UserHasCoupon->deleteUserHas($userId, $id))  {
            $status = "ERROR";
            $msg = "error in cleaning step in adding";
        }
	    elseif(!$this->UserHasCoupon->addUserHas($userId, $id)) {
            $status = "ERROR";
            $msg = "error in adding step in adding";
        }
        $coupon = $this->Coupon->findById($id);
        $this->redirect($coupon['Coupon']['third_url']);
    }

    public function ajax_addLikeCoupon($id) {
        $msg = "OK";
        $status = "OK";
        $userId = $this->UserAuth->getUserId();
	    if(!$this->UserLikeCoupon->deleteUserLike($userId, $id))  {
            $status = "ERROR";
            $msg = "error in cleaning step in adding";
        }
	    elseif(!$this->UserLikeCoupon->addUserLike($userId, $id)) {
            $status = "ERROR";
            $msg = "error in adding step in adding";
        } elseif(!$this->Coupon->updateAll(
                array('Coupon.like' => 'Coupon.like+1'), 
                array('Coupon.id' => $id))) {
            $status = "ERROR";
            $msg = "error in counting step in adding";
        }
        $this->set(array('msg'=>$msg, "status"=>$status, 
            '_serialize' => array("status", "msg")));  
    }

    public function ajax_deleteLikeCoupon($id) {
        $msg = "OK";
        $status = "OK";
        $userId = $this->UserAuth->getUserId();
	    if(!$this->UserLikeCoupon->deleteUserLike($userId, $id))  {
            $status = "ERROR";
            $msg = "error in deleting";
        } elseif(!$this->Coupon->updateAll(
                array('Coupon.like' => 'Coupon.like-1'), 
                array('Coupon.id' => $id))) {
            $status = "ERROR";
            $msg = "error in counting step in deleting";
        } 
        $this->set(array('msg'=>$msg, "status"=>$status, 
            '_serialize' => array("status", "msg")));  
    }

	public function indexByCategory2($cId = 0, $tag="") {
        $userId = $this->UserAuth->getUserId();

        $likedList = $this->UserLikeCoupon->find('all', array('conditions'=>array('user_id' => $userId)));    
        $likedIdList = array(); 
        foreach($likedList as $l) {
            $likedIdList[] = $l['UserLikeCoupon']['coupon_id'];
        }

        $categories = $this->CouponsCategory->find('all');
        $timeNow = date("Y-m-d H:i:s\n");

		$this->Coupon->recursive = 1;
        if($cId == 0) {
            $options = array( 
                'order' => 'like desc',
                'conditions' => array(
                    'datetime_end >' => $timeNow,
                ),
            );
        } else {
            $options = array( 
                'conditions' => array(
                    'coupon_category' => $cId,
                    'datetime_end >' => $timeNow,
                ),
                'order' => 'like desc'
            );
        }

        //tags
        $tagArr = array();

        $couponsOut = array();

        $coupons = $this->Coupon->find('all', $options);
        foreach($coupons as $k => $v) {
            foreach($v['CouponTag'] as $kk=>$vv) {
                if(!array_key_exists($vv['tag'],  $tagArr)) {
                    $tagArr[$vv['tag']] = 1;
                } else {
                    $tagArr[$vv['tag']] = $tagArr[$vv['tag']] + 1;
                }
            }
            if(in_array($v['Coupon']['id'], $likedIdList)) {
                $coupons[$k]['Coupon']['iLiked'] = True;
            } else {
                $coupons[$k]['Coupon']['iLiked'] = False;
            }
            if($tag !='') {
                foreach($v['CouponTag'] as $kk=>$vv) {
                    if($vv['tag'] == $tag) {
                        $couponsOut[] = $coupons[$k];
                        break;
                    }
                }
            } else {
                $couponsOut[] = $coupons[$k];
            }
        }

        arsort($tagArr);



        $this->set('coupons', $couponsOut);
        $this->set('tag', $tag);
        $this->set('cId', $cId);
        $this->set('tags', $tagArr);
        $this->set('categories', $categories);
        $this->set('userId', $userId);
        $this->set('likedList', $likedList);
	}

	public function indexByCategory($cId = 0) {
        $userId = $this->UserAuth->getUserId();

        $likedList = $this->UserLikeCoupon->find('all', array('conditions'=>array('user_id' => $userId)));    
        $likedIdList = array(); 
        foreach($likedList as $l) {
            $likedIdList[] = $l['UserLikeCoupon']['coupon_id'];
        }

        $categories = $this->CouponsCategory->find('all');
        $timeNow = date("Y-m-d H:i:s\n");

		$this->Coupon->recursive = 1;
        if($cId == 0) {
            $options = array( 
                'order' => 'like desc',
                'conditions' => array(
                    'datetime_end >' => $timeNow,
                ),
            );
        } else {
            $options = array( 
                'conditions' => array(
                    'coupon_category' => $cId,
                    'datetime_end >' => $timeNow,
                ),
                'order' => 'like desc'
            );
        }
        $coupons = $this->Coupon->find('all', $options);
        foreach($coupons as $k => $v) {
            if(in_array($v['Coupon']['id'], $likedIdList)) {
                $coupons[$k]['Coupon']['iLiked'] = True;
            } else {
                $coupons[$k]['Coupon']['iLiked'] = False;
            }
        }

        $this->set('coupons', $coupons);
        $this->set('categories', $categories);
        $this->set('userId', $userId);
        $this->set('likedList', $likedList);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	//public function view($id = null) {
	//	if (!$this->Coupon->exists($id)) {
	//		throw new NotFoundException(__('Invalid coupon'));
	//	}
	//	$options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
	//	$this->set('coupon', $this->Coupon->find('first', $options));
	//}

/**
 * add method
 *
 * @return void
 */
	//public function add() {
	//	if ($this->request->is('post')) {
	//		$this->Coupon->create();
	//		if ($this->Coupon->save($this->request->data)) {
	//			$this->Flash->success(__('The coupon has been saved.'));
	//			return $this->redirect(array('action' => 'index'));
	//		} else {
	//			$this->Flash->error(__('The coupon could not be saved. Please, try again.'));
	//		}
	//	}
	//}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	//public function edit($id = null) {
	//	if (!$this->Coupon->exists($id)) {
	//		throw new NotFoundException(__('Invalid coupon'));
	//	}
	//	if ($this->request->is(array('post', 'put'))) {
	//		if ($this->Coupon->save($this->request->data)) {
	//			$this->Flash->success(__('The coupon has been saved.'));
	//			return $this->redirect(array('action' => 'index'));
	//		} else {
	//			$this->Flash->error(__('The coupon could not be saved. Please, try again.'));
	//		}
	//	} else {
	//		$options = array('conditions' => array('Coupon.' . $this->Coupon->primaryKey => $id));
	//		$this->request->data = $this->Coupon->find('first', $options);
	//	}
	//}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	//public function delete($id = null) {
	//	$this->Coupon->id = $id;
	//	if (!$this->Coupon->exists()) {
	//		throw new NotFoundException(__('Invalid coupon'));
	//	}
	//	$this->request->allowMethod('post', 'delete');
	//	if ($this->Coupon->delete()) {
	//		$this->Flash->success(__('The coupon has been deleted.'));
	//	} else {
	//		$this->Flash->error(__('The coupon could not be deleted. Please, try again.'));
	//	}
	//	return $this->redirect(array('action' => 'index'));
	//}
}
