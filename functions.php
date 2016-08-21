<?php

namespace mnml\functions;

function setup(){


	/**
	 *
	 * Add support for Soil
	 * @see https://roots.io/plugins/soil/
	 *
	 */
	add_theme_support( 'soil-clean-up' );
	add_theme_support( 'soil-nav-walker' );
	add_theme_support( 'soil-nice-search' );
	add_theme_support( 'soil-jquery-cdn' );
	add_theme_support( 'soil-relative-urls' );


	/**
	 *
	 * Register navigation menus
	 * @see http://codex.wordpress.org/Function_Reference/register_nav_menus
	 *
	 */
	register_nav_menus( [
		'primary_nav'	=> __( 'Primary Navigation', 'mnml' )
	] );


	/**
	 *
	 * Turn on HTML5 support
	 * @see http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	 *
	 */
	add_theme_support( 'html5', ['caption', 'comment-form', 'comment-list', 'gallery', 'search-form'] );
}

add_action('after_setup_theme', __NAMESPACE__ . '\\setup');


/**
 *
 * Enqueue CSS
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 *
 */

function assets(){
	wp_enqueue_style( 'css', get_template_directory_uri() . '/dest/mnml.css', false, null );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\assets' );


/**
 *
 * Remove Jetpack CSS
 * @link https://css-tricks.com/snippets/wordpress/removing-jetpack-css/
 *
 */
add_filter( 'jetpack_implode_frontend_css', '__return_false' );

function jetpack_css(){
	wp_deregister_style( 'AtD_style' ); // After the Deadline
	wp_deregister_style( 'jetpack_likes' ); // Likes
	wp_deregister_style( 'jetpack_related-posts' ); //Related Posts
	wp_deregister_style( 'jetpack-carousel' ); // Carousel
	wp_deregister_style( 'grunion.css' ); // Grunion contact form
	wp_deregister_style( 'the-neverending-homepage' ); // Infinite Scroll
	wp_deregister_style( 'infinity-twentyten' ); // Infinite Scroll - Twentyten Theme
	wp_deregister_style( 'infinity-twentyeleven' ); // Infinite Scroll - Twentyeleven Theme
	wp_deregister_style( 'infinity-twentytwelve' ); // Infinite Scroll - Twentytwelve Theme
	wp_deregister_style( 'noticons' ); // Notes
	wp_deregister_style( 'post-by-email' ); // Post by Email
	wp_deregister_style( 'publicize' ); // Publicize
	wp_deregister_style( 'sharedaddy' ); // Sharedaddy
	wp_deregister_style( 'sharing' ); // Sharedaddy Sharing
	wp_deregister_style( 'stats_reports_css' ); // Stats
	wp_deregister_style( 'jetpack-widgets' ); // Widgets
	wp_deregister_style( 'jetpack-slideshow' ); // Slideshows
	wp_deregister_style( 'presentations' ); // Presentation shortcode
	wp_deregister_style( 'jetpack-subscriptions' ); // Subscriptions
	wp_deregister_style( 'tiled-gallery' ); // Tiled Galleries
	wp_deregister_style( 'widget-conditions' ); // Widget Visibility
	wp_deregister_style( 'jetpack_display_posts_widget' ); // Display Posts Widget
	wp_deregister_style( 'gravatar-profile-widget' ); // Gravatar Widget
	wp_deregister_style( 'widget-grid-and-list' ); // Top Posts widget
	wp_deregister_style( 'jetpack-widgets' ); // Widgets
}

add_action( 'wp_print_styles', __NAMESPACE__ . '\\jetpack_css');
