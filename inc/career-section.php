<?php
/**
 * Career Section Functions
 *
 * @package Portfolio
 */

/**
 * Get career section data from Customizer
 *
 * @return array Career section data
 */
function portfolio_get_career_data() {
    // Get professional experiences
    $professional_experiences = array();

    // Debug: Check if data is saved
    $debug_data = array(
        'pro_1_title' => get_theme_mod('career_professional_1_title', ''),
        'pro_1_desc' => get_theme_mod('career_professional_1_description', ''),
        'pro_1_tags' => get_theme_mod('career_professional_1_tags', ''),
        'pro_1_period' => get_theme_mod('career_professional_1_period', ''),
        'pro_1_highlight' => get_theme_mod('career_professional_1_highlight', false),
        'pro_2_title' => get_theme_mod('career_professional_2_title', ''),
        'pro_2_desc' => get_theme_mod('career_professional_2_description', ''),
        'pro_2_tags' => get_theme_mod('career_professional_2_tags', ''),
        'pro_2_period' => get_theme_mod('career_professional_2_period', ''),
        'pro_2_highlight' => get_theme_mod('career_professional_2_highlight', false),
        'acad_1_title' => get_theme_mod('career_academic_1_title', ''),
        'acad_1_desc' => get_theme_mod('career_academic_1_description', ''),
        'acad_1_period' => get_theme_mod('career_academic_1_period', ''),
        'acad_2_title' => get_theme_mod('career_academic_2_title', ''),
        'acad_2_desc' => get_theme_mod('career_academic_2_description', ''),
        'acad_2_period' => get_theme_mod('career_academic_2_period', ''),
    );

    if (defined('WP_DEBUG') && WP_DEBUG) {
        error_log('Career Debug: Raw data from DB: ' . print_r($debug_data, true));
    }

    // Professional Experience 1
    if (!empty(get_theme_mod('career_professional_1_title', ''))) {
        $professional_experiences[] = array(
            'title' => get_theme_mod('career_professional_1_title', ''),
            'description' => get_theme_mod('career_professional_1_description', ''),
            'tags' => get_theme_mod('career_professional_1_tags', ''),
            'period' => get_theme_mod('career_professional_1_period', ''),
            'highlight' => get_theme_mod('career_professional_1_highlight', false),
        );
    }

    // Professional Experience 2
    if (!empty(get_theme_mod('career_professional_2_title', ''))) {
        $professional_experiences[] = array(
            'title' => get_theme_mod('career_professional_2_title', ''),
            'description' => get_theme_mod('career_professional_2_description', ''),
            'tags' => get_theme_mod('career_professional_2_tags', ''),
            'period' => get_theme_mod('career_professional_2_period', ''),
            'highlight' => get_theme_mod('career_professional_2_highlight', false),
        );
    }

    // Get academic experiences
    $academic_experiences = array();

    // Academic Experience 1
    if (!empty(get_theme_mod('career_academic_1_title', ''))) {
        $academic_experiences[] = array(
            'title' => get_theme_mod('career_academic_1_title', ''),
            'description' => get_theme_mod('career_academic_1_description', ''),
            'period' => get_theme_mod('career_academic_1_period', ''),
        );
    }

    // Academic Experience 2
    if (!empty(get_theme_mod('career_academic_2_title', ''))) {
        $academic_experiences[] = array(
            'title' => get_theme_mod('career_academic_2_title', ''),
            'description' => get_theme_mod('career_academic_2_description', ''),
            'period' => get_theme_mod('career_academic_2_period', ''),
        );
    }

    $data = array(
        'badge' => get_theme_mod('career_badge', '💼 Carreira'),
        'title' => get_theme_mod('career_title', 'Trajetória até aqui'),
        'professional_period' => get_theme_mod('career_professional_period', '2018 · Atualmente'),
        'academic_period' => get_theme_mod('career_academic_period', '2015 · Atualmente'),
        'professional_experiences' => $professional_experiences,
        'academic_experiences' => $academic_experiences,
    );

    return $data;
}
