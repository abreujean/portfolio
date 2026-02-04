<?php
/**
 * Skills Section Customizer Settings
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Skills Section Customizer settings
 */
function portfolio_skills_customizer($wp_customize) {
    // Skills Section Panel
    $wp_customize->add_panel('skills_panel', array(
        'title'       => __('Skills Section', 'portfolio'),
        'description' => __('Customize the skills section content and appearance', 'portfolio'),
        'priority'    => 40,
    ));

    // Content Section
    $wp_customize->add_section('skills_content', array(
        'title'    => __('Content', 'portfolio'),
        'panel'    => 'skills_panel',
        'priority' => 10,
    ));

    // Badge
    $wp_customize->add_setting('skills_badge', array(
        'default'           => '🧑‍💻 Skills',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('skills_badge', array(
        'label'       => __('Badge', 'portfolio'),
        'description' => __('Badge text displayed at the top of the section', 'portfolio'),
        'section'     => 'skills_content',
        'type'        => 'text',
    ));

    // Title
    $wp_customize->add_setting('skills_title', array(
        'default'           => 'Tecnologias e habilidades',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('skills_title', array(
        'label'       => __('Section Title', 'portfolio'),
        'description' => __('Title displayed below the badge', 'portfolio'),
        'section'     => 'skills_content',
        'type'        => 'text',
    ));

    // Subtitle
    $wp_customize->add_setting('skills_subtitle', array(
        'default'           => 'Techs que uso no dia a dia',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('skills_subtitle', array(
        'label'       => __('Section Subtitle', 'portfolio'),
        'description' => __('Subtitle displayed below the title', 'portfolio'),
        'section'     => 'skills_content',
        'type'        => 'text',
    ));

    // Icons Section
    $wp_customize->add_section('skills_icons', array(
        'title'    => __('Icons', 'portfolio'),
        'panel'    => 'skills_panel',
        'priority' => 20,
    ));

    // Add settings for up to 10 icons
    for ($i = 1; $i <= 10; $i++) {
        $wp_customize->add_setting("skills_icon_{$i}", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("skills_icon_{$i}", array(
            'label'       => sprintf(__('Icon %d', 'portfolio'), $i),
            'description' => sprintf(__('Enter icon text or emoji for skill %d', 'portfolio'), $i),
            'section'     => 'skills_icons',
            'type'        => 'text',
        ));
    }
}
add_action('customize_register', 'portfolio_skills_customizer');
