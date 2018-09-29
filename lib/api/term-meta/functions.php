<?php
/**
 * Functions for Beans Term Meta.
 *
 * @package Beans\Framework\API\Term_Meta
 *
 * @since 1.0.0
 */

/**
 * Get the current term meta value.
 *
 * @since 1.0.0
 * @since 1.6.0 Use get_term_meta().
 *
 * @param string $field_id The term meta id searched.
 * @param mixed  $default  Optional. The default value to return if the term meta value doesn't exist.
 * @param int    $term_id  Optional. Overwrite the current term id.
 *
 * @return mixed Return the term meta value if it exists; otherwise, return the default value.
 */
function beans_get_term_meta( $field_id, $default = false, $term_id = false ) {

	if ( ! $term_id ) {
		$term_id = beans_get( 'term_id', get_queried_object() );

		if ( ! $term_id ) {
			$term_id = beans_get( 'tag_ID' );
		}
	}

	if ( ! $term_id ) {
		return $default;
	}

	$term_meta = get_term_meta( $term_id );

	if ( isset( $term_meta[ $field_id ] ) ) {
		return get_term_meta( $term_id, $field_id, true );
	}

	return $default;
}
