<?php
/**
 * Coupon Fixture
 */
class CouponFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'coupon';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'shop_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'desp' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 512, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'like' => array('type' => 'integer', 'null' => false, 'default' => '100', 'unsigned' => false),
		'coupon_category' => array('type' => 'integer', 'null' => false, 'default' => '1', 'unsigned' => false),
		'datetime_begin' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'datetime_end' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'shop_id' => 1,
			'name' => 'Lorem ipsum dolor sit amet',
			'desp' => 'Lorem ipsum dolor sit amet',
			'like' => 1,
			'coupon_category' => 1,
			'datetime_begin' => '2015-10-11 07:15:46',
			'datetime_end' => '2015-10-11 07:15:46'
		),
	);

}
