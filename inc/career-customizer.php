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
        'default'           => '2018 · Atualmente',
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
        'default'           => 'Infor Brasil | Engenheiro de Software I<br>Desenvolvedor Front-end',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_title', array(
        'label'       => __('Experience 1 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_1_description', array(
        'default'           => 'Empresa multinacional de tecnologia, contribuindo para um projeto internacional voltado ao mercado da Ásia e Canadá. Atuei principalmente no desenvolvimento Front-end, focando em interfaces escaláveis, acessíveis e com boas práticas de arquitetura.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_1_description', array(
        'label'       => __('Experience 1 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_1_tags', array(
        'default'           => 'React.js, TypeScript, JavaScript, Tailwind, Jest, Next.js, Git, GitHub, Figma, Jira, GitHub Actions, Confluence',
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
        'default'           => '• Nov/2021 · Atualmente',
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
        'default'           => 'Better Tech | Desenvolvedor Front-end Sênior',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_title', array(
        'label'       => __('Experience 2 - Title', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_professional_2_description', array(
        'default'           => 'Atuação no desenvolvimento de interfaces web para soluções educacionais, trabalhando lado a lado com designers e stakeholders para entrega de produtos escaláveis.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_professional_2_description', array(
        'label'       => __('Experience 2 - Description', 'portfolio'),
        'section'     => 'career_professional',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_professional_2_tags', array(
        'default'           => 'HTML, React.js, TypeScript, JavaScript, Tailwind, Next.js, Git, GitHub, Figma',
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
        'default'           => 'Dez/2021 · Nov/2022',
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

    // Academic Section
    $wp_customize->add_section('career_academic', array(
        'title'    => __('Academic Experiences', 'portfolio'),
        'panel'    => 'career_panel',
        'priority' => 30,
    ));

    // Academic Period
    $wp_customize->add_setting('career_academic_period', array(
        'default'           => '2015 · Atualmente',
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
        'default'           => 'Pós-graduação | MBA em Desenvolvimento Full-stack',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_1_title', array(
        'label'       => __('Course 1 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_1_description', array(
        'default'           => 'Pós-graduação focada em tecnologias modernas para aplicações web, arquitetura de software e boas práticas de desenvolvimento.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_1_description', array(
        'label'       => __('Course 1 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_1_period', array(
        'default'           => 'Out/2024 · Fev/2025',
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
        'default'           => 'Superior | Análise e Desenvolvimento de Sistemas',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_2_title', array(
        'label'       => __('Course 2 - Title', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));

    $wp_customize->add_setting('career_academic_2_description', array(
        'default'           => 'Graduação pela FATEC de São José dos Campos em Análise e Desenvolvimento de Sistemas.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_2_description', array(
        'label'       => __('Course 2 - Description', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'textarea',
    ));

    $wp_customize->add_setting('career_academic_2_period', array(
        'default'           => 'Ago/2018 · Ago/2021',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('career_academic_2_period', array(
        'label'       => __('Course 2 - Period', 'portfolio'),
        'section'     => 'career_academic',
        'type'        => 'text',
    ));
}
add_action('customize_register', 'portfolio_career_customizer');
