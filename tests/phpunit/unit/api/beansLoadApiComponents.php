<?php
/**
 * Tests for beans_load_api_components()
 *
 * @package Beans\Framework\Tests\Unit\API
 *
 * @since   1.5.0
 */

namespace Beans\Framework\Tests\Unit\API;

use Beans\Framework\Tests\Unit\Test_Case;
use Brain\Monkey;

/**
 * Class Tests_BeansLoadApiComponents
 *
 * @package Beans\Framework\Tests\Unit\API
 * @group   api
 */
class Tests_BeansLoadApiComponents extends Test_Case {

	/**
	 * Prepares the test environment before each test.
	 */
	protected function setUp() {
		parent::setUp();

		$this->load_original_functions( array(
			'api/components.php',
		) );
	}

	/**
	 * Test beans_load_api_components() should call is_admin().
	 */
	public function test_should_call_is_admin() {
		Monkey\Functions\expect( 'is_admin' )->once()->andReturn( true );

		$this->assertTrue( beans_load_api_components( 'actions' ) );
	}
}
