<?php
App::uses('AppModel', 'Model');
/**
 * UserFollowShop Model
 *
 */
class UserFollowShop extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'user_follow_shop';

    public function deleteUserFollow($userId, $shopId) {
        //return true if success;
        return $this->deleteAll(array('user_id' => $userId, 'shop_id'=> $shopId),  false);
    }

    public function addUserFollow($userId, $shopId) {
        $this->create();
        $this->set('user_id', $userId);   
        $this->set('shop_id', $shopId);   
        return $this->save();
    }

}
