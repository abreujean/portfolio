<?php
/**
 * Navigation Desktop Template
 * Desktop version of navigation with horizontal menu
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<nav id="site-navigation" class="nav nav-desktop" role="navigation" aria-label="<?php esc_attr_e('Main Navigation', 'portfolio'); ?>">
    <!-- Logo/Brand -->
    <?php get_template_part('templates/components/nav-logo'); ?>

    <!-- Main Menu Links -->
    <?php 
    get_template_part('templates/components/nav-menu-items', null, [
        'menu_class' => 'nav-links',
        'menu_id'    => 'primary-menu',
        'include_status' => true,
    ]);
    ?>

    <!-- Language Switcher -->
    <?php get_template_part('templates/components/nav-lang'); ?>
</nav>
