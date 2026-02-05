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
            get_theme_mod('skills_icon_1', get_template_directory_uri() . '/assets/images/skills/php-skill.png'),
            get_theme_mod('skills_icon_2', get_temlate_directory_uri() . '/assets/images/skills/laravel-skill.png'),
            get_theme_mod('skills_icon_3', get_template_directory_uri() . '/assets/images/skills/mysql-skill.png'),
            get_theme_mod('skills_icon_4', get_template_directory_uri() . '/assets/images/skills/docker-skill.png'),
            get_theme_mod('skills_icon_5', get_template_directory_uri() . '/assets/images/skills/gcp-skill.png'),
            get_theme_mod('skills_icon_6', get_template_directory_uri() . '/assets/images/skills/html5.png'),
            get_theme_mod('skills_icon_7', get_template_directory_uri() . '/assets/images/skills/css3-skill.png'),
            get_theme_mod('skills_icon_8', get_template_directory_uri() . '/assets/images/skills/wordpress-skill.png'),
            get_theme_mod('skills_icon_9', ''),
            get_theme_mod('skills_icon_10', ''),
        ),
    );
}
