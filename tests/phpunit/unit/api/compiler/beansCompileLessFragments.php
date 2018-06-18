<?php
/**
 * Tests for beans_compile_less_fragments()
 *
 * @package Beans\Framework\Tests\Unit\API\Compiler
 *
 * @since   1.5.0
 */

namespace Beans\Framework\Tests\Unit\API\Compiler;

use Beans\Framework\Tests\Unit\API\Compiler\Includes\Compiler_Test_Case;

require_once __DIR__ . '/includes/class-compiler-test-case.php';

/**
 * Class Test_BeansCompileLessFragments
 *
 * @package Beans\Framework\Tests\Unit\API\Compiler
 * @group   api
 * @group   api-compiler
 */
class Test_BeansCompileLessFragments extends Compiler_Test_Case {

	/**
	 * Test beans_compile_less_fragments() should return false when no fragments are passed to it.
	 */
	public function test_should_return_false_when_fragments_are_passed_to_it() {
		$this->assertFalse( beans_compile_less_fragments( 'foo', '' ) );
		$this->assertFalse( beans_compile_less_fragments( 'foo', [] ) );
		$this->assertFalse( beans_compile_less_fragments( 'foo', [], [ 'arg' => '' ] ) );
	}
}
