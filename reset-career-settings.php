<?php
/**
 * Reset Career Customizer Settings
 *
 * Uso:
 * 1. Salve este arquivo como: /home/abreujean/projetos/portfolio/wordpress/wp-content/themes/portfolio/reset-career-settings.php
 * 2. Acesse: https://seusite.com/wp-content/themes/portfolio/reset-career-settings.php
 * 3. Após usar, DELETE este arquivo por segurança!
 *
 * @package Portfolio
 */

// Carregar WordPress
require_once('../../../wp-load.php');

if (!current_user_can('manage_options')) {
    wp_die('Acesso negado. Você precisa de permissão de administrador.');
}

// Remover todos os settings da seção career
$career_settings = array(
    'career_badge',
    'career_title',
    'career_professional_period',
    'career_academic_period',
    'career_professional_1_title',
    'career_professional_1_description',
    'career_professional_1_tags',
    'career_professional_1_period',
    'career_professional_1_highlight',
    'career_professional_2_title',
    'career_professional_2_description',
    'career_professional_2_tags',
    'career_professional_2_period',
    'career_professional_2_highlight',
    'career_academic_1_title',
    'career_academic_1_description',
    'career_academic_1_period',
    'career_academic_2_title',
    'career_academic_2_description',
    'career_academic_2_period',
);

// Get current theme mods
$theme_mods = get_theme_mods();

// Remove career settings
foreach ($career_settings as $setting) {
    if (isset($theme_mods[$setting])) {
        unset($theme_mods[$setting]);
    }
}

// Update theme mods
set_theme_mods($theme_mods);

// Success message
echo '<!DOCTYPE html>
<html>
<head>
    <title>Reset Career Settings</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 40px; max-width: 600px; margin: 0 auto; }
        .success { background: #d4edda; border: 1px solid #c3e6cb; color: #155724; padding: 20px; border-radius: 5px; margin-bottom: 20px; }
        .warning { background: #fff3cd; border: 1px solid #ffc107; color: #856404; padding: 20px; border-radius: 5px; }
        h1 { color: #28a745; }
        a { color: #007bff; text-decoration: none; }
        a:hover { text-decoration: underline; }
        pre { background: #f8f9fa; padding: 15px; border-radius: 5px; overflow-x: auto; }
    </style>
</head>
<body>
    <div class="success">
        <h1>✅ Reset concluído com sucesso!</h1>
        <p>Todos os settings da seção Career foram removidos.</p>
    </div>

    <div class="warning">
        <h2>⚠️ ATENÇÃO: Delete este arquivo agora!</h2>
        <p>Por segurança, delete o arquivo: <strong>reset-career-settings.php</strong></p>
    </div>

    <h3>Próximos passos:</h3>
    <ol>
        <li>Acesse <a href="' . admin_url('customize.php?autofocus[panel]=career_panel') . '">Aparência > Personalizar > Career Section</a></li>
        <li>Preencha todos os campos desejados</li>
        <li>Clique em "Publicar"</li>
    </ol>

    <h3>Status atual dos settings:</h3>
    <pre>';
print_r(get_theme_mod('career_professional_1_title', 'Nenhum valor salvo'));
echo '    </pre>

    <p><a href="' . home_url() . '">← Voltar para o site</a></p>
</body>
</html>';
