<?php
App::uses('ShopCategory', 'Model');

/**
 * ShopCategory Test Case
 */
class ShopCategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.shop_category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ShopCategory = ClassRegistry::init('ShopCategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ShopCategory);

		parent::tearDown();
	}

}
