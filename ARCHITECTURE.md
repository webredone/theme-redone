# Theme Redone - Architecture Documentation

## Overview

Theme Redone is a modern, highly structured WordPress theme built with a focus on developer experience, maintainability, and performance. It's designed as a comprehensive starter theme that supports multiple template engines, custom Gutenberg blocks, and modern build tools.

## Core Architecture

### 1. Entry Point & Bootstrap

The theme follows a clean, dependency-injected architecture starting from `functions.php`:

```
functions.php → Bootstrap::init() → ContainerConfig::build() → ThemeRedone::boot()
```

**Key Components:**

-   **`functions.php`**: Minimal entry point that loads constants, autoloader, and bootstrap
-   **`Bootstrap`**: Handles environment setup, error handling (Tracy/Ignition), and dependency injection
-   **`ContainerConfig`**: Uses League Container for dependency injection, registering all core services
-   **`ThemeRedone`**: Main orchestrator class that coordinates all theme features

### 2. Core Services Architecture

The theme is built around several core services, each with a single responsibility:

#### ThemeSupport

-   Manages WordPress theme support features
-   Handles editor customizations (removes H1, Read More button)
-   Sets up image sizes, menus, and HTML5 support
-   Filters content (removes p tags around images)

#### Enqueues/Dequeues

-   **Enqueues**: Manages script and style enqueuing for frontend and admin
-   **Dequeues**: Handles removal of unnecessary WordPress assets
-   Implements version query removal for better caching

#### Blocks System

-   **`Blocks`**: Main block manager that handles asset enqueuing based on post content
-   **`BlockTypesRegistrar`**: Registers custom Gutenberg blocks dynamically
-   Supports both PHP-rendered and JavaScript-rendered blocks
-   Implements smart asset loading (only loads assets for blocks used on current page)

#### LoggerService

-   Built on Monolog for structured logging
-   Custom error and exception handlers
-   Logs to `wp-content/theme_redone_logs/theme.log`

### 3. Template Engine System

The theme supports multiple template engines through a factory pattern:

#### Supported Engines

-   **BladeOne**: Lightweight Blade implementation
-   **Laravel Blade**: Full Laravel Blade engine
-   **Latte**: Nette's template engine
-   **Twig**: Via Timber integration
-   **PHP**: Plates template engine

#### Template Engine Factory

```php
TemplateEngineFactory::createEngine(Flavor $flavor): TemplateRendererInterface
```

#### Template Resolution

-   Templates are located in `/views/` directory
-   Each template engine has its own file extension
-   Global `$tr_renderer` variable provides access to the active engine
-   Support for both absolute paths and dot-notation template names

### 4. Gutenberg Blocks Architecture

#### Block Structure

Each custom block follows a consistent structure:

```
gutenberg/blocks/{block-name}/
├── model.json          # Block configuration and attributes
├── controller.php      # PHP render callback (optional)
├── view.{extension}    # Template file (multiple engines supported)
├── EditMain.js         # Main editor component
├── EditSidebar.js      # Sidebar controls (optional)
├── View.js             # Frontend JavaScript
├── frontend.scss       # Frontend styles
├── _editor.scss        # Editor styles
└── example.jpg         # Block preview image
```

#### Block Registration Process

1. **Discovery**: Scans `/gutenberg/blocks/` directory
2. **Model Loading**: Reads `model.json` for block configuration
3. **Registration**: Registers block with WordPress using `BlockTypesRegistrar`
4. **Asset Management**: Automatically enqueues CSS/JS based on block usage

#### Block Model Structure

```json
{
    "block_meta": {
        "BLOCK_REGISTER_NAME": "hero",
        "BLOCK_TITLE": "Hero",
        "keywords": ["Hero", "Main Hero"],
        "hasSidebar": false,
        "hasExample": true
    },
    "attributes": {
        "title": {
            "type": "object",
            "field_meta": {
                "type": "text",
                "label": "Title"
            },
            "default": { "text": "" }
        }
    }
}
```

### 5. Build System

#### Gulp 4 + Webpack Hybrid

-   **Gulp**: Handles SCSS compilation, ESBuild for JS, file watching
-   **Webpack**: Compiles Gutenberg block editor JavaScript
-   **ESBuild**: Fast JavaScript bundling with support for React, Vue, Svelte

#### Build Configuration

-   **Development**: Source maps, unminified assets, hot reloading
-   **Production**: Minified assets, optimized bundles
-   **Asset Organization**:
    -   Global assets → `/dist/global/`
    -   Block-specific assets → `/dist/block-specific/{block-name}/`
    -   Shared block assets → `/dist/blocks-shared/`

#### Supported Technologies

-   **CSS**: SCSS with autoprefixer, source maps, media query grouping
-   **JavaScript**: ES6+, React, Vue 3, Svelte, Axios
-   **Build Tools**: Gulp 4, Webpack 5, ESBuild, Babel

