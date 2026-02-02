<?php
/**
 * Navigation template part (Refactored)
 * 
 * Loads desktop and mobile navigation templates based on responsive design
 * Both templates are loaded, CSS controls visibility via media queries
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<header class="nav-wrapper" id="site-header">
    <!-- Desktop Navigation (visible on tablet and up) -->
    <div class="nav-desktop-wrapper">
        <?php get_template_part('templates/navigation-desktop'); ?>
    </div>

    <!-- Mobile Navigation (visible on mobile only) -->
    <div class="nav-mobile-wrapper">
        <?php get_template_part('templates/navigation-mobile'); ?>
    </div>
</header>

<?php
/**
 * Fallback callback for primary menu
 */
function portfolio_primary_menu_fallback() {
    if (current_user_can('edit_theme_options')) {
        ?>
        <ul id="primary-menu-list" class="primary-menu-list">
            <li class="menu-notice">
                <?php
                /* translators: %s: link to menus admin page */
                printf(
                    esc_html__('Please assign a menu to the Primary Menu location in %s.', 'portfolio'),
                    '<a href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_html__('Appearance > Menus', 'portfolio') . '</a>'
                );
                ?>
            </li>
        </ul>
        <?php
    }
}
