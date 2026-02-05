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
            get_theme_mod('skills_icon_1', get_template_directory_uri() . '/assets/images/php-skill.png'),
            get_theme_mod('skills_icon_2', get_template_directory_uri() . '/assets/images/laravel-skill.png'),
            get_theme_mod('skills_icon_3', get_template_directory_uri() . '/assets/images/mysql-skill.png'),
            get_theme_mod('skills_icon_4', get_template_directory_uri() . '/assets/images/docker-skill.png'),
            get_theme_mod('skills_icon_5', get_template_directory_uri() . '/assets/images/gcp-skill.png'),
            get_theme_mod('skills_icon_6', get_template_directory_uri() . '/assets/images/html5.png'),
            get_theme_mod('skills_icon_7', get_template_directory_uri() . '/assets/images/css3-skill.png'),
            get_theme_mod('skills_icon_8', get_template_directory_uri() . '/assets/images/wordpress-skill.png'),
            get_theme_mod('skills_icon_9', ''),
            get_theme_mod('skills_icon_10', ''),
        ),
    );
}
