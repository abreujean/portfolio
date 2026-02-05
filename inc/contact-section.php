<?php
/**
 * Contact Section Functions
 *
 * @package Portfolio
 */

/**
 * Get contact section data from Customizer
 *
 * @return array Contact section data
 */
function portfolio_get_contact_data() {
    return array(
        'badge'                  => get_theme_mod('contact_badge', '📬 Contact'),
        'title'                  => get_theme_mod('contact_title', 'Vamos conversar!'),
        'subtitle'               => get_theme_mod('contact_subtitle', 'Disponível para novos projetos'),
        'cta_text'               => get_theme_mod('contact_cta_text', 'Contact'),
        'whatsapp_number'        => get_theme_mod('contact_whatsapp_number', '+5521995112602'),
        'whatsapp_text'          => get_theme_mod('contact_whatsapp_text', '(21) 99511-2602'),
        'whatsapp_button_text'   => get_theme_mod('contact_whatsapp_button_text', 'Vamos conversar!'),
        'email_address'          => get_theme_mod('contact_email_address', 'thiagodesousarocha1311@gmail.com'),
        'email_button_text'      => get_theme_mod('contact_email_button_text', 'E-mail'),
        'linkedin_url'           => get_theme_mod('contact_linkedin_url', 'https://www.linkedin.com/in/thiago-de-sousa-rocha/'),
        'back_to_top_text'       => get_theme_mod('contact_back_to_top_text', 'Voltar ao topo ↑'),
    );
}
