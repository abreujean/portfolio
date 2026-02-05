<?php
/**
 * Recommendations Section Customizer Settings
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Recommendations Section Customizer settings
 */
function portfolio_recommendations_customizer($wp_customize) {
    // Recommendations Section Panel
    $wp_customize->add_panel('recommendations_panel', array(
        'title'       => __('Recommendations Section', 'portfolio'),
        'description' => __('Customize the recommendations section content and appearance', 'portfolio'),
        'priority'    => 45,
    ));

    // Content Section
    $wp_customize->add_section('recommendations_content', array(
        'title'    => __('Content', 'portfolio'),
        'panel'    => 'recommendations_panel',
        'priority' => 10,
    ));

    // Badge
    $wp_customize->add_setting('recommendations_badge', array(
        'default'           => '💬 Recomendações',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('recommendations_badge', array(
        'label'       => __('Badge', 'portfolio'),
        'description' => __('Badge text displayed at the top of the section', 'portfolio'),
        'section'     => 'recommendations_content',
        'type'        => 'text',
    ));

    // Title
    $wp_customize->add_setting('recommendations_title', array(
        'default'           => 'Em depoimento',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('recommendations_title', array(
        'label'       => __('Section Title', 'portfolio'),
        'description' => __('Title displayed below the badge', 'portfolio'),
        'section'     => 'recommendations_content',
        'type'        => 'text',
    ));

    // Recommendations Section
    $wp_customize->add_section('recommendations_items', array(
        'title'    => __('Recommendations', 'portfolio'),
        'panel'    => 'recommendations_panel',
        'priority' => 20,
    ));

    // Add settings for up to 10 recommendations
    for ($i = 1; $i <= 10; $i++) {
        // Name
        $wp_customize->add_setting("recommendations_{$i}_name", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("recommendations_{$i}_name", array(
            'label'       => sprintf(__('Recommendation %d - Name', 'portfolio'), $i),
            'section'     => 'recommendations_items',
            'type'        => 'text',
        ));

        // Role
        $wp_customize->add_setting("recommendations_{$i}_role", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("recommendations_{$i}_role", array(
            'label'       => sprintf(__('Recommendation %d - Role/Company', 'portfolio'), $i),
            'section'     => 'recommendations_items',
            'type'        => 'text',
        ));

        // Avatar
        $wp_customize->add_setting("recommendations_{$i}_avatar", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "recommendations_{$i}_avatar", array(
            'label'       => sprintf(__('Recommendation %d - Avatar', 'portfolio'), $i),
            'description' => __('Upload avatar image (recommended size: 84x84px)', 'portfolio'),
            'section'     => 'recommendations_items',
            'settings'    => "recommendations_{$i}_avatar",
        )));

        // Text
        $wp_customize->add_setting("recommendations_{$i}_text", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("recommendations_{$i}_text", array(
            'label'       => sprintf(__('Recommendation %d - Text', 'portfolio'), $i),
            'section'     => 'recommendations_items',
            'type'        => 'textarea',
        ));

        // LinkedIn URL
        $wp_customize->add_setting("recommendations_{$i}_linkedin", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("recommendations_{$i}_linkedin", array(
            'label'       => sprintf(__('Recommendation %d - LinkedIn URL', 'portfolio'), $i),
            'section'     => 'recommendations_items',
            'type'        => 'url',
        ));
    }
}
add_action('customize_register', 'portfolio_recommendations_customizer');
