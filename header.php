<?php
/**
 * Header template for the Portfolio theme
 *
 * Displays all of the <head> section and everything up until <div id="content">
 *
 * @package Portfolio
 * @subpackage Template
 * @since 1.0.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head();?>
    <link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri() . '/assets/images/logo.svg'); ?>">
</head>

<body <?php body_class(); ?> id="top">

    <!-- Skip to content link for accessibility -->
    <a class="skip-link screen-reader-text" href="#main-content">
        <?php esc_html_e('Skip to content', 'portfolio'); ?>
    </a>

    <!-- Header with Navigation -->
 
    <?php get_template_part('templates/navigation'); ?>
    