<?php
/**
 * Portfolio Section Customizer Settings
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Portfolio Section Customizer settings
 */
function portfolio_portfolio_customizer($wp_customize) {
    // Portfolio Section Panel
    $wp_customize->add_panel('portfolio_panel', array(
        'title'       => __('Portfolio Section', 'portfolio'),
        'description' => __('Customize the portfolio section content and appearance', 'portfolio'),
        'priority'    => 50,
    ));

    // Content Section
    $wp_customize->add_section('portfolio_content', array(
        'title'    => __('Content', 'portfolio'),
        'panel'    => 'portfolio_panel',
        'priority' => 10,
    ));

    // Title
    $wp_customize->add_setting('portfolio_title', array(
        'default'           => 'Projetos',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('portfolio_title', array(
        'label'       => __('Section Title', 'portfolio'),
        'description' => __('Title displayed at the top of the section', 'portfolio'),
        'section'     => 'portfolio_content',
        'type'        => 'text',
    ));

    // Filter Labels
    $wp_customize->add_setting('portfolio_filter_apps', array(
        'default'           => 'Apps',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('portfolio_filter_apps', array(
        'label'       => __('Apps Filter Label', 'portfolio'),
        'section'     => 'portfolio_content',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('portfolio_filter_sites', array(
        'default'           => 'Sites',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('portfolio_filter_sites', array(
        'label'       => __('Sites Filter Label', 'portfolio'),
        'section'     => 'portfolio_content',
        'type'        => 'text',
    ));

    // Project Count
    $wp_customize->add_setting('portfolio_project_count', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('portfolio_project_count', array(
        'label'       => __('Number of Projects', 'portfolio'),
        'description' => __('How many projects to display (1-10)', 'portfolio'),
        'section'     => 'portfolio_content',
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 10,
        ),
    ));

    // Projects Section
    $wp_customize->add_section('portfolio_projects', array(
        'title'    => __('Projects', 'portfolio'),
        'panel'    => 'portfolio_panel',
        'priority' => 20,
    ));

    // Add settings for up to 10 projects
    for ($i = 1; $i <= 10; $i++) {
        // Project Title
        $wp_customize->add_setting("portfolio_project_{$i}_title", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("portfolio_project_{$i}_title", array(
            'label'       => sprintf(__('Project %d - Title', 'portfolio'), $i),
            'section'     => 'portfolio_projects',
            'type'        => 'text',
        ));

        // Project Description
        $wp_customize->add_setting("portfolio_project_{$i}_description", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("portfolio_project_{$i}_description", array(
            'label'       => sprintf(__('Project %d - Description', 'portfolio'), $i),
            'section'     => 'portfolio_projects',
            'type'        => 'textarea',
        ));

        // Project Image
        $wp_customize->add_setting("portfolio_project_{$i}_image", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "portfolio_project_{$i}_image", array(
            'label'       => sprintf(__('Project %d - Image', 'portfolio'), $i),
            'description' => __('Upload project image (recommended size: 340x180px)', 'portfolio'),
            'section'     => 'portfolio_projects',
            'settings'    => "portfolio_project_{$i}_image",
        )));

        // Project Stack
        $wp_customize->add_setting("portfolio_project_{$i}_stack", array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("portfolio_project_{$i}_stack", array(
            'label'       => sprintf(__('Project %d - Tech Stack', 'portfolio'), $i),
            'description' => __('Technologies used (e.g., Dart • Flutter • Provider)', 'portfolio'),
            'section'     => 'portfolio_projects',
            'type'        => 'text',
        ));

        // Project Preview URL
        $wp_customize->add_setting("portfolio_project_{$i}_preview_url", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("portfolio_project_{$i}_preview_url", array(
            'label'       => sprintf(__('Project %d - Preview URL', 'portfolio'), $i),
            'section'     => 'portfolio_projects',
            'type'        => 'url',
        ));

        // Project Video URL
        $wp_customize->add_setting("portfolio_project_{$i}_video_url", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("portfolio_project_{$i}_video_url", array(
            'label'       => sprintf(__('Project %d - Video URL', 'portfolio'), $i),
            'section'     => 'portfolio_projects',
            'type'        => 'url',
        ));

        // Project GitHub URL
        $wp_customize->add_setting("portfolio_project_{$i}_github_url", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("portfolio_project_{$i}_github_url", array(
            'label'       => sprintf(__('Project %d - GitHub URL', 'portfolio'), $i),
            'section'     => 'portfolio_projects',
            'type'        => 'url',
        ));

        // Project Category
        $wp_customize->add_setting("portfolio_project_{$i}_category", array(
            'default'           => 'apps',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("portfolio_project_{$i}_category", array(
            'label'       => sprintf(__('Project %d - Category', 'portfolio'), $i),
            'description' => __('Choose if this project is an App or Site', 'portfolio'),
            'section'     => 'portfolio_projects',
            'type'        => 'select',
            'choices'     => array(
                'apps'  => __('App', 'portfolio'),
                'sites' => __('Site', 'portfolio'),
            ),
        ));

        // Project Order
        $wp_customize->add_setting("portfolio_project_{$i}_order", array(
            'default'           => $i,
            'sanitize_callback' => 'absint',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control("portfolio_project_{$i}_order", array(
            'label'       => sprintf(__('Project %d - Display Order', 'portfolio'), $i),
            'description' => __('Lower numbers appear first (1 = first, 2 = second, etc.)', 'portfolio'),
            'section'     => 'portfolio_projects',
            'type'        => 'number',
            'input_attrs' => array(
                'min' => 1,
                'max' => 10,
            ),
        ));
    }
}
add_action('customize_register', 'portfolio_portfolio_customizer');
