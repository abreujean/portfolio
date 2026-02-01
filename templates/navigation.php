<?php
/**
 * Navigation template part
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<header class="nav-wrapper">
    <nav id="site-navigation" class="nav" role="navigation" aria-label="<?php esc_attr_e('Main Navigation', 'portfolio'); ?>">
        <!-- Logo/Brand -->
        <div class="nav-logo">
            <?php if (has_custom_logo()) : ?>
                <div class="logo-container">
                    <?php the_custom_logo(); ?>
                </div>
            <?php else : ?>
                <span class="logo-mark">&lt;/&gt;</span>
            <?php endif; ?>
        </div>

        <!-- Main Menu Links -->
        <ul id="primary-menu-list" class="nav-links" role="menubar">
            <li class="nav-status" role="menuitem">
                <span class="status-dot"></span>
                <span class="status-text"><?php esc_html_e('Available', 'portfolio'); ?></span>
            </li>
            
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_id'        => 'primary-menu',
                'menu_class'     => '',
                'container'      => false,
                'fallback_cb'    => 'portfolio_primary_menu_fallback',
                'item_spacing'   => 'discard',
                'depth'          => 1,
            ]);
            ?>
        </ul>

        <!-- Language Switcher -->
        <div class="nav-lang">
            <button class="lang active" aria-label="<?php esc_attr_e('Portuguese', 'portfolio'); ?>" data-lang="pt">
                PT
            </button>
            <button class="lang" aria-label="<?php esc_attr_e('English', 'portfolio'); ?>" data-lang="en">
                <img src="https://flagcdn.com/w20/us.png" alt="EN" />
            </button>
        </div>

        <!-- Menu Button (Mobile Hamburger) -->
        <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu-list" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle Menu', 'portfolio'); ?>">
            <span class="menu-toggle-icon">
                <span class="menu-toggle-line"></span>
                <span class="menu-toggle-line"></span>
                <span class="menu-toggle-line"></span>
            </span>
        </button>

        <!-- Mobile Menu Close Button (inside nav-links for positioning) -->
        <button id="menu-close" class="menu-close" aria-label="<?php esc_attr_e('Close Menu', 'portfolio'); ?>" style="display: none;">
            <span class="menu-close-icon">×</span>
        </button>

        <!-- Menu Overlay (Mobile) -->
        <div id="menu-overlay" class="menu-overlay"></div>
    </nav>
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
?>