---
source: WordPress Developer Resources
library: WordPress
package: wordpress
topic: theme-structure
fetched: 2026-02-01T12:00:00Z
official_docs: https://developer.wordpress.org/themes/core-concepts/theme-structure/
---

# WordPress Theme Structure

WordPress themes follow a standardized file and folder structure. Block themes use HTML templates, while classic themes use PHP templates, but both maintain similar organizational principles.

## Required Files for Block Themes

### Essential Files
```
theme/
├── style.css                    (required) - Theme configuration and custom CSS
├── templates/
│   └── index.html               (required) - Fallback template
├── functions.php                (optional) - Custom PHP functionality
├── theme.json                 (optional) - Global settings and styles
├── screenshot.png               (optional) - Theme preview image
└── README.txt                  (optional) - Theme directory submission info
```

### style.css (Main Stylesheet)
- Required for WordPress to recognize the theme
- Contains theme header with metadata
- Format:
```css
/*
Theme Name: My Theme
Theme URI: https://example.com/themes/my-theme
Author: Your Name
Author URI: https://example.com
Description: A modern WordPress block theme
Version: 1.0.0
Requires at least: 6.0
Tested up to: 6.5
Requires PHP: 8.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: my-theme
*/
```

### templates/index.html
- Default fallback template for all content
- Required for block theme recognition
- Contains block markup structure:
```html
<!-- wp:template-part {"slug":"header","theme":"my-theme","className":"alignfull"} /-->

<!-- wp:group {"layout":"constrained","style":{"spacing":{"blockGap":"var:preset|spacing|30"}} -->
    <!-- wp:query {"queryId":1,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
        <main class="wp-block-query">
            <!-- wp:post-template {"align":"wide"} -->
                <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}}} -->
                    <!-- wp:post-title {"level":1,"isLink":true,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}},"fontSize":"large"} /-->
                    <!-- wp:post-featured-image {"isLink":true,"aspectRatio":"3/2","scale":"cover"} /-->
                    <!-- wp:post-excerpt {"excerptLength":30} /-->
                    <!-- wp:post-date {"format":"F j, Y"} /-->
                    <!-- wp:separator {"opacity":"border","customColor":"#c5c5c5","className":"is-style-wide"} /-->
                    <!-- wp:post-terms {"term":"category","separator":", "} /-->
                <!-- /wp:group -->
            <!-- /wp:post-template -->
            
            <!-- wp:query-pagination {"paginationArrow":"arrow","queryId":1,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"layout":{"type":"flex","justifyContent":"space-between"}} /-->
        </main>
    <!-- /wp:query -->
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","theme":"my-theme","className":"alignfull"} /-->
```

## Standard Theme Folders

### parts/ (Template Parts)
Contains reusable template parts:
```
parts/
├── header.html          - Site header template
├── footer.html          - Site footer template
├── sidebar.html         - Sidebar template part
├── comments.html        - Comments template
└── navigation.html      - Navigation menu template
```

### patterns/ (Block Patterns)
Reusable block patterns for the editor:
```php
<?php
// patterns/two-column-content.php
return array(
    'title' => __( 'Two Column Content', 'my-theme' ),
    'content' => '<!-- wp:columns {"align":"wide"} -->
        <!-- wp:column {"width":"50%"} -->
            <!-- wp:heading {"level":2} -->
                <p>' . esc_html__( 'Left Column', 'my-theme' ) . '</p>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
                <p>' . esc_html__( 'Content for the left column goes here.', 'my-theme' ) . '</p>
            <!-- /wp:paragraph -->
        <!-- /wp:column -->
        <!-- wp:column {"width":"50%"} -->
            <!-- wp:heading {"level":2} -->
                <p>' . esc_html__( 'Right Column', 'my-theme' ) . '</p>
            <!-- /wp:heading -->
            <!-- wp:paragraph -->
                <p>' . esc_html__( 'Content for the right column goes here.', 'my-theme' ) . '</p>
            <!-- /wp:paragraph -->
        <!-- /wp:column -->
    <!-- /wp:columns -->',
    'categories' => array( 'columns', 'content' ),
);
?>
```

### styles/ (Style Variations)
Theme style variations in JSON format:
```json
{
  "$schema": "https://schemas.wp.org/trunk/theme.json",
  "version": 2,
  "title": "Dark Mode",
  "settings": {
    "color": {
      "palette": [
        { "slug": "base", "color": "#1a1a1a", "name": "Base" },
        { "slug": "contrast", "color": "#ffffff", "name": "Contrast" }
      ]
    }
  },
  "styles": {
    "elements": {
      "h1": {
        "typography": {
          "fontSize": "clamp(2rem, 4vw, 3rem)",
          "fontWeight": "700"
        }
      }
    }
  }
}
```

