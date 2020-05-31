<?php
/**
 * Add classes to the body of the document based on the current user's role
 *
 * @package WP-Theme-Components
 * @subpackage user-role-body-class
 * @author Cameron Jones
 * @version 1.0.0
 * @link https://github.com/WP-Theme-Components/user-role-body-class
 */

namespace WP_Theme_Components\User_Role_Body_Class;

/**
 * Bail if accessed directly
 *
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	die();
}

/**
 * Add classes to the body based on current user role
 *
 * @since 1.0.0
 * @param array $classes Array of body classes.
 * @return array
 */
function add_user_role_body_classes( $classes ) {
	$prefix = 'current-user-role--';
	if ( is_user_logged_in() ) {
		$user  = wp_get_current_user();
		$roles = $user->roles;
		foreach ( $roles as $role ) {
			$classes[] = $prefix . $role;
		}
	} else {
		$classes[] = $prefix . 'guest';
	}
	return $classes;
}

add_filter( 'body_class', __NAMESPACE__ . '\\add_user_role_body_classes' );
