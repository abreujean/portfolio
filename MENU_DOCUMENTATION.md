# Menu Navigation - Documentação

## 📱 Estrutura Responsiva

### Mobile (< 768px)
- **Menu**: Hidden/full-screen overlay
- **Trigger**: Hamburger button (3 linhas)
- **Close**: Button "×" no canto superior direito + overlay + Escape key
- **Animation**: Slide in from left (translateX)
- **Overlay**: Semi-transparente (50% black)

### Tablet (768px - 1024px)
- **Menu**: Horizontal navigation inline
- **Trigger**: Hidden
- **Layout**: Flex row
- **Underline**: On hover (animado 2px border-bottom)

### Desktop (1024px+)
- **Menu**: Horizontal navigation inline com mais espaço
- **Font**: Maior (16px)
- **Hover**: Underline animation mais suave
- **Active**: Underline animado

---

## 🎨 Cores Utilizadas

```css
--menu-bg: #0A0D16;                  /* Background principal */
--menu-bg-blur: rgba(10, 13, 22, 0.8);  /* Blur effect no scroll */
--menu-logo: #6B5CFF;                /* Logo/primary color */
--menu-link: #A9AEDC;                /* Link color */
--menu-link-hover: #FFFFFF;          /* Link hover */
--menu-link-active: #6B5CFF;         /* Link ativo */
--menu-divider: #1C2140;             /* Linhas separadoras */
```

---

## 🔧 Funcionalidades JavaScript

Arquivo: `assets/js/main.js` - Função `initNavigation()`

### Eventos Implementados

1. **Menu Toggle** - Clique no hamburger
   ```javascript
   menuToggle.addEventListener('click', () => toggleMenu());
   ```

2. **Menu Close Button** - Clique no botão ×
   ```javascript
   menuClose.addEventListener('click', () => toggleMenu(false));
   ```

3. **Overlay Click** - Clique no overlay semi-transparente
   ```javascript
   menuOverlay.addEventListener('click', () => toggleMenu(false));
   ```

4. **Escape Key** - Pressionar Esc para fechar
   ```javascript
   document.addEventListener('keydown', (e) => {
       if (e.key === 'Escape' && primaryMenu.classList.contains('active')) {
           toggleMenu(false);
       }
   });
   ```

