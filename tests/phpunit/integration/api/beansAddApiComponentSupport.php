<?php
/**
 * Tests for beans_add_api_component_support()
 *
 * @package Beans\Framework\Tests\Integration\API
 *
 * @since   1.5.0
 */

namespace Beans\Framework\Tests\Integration\API;

use WP_UnitTestCase;

/**
 * Class Tests_BeansAddApiComponentSupport
 *
 * @package Beans\Framework\Tests\Integration\API
 * @group   api
 */
class Tests_BeansAddApiComponentSupport extends WP_UnitTestCase {

	/**
	 * Test beans_add_api_component_support() should add support for a component.
	 */
	public function test_should_add_support_for_component() {
		$this->assertFalse( beans_get_component_support( 'beans' ) );

		beans_add_api_component_support( 'beans' );
		$this->assertTrue( beans_get_component_support( 'beans' ) );

		// Clean up.
		beans_remove_api_component_support( 'beans' );
		$this->assertFalse( beans_get_component_support( 'beans' ) );
	}

	/**
	 * Test beans_add_api_component_support() should add support for a component and its additional arguments.
	 */
	public function test_should_add_support_for_component_and_additional_arguments() {
		$this->assertFalse( beans_get_component_support( 'beans' ) );

		beans_add_api_component_support( 'beans', 'test adding arguments' );

		$this->assertContains( 'test adding arguments', beans_get_component_support( 'beans' ) );

		// Clean up.
		beans_remove_api_component_support( 'beans' );
		$this->assertFalse( beans_get_component_support( 'beans' ) );
	}

	/**
	 * Test beans_add_api_component_support() should add support for a component and its additional string arguments.
	 */
	public function test_should_add_support_for_component_and_additional_string_arguments() {
		$this->assertFalse( beans_get_component_support( 'beans' ) );

		beans_add_api_component_support( 'beans', 'test argument one' );

		$this->assertContains( 'test argument one', beans_get_component_support( 'beans' ) );

		// Clean up.
		beans_remove_api_component_support( 'beans' );
		$this->assertFalse( beans_get_component_support( 'beans' ) );
	}

	/**
	 * Test beans_add_api_component_support() should add support for a component and its additional array arguments.
	 */
	public function test_should_add_support_for_component_and_additional_array_arguments() {
		$this->assertFalse( beans_get_component_support( 'beans' ) );

		beans_add_api_component_support( 'beans', array( 'test argument one', 'test argument two' ) );

		$this->assertContains( array( 'test argument one', 'test argument two' ), beans_get_component_support( 'beans' ) );

		// Clean up.
		beans_remove_api_component_support( 'beans' );
		$this->assertFalse( beans_get_component_support( 'beans' ) );
	}
}
