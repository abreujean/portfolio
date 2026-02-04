<?php
/**
 * Hero Social Icons Component
 *
 * Displays social media icons for the hero section with variant support
 * for responsive positioning (mobile/desktop)
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get hero data
$hero_data = portfolio_get_hero_data();

// Check if socials should be shown
if (!$hero_data['show_socials']) {
    return;
}

// Get variant from args (default: mobile)
$variant = isset($args['variant']) ? $args['variant'] : 'mobile';
?>

<!-- Social icons -->
<div class="hero-socials hero-socials--<?php echo esc_attr($variant); ?>">
    <?php if (!empty($hero_data['linkedin_url'])) : ?>
    <a href="<?php echo esc_url($hero_data['linkedin_url']); ?>" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/linkedin.svg');?>" alt="LinkedIn">
    </a>
    <?php endif; ?>
    <?php if (!empty($hero_data['github_url'])) : ?>
    <a href="<?php echo esc_url($hero_data['github_url']); ?>" aria-label="GitHub" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/github.svg');?>" alt="GitHub">
    </a>
    <?php endif; ?>
    <?php if (!empty($hero_data['dribbble_url'])) : ?>
    <a href="<?php echo esc_url($hero_data['dribbble_url']); ?>" aria-label="Dribbble" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/dribbble.svg');?>" alt="Dribbble">
    </a>
    <?php endif; ?>
    <?php if (!empty($hero_data['behance_url'])) : ?>
    <a href="<?php echo esc_url($hero_data['behance_url']); ?>" aria-label="Behance" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/behance.svg');?>" alt="Behance">
    </a>
    <?php endif; ?>
</div>