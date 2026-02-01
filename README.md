# 🎨 Portfolio Theme - WordPress

Um tema WordPress moderno e responsivo para portfólio pessoal, construído com **mobile-first design**, acessibilidade completa e performance otimizada.

## 📋 Características

### 🎯 Design & UX
- ✅ **Mobile-First**: Desenvolvido começando pelo mobile
- ✅ **Responsivo**: Breakpoints para tablet e desktop
- ✅ **Dark Mode**: Tema moderno escuro com cores vibrantes
- ✅ **Acessível**: WCAG 2.1 compliant com ARIA labels

### 🛠️ Funcionalidades
- ✅ Menu responsivo com hamburger mobile
- ✅ Seções: Hero, About, Portfolio, Skills, Career, Recommendations, Contact
- ✅ Filtros de Portfolio e Skills
- ✅ Timeline de carreira interativo
- ✅ Formulário de contato com validação
- ✅ Smooth scroll navigation
- ✅ Lazy loading de imagens
- ✅ Back to top button

### 🔒 Segurança & Qualidade
- ✅ WordPress coding standards
- ✅ Nonce verification para forms
- ✅ XSS prevention com esc_* functions
- ✅ CSRF protection
- ✅ HTML5 semântico

### ⚡ Performance
- ✅ CSS custom properties (variables)
- ✅ Modular JavaScript
- ✅ Intersection Observer para animações
- ✅ Lazy loading nativo
- ✅ Otimizado para Core Web Vitals

## 📁 Estrutura de Arquivos

```
portfolio/
├── style.css                  # Arquivo principal do tema
├── functions.php              # Configurações do tema
├── index.php                 # Template principal
├── header.php                # Cabeçalho
├── footer.php                # Rodapé
│
├── inc/                      # Configurações
│   ├── theme-setup.php      # Setup do WordPress
│   └── enqueue.php          # Assets
│
├── templates/                # Templates das seções
│   ├── navigation.php       # Menu
│   ├── social-links.php    # Links sociais
│   ├── hero.php            # Hero section
│   ├── about.php           # Sobre
│   ├── portfolio.php       # Portfólio
│   ├── skills.php          # Habilidades
│   ├── career.php          # Carreira
│   ├── recommendations.php # Recomendações
│   └── contact.php         # Contato
│
└── assets/                  # Assets
    ├── css/
    │   ├── reset.css       # Reset CSS
    │   ├── variables.css   # Variáveis (cores)
    │   ├── components.css  # Componentes
    │   ├── sections.css    # Seções
    │   └── responsive.css  # Media queries
    ├── js/
    │   ├── main.js         # JS principal
    │   └── components/     # JS componentes
    └── images/             # Imagens
```

## 🚀 Como Usar

### 1. Instalação
```bash
# Copiar tema para wp-content/themes/
cp -r portfolio /var/www/html/wp-content/themes/

# Ou via Git
git clone seu-repo /var/www/html/wp-content/themes/portfolio
```

### 2. Ativar Tema
1. Ir a Aparência > Temas no WordPress
2. Clicar em "Ativar" no tema Portfolio