## Advanced Theme Structure

### Complete File Organization
```
theme/
├── assets/                      (optional)
│   ├── css/
│   │   ├── editor.css
│   │   └── custom.css
│   ├── js/
│   │   ├── main.js
│   │   └── navigation.js
│   ├── images/
│   │   ├── logo.svg
│   │   └── background.jpg
│   └── fonts/
│       └── custom-font.woff2
├── inc/                        (optional)
│   ├── helpers.php
│   ├── template-functions.php
│   └── customizer.php
├── parts/
│   ├── header.html
│   ├── footer.html
│   ├── sidebar.html
│   └── comments.html
├── patterns/
│   ├── hero-section.php
│   ├── two-columns.php
│   └── call-to-action.php
├── styles/
│   ├── dark.json
│   ├── high-contrast.json
│   └── minimal.json
├── templates/
│   ├── index.html           (required)
│   ├── 404.html
│   ├── archive.html
│   ├── page.html
│   ├── single.html
│   ├── search.html
│   └── home.html
├── functions.php
├── theme.json
├── style.css                   (required)
├── screenshot.png              (optional)
├── README.txt                  (optional)
├── package.json               (optional - build tools)
├── .editorconfig              (optional - editor config)
├── .gitignore                (optional - version control)
└── LICENSE.md                 (optional - license info)
```

### assets/ Directory
Modern themes use `assets/` for additional resources:
- **css/** - Additional stylesheets not covered by theme.json
- **js/** - JavaScript files and modules
- **images/** - Theme images, icons, and graphics
- **fonts/** - Custom font files

### inc/ Directory
Custom PHP functionality organization:
- **helpers.php** - Utility functions
- **template-functions.php** - Template-specific functions
- **customizer.php** - Customizer integration
- **widgets.php** - Custom widget areas

## Template Hierarchy Integration

### Block Theme Template Files
- `templates/index.html` - Universal fallback
- `templates/home.html` - Posts index page
- `templates/single.html` - Single post/page content
- `templates/page.html` - Static pages
- `templates/search.html` - Search results
- `templates/archive.html` - Archive pages
- `templates/404.html` - Error page

### Classic Theme Template Files
- `index.php` - Universal fallback
- `home.php` - Posts index page
- `single.php` - Single post content
- `page.php` - Static pages
- `search.php` - Search results
- `archive.php` - Archive pages
- `404.php` - Error page

## Modern Development Files

### package.json
For build tools and dependencies:
```json
{
  "name": "my-theme",
  "version": "1.0.0",
  "description": "A modern WordPress block theme",
  "scripts": {
    "start": "wp-scripts start",
    "build": "wp-scripts build",
    "lint:css": "stylelint 'assets/css/**/*.css'",
    "lint:js": "eslint 'assets/js/**/*.js'"
  },
  "devDependencies": {
    "@wordpress/scripts": "^26.0.0",
    "stylelint": "^14.0.0",
    "eslint": "^8.0.0"
  }
}
```

### .editorconfig
Editor configuration for consistent formatting:
```ini
# top-most EditorConfig file
root = true

# Unix-style newlines
end_of_line = LF

# Tab indentation
indent_style = tab
indent_size = tab

# UTF-8 encoding
charset = utf-8

# Trim trailing whitespace
trim_trailing_whitespace = true

# Insert final newline
insert_final_newline = true
```

## Child Theme Structure

### Child Theme Organization
```
my-child-theme/
├── style.css                  (required - parent theme info)
├── functions.php               (optional - enqueue parent styles)
├── templates/
│   └── index.html            (optional - overrides parent)
├── parts/
│   └── header.html             (optional - overrides parent)
└── assets/
    └── css/
        └── custom.css           (optional - child-specific styles)
```

### Child Theme style.css
```css
/*
Theme Name: My Child Theme
Template: my-parent-theme
Theme URI: https://example.com/themes/my-child-theme
Description: Child theme for My Parent Theme
Author: Your Name
Author URI: https://example.com
Version: 1.0.0
*/
```

## Theme File Best Practices

### File Naming Conventions
- Use lowercase with hyphens for files
- Use descriptive names: `page-contact.php`, `single-portfolio.php`
- Template parts: `header.html`, `footer.html`, `sidebar.html`
- Assets: organize in `assets/` subdirectory

### Code Organization
- Separate concerns into appropriate files
- Use `inc/` for custom PHP functionality
- Group related assets in subdirectories
- Maintain logical folder structure

### Documentation Files
- `README.txt` for theme directory submission
- `CHANGELOG.md` for version history
- `LICENSE.md` for GPL compliance
- `screenshot.png` (1200×900) for theme preview

Understanding this structure ensures themes are well-organized, maintainable, and follow WordPress community standards.