<?php
App::uses('AppModel', 'Model');
/**
 * CouponTag Model
 *
 * @property Coupon $Coupon
 */
class CouponTag extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'coupon_tag';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Coupon' => array(
			'className' => 'Coupon',
			'foreignKey' => 'coupon_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
