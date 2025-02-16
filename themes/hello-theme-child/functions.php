<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://developers.elementor.com/docs/hello-elementor-theme/
 *
 * @package HelloElementorChild
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '2.0.0' );

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function hello_elementor_child_scripts_styles() {

	wp_enqueue_style(
		'hello-elementor-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		[
			'hello-elementor-theme-style',
		],
		HELLO_ELEMENTOR_CHILD_VERSION
	);

}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_scripts_styles', 20 );


// add_filter( 'wp_nav_menu_items', 'add_extra_item_to_nav_menu', 10, 2 );
// function add_extra_item_to_nav_menu( $items, $args ) {
// 	$items 	.= '<li><a href="#">Admin</a></li>';
// 	$args['menu'] = 'Visiteur';
// 	$args['container'] = 'div';
// 	$args['menu'] = 'Visiteur';

// 	var_dump($args);
//     return $items;
// }

// wp_nav_menu( array(
// 	'theme_location' => is_user_logged_in() ? 'menu=7' : 'menu=6'
// ) );


// Essai pour cibler le menu du header

function wpc_wp_nav_menu_args( $args = '' ) {
	if( is_user_logged_in()) { 
		if( 'menu-1' == $args['theme_location'] ) { 
		
			$args['menu'] = 'connecte';
		}
	} else { 
		if( 'menu-1' == $args['theme_location'] ) { 
		
			$args['menu'] = 'visiteur';
		}
	} 
		return $args;
	}
	add_filter( 'wp_nav_menu_args', 'wpc_wp_nav_menu_args' );


