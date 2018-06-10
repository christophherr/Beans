<?php
/**
 * Tests for beans_remove_api_component_support()
 *
 * @package Beans\Framework\Tests\Integration\API
 *
 * @since   1.5.0
 */

namespace Beans\Framework\Tests\Integration\API;

use WP_UnitTestCase;

/**
 * Class Tests_BeansRemoveApiComponentSupport
 *
 * @package Beans\Framework\Tests\Integration\API
 * @group   api
 */
class Tests_BeansRemoveApiComponentSupport extends WP_UnitTestCase {

	/**
	 * Test beans_remove_api_component_support() should remove support for a component.
	 */
	public function test_should_remove_support_for_component() {
		$this->assertTrue( beans_get_component_support( 'wp_styles_compiler' ) );

		beans_remove_api_component_support( 'wp_styles_compiler' );
		$this->assertFalse( beans_get_component_support( 'wp_styles_compiler' ) );

		// Clean up.
		beans_add_api_component_support( 'wp_styles_compiler' );
		$this->assertTrue( beans_get_component_support( 'wp_styles_compiler' ) );
	}

	/**
	 * Test beans_remove_api_component_support() should remove support for a component and its additional string arguments.
	 */
	public function test_should_remove_support_for_a_component_and_its_arguments() {
		beans_add_api_component_support( 'beans', 'test argument one' );

		beans_remove_api_component_support( 'beans' );
		$this->assertFalse( beans_get_component_support( 'beans' ) );
	}

	/**
	 * Test beans_remove_api_component_support() should remove support for a component and its additional array arguments.
	 */
	public function test_should_remove_support_for_multiple_components() {
		beans_add_api_component_support( 'beans', array( 'test argument one', 'test argument two' ) );

		beans_remove_api_component_support( 'beans' );
		$this->assertFalse( beans_get_component_support( 'beans' ) );
	}
}
