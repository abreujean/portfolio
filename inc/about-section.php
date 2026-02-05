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
        'avatar'           => get_theme_mod('about_avatar', get_template_directory_uri() . '/assets/images/avatar-about.png'),
        'badge'            => get_theme_mod('about_badge', '🧐 Sobre mim'),
        'name'             => get_theme_mod('about_name', 'Jean Abreu'),
        'description'      => get_theme_mod('about_description', 'Sou um Full Stack Developer especializado em Laravel com experiência desde 2020 em ambientes desafiadores, tendo atuado na Prefeitura Municipal de Itaboraí e como freelancer na Vibbra. Minha paixão é transformar ideias em soluções digitais incríveis, focando na criação de experiências do usuário agradáveis e eficientes. Tenho domínio em PHP, Laravel e MySQL. Minha experiência inclui desenvolvimento de aplicações utilizando Docker, garantindo soluções robustas e escaláveis. Sou comprometido com a aplicação de Clean Code e boas práticas de arquitetura. Em projetos anteriores, implementei melhorias significativas que resultaram em aumento de 80% na eficiência do atendimento público e 70% na organização do serviço ao cliente. Trabalho com metodologias ágeis, colaborando efetivamente com equipes para atingir metas e entregar valor. Esou aberto a oportunidades em desenvolvimento de soluções Full Stack, onde posso aplicar minha expertise em Laravel e proporcionar experiências de alta qualidade para usuários.'),
        'interests'        => get_theme_mod('about_interests', 'PHP • Laravel • MySQL • RESTful APIs • Wordpress • JavaScript • HTML • CSS • Docker • React.js • Git • Lumen • GitHub • GitLab • Visual Studio Code • Google Cloud'),
        'objective'        => get_theme_mod('about_objective', 'Busco atuar como Full Stack Developer aplicando minha expertise em Laravel para criar soluções digitais escaláveis e experiências de alta qualidade para os usuários.'),
    );
}
