<?php
/**
 * Navigation Language Switcher Component
 * Shared language switcher used in desktop navigation
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="nav-lang <?php echo isset($args['variant']) ? 'nav-lang-' . esc_attr($args['variant']) : ''; ?>" role="group" aria-label="<?php esc_attr_e('Language Selection', 'portfolio'); ?>">
    <?php
    // Check if GTranslate plugin is active
    if (shortcode_exists('gtranslate')) {
        echo do_shortcode('[gtranslate]');
    } else {
        // Show suggestion to install GTranslate plugin
        if (current_user_can('install_plugins')) {
            echo '<a href="' . esc_url(admin_url('plugin-install.php?s=gtranslate&tab=search&type=term')) . '" class="nav-lang-notice" title="Install GTranslate plugin">';
            echo '<span class="lang-notice-icon">⚠️</span>';
            echo '<span class="lang-notice-text">' . esc_html__('Install GTranslate', 'portfolio') . '</span>';
            echo '</a>';
        } else {
            // Fallback for non-admin users
            echo '<div class="nav-lang-placeholder" title="GTranslate plugin not installed">';
            echo '<span class="lang-placeholder-text">' . esc_html__('EN/PT', 'portfolio') . '</span>';
            echo '</div>';
        }
    }
    ?>
</div>
