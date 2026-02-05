<?php
/**
 * Skills Section Functions
 *
 * @package Portfolio
 */

/**
 * Get skills section data from Customizer
 *
 * @return array Skills section data
 */
function portfolio_get_skills_data() {
    return array(
        'badge'     => get_theme_mod('skills_badge', '🧑‍💻 Skills'),
        'title'     => get_theme_mod('skills_title', 'Tecnologias e habilidades'),
        'subtitle'  => get_theme_mod('skills_subtitle', 'Techs que uso no dia a dia'),
        'icons'     => array(
            get_theme_mod('skills_icon_1', ''),
            get_theme_mod('skills_icon_2', ''),
            get_theme_mod('skills_icon_3', ''),
            get_theme_mod('skills_icon_4', ''),
            get_theme_mod('skills_icon_5', ''),
            get_theme_mod('skills_icon_6', ''),
            get_theme_mod('skills_icon_7', ''),
            get_theme_mod('skills_icon_8', ''),
            get_theme_mod('skills_icon_9', ''),
            get_theme_mod('skills_icon_10', ''),
        ),
    );
}
