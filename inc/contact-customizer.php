<?php
/**
 * Contact Section Customizer Settings
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Contact Section Customizer settings
 */
function portfolio_contact_customizer($wp_customize) {
    // Contact Section Panel
    $wp_customize->add_panel('contact_panel', array(
        'title'       => __('Contact Section', 'portfolio'),
        'description' => __('Customize contact section content and appearance', 'portfolio'),
        'priority'    => 60,
    ));

    // Content Section
    $wp_customize->add_section('contact_content', array(
        'title'    => __('Content', 'portfolio'),
        'panel'    => 'contact_panel',
        'priority' => 10,
    ));

    // Contact Badge
    $wp_customize->add_setting('contact_badge', array(
        'default'           => '📬 Contato',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('contact_badge', array(
        'label'       => __('Badge Text', 'portfolio'),
        'description' => __('Badge text displayed above title (emoji supported)', 'portfolio'),
        'section'     => 'contact_content',
        'type'        => 'text',
    ));

    // Contact Title
    $wp_customize->add_setting('contact_title', array(
        'default'           => 'Vamos conversar!',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('contact_title', array(
        'label'       => __('Contact Title', 'portfolio'),
        'description' => __('Main title of contact section', 'portfolio'),
        'section'     => 'contact_content',
        'type'        => 'text',
    ));

    // Contact Subtitle
    $wp_customize->add_setting('contact_subtitle', array(
        'default'           => 'Disponível para novos projetos',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('contact_subtitle', array(
        'label'       => __('Contact Subtitle', 'portfolio'),
        'description' => __('Subtitle displayed below main title', 'portfolio'),
        'section'     => 'contact_content',
        'type'        => 'text',
    ));

    // Contact CTA Button Text
    $wp_customize->add_setting('contact_cta_text', array(
        'default'           => 'Contact',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('contact_cta_text', array(
        'label'       => __('CTA Button Text', 'portfolio'),
        'description' => __('Text for small CTA button in top right', 'portfolio'),
        'section'     => 'contact_content',
        'type'        => 'text',
    ));

    // Social Links Section
    $wp_customize->add_section('contact_social', array(
        'title'    => __('Social Links', 'portfolio'),
        'panel'    => 'contact_panel',
        'priority' => 20,
    ));

    // WhatsApp Number
    $wp_customize->add_setting('contact_whatsapp_number', array(
        'default'           => '+5521988905241',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('contact_whatsapp_number', array(
        'label'       => __('WhatsApp Number', 'portfolio'),
        'description' => __('Your WhatsApp number with country code (e.g., +5521999999999)', 'portfolio'),
        'section'     => 'contact_social',
        'type'        => 'text',
    ));

    // WhatsApp Display Text
    $wp_customize->add_setting('contact_whatsapp_text', array(
        'default'           => '(21) 99511-2602',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('contact_whatsapp_text', array(
        'label'       => __('WhatsApp Display Text', 'portfolio'),
        'description' => __('How WhatsApp number should be displayed', 'portfolio'),
        'section'     => 'contact_social',
        'type'        => 'text',
    ));

    // WhatsApp Button Text
    $wp_customize->add_setting('contact_whatsapp_button_text', array(
        'default'           => 'Vamos conversar!',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('contact_whatsapp_button_text', array(
        'label'       => __('WhatsApp Button Text', 'portfolio'),
        'description' => __('Text displayed on WhatsApp button', 'portfolio'),
        'section'     => 'contact_social',
        'type'        => 'text',
    ));

    // Email Address
    $wp_customize->add_setting('contact_email_address', array(
        'default'           => 'jeandcabreu@gmail.com',
        'sanitize_callback' => 'sanitize_email',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('contact_email_address', array(
        'label'       => __('Email Address', 'portfolio'),
        'description' => __('Your email address', 'portfolio'),
        'section'     => 'contact_social',
        'type'        => 'email',
    ));

    // Email Button Text
    $wp_customize->add_setting('contact_email_button_text', array(
        'default'           => 'E-mail',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('contact_email_button_text', array(
        'label'       => __('Email Button Text', 'portfolio'),
        'description' => __('Text label for email link', 'portfolio'),
        'section'     => 'contact_social',
        'type'        => 'text',
    ));

    // LinkedIn URL
    $wp_customize->add_setting('contact_linkedin_url', array(
        'default'           => 'https://www.linkedin.com/in/jean-abreu-laravel/',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('contact_linkedin_url', array(
        'label'       => __('LinkedIn URL', 'portfolio'),
        'description' => __('Your LinkedIn profile URL', 'portfolio'),
        'section'     => 'contact_social',
        'type'        => 'url',
    ));

    // Footer Section
    $wp_customize->add_section('contact_footer', array(
        'title'    => __('Footer', 'portfolio'),
        'panel'    => 'contact_panel',
        'priority' => 30,
    ));

    // Back to Top Text
    $wp_customize->add_setting('contact_back_to_top_text', array(
        'default'           => 'Voltar ao topo ↑',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('contact_back_to_top_text', array(
        'label'       => __('Back to Top Text', 'portfolio'),
        'description' => __('Text for back to top link', 'portfolio'),
        'section'     => 'contact_footer',
        'type'        => 'text',
    ));
}
add_action('customize_register', 'portfolio_contact_customizer');
