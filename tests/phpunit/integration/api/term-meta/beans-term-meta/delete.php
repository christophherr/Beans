<?php
/**
 * Tests for the delete() method of _Beans_Term_Meta.
 *
 * @package Beans\Framework\Tests\Integration\API\Term_Meta
 *
 * @since   1.5.0
 */

namespace Beans\Framework\Tests\Integration\API\Term_Meta;

use Beans\Framework\Tests\Integration\API\Term_Meta\Includes\Term_Meta_Test_Case;
use _Beans_Term_Meta;

require_once BEANS_THEME_DIR . '/lib/api/term-meta/class-beans-term-meta.php';
require_once BEANS_THEME_DIR . '/lib/api/term-meta/functions-admin.php';
require_once dirname( __DIR__ ) . '/includes/class-term-meta-test-case.php';

/**
 * Class Tests_BeanTermMeta_Delete
 *
 * @package Beans\Framework\Tests\Integration\API\Term_Meta
 * @group   api
 * @group   api-term-meta
 */
class Tests_BeansTermMeta_Delete extends Term_Meta_Test_Case {

	/**
	 * Test _Beans_Term_Meta::delete() should remove term meta database table.
	 */
	public function test_should_remove_term_meta_option_from_db_options_table() {
		update_term_meta( 123, 'beans_term_field', 'term-meta-value' );

		$term_meta = new _Beans_Term_Meta( 'tm-beams' );
		$term_meta->delete( 123, 'beans_term_field' );

		$this->assertEmpty( get_term_meta( 123, 'beans_term_field' ) );
	}
}
