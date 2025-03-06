<?php

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Add a menu under "Appearance"
function wp_breakpoint_settings_menu() {
    add_theme_page(
        __('Breakpoint Settings', 'wp-breakpoint'), 
        __('Breakpoint Settings', 'wp-breakpoint'), 
        'manage_options', 
        'wp-breakpoint-settings', 
        'wp_breakpoint_settings_page'
    );
}
add_action('admin_menu', 'wp_breakpoint_settings_menu');

// Settings page
function wp_breakpoint_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php _e('Breakpoint Settings', 'wp-breakpoint'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('wp_breakpoint_settings_group');
            do_settings_sections('wp-breakpoint-settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register the setting
function wp_breakpoint_register_settings() {
    register_setting('wp_breakpoint_settings_group', 'wp_breakpoint_value');
    register_setting('wp_breakpoint_settings_group', 'wp_breakpoint_custom_value');
    add_settings_section('wp_breakpoint_section', __('Breakpoint Settings', 'wp-breakpoint'), null, 'wp-breakpoint-settings');
    add_settings_field(
        'wp_breakpoint_value', 
        __('Select Breakpoint', 'wp-breakpoint'), 
        'wp_breakpoint_field_callback', 
        'wp-breakpoint-settings', 
        'wp_breakpoint_section'
    );
    add_settings_field(
        'wp_breakpoint_custom_value', 
        __('Custom Breakpoint (px)', 'wp-breakpoint'), 
        'wp_breakpoint_custom_field_callback', 
        'wp-breakpoint-settings', 
        'wp_breakpoint_section'
    );
}
add_action('admin_init', 'wp_breakpoint_register_settings');

// Callback function for the dropdown field
function wp_breakpoint_field_callback() {
    $value = get_option('wp_breakpoint_value', 'contentSize'); // Default value
    ?>
    <select name="wp_breakpoint_value" id="wp_breakpoint_value" onchange="toggleCustomBreakpointField()">
        <option value="contentSize" <?php selected($value, 'contentSize'); ?>><?php _e('Content Size', 'wp-breakpoint'); ?></option>
        <option value="wideSize" <?php selected($value, 'wideSize'); ?>><?php _e('Wide Size', 'wp-breakpoint'); ?></option>
        <option value="custom" <?php selected($value, 'custom'); ?>><?php _e('Custom', 'wp-breakpoint'); ?></option>
    </select>
    <?php
}

// Callback function for the custom input field
function wp_breakpoint_custom_field_callback() {
    $custom_value = get_option('wp_breakpoint_custom_value', '1024'); // Default custom px value
    ?>
    <input type="number" name="wp_breakpoint_custom_value" id="wp_breakpoint_custom_value" value="<?php echo esc_attr($custom_value); ?>" min="320" max="2560" step="1"> px
    <script>
        function toggleCustomBreakpointField() {
            var select = document.getElementById('wp_breakpoint_value');
            var customField = document.getElementById('wp_breakpoint_custom_value');
            customField.disabled = (select.value !== 'custom');
        }
        document.addEventListener('DOMContentLoaded', toggleCustomBreakpointField);
    </script>
    <?php
}

// Add CSS variable in frontend
function wp_breakpoint_add_inline_styles() {
    $breakpoint = get_option('wp_breakpoint_value', 'contentSize');
    $custom_breakpoint = get_option('wp_breakpoint_custom_value', '1024');
    
    if ($breakpoint === 'contentSize') {
        $breakpoint_value = wp_get_global_settings(["layout", "contentSize"]);
    } elseif ($breakpoint === 'wideSize') {
        $breakpoint_value = wp_get_global_settings(["layout", "wideSize"]);
    } else {
        $breakpoint_value = $custom_breakpoint . 'px';
    }
    
    echo '<style>:root { --wp-breakpoint: ' . esc_attr($breakpoint_value) . '; }</style>';
}
add_action('wp_head', 'wp_breakpoint_add_inline_styles');