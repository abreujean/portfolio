<?php
/**
 * Hero section template part
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<section id="hero" class="hero-section" role="banner">
    <div class="hero-container">
        <!-- Avatar/Image -->
        <div class="hero-avatar">
            <div class="avatar-wrapper">
                <!-- Avatar will be loaded here - can be customizer option or featured image -->
                <img src="" alt="<?php esc_attr_e('Profile Photo', 'portfolio'); ?>" class="profile-image" loading="lazy">
            </div>
        </div>

        <!-- Hero Content -->
        <div class="hero-content">
            <h1 class="hero-title">
                <!-- Main heading - can be customizer option -->
                <span class="title-greeting"><?php esc_html_e('Hello, I\'m', 'portfolio'); ?></span>
                <span class="title-name"><?php esc_html_e('Your Name', 'portfolio'); ?></span>
            </h1>
            
            <p class="hero-subtitle">
                <!-- Professional title/tagline - can be customizer option -->
                <?php esc_html_e('Web Developer & Creative Designer', 'portfolio'); ?>
            </p>
            
            <p class="hero-description">
                <!-- Brief description - can be customizer option -->
                <?php esc_html_e('Creating amazing digital experiences with modern web technologies. Passionate about clean code, user experience, and innovative solutions.', 'portfolio'); ?>
            </p>

            <!-- Call to Action Buttons -->
            <div class="hero-actions">
                <a href="#contact" class="btn btn-primary">
                    <?php esc_html_e('Get In Touch', 'portfolio'); ?>
                </a>
                <a href="#portfolio" class="btn btn-secondary">
                    <?php esc_html_e('View My Work', 'portfolio'); ?>
                </a>
            </div>

            <!-- Social Icons -->
            <div class="hero-social">
                <?php get_template_part('templates/social-links', 'hero'); ?>
            </div>
        </div>

        <!-- Background Elements -->
        <div class="hero-background">
            <div class="bg-shapes">
                <div class="shape shape-1"></div>
                <div class="shape shape-2"></div>
                <div class="shape shape-3"></div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <span class="scroll-text"><?php esc_html_e('Scroll Down', 'portfolio'); ?></span>
            <div class="scroll-arrow"></div>
        </div>
    </div>
</section>