<?php
/**
 * Contact section template part
 *
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}

$contact_data = portfolio_get_contact_data();
?>

<section id="contact" class="contact-section">
    <div class="container">
        <div class="contact-container">
            <!-- Top row: small label + CTA -->
            <div class="contact-top">
                <?php if (!empty($contact_data['badge'])) : ?>
                    <span class="contact-label">
                        <?php echo esc_html($contact_data['badge']); ?>
                    </span>
                <?php endif; ?>

            </div>

            <!-- Title and subtitle -->
            <?php if (!empty($contact_data['title'])) : ?>
                <h2 class="contact-title">
                    <?php echo esc_html($contact_data['title']); ?>
                </h2>
            <?php endif; ?>

            <?php if (!empty($contact_data['subtitle'])) : ?>
                <p class="contact-subtitle">
                    <?php echo esc_html($contact_data['subtitle']); ?>
                </p>
            <?php endif; ?>

            <!-- Contact Actions -->
            <div class="contact-actions">
                <!-- WhatsApp -->
                <?php if (!empty($contact_data['whatsapp_number'])) : ?>
                    <a class="btn whatsapp"
                       href="<?php echo esc_url('https://wa.me/' . preg_replace('/[^0-9]/', '', $contact_data['whatsapp_number'])); ?>"
                       target="_blank"
                       rel="noopener noreferrer">
                        <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path fill="currentColor" d="M20.52 3.48A11.94 11.94 0 0012 0C5.37 0 .01 5.36.01 12a11.9 11.9 0 001.86 6.28L0 24l5.9-1.54A11.94 11.94 0 0012 24c6.63 0 12-5.36 12-12 0-3.2-1.25-6.2-3.48-8.52zM12 21.6c-1.6 0-3.16-.42-4.52-1.22l-.32-.19-3.5.91.94-3.41-.21-.35A9.6 9.6 0 012.4 12c0-5.3 4.3-9.6 9.6-9.6 2.56 0 4.96.99 6.77 2.8A9.56 9.56 0 0121.6 12c0 5.3-4.3 9.6-9.6 9.6z"/>
                            <path fill="currentColor" d="M17.1 14.1c-.3-.15-1.8-.9-2.1-1-.3-.1-.5-.15-.7.15-.2.3-.8 1-.98 1.2-.18.2-.36.22-.66.07-.3-.15-1.26-.46-2.4-1.48-.9-.8-1.5-1.8-1.68-2.1-.18-.3 0-.46.13-.61.13-.13.3-.36.45-.54.15-.18.2-.3.3-.5.1-.2 0-.38-.05-.53-.05-.15-.66-1.6-.9-2.2-.24-.6-.48-.5-.66-.5-.18 0-.38 0-.58 0-.2 0-.53.07-.8.38-.27.3-1.03 1-1.03 2.45 0 1.45 1.05 2.85 1.2 3.05.15.2 2.08 3.2 5.05 4.5 2.97 1.3 2.97.87 3.5.82.53-.05 1.72-.7 1.97-1.37.25-.67.25-1.25.18-1.37-.07-.12-.27-.2-.57-.35z"/>
                        </svg>
                        <span><?php echo esc_html($contact_data['whatsapp_button_text']); ?></span>
                    </a>
                <?php endif; ?>

                <!-- Email -->
                <?php if (!empty($contact_data['email_address'])) : ?>
                    <a class="contact-email" href="mailto:<?php echo esc_html($contact_data['email_address']); ?>">
                        <svg class="icon" viewBox="0 0 24 24" aria-hidden="true" focusable="false">
                            <path fill="currentColor" d="M2 3.5L22 12 2 20.5 2 13l12-1L2 11z"/>
                        </svg>
                        <span>
                            <?php echo esc_html($contact_data['email_button_text']); ?>:
                            <strong><?php echo esc_html($contact_data['email_address']); ?></strong>
                        </span>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Back to Top -->
            <?php if (!empty($contact_data['back_to_top_text'])) : ?>
                <a class="back-to-top" href="#top">
                    <?php echo esc_html($contact_data['back_to_top_text']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
