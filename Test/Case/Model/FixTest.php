<?php
App::uses('Fix', 'Model');

/**
 * Fix Test Case
 *
 */
class FixTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.fix',
		'app.vehicle'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Fix = ClassRegistry::init('Fix');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Fix);

		parent::tearDown();
	}

}
