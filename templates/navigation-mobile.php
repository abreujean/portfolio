<?php
/**
 * Navigation Mobile Template
 * Mobile version of navigation with hamburger toggle and drawer menu
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<!-- Mobile Navigation Wrapper -->
<nav id="site-navigation" class="nav nav-mobile" role="navigation" aria-label="<?php esc_attr_e('Main Navigation', 'portfolio'); ?>">
    <!-- Logo/Brand -->
    <?php get_template_part('templates/components/nav-logo'); ?>

    <!-- Menu Button (Mobile Hamburger) -->
    <button id="menu-toggle" class="menu-toggle" aria-controls="primary-menu-list" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle Menu', 'portfolio'); ?>">
        <span class="menu-toggle-icon">
            <span class="menu-toggle-line"></span>
            <span class="menu-toggle-line"></span>
            <span class="menu-toggle-line"></span>
        </span>
    </button>
</nav>

<!-- Mobile Menu Drawer -->
<?php 
$primary_menu_class = 'primary-menu-list';
// Check if menu is active (will be set by JavaScript)
$primary_menu_active = isset($_GET['menu']) && $_GET['menu'] === 'open' ? 'active' : '';
?>

<div id="primary-menu" class="primary-menu <?php echo esc_attr($primary_menu_active); ?>">
    <!-- Mobile Menu Close Button -->
    <button id="menu-close" class="menu-close" aria-label="<?php esc_attr_e('Close Menu', 'portfolio'); ?>">
        <span class="menu-close-icon">×</span>
    </button>

</div>

<!-- Menu Overlay (Mobile) -->
<div id="menu-overlay" class="menu-overlay">
        <!-- Mobile Menu Items -->
    <?php 
    get_template_part('templates/components/nav-menu-items', null, [
        'menu_class' => 'primary-menu-list',
        'menu_id'    => 'primary-menu-list',
        'include_status' => false,
    ]);
    ?>
</div>
