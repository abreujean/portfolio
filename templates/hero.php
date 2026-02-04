<?php
/**
 * Hero section template part
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get customizer values
$hero_data = portfolio_get_hero_data();
$languages = portfolio_get_languages();
$current_lang = portfolio_get_current_lang();
?>

<section class="hero-section">
    <!-- Social icons (mobile) -->
    <?php get_template_part('templates/components/hero-socials', null, ['variant' => 'mobile']); ?>

    <!-- Language (visible on mobile only) -->
    <?php if ($hero_data['show_lang']) : ?>
    <?php get_template_part('templates/components/nav-lang', null, ['variant' => 'hero']); ?>
    <?php endif; ?>

    <!-- Status (visible on mobile only) -->
    <?php if ($hero_data['show_status']) : ?>
    <div class="hero-status">
        <span class="status-dot"></span>
        <span><?php echo esc_html($hero_data['status_text']); ?></span>
    </div>
    <?php endif; ?>

    <!-- Hero Image -->
    <?php if (!empty($hero_data['hero_image'])) : ?>
    <div class="hero-image-container">
        <img 
            src="<?php echo esc_url($hero_data['hero_image']); ?>" 
            alt="Hero Image" 
            class="hero-image"
        >
    </div>
    <?php endif; ?>

    <!-- Greeting -->
    <?php if ($hero_data['show_greeting']) : ?>
    <div class="hero-greeting">
        <span class="greeting"><?php echo esc_html($hero_data['greeting_text']); ?></span>
    </div>
    <?php endif; ?>

    <!-- Name -->
    <h1 class="hero-title">
        <span><?php echo esc_html($hero_data['first_name']); ?></span>
        <span><?php echo esc_html($hero_data['last_name']); ?></span>
    </h1>

    <!-- Role -->
    <p class="hero-role">
        <?php echo esc_html($hero_data['role_text']); ?>
    </p>

    <!-- Actions -->
    <div class="hero-actions">
        <?php if ($hero_data['show_cv_link'] && !empty($hero_data['cv_url'])) : ?>
        <a href="<?php echo esc_url($hero_data['cv_url']); ?>" class="link-cv" download>
            <?php echo esc_html($hero_data['cv_text']); ?>
        </a>
        <?php endif; ?>
        <?php if ($hero_data['show_chat_button'] && !empty($hero_data['whatsapp_url'])) : ?>
        <a href="<?php echo esc_url($hero_data['whatsapp_url']); ?>" class="btn-chat" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($hero_data['chat_button_text']); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/whatsapp.svg');?>" alt="WhatsApp">
            <span><?php echo esc_html($hero_data['chat_button_text']); ?></span>
        </a>
        <?php endif; ?>
    </div>

    <!-- Social icons (desktop) -->
    <?php get_template_part('templates/components/hero-socials', null, ['variant' => 'desktop']); ?>

</section>
