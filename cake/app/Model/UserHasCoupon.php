<?php
App::uses('AppModel', 'Model');
/**
 * UserHasCoupon Model
 *
 */
class UserHasCoupon extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'user_has_coupon';

    public function deleteUserHas($userId, $couponId) {
        //return true if success;
        return $this->deleteAll(array('user_id' => $userId, 'coupon_id'=> $couponId),  false);
    }

    public function addUserHas($userId, $couponId) {
        $this->create();
        $this->set('user_id', $userId);   
        $this->set('coupon_id', $couponId);   
        return $this->save();
    }

}
