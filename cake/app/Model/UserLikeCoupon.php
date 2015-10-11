<?php
App::uses('AppModel', 'Model');
/**
 * UserLikeCoupon Model
 *
 */
class UserLikeCoupon extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'user_like_coupon';

    public function deleteUserLike($userId, $couponId) {
        //return true if success;
        return $this->deleteAll(array('user_id' => $userId, 'coupon_id'=> $couponId),  false);
    }

    public function addUserLike($userId, $couponId) {
        $this->create();
        $this->set('user_id', $userId);   
        $this->set('coupon_id', $couponId);   
        return $this->save();
    }

}
