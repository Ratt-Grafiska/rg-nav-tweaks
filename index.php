<?php
/*
Plugin Name: Rätt Grafisk Navigation Tweaks
Plugin URI: https://github.com/Ratt-Grafiska/rg-nav-tweaks
Update URI: https://github.com/Ratt-Grafiska/rg-nav-tweaks
Description: This plugin improves the responsiveness and behavior of block-based navigation menus in WordPress. It dynamically injects CSS based on global theme layout settings, ensuring a seamless experience across different screen sizes. By tweaking menu visibility, open/close states, and responsiveness, it helps maintain better navigation control in block-based themes.

Version: 0.0.9
Author: Johan Wistbacka
Author URI: https://wistbacka.se
License: GPL2
*/

// Initiera uppdateraren
require_once plugin_dir_path(__FILE__) . "git-updater.php";

require_once plugin_dir_path(__FILE__) . "rg-nav-tweaks.php";
