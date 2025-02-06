<?php
/*
Plugin Name: Custom Navigation Styling
Plugin URI: https://github.com/donjohann/custom-login-theme
Description: A WordPress plugin that customizes the navigation menu display based on screen width.
Version: 1.1
Author: Johan Wistbacka
Author URI: https://wistbacka.se
License: GPL2
*/

add_Action('wp_head','my_head_css');
function my_head_css(){
	// Använd funktionen för att få layoutmåtten
	$content_size = wp_get_global_settings(array('layout', 'contentSize'));
	$wide_size = wp_get_global_settings(array('layout', 'wideSize'));
	$breakpoint = $content_size;
	// $breakpoint = '800px';
	
	echo "<style>

	body .wp-block-navigation__responsive-container-open:not(.always-shown) {
		display: block !important;
	}
	body .wp-block-navigation__responsive-container:not(.hidden-by-default):not(.is-menu-open) {
		display: none !important;
	}
	.d-none{
		display: none;
	}
	body .wp-block-navigation__responsive-container.is-menu-open .d-open{
		display: none;
	}
	body .wp-block-navigation__responsive-container .d-open{
		display: inherit;
	}

	@media (max-width: ".$breakpoint.") {
		body .wp-block-navigation__responsive-container.is-menu-open .wp-block-navigation__responsive-container-content .wp-block-navigation-item__content{
			padding: 2em;
		}
	}
	@media (min-width: ".$content_size.") {
		body .wp-block-navigation__responsive-container-open:not(.always-shown) {
			display: none !important;;
		}
		body .wp-block-navigation__responsive-container:not(.hidden-by-default):not(.is-menu-open) {
			display: block !important;
		}
		
		.d-contentSize{
			display: inherit !important;
		}
		.wp-block-navigation__responsive-container.is-menu-open {
			background-color: inherit;
			display: flex;
			position: relative;
			width: 100%;
			z-index: auto;
		}
		.is-menu-open .wp-block-navigation__responsive-close, .is-menu-open .wp-block-navigation__responsive-container-content, .is-menu-open .wp-block-navigation__responsive-dialog{
			display: none;
		}
	}

	</style>";
}

// Använd 'wp_head' action hook för att lägga till den anpassade CSS:en och JavaScriptet i headern
// add_action('wp_head', 'override_native_navigation_breakpoint');