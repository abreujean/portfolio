<?php
/**
 * Navigation Language Switcher Component
 * Shared language switcher used in desktop navigation
 * 
 * @package Portfolio
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="nav-lang <?php echo isset($args['variant']) ? 'nav-lang-' . esc_attr($args['variant']) : ''; ?>" role="group" aria-label="<?php esc_attr_e('Language Selection', 'portfolio'); ?>">
    <button class="lang" aria-pressed="false" data-lang="pt" aria-label="<?php esc_attr_e('Português', 'portfolio'); ?>">
        PT <img src="https://flagcdn.com/w20/br.png" alt="PT" loading="lazy" />
    </button>
    <button class="lang" aria-pressed="false" data-lang="en" aria-label="<?php esc_attr_e('English', 'portfolio'); ?>">
        EN <img src="https://flagcdn.com/w20/us.png" alt="EN" loading="lazy" />
    </button>
</div>
