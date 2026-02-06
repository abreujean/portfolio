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
    // Get professional experiences (1-10)
    $professional_experiences = array();

    for ($i = 1; $i <= 10; $i++) {
        $title = get_theme_mod('career_professional_' . $i . '_title', '');

        if (!empty($title)) {
            $professional_experiences[] = array(
                'title' => $title,
                'description' => get_theme_mod('career_professional_' . $i . '_description', ''),
                'tags' => get_theme_mod('career_professional_' . $i . '_tags', ''),
                'period' => get_theme_mod('career_professional_' . $i . '_period', ''),
                'highlight' => get_theme_mod('career_professional_' . $i . '_highlight', false),
            );
        }
    }

    // Get academic experiences (1-10)
    $academic_experiences = array();

    for ($i = 1; $i <= 10; $i++) {
        $title = get_theme_mod('career_academic_' . $i . '_title', '');

        if (!empty($title)) {
            $academic_experiences[] = array(
                'title' => $title,
                'description' => get_theme_mod('career_academic_' . $i . '_description', ''),
                'period' => get_theme_mod('career_academic_' . $i . '_period', ''),
            );
        }
    }

    $data = array(
        'badge' => get_theme_mod('career_badge', '💼 Carreira'),
        'title' => get_theme_mod('career_title', 'Trajetória até aqui'),
        'professional_period' => get_theme_mod('career_professional_period', '2013 · Atualmente'),
        'academic_period' => get_theme_mod('career_academic_period', '2016 · Atualmente'),
        'professional_experiences' => $professional_experiences,
        'academic_experiences' => $academic_experiences,
    );

    return $data;
}
