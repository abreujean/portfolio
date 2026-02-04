# CSS Organization

This theme uses a modular, component-based CSS architecture for better maintainability and scalability.

## Directory Structure

```
assets/css/
├── core/                      # Core styles (always loaded)
│   ├── reset.css             # CSS reset/normalize
│   ├── variables.css         # CSS custom properties (design tokens)
│   └── typography.css        # Global typography styles
│
├── components/               # Reusable components
│   ├── navigation.css        # Desktop & mobile navigation
│   ├── buttons.css           # Button styles & variants
│   ├── forms.css             # Form elements & inputs
│   ├── cards.css             # Card components
│   └── utilities.css         # Utility classes
│
└── sections/                 # Page sections (each with responsive design)
    ├── hero.css              # Hero section
    ├── about.css             # About section
    ├── portfolio.css         # Portfolio section
    ├── skills.css            # Skills section
    ├── career.css            # Career/timeline section
    ├── recommendations.css   # Testimonials section
    ├── contact.css           # Contact section
    └── footer.css            # Footer styles
```

## Loading Order

CSS files are loaded in this order (defined in `inc/enqueue.php`):

1. **Core** (always loaded)
   - reset.css
   - variables.css
   - typography.css

2. **Components** (reusable across the site)
   - navigation.css
   - buttons.css
   - forms.css
   - cards.css
   - utilities.css

3. **Sections** (page-specific styles)
   - hero.css
   - about.css
   - portfolio.css
   - skills.css
   - career.css
   - recommendations.css
   - contact.css
   - footer.css

## Design Tokens

All colors, spacing, typography, and other design tokens are defined in `core/variables.css` using CSS custom properties.

### Example Usage

```css
.my-element {
    background-color: var(--about-card-bg);
    padding: var(--spacing-lg);
    border-radius: var(--radius-md);
}
```

## Responsive Design

Each section file includes its own responsive breakpoints following a mobile-first approach:

```css
/* Base styles (mobile) */
.my-section {
    padding: var(--spacing-md);
}

/* Tablet (768px+) */
@media (min-width: 768px) {
    .my-section {
        padding: var(--spacing-xl);
    }
}

/* Desktop (1024px+) */
@media (min-width: 1024px) {
    .my-section {
        padding: var(--spacing-2xl);
    }
}
```

## Adding New Sections

1. Create a new CSS file in `assets/css/sections/`
2. Add base styles (mobile-first)
3. Add responsive breakpoints
4. Enqueue the file in `inc/enqueue.php`

Example:
```php
wp_enqueue_style(
    'portfolio-mysection',
    get_template_directory_uri() . '/assets/css/sections/mysection.css',
    array( 'portfolio-utilities' ),
    '1.0.0'
);
```

## Best Practices

1. **Use CSS Custom Properties**: Always use variables from `variables.css`
2. **Mobile-First**: Write base styles for mobile, add breakpoints for larger screens
3. **Component-Based**: Keep styles scoped to their component/section
4. **Responsive in Section Files**: Include media queries in the same file as the component
5. **Utility Classes**: Use utility classes from `utilities.css` for common patterns
6. **Consistent Naming**: Follow BEM-like naming conventions

## File Naming

- Use lowercase with hyphens: `my-component.css`
- Section files match template names: `hero.css` → `templates/hero.php`
- Component files describe the component: `buttons.css`, `cards.css`

## Performance

- All CSS is minified in production
- Critical CSS is inline for above-the-fold content
- Unused CSS is removed during build process
