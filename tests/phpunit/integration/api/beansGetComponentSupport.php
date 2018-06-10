<?php
/**
 * Tests for beans_get_component_support()
 *
 * @package Beans\Framework\Tests\Integration\API
 *
 * @since   1.5.0
 */

namespace Beans\Framework\Tests\Integration\API;

use WP_UnitTestCase;

/**
 * Class Tests_BeansGetComponentSupport
 *
 * @package Beans\Framework\Tests\Integration\API
 * @group   api
 */
class Tests_BeansGetComponentSupport extends WP_UnitTestCase {

	/**
	 * Test beans_get_component_support() should return true for a supported component.
	 */
	public function test_should_return_true_for_supported_component() {
		$this->assertTrue( beans_get_component_support( 'wp_styles_compiler' ) );
	}

	/**
	 * Test beans_get_component_support() should return false for an unsupported component.
	 */
	public function test_should_return_false_for_unsupported_component() {
		$this->assertFalse( beans_get_component_support( 'beans' ) );
	}

	/**
	 * Test beans_get_component_support() should return false when component support has been removed.
	 */
	public function test_should_return_false_when_comment_support_removed() {
		beans_remove_api_component_support( 'wp_styles_compiler' );

		$this->assertFalse( beans_get_component_support( 'wp_styles_compiler' ) );

		// Clean up. Restore component support.
		beans_add_api_component_support( 'wp_styles_compiler' );
		$this->assertTrue( beans_get_component_support( 'wp_styles_compiler' ) );
	}
}
