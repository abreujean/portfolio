<?php
/**
 * Recommendations Section Functions
 *
 * @package Portfolio
 */

/**
 * Get recommendations section data from Customizer
 *
 * @return array Recommendations section data
 */
function portfolio_get_recommendations_data() {
    $recommendations = array();

    // Get up to 10 recommendations
    for ($i = 1; $i <= 10; $i++) {
        $recommendations[] = array(
            'name'        => get_theme_mod("recommendations_{$i}_name", ''),
            'role'        => get_theme_mod("recommendations_{$i}_role", ''),
            'avatar'      => get_theme_mod("recommendations_{$i}_avatar", ''),
            'text'        => get_theme_mod("recommendations_{$i}_text", ''),
            'linkedin'    => get_theme_mod("recommendations_{$i}_linkedin", ''),
        );
    }

    return array(
        'badge'           => get_theme_mod('recommendations_badge', '💬 Recomendações'),
        'title'           => get_theme_mod('recommendations_title', 'Em depoimento'),
        'recommendations' => $recommendations,
    );
}