### 6. Plugin Integration

#### ACF (Advanced Custom Fields) Integration

-   **`AcfSyncManager`**: Handles ACF field group synchronization
-   Saves field groups to `/acf-data/` directory
-   Sets up theme options pages
-   Delayed initialization to ensure ACF is loaded

#### CPTUI (Custom Post Type UI) Integration

-   **`CptuiSyncManager`**: Syncs custom post types and taxonomies
-   Loads definitions from `/cptui/` directory
-   Ensures CPTUI data is available even when plugin is deactivated

### 7. Configuration System

#### Global Configuration

Located in `theme_redone_global_config.json`:

```json
{
    "BLOCK_NAME_PREFIX": "custom",
    "LOCALHOST_PROJECT_URL": "localhost/theme_redone",
    "FLAVOR": "bladelaravel"
}
```

#### Environment Configuration

-   Uses Dotenv for environment variables
-   Supports `.env` files for local development
-   Configurable debug settings and Tracy integration

### 8. Helper Functions

The theme provides a comprehensive set of helper functions in `global.php`:

#### Media Handling

-   **`tr_get_media()`**: Universal media handler for images and SVGs
-   **`tr_get_svg()`**: SVG handling with async loading support
-   **`tr_get_img_path()`**: Asset path resolution

#### Template Helpers

-   **`tr_render()`**: Render templates with data
-   **`tr_view_path()`**: Get template paths based on active engine
-   **`tr_component()`**: Shorthand for component includes

#### Content Helpers

-   **`tr_get_excerpt()`**: Custom excerpt generation
-   **`tr_posted_on()`**: Post date formatting
-   **`tr_social_share()`**: Social media sharing links

### 9. File Structure

```
theme-redone/
├── src/ThemeRedone/           # Core PHP classes
│   ├── Core/                  # Core services
│   ├── Plugins/               # Plugin integrations
│   ├── Enums/                 # Type definitions
│   └── Functions/             # Global helper functions
├── gutenberg/                 # Gutenberg blocks
│   ├── blocks/                # Individual block definitions
│   ├── components/            # Reusable block components
│   └── core/                  # Block system core files
├── views/                     # Template files
│   ├── components/            # Reusable components
│   ├── layout/                # Layout templates
│   └── templates/             # Page templates
├── dist/                      # Compiled assets
├── assets/                    # Static assets (images, SVGs)
└── cptui/                     # Custom post type definitions
```

### 10. Development Workflow

#### Block Development

1. Create block directory in `/gutenberg/blocks/`
2. Define `model.json` with block configuration
3. Create template files for supported engines
4. Add React components for editor interface
5. Define styles and JavaScript
6. Run `npm run dev` for development with hot reloading

#### Template Development

1. Create templates in `/views/` with appropriate extension
2. Use helper functions for data access
3. Leverage component system for reusability
4. Test across different template engines

#### Asset Management

-   Global styles in `/src/scss/`
-   Block-specific styles in block directories
-   JavaScript modules in `/src/js/`
-   Automatic asset optimization and minification

## Key Design Patterns

### 1. Dependency Injection

Uses League Container for clean dependency management and testability.

### 2. Factory Pattern

Template engine selection and block registration use factory patterns for flexibility.

### 3. Strategy Pattern

Multiple template engines and build strategies can be swapped without changing core code.

### 4. Observer Pattern

WordPress hooks and filters are used extensively for extensibility.

### 5. Single Responsibility Principle

Each class has a focused purpose, making the codebase maintainable and testable.

## Performance Optimizations

### 1. Smart Asset Loading

-   Only loads CSS/JS for blocks actually used on the current page
-   Shared assets are loaded once and reused
-   Lazy loading support for images and SVGs

### 2. Template Caching

-   All template engines support caching
-   Cache directories are automatically created
-   Development vs production cache strategies

### 3. Build Optimizations

-   ESBuild for fast JavaScript compilation
-   CSS minification and media query grouping
-   Source maps for development debugging

### 4. WordPress Optimizations

-   Removes unnecessary WordPress assets
-   Custom image sizes for better performance
-   Optimized database queries through proper WordPress APIs

## Extensibility

The theme is designed for easy extension:

### 1. Custom Blocks

-   Follow the established block structure
-   Use the provided build tools
-   Leverage the component system

### 2. Custom Post Types

-   Use the `CustomPostTypesRegistrar` class
-   Integrate with ACF for custom fields
-   Sync with CPTUI for easy management

### 3. Template Engines

-   Add new engines by implementing `TemplateRendererInterface`
-   Update the factory to include new engines
-   Maintain consistent template structure

### 4. Plugin Integration

-   Create new plugin managers following the existing pattern
-   Use the container system for dependency injection
-   Implement proper initialization hooks

This architecture provides a solid foundation for modern WordPress development while maintaining flexibility and performance.
