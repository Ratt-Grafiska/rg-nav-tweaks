<?php
/**
 * Plugin Name: Rätt Grafiska Responsive Navigation Tweaks
 * Plugin URI: https://github.com/Ratt-Grafiska/rg-nav-tweaks/
 * Description: Tweaks the block-based navigation responsiveness in WordPress, ensuring better visibility and control.
 * Version: 1.0.0
 * Author: Johan Wistbacka
 * Author URI: https://rattgrafiska.se/
 * Update URI: https://github.com/Ratt-Grafiska/rg-nav-tweaks/
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: rg-nav-tweaks
 */

// Exit if accessed directly.
if (!defined("ABSPATH")) {
  exit();
}

// Initiera uppdateraren
if (!class_exists("RgGitUpdater")) {
  require_once plugin_dir_path(__FILE__) . "git-updater.php";
}
require_once plugin_dir_path(__FILE__) . "rg-nav-tweaks.php";
