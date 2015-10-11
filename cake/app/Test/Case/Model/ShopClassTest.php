<?php
App::uses('ShopClass', 'Model');

/**
 * ShopClass Test Case
 */
class ShopClassTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shop_class'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ShopClass = ClassRegistry::init('ShopClass');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ShopClass);

		parent::tearDown();
	}

}
