<?php
// Prevent direct access
if (!defined('ABSPATH')) {
	exit;	
}

add_action("wp_head", "rg_head_css");
function rg_head_css()
{
  // Använd funktionen för att få layoutmåtten
  $breakpoint = get_option('wp_breakpoint_value', 'contentSize'); // Hämtar lagrat värde, standard är 'contentSize'
  $custom_breakpoint = get_option('wp_breakpoint_custom_value', '1024'); // Hämtar anpassat värde, standard 1024px

  if ($breakpoint === 'contentSize') {
      // Använd contentSize från globala inställningar
      $breakpoint = wp_get_global_settings(["layout", "contentSize"]);
  } elseif ($breakpoint === 'wideSize') {
      // Använd wideSize från globala inställningar
      $breakpoint = wp_get_global_settings(["layout", "wideSize"]);
  } elseif ($breakpoint === 'custom') {
      // Använd anpassat värde
      $breakpoint = $custom_breakpoint . 'px';
  }

  if(isset($breakpoint)){
     deb
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

	@media (max-width: " .
    $breakpoint .
    ") {
		body .wp-block-navigation__responsive-container.is-menu-open .wp-block-navigation__responsive-container-content .wp-block-navigation-item__content{
			padding: 2em;
		}
	}
	@media (min-width: " .
    $breakpoint .
    ") {
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
}
?>