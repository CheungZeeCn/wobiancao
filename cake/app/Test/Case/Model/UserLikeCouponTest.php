<?php
App::uses('UserLikeCoupon', 'Model');

/**
 * UserLikeCoupon Test Case
 */
class UserLikeCouponTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user_like_coupon'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UserLikeCoupon = ClassRegistry::init('UserLikeCoupon');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UserLikeCoupon);

		parent::tearDown();
	}

}
