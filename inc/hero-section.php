<?php
/**
 * Hero Section Functions
 *
 * @package PortfolioTheme
 */

/**
 * Get hero section data from Customizer
 *
 * @return array Hero section data
 */
function portfolio_get_hero_data() {
    return array(
        'first_name'        => get_theme_mod('hero_first_name', 'Jean'),
        'last_name'         => get_theme_mod('hero_last_name', 'Abreu'),
        'role_text'         => get_theme_mod('hero_role_text', 'FullStack developer'),
        'greeting_text'     => get_theme_mod('hero_greeting_text', '👋 Saudações!'),
        'status_text'       => get_theme_mod('hero_status_text', 'Status'),
        'hero_image'        => get_theme_mod('hero_image', ''),
        'linkedin_url'      => get_theme_mod('hero_linkedin_url', ''),
        'github_url'        => get_theme_mod('hero_github_url', ''),
        'dribbble_url'      => get_theme_mod('hero_dribbble_url', ''),
        'behance_url'       => get_theme_mod('hero_behance_url', ''),
        'cv_url'            => get_theme_mod('hero_cv_url', ''),
        'cv_text'           => get_theme_mod('hero_cv_text', 'Baixar CV ↓'),
        'whatsapp_url'      => get_theme_mod('hero_whatsapp_url', ''),
        'chat_button_text'  => get_theme_mod('hero_chat_button_text', 'Vamos conversar!'),
        'show_socials'      => (bool) get_theme_mod('hero_show_socials', true),
        'show_lang'         => (bool) get_theme_mod('hero_show_lang', true),
        'show_status'       => (bool) get_theme_mod('hero_show_status', true),
        'show_greeting'     => (bool) get_theme_mod('hero_show_greeting', true),
        'show_cv_link'      => (bool) get_theme_mod('hero_show_cv_link', true),
        'show_chat_button'  => (bool) get_theme_mod('hero_show_chat_button', true),
    );
}

/**
 * Enqueue hero section scripts
 */
function portfolio_enqueue_hero_scripts() {
    wp_enqueue_script(
        'portfolio-hero',
        get_template_directory_uri() . '/js/hero.js',
        array(),
        '1.0.0',
        true
    );

    wp_localize_script(
        'portfolio-hero',
        'portfolioHero',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce'   => wp_create_nonce('portfolio_lang_nonce'),
        )
    );
}
add_action('wp_enqueue_scripts', 'portfolio_enqueue_hero_scripts');

/**
 * Get available languages
 */
function portfolio_get_languages() {
    return apply_filters('portfolio_languages', array(
        'pt' => array(
            'code' => 'pt',
            'label' => 'PT',
            'flag' => '🇧🇷',
            'name' => __('Português', 'portfolio'),
        ),
        'en' => array(
            'code' => 'en',
            'label' => 'EN',
            'flag' => '🇺🇸',
            'name' => __('English', 'portfolio'),
        ),
    ));
}

/**
 * Get current language
 */
function portfolio_get_current_lang() {
    $current = get_locale();
    if (strpos($current, 'pt_') === 0) {
        return 'pt';
    }
    return 'en';
}

/**
 * Switch language via AJAX
 */
function portfolio_switch_language() {
    check_ajax_referer('portfolio_lang_nonce', 'nonce');

    $lang = sanitize_text_field($_POST['lang'] ?? 'en');
    switch_to_locale($lang);
    wp_send_json_success(array('lang' => $lang));
}
add_action('wp_ajax_portfolio_switch_language', 'portfolio_switch_language');
add_action('wp_ajax_nopriv_portfolio_switch_language', 'portfolio_switch_language');
