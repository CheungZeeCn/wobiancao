<?php
App::uses('UserHasCoupon', 'Model');

/**
 * UserHasCoupon Test Case
 */
class UserHasCouponTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_has_coupon'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserHasCoupon = ClassRegistry::init('UserHasCoupon');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserHasCoupon);

		parent::tearDown();
	}

}
