<?php
/**
 * Tests for beans_get_component_support()
 *
 * @package Beans\Framework\Tests\Integration\API
 *
 * @since   1.5.0
 */

namespace Beans\Framework\Tests\Unit\API;

use Beans\Framework\Tests\Unit\Test_Case;

/**
 * Class Tests_BeansGetComponentSupport
 *
 * @package Beans\Framework\Tests\Integration\API
 * @group   api
 */
class Tests_BeansGetComponentSupport extends Test_Case {

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
	 * Test beans_get_component_support() should return true for a supported component.
	 */
	public function test_should_return_true_for_supported_component() {
		global $_beans_api_components_support;
		$_beans_api_components_support['beans'] = true;

		$this->assertTrue( beans_get_component_support( 'beans' ) );
	}

	/**
	 * Test beans_get_component_support() should return false for an unsupported component.
	 */
	public function test_should_return_false_for_unsupported_component() {
		$this->assertFalse( beans_get_component_support( 'beans' ) );
	}
}