5. **Smooth Scroll** - Links com âncoras (#hero, #about, etc)
   ```javascript
   navLinks.forEach(link => {
       link.addEventListener('click', (e) => {
           this.smoothScrollTo(targetElement);
           toggleMenu(false);  // Fecha menu após navegar
       });
   });
   ```

6. **Header Scroll Effect** - Blur background ao scroll
   ```javascript
   window.addEventListener('scroll', () => {
       if (currentScrollY > 50) {
           header.classList.add('scrolled');  // Adiciona blur
       }
   });
   ```

---

## 📊 Classes CSS

### Header e Container
```css
.site-header              /* Fixed navigation */
.site-header.scrolled     /* Com blur effect */
.main-navigation          /* Nav element */
.navigation-container     /* Flex container */
```

### Logo
```css
.site-branding           /* Logo area */
.site-branding a         /* Logo link */
.custom-logo             /* Custom WordPress logo */
```

### Mobile Menu Button
```css
.menu-toggle             /* Hamburger button */
.menu-toggle:hover       /* Hover state */
.menu-toggle:focus       /* Focus state */
.menu-toggle[aria-expanded="true"]  /* Open state */

.menu-toggle-icon        /* Container das 3 linhas */
.menu-toggle-line        /* Cada linha */
```

### Menu Dropdown
```css
.primary-menu            /* Menu container (fixed full-screen no mobile) */
.primary-menu.active     /* Menu aberto */

.primary-menu-list       /* Lista de items (flex column mobile) */
.primary-menu-list > li  /* Menu item */
.primary-menu-list > li > a  /* Menu link */

.primary-menu-list > li.current-menu-item > a  /* Link ativo */
.primary-menu-list > li.current-menu-item > a::after  /* Underline ativo */

.primary-menu-list .sub-menu  /* Submenu (dropdown) */
```

### Close Button
```css
.menu-close              /* Close button (×) */
.menu-close:hover        /* Hover state */
.menu-close:focus        /* Focus state */
```

### Overlay
```css
.menu-overlay            /* Overlay semi-transparente */
.menu-overlay.active     /* Overlay visível */
```

---

## 🔌 Integração com WordPress

### Menu Setup
Em `inc/theme-setup.php`:
```php
register_nav_menus([
    'primary' => __('Menu Principal', 'portfolio'),
]);
```

### Enqueue de Assets
Em `inc/enqueue.php`:
```php
wp_enqueue_style('portfolio-components', ...);  /* Estilos do menu */
wp_enqueue_script('portfolio-main', ...);       /* JS do menu */
```

### Template Part
Em `header.php`:
```php
<?php get_template_part('templates/navigation'); ?>
```

---

## ✅ Acessibilidade

- ✅ **ARIA Labels**
  - `aria-label="Main Navigation"` - Na tag nav
  - `aria-label="Toggle Menu"` - No hamburger button
  - `aria-expanded="true/false"` - Hamburger state
  - `aria-label="Close Menu"` - No close button

- ✅ **Keyboard Navigation**
  - Tab → Navega entre links
  - Enter → Ativa link
  - Escape → Fecha menu mobile
  - Focus indicators visíveis

- ✅ **Screen Readers**
  - Menu fallback para admin
  - Semantic HTML (nav, button, a tags)
  - Skip to content link em header

---

## 🎬 Animações CSS

### Hamburger Lines (Mobile)
```css
/* Linha 1: Rotaciona 45deg */
.menu-toggle[aria-expanded="true"] .menu-toggle-line:nth-child(1) {
    transform: rotate(45deg) translate(7px, 7px);
}

/* Linha 2: Desaparece */
.menu-toggle[aria-expanded="true"] .menu-toggle-line:nth-child(2) {
    opacity: 0;
}

/* Linha 3: Rotaciona -45deg */
.menu-toggle[aria-expanded="true"] .menu-toggle-line:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -7px);
}
```

### Menu Slide Animation
```css
.primary-menu {
    transform: translateX(-100%);
    transition: transform var(--transition-normal) ease-out;
}

.primary-menu.active {
    transform: translateX(0);  /* Slide in */
}
```

### Hover Effects (Desktop)
```css
/* Underline animation */
.primary-menu-list > li > a::after {
    width: 0;
    transition: width var(--transition-normal);
}

.primary-menu-list > li > a:hover::after {
    width: 100%;  /* Underline expande */
}
```

---

## 📱 Breakpoints

- **Mobile (default)**: < 576px
- **Small Tablet**: 576px - 767px
- **Tablet**: 768px - 1023px ← Menu muda aqui!
- **Desktop**: 1024px - 1279px
- **Large Desktop**: 1280px+

**Ponto crítico**: 768px (menu muda de mobile para horizontal)

---

## 🚀 Como Usar

### 1. Criar Menu no WordPress
- Aparência → Menus
- Criar novo menu
- Adicionar itens (links para seções com âncoras: #hero, #about, etc)
- Atribuir a "Menu Principal"

### 2. Links com Âncoras
```html
<a href="#hero">Hero</a>
<a href="#about">About</a>
<a href="#portfolio">Portfolio</a>
<a href="#contact">Contact</a>
```

### 3. Adicionar Logo (Opcional)
- Personalizar → Logo do Site
- Fazer upload

### 4. Teste de Responsividade
Abrir DevTools (F12):
- Mobile: 375px width
- Tablet: 768px width
- Desktop: 1024px width

---

## 🐛 Troubleshooting

### Menu não abre
- Verificar console (F12) para erros JS
- Confirmar se IDs correspondem:
  - `#site-header`
  - `#menu-toggle`
  - `#primary-menu`
  - `#menu-overlay`
  - `#menu-close`

### Cores estão erradas
- Verificar `assets/css/variables.css`
- CSS variables com prefixo `--menu-`

### Menu não fecha ao clicar link
- Verificar se links têm href com # (âncora)
- Confirmar se `toggleMenu(false)` é chamado

### Sem efeito blur no scroll
- Adicione à classe `.site-header`:
  ```css
  backdrop-filter: blur(10px);
  ```

---

## 📚 Arquivos Relacionados

```
templates/navigation.php        ← HTML do menu
assets/css/components.css       ← Estilos (mobile)
assets/css/responsive.css       ← Media queries (tablet/desktop)
assets/js/main.js              ← JavaScript (funções)
inc/theme-setup.php            ← Setup do menu no WordPress
inc/enqueue.php                ← Enqueue de assets
header.php                     ← Inclusão do menu
```

---

## 🎯 Próximas Etapas

1. ✅ CSS Mobile - **COMPLETO**
2. ✅ CSS Responsivo - **COMPLETO**
3. ✅ JavaScript - **COMPLETO**
4. **→ TESTAR em navegador real**
5. **→ Ajustar espaçamentos se necessário**
6. **→ Adicionar mais efeitos (opcional)**

