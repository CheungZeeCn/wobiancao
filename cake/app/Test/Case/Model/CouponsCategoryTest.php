<?php
App::uses('CouponsCategory', 'Model');

/**
 * CouponsCategory Test Case
 */
class CouponsCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.coupons_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CouponsCategory = ClassRegistry::init('CouponsCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CouponsCategory);

		parent::tearDown();
	}

}
