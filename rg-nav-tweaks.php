<?php
// Exit if accessed directly.
if (!defined("ABSPATH")) {
  exit();
}

// Hook into wp_head to inject CSS.
add_action("wp_head", "rg_nav_tweaks_head_css");
function rg_nav_tweaks_head_css()
{
  $content_size = wp_get_global_settings(["layout", "contentSize"]);
  $wide_size = wp_get_global_settings(["layout", "wideSize"]);
  $breakpoint = $content_size ? esc_attr($content_size) : "800px";

  echo "<style>
	body .wp-block-navigation__responsive-container-open:not(.always-shown) {
		display: block !important;
	}
	body .wp-block-navigation__responsive-container:not(.hidden-by-default):not(.is-menu-open) {
		display: none !important;
	}
	.d-none {
		display: none;
	}
	body .wp-block-navigation__responsive-container.is-menu-open .d-open {
		display: none;
	}
	body .wp-block-navigation__responsive-container .d-open {
		display: inherit;
	}
	@media (max-width: $breakpoint) {
		body .wp-block-navigation__responsive-container.is-menu-open .wp-block-navigation__responsive-container-content .wp-block-navigation-item__content {
			padding: 2em;
		}
	}
	@media (min-width: $content_size) {
		body .wp-block-navigation__responsive-container-open:not(.always-shown) {
			display: none !important;
		}
		body .wp-block-navigation__responsive-container:not(.hidden-by-default):not(.is-menu-open) {
			display: block !important;
		}
		.d-contentSize {
			display: inherit !important;
		}
		.wp-block-navigation__responsive-container.is-menu-open {
			background-color: inherit;
			display: flex;
			position: relative;
			width: 100%;
			z-index: auto;
		}
		.is-menu-open .wp-block-navigation__responsive-close,
		.is-menu-open .wp-block-navigation__responsive-container-content,
		.is-menu-open .wp-block-navigation__responsive-dialog {
			display: none;
		}
	}
	</style>";
}
