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
    <!-- Social icons -->
    <?php if ($hero_data['show_socials']) : ?>
    <div class="hero-socials">
        <?php if (!empty($hero_data['linkedin_url'])) : ?>
        <a href="<?php echo esc_url($hero_data['linkedin_url']); ?>" aria-label="LinkedIn" target="_blank" rel="noopener noreferrer">in</a>
        <?php endif; ?>
        <?php if (!empty($hero_data['github_url'])) : ?>
        <a href="<?php echo esc_url($hero_data['github_url']); ?>" aria-label="GitHub" target="_blank" rel="noopener noreferrer">gh</a>
        <?php endif; ?>
        <?php if (!empty($hero_data['dribbble_url'])) : ?>
        <a href="<?php echo esc_url($hero_data['dribbble_url']); ?>" aria-label="Dribbble" target="_blank" rel="noopener noreferrer">dr</a>
        <?php endif; ?>
        <?php if (!empty($hero_data['behance_url'])) : ?>
        <a href="<?php echo esc_url($hero_data['behance_url']); ?>" aria-label="Behance" target="_blank" rel="noopener noreferrer">be</a>
        <?php endif; ?>
    </div>
    <?php endif; ?>

    <!-- Language (visible on mobile only) -->
    <?php if ($hero_data['show_lang']) : ?>
    <div class="hero-lang">
        <?php foreach ($languages as $lang) : ?>
            <button class="lang <?php echo ($current_lang === $lang['code']) ? 'active' : ''; ?>" data-lang="<?php echo esc_attr($lang['code']); ?>">
                <?php echo esc_html($lang['label']); ?>
            </button>
            <?php if ($lang !== end($languages)) : ?>
                <span class="flag"><?php echo esc_html($lang['flag']); ?></span>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Status (visible on mobile only) -->
    <?php if ($hero_data['show_status']) : ?>
    <div class="hero-status">
        <span class="status-dot"></span>
        <span><?php echo esc_html($hero_data['status_text']); ?></span>
    </div>
    <?php endif; ?>

    <!-- Greeting -->
    <?php if ($hero_data['show_greeting']) : ?>
    <span class="hero-greeting"><?php echo esc_html($hero_data['greeting_text']); ?></span>
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
        <?php if ($hero_data['show_chat_button']) : ?>
        <button class="btn-chat"><?php echo esc_html($hero_data['chat_button_text']); ?></button>
        <?php endif; ?>
    </div>
</section>