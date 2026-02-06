<?php
/**
 * Career Section Customizer Settings
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Career Section Customizer settings
 */
function portfolio_career_customizer($wp_customize) {
    // Career Section Panel
    $wp_customize->add_panel('career_panel', array(
        'title'       => __('Career Section', 'portfolio'),
        'description' => __('Customize career section content and appearance', 'portfolio'),
        'priority'    => 50,
    ));

    // Header Section
    $wp_customize->add_section('career_header', array(
        'title'    => __('Header', 'portfolio'),
        'panel'    => 'career_panel',
        'priority' => 10,
    ));

    // Badge Text
    $wp_customize->add_setting('career_badge', array(
        'default'           => '💼 Carreira',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_badge', array(
        'label'       => __('Badge Text', 'portfolio'),
        'description' => __('Badge text displayed above title (emoji supported)', 'portfolio'),
        'section'     => 'career_header',
        'type'        => 'text',
    ));

    // Title
    $wp_customize->add_setting('career_title', array(
        'default'           => 'Trajetória até aqui',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_title', array(
        'label'       => __('Section Title', 'portfolio'),
        'description' => __('Main title of career section', 'portfolio'),
        'section'     => 'career_header',
        'type'        => 'text',
    ));

    // Professional Section
    $wp_customize->add_section('career_professional', array(
        'title'    => __('Professional Experiences', 'portfolio'),
        'panel'    => 'career_panel',
        'priority' => 20,
    ));

    // Professional Period
    $wp_customize->add_setting('career_professional_period', array(
        'default'           => '2020 · Atualmente',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_period', array(
        'label'       => __('Professional Period', 'portfolio'),
        'description' => __('Overall period for professional experiences', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    // Professional Experience 1
    $wp_customize->add_setting('career_professional_1_title', array(
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_title', array(
        'label'       => __('Experience 1 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_1_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_description', array(
        'label'       => __('Experience 1 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_1_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_tags', array(
        'label'       => __('Experience 1 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_1_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_period', array(
        'label'       => __('Experience 1 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_1_highlight', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_highlight', array(
        'label'       => __('Experience 1 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Professional Experience 2
    $wp_customize->add_setting('career_professional_2_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_title', array(
        'label'       => __('Experience 2 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_2_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_description', array(
        'label'       => __('Experience 2 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_2_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_tags', array(
        'label'       => __('Experience 2 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_2_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_period', array(
        'label'       => __('Experience 2 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_2_highlight', array(
        'default'           => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_highlight', array(
        'label'       => __('Experience 2 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Professional Experience 3
    $wp_customize->add_setting('career_professional_3_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_3_title', array(
        'label'       => __('Experience 3 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_3_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_3_description', array(
        'label'       => __('Experience 3 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_3_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_3_tags', array(
        'label'       => __('Experience 3 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_3_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_3_period', array(
        'label'       => __('Experience 3 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_3_highlight', array(
        'default'           => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_3_highlight', array(
        'label'       => __('Experience 3 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Professional Experience 4
    $wp_customize->add_setting('career_professional_4_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_4_title', array(
        'label'       => __('Experience 4 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_4_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_4_description', array(
        'label'       => __('Experience 4 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_4_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_4_tags', array(
        'label'       => __('Experience 4 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_4_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_4_period', array(
        'label'       => __('Experience 4 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_4_highlight', array(
        'default'           => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_4_highlight', array(
        'label'       => __('Experience 4 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Professional Experience 5
    $wp_customize->add_setting('career_professional_5_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_5_title', array(
        'label'       => __('Experience 5 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_5_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_5_description', array(
        'label'       => __('Experience 5 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_5_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_5_tags', array(
        'label'       => __('Experience 5 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_5_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_5_period', array(
        'label'       => __('Experience 5 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_5_highlight', array(
        'default'           => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_5_highlight', array(
        'label'       => __('Experience 5 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Professional Experience 6
    $wp_customize->add_setting('career_professional_6_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_6_title', array(
        'label'       => __('Experience 6 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_6_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_6_description', array(
        'label'       => __('Experience 6 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_6_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_6_tags', array(
        'label'       => __('Experience 6 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_6_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_6_period', array(
        'label'       => __('Experience 6 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_6_highlight', array(
        'default'           => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_6_highlight', array(
        'label'       => __('Experience 6 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Professional Experience 7
    $wp_customize->add_setting('career_professional_7_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_7_title', array(
        'label'       => __('Experience 7 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_7_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_7_description', array(
        'label'       => __('Experience 7 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_7_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_7_tags', array(
        'label'       => __('Experience 7 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_7_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_7_period', array(
        'label'       => __('Experience 7 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_7_highlight', array(
        'default'           => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_7_highlight', array(
        'label'       => __('Experience 7 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Professional Experience 8
    $wp_customize->add_setting('career_professional_8_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_8_title', array(
        'label'       => __('Experience 8 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_8_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_8_description', array(
        'label'       => __('Experience 8 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_8_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_8_tags', array(
        'label'       => __('Experience 8 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_8_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_8_period', array(
        'label'       => __('Experience 8 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_8_highlight', array(
        'default'           => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_8_highlight', array(
        'label'       => __('Experience 8 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Professional Experience 9
    $wp_customize->add_setting('career_professional_9_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_9_title', array(
        'label'       => __('Experience 9 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_9_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_9_description', array(
        'label'       => __('Experience 9 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_9_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_9_tags', array(
        'label'       => __('Experience 9 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_9_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_9_period', array(
        'label'       => __('Experience 9 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_9_highlight', array(
        'default'           => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_9_highlight', array(
        'label'       => __('Experience 9 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Professional Experience 10
    $wp_customize->add_setting('career_professional_10_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_10_title', array(
        'label'       => __('Experience 10 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_10_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_10_description', array(
        'label'       => __('Experience 10 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_10_tags', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_10_tags', array(
        'label'       => __('Experience 10 - Tags', 'portfolio'),
        'description' => __('Separate tags with commas', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_10_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_10_period', array(
        'label'       => __('Experience 10 - Period', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_10_highlight', array(
        'default'           => false,
        'sanitize_callback' => 'rest_sanitize_boolean',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_10_highlight', array(
        'label'       => __('Experience 10 - Highlight (Current)', 'portfolio'),
        'description' => __('Mark as current position with green highlight', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'checkbox',
    ));

    // Academic Section
    $wp_customize->add_section('career_academic', array(
        'title'    => __('Academic Experiences', 'portfolio'),
        'panel'    => 'career_panel',
        'priority' => 30,
    ));

    // Academic Period
    $wp_customize->add_setting('career_academic_period', array(
        'default'           => '2011 · Atualmente',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_period', array(
        'label'       => __('Academic Period', 'portfolio'),
        'description' => __('Overall period for academic experiences', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 1
    $wp_customize->add_setting('career_academic_1_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_1_title', array(
        'label'       => __('Course 1 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_1_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_1_description', array(
        'label'       => __('Course 1 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_1_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_1_period', array(
        'label'       => __('Course 1 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 2
    $wp_customize->add_setting('career_academic_2_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_2_title', array(
        'label'       => __('Course 2 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_2_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_2_description', array(
        'label'       => __('Course 2 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_2_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_2_period', array(
        'label'       => __('Course 2 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 3
    $wp_customize->add_setting('career_academic_3_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_3_title', array(
        'label'       => __('Course 3 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_3_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_3_description', array(
        'label'       => __('Course 3 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_3_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_3_period', array(
        'label'       => __('Course 3 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 4
    $wp_customize->add_setting('career_academic_4_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_4_title', array(
        'label'       => __('Course 4 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_4_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_4_description', array(
        'label'       => __('Course 4 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_4_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_4_period', array(
        'label'       => __('Course 4 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 5
    $wp_customize->add_setting('career_academic_5_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_5_title', array(
        'label'       => __('Course 5 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_5_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_5_description', array(
        'label'       => __('Course 5 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_5_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_5_period', array(
        'label'       => __('Course 5 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 6
    $wp_customize->add_setting('career_academic_6_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_6_title', array(
        'label'       => __('Course 6 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_6_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_6_description', array(
        'label'       => __('Course 6 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_6_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_6_period', array(
        'label'       => __('Course 6 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 7
    $wp_customize->add_setting('career_academic_7_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_7_title', array(
        'label'       => __('Course 7 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_7_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_7_description', array(
        'label'       => __('Course 7 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_7_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_7_period', array(
        'label'       => __('Course 7 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 8
    $wp_customize->add_setting('career_academic_8_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_8_title', array(
        'label'       => __('Course 8 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_8_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_8_description', array(
        'label'       => __('Course 8 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_8_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_8_period', array(
        'label'       => __('Course 8 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 9
    $wp_customize->add_setting('career_academic_9_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_9_title', array(
        'label'       => __('Course 9 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_9_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_9_description', array(
        'label'       => __('Course 9 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_9_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_9_period', array(
        'label'       => __('Course 9 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    // Academic Experience 10
    $wp_customize->add_setting('career_academic_10_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_10_title', array(
        'label'       => __('Course 10 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_10_description', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_10_description', array(
        'label'       => __('Course 10 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_10_period', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_10_period', array(
        'label'       => __('Course 10 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));
}
add_action('customize_register', 'portfolio_career_customizer');
