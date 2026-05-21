# SmartFarming

## Stack
- **Laravel 13** (PHP 8.3+), Blade + Tailwind CSS v4 (Vite 8, `@tailwindcss/vite` plugin)
- **SQLite** default (both dev/test), Pest PHP v4 for testing

## Key commands
| Command | What it does |
|---|---|
| `composer run dev` | Runs 4 processes concurrently: artisan serve, queue:listen, pail (logs), vite dev |
| `composer run test` | `php artisan config:clear` then `php artisan test` (Pest) |
| `composer run setup` | Full bootstrap: install, create `.env`, key:generate, migrate, npm build |
| `npm run build` / `npm run dev` | Vite build / dev server |

## Conventions
- **Pest** is the test framework — write tests in `tests/Feature/` and `tests/Unit/`. `phpunit.xml` uses in-memory SQLite for tests; `RefreshDatabase` trait is available but **not** applied globally (commented out in `tests/Pest.php`).
- **Laravel Pint** (`vendor/bin/pint`) for PHP code style — runs automatically as part of `composer run test`? No — run it separately: `vendor/bin/pint`.
- **EditorConfig**: PHP = 4-space indent; YAML = 2-space indent.
- Standard Laravel package-based structure: routes in `routes/`, Blade templates in `resources/views/`, View Components in `app/View/Components/`, Controllers in `app/Http/Controllers/`, Form Requests in `app/Http/Requests/`.
- Auth scaffolding (Breeze-like) is present: `routes/auth.php`, full auth controllers and Blade views.
- `composer.json` `setup` script automates project init — use it on fresh clones.

## DB & migrations
- Default: SQLite (`database/database.sqlite`). Alternative drivers (MySQL, Redis) are commented out in `.env.example`.
- Three starter migrations: users, cache, jobs tables.
- Session/Cache/Queue all default to `database` driver.

## Important constraints
- `.npmrc` has `ignore-scripts=true` — `npm install` will **not** run lifecycle scripts (pre/postinstall). Use `npm install --ignore-scripts=false` explicitly if needed.
- `composer.json` has `optimize-autoloader: true` — run `composer dump-autoload` after adding classes when not in dev.
- `postcss.config.js` is empty — Tailwind v4 does not need PostCSS config; all styling is via `@import 'tailwindcss'` in `resources/css/app.css`.