### 3. Configurar Menu
1. Criar menu em Aparência > Menus
2. Atribuir à localização "Menu Principal"
3. Adicionar links para as seções (com âncoras #hero, #about, etc)

### 4. Personalizar
- Adicionar logo em Personalizar > Logo do site
- Editar cores em templates/hero.php, about.php, etc.
- Adicionar conteúdo real em cada template

## 🎨 Sistema de Cores

O tema usa **CSS custom properties** convertidas do `color-scheme.json`:

```css
:root {
    /* Page Background */
    --page-bg-primary: #0A0D16;
    --page-bg-secondary: #0C1020;
    
    /* Menu */
    --menu-bg: #0A0D16;
    --menu-logo: #6B5CFF;
    
    /* Home */
    --home-title: #FFFFFF;
    --home-highlight: #6B5CFF;
    
    /* Portfolio */
    --portfolio-button-bg: #6B5CFF;
    --portfolio-button-text: #FFFFFF;
    
    /* E mais... */
}
```

Para alterar cores, edite `assets/css/variables.css`.

## 📱 Breakpoints

- **Mobile**: < 576px (default)
- **Small Tablets**: 576px - 768px
- **Tablets**: 768px - 1024px
- **Small Desktops**: 1024px - 1280px
- **Desktops**: 1280px - 1536px
- **Large Desktops**: 1536px+

## 🔧 Personalização

### Adicionar Seção
1. Criar arquivo em `templates/nova-secao.php`
2. Incluir em `index.php`: `<?php get_template_part('templates/nova-secao'); ?>`
3. Adicionar CSS em `assets/css/sections.css`
4. Adicionar JS em `assets/js/components/` se necessário

### Modificar CSS
- Componentes: `assets/css/components.css`
- Seções específicas: `assets/css/sections.css`
- Responsividade: `assets/css/responsive.css`

### Adicionar JavaScript
1. Criar arquivo em `assets/js/components/nome.js`
2. Enqueue em `inc/enqueue.php`
3. Usar em `assets/js/main.js`

## 🌐 Funcionalidades JavaScript

### Menu Toggle
```javascript
Portfolio.initNavigation()
```
Gerencia abertura/fechamento do menu mobile.

### Scroll Suave
```javascript
Portfolio.smoothScrollTo(element)
```
Scroll animado para elementos.

### Filtros
```javascript
Portfolio.initPortfolioFilter()
Portfolio.initSkillsFilter()
```
Filtram itens por categoria.

### Lazy Loading
```javascript
Portfolio.initLazyLoading()
```
Carrega imagens sob demanda.

## 📊 Customizer Options (Futuro)

Para integração com WordPress Customizer:
- Logo e título
- Cores primárias
- Fonte padrão
- Conteúdo de seções

## 🔐 Segurança

- Todos os dados escapados com `esc_html()`, `esc_url()`, `esc_attr()`
- Nonce verification em forms
- ABSPATH check em todos os arquivos
- Sem acesso direto a arquivos PHP

## ♿ Acessibilidade

- ARIA labels em elementos interativos
- Screen reader text para links
- Keyboard navigation completa
- Contrast ratio WCAG AA+
- Focus indicators visíveis
- Semantic HTML5

## 📝 Internacionalização

O tema suporta tradução com o text domain `portfolio`:

```php
<?php esc_html_e('Texto traduzível', 'portfolio'); ?>
```

Para criar arquivo de tradução:
```bash
wp i18n make-pot . languages/portfolio.pot --domain=portfolio
```

## 🐛 Troubleshooting

### Menu não aparece
- Verificar se foi criado e atribuído em Aparência > Menus

### Estilos não carregam
- Limpar cache do navegador (Ctrl+Shift+Delete)
- Verificar console do navegador para erros

### Imagens não aparecem
- Adicionar imagens em assets/images/
- Usar caminhos relativos com `get_template_directory_uri()`

### Form não funciona
- Instalar Contact Form 7 ou usar form fallback
- Verificar SMTP do servidor

## 📚 Referências

- [WordPress Theme Development](https://developer.wordpress.org/themes/)
- [WordPress Coding Standards](https://developer.wordpress.org/coding-standards/)
- [WCAG 2.1 Guidelines](https://www.w3.org/WAI/WCAG21/quickref/)
- [Mobile First Design](https://www.uxpin.com/studio/blog/a-hands-on-guide-to-mobile-first-design/)

## 📄 Licença

GPL v2 ou posterior

## 👨‍💻 Autor

Desenvolvido como um tema WordPress moderno e responsivo.

---

**Versão**: 1.0.0  
**Compatibilidade**: WordPress 5.9+  
**PHP**: 7.4+  
**Navegadores**: Chrome, Firefox, Safari, Edge (últimas 2 versões)
