<?php
/**
 * About Section Functions
 *
 * @package Portfolio
 */

/**
 * Get about section data from Customizer
 *
 * @return array About section data
 */
function portfolio_get_about_data() {
    return array(
        'avatar'           => get_theme_mod('about_avatar', ''),
        'badge'            => get_theme_mod('about_badge', '👋 Sobre mim'),
        'name'             => get_theme_mod('about_name', 'Washington Henrique Fernandes de Sousa'),
        'description'      => get_theme_mod('about_description', ''),
        'interests'        => get_theme_mod('about_interests', ''),
        'objective'        => get_theme_mod('about_objective', ''),
    );
}
