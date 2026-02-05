<?php
/**
 * Footer Section Functions
 *
 * @package Portfolio
 */

/**
 * Get footer section data from Customizer
 *
 * @return array Footer section data
 */
function portfolio_get_footer_data() {
    return array(
        'copyright_text'  => get_theme_mod('footer_copyright_text', 'Henrique Sousa'),
        'linkedin_url'    => get_theme_mod('footer_linkedin_url', 'https://www.linkedin.com/in/thiago-de-sousa-rocha/'),
        'github_url'      => get_theme_mod('footer_github_url', 'https://github.com/thiago-sousa'),
    );
}
