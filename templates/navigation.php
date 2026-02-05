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