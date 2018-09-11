<?php
/**
 * This file contains adjustments for WordPress Core's custom-logo feature.
 *
 * @package Beans\Framework\API\HTML
 *
 * @since   1.6.0
 */

add_filter( 'get_custom_logo', 'beans_add_class_to_custom_logo' );
/**
 * Adjust the HTML markup of the custom logo for backward compatibility.
 *
 * @since 1.6.0
 *
 * @param string $html HTML output of the custom logo
 *
 * @return string
 */
function beans_add_class_to_custom_logo( $html ) {
	$html = str_replace( 'class="custom-logo"', 'class="custom-logo tm-logo"', $html );
	return $html;
}

beans_add_smart_action( 'after_switch_theme', 'maybe_convert_beans_logo_image' );
beans_add_smart_action( 'after_setup_theme', 'maybe_convert_beans_logo_image' );
/**
 * Convert the beans_logo_image to WP Core's custom-logo.
 *
 * @since 1.6.0
 *
 * @return void
 */
function maybe_convert_beans_logo_image() {
	$beans_logo = get_theme_mod( 'beans_logo_image', false );

	// Nothing to do here if no custom logo was set.
	if ( ! $beans_logo ) {
		return;
	}

	// Nothing to do here if custom-logo theme support has been removed.
	if ( ! get_theme_support( 'custom-logo' ) ) {
		return;
	}

	$beans_logo_id = attachment_url_to_postid( $beans_logo );

	if ( 0 !== $beans_logo_id ) {
		set_theme_mod( 'custom_logo', $beans_logo_id );
		remove_theme_mod( 'beans_logo_image' );
	} else {
		$error = esc_html__( 'Sorry, we tried converting the Beans Logo Image to WordPress Core\'s custom-logo feature but could not find the attachment ID of the image.<br/>Please upload your logo again in the Customizer.', 'tm-beans' );
		printf( '<div class="error"><p>%s</p></div>', $error ); // phpcs:ignore WordPress.Security.EscapeOutput -- Need to build the HTML of the error message.
	}
}
