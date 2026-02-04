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
    <!-- Mobile-only elements -->
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

    <!-- Desktop 3-column layout -->
    <div class="hero-content">
        <!-- Left column: Text content and actions -->
        <div class="hero-actions hero-container">
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

          <?php get_template_part('templates/components/hero-socials', null, ['variant' => 'desktop']); ?>
        </div>

        <!-- Center column: Hero Image -->
        <div class="hero-center hero-container">
            <?php if (!empty($hero_data['hero_image'])) : ?>
            <div class="hero-image-container">
                <img 
                    src="<?php echo esc_url($hero_data['hero_image']); ?>" 
                    alt="Hero Image" 
                    class="hero-image"
                >
            </div>
            <?php endif; ?>
        </div>

        <!-- Right column: Social icons (desktop) -->
        <div class="hero-right hero-container">
            
              <!-- Action buttons -->
            <div class="hero-actions-buttons">
                <?php if ($hero_data['show_cv_link'] && !empty($hero_data['cv_url'])) : ?>
                <a href="<?php echo esc_url($hero_data['cv_url']); ?>" class="link-cv" download>
                    <?php echo esc_html($hero_data['cv_text']); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="download-icon">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <polyline points="19 12 12 19 5 12"></polyline>
                        <line x1="12" y1="19" x2="12" y2="5"></line>
                    </svg>
                </a>
                <?php endif; ?>
                <?php if ($hero_data['show_chat_button'] && !empty($hero_data['whatsapp_url'])) : ?>
                <a href="<?php echo esc_url($hero_data['whatsapp_url']); ?>" class="btn-chat" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($hero_data['chat_button_text']); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="whatsapp-icon">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    <span><?php echo esc_html($hero_data['chat_button_text']); ?></span>
                </a>
                <?php endif; ?>
            </div>
        </div>
    </div>

</section>
