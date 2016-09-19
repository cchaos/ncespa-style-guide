<?php
/**
 * NCESPA back compat functionality
 *
 * Prevents NCESPA from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 *  @package NCESPA
 */
function ncespa_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'ncespa_upgrade_notice' );
}
add_action( 'after_switch_theme', 'ncespa_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * NCESPA on WordPress versions prior to 4.4.
 *
 * @global string $wp_version WordPress version.
 */
function ncespa_upgrade_notice() {
	$message = sprintf( __( 'NCESPA requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'ncespa' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @global string $wp_version WordPress version.
 */
function ncespa_customize() {
	wp_die( sprintf( __( 'NCESPA requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'ncespa' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'ncespa_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @global string $wp_version WordPress version.
 */
function ncespa_preview() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'NCESPA requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'ncespa' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'ncespa_preview' );
