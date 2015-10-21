<?php
App::uses('AppModel', 'Model');
/**
 * Coupon Model
 *
 */
class Coupon extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'coupon';
    public $belongsTo = array('Shop');
    public $hasMany = array('CouponTag');

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

}
