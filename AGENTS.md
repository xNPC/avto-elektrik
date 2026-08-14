# AGENTS.md

Laravel 13 app ("Частный автоэлектрик", public site) with an **Orchid Platform v14** admin panel. Stack: Livewire 4, Laravel Fortify (auth), Flux UI, Tailwind CSS 4, Vite 8, PHP ^8.3 (OSPanel runtime 8.5). No README — this file is the primary guide.

## Commands

- `composer test` — full verification gate, in this order: `config:clear` → Pint check → PHPStan → PHPUnit. Run this before finishing any change.
- Individual steps: `composer lint:check` (Pint, laravel preset), `composer types:check` (PHPStan level 7), `php artisan test`.
- Fix style: `composer lint` (`vendor/bin/pint`).
- Focused test: `php artisan test --filter=DashboardTest` (or full class/method name).
- Frontend: `npm run dev` (Vite), `npm run build`. Tailwind 4 via `@tailwindcss/vite` plugin — **no `tailwind.config` file**; theme lives in `resources/css/app.css`.
- Dev server: `composer dev` (wraps `php artisan dev`). Fresh setup: `composer setup`.

## Environment / DB

- Real DB is **MySQL** on OSPanel (`.env`: host `mysql-8.4`, db `avto-elektrik`), even though `.env.example` defaults to sqlite. Migrations run against MySQL.
- Tests always use in-memory sqlite (`phpunit.xml` sets `DB_CONNECTION=sqlite`, `:memory:`), so test DB and dev DB differ. Use `php artisan migrate` for dev; tests create their own schema.
- `APP_LOCALE=ru`, app name is Russian. UI copy for the public site is in Russian; new views/text should match.

## Public landing (`/`)

- Landing replaces the default `welcome.blade.php`: shell in `resources/views/welcome.blade.php` (SEO, `@fonts`, `@vite`), sections as `@include`s in `resources/views/landing/`.
- All contact data lives in `config/landing.php` (phone, WhatsApp, Telegram, city, hours are placeholders — `+7 (900) 000-00-00` etc.). Edit that file, not the blades.
- Fonts: Manrope (body) + Unbounded (display, `font-display` class) via `bunny()` in `vite.config.js`; theme vars in `resources/css/app.css`. Landing is dark-only (no `dark:` variants); the app pages keep the light/dark Flux theme.
- Works section (`landing/works.blade.php`) and reviews (`landing/reviews.blade.php`) use placeholder blocks until real photos/Avito screenshots are added. FAQ JSON-LD lives in `landing/faq.blade.php`.
- SEO: canonical, geo tags, `application/ld+json` (AutoRepair + FAQPage) in welcome/faq blades; `GET /sitemap.xml` route in `routes/web.php` renders `resources/views/sitemap.blade.php`; `public/robots.txt` disallows `/admin`.
- **`@json()` Blade directive cannot handle complex inline arrays (it splits on commas) — build the array in `@php` first and pass a variable.**
- Registration is disabled: `Features::registration()` removed from `config/fortify.php`; `resources/views/pages/auth/login.blade.php` guards the sign-up link with `@if (Route::has('register'))`.
- `tests/Feature/LandingPageTest.php` asserts `/` loads, contact links, SEO markup and sitemap. Landing tests pass; the `composer test` gate is red only due to pre-existing Orchid↔starter-kit conflicts (see below).

## Known broken state (pre-existing, not caused by the landing)

- PHPUnit is **green** (26 passed / 11 skipped). Two-factor auth was **disabled** (removed `Features::twoFactorAuthentication()` from `config/fortify.php`) — the 2FA/security tests skip via `skipUnlessFortifyHas()`. The app's user-menu avatars no longer call `$user->initials()` (Flux derives initials from `name`) — do not reintroduce `initials()`/two-factor without adding the starter-kit methods to `App\Models\User`.
- Pint/PHPStan still fail on the Orchid boilerplate (`app/Orchid/*`, `config/platform.php`, `app/Models/User.php`, migrations) — 68 PHPStan errors, all `missingType.*`/Orchid API mismatches. Do not touch as part of landing work.

## Orchid admin (`/admin`)

- Routes: `routes/platform.php` (uses `Route::screen(...)`). Menu + permissions: `app/Orchid/PlatformProvider.php`. Config: `config/platform.php` (prefix `/admin`, index `platform.main`).
- Screens live in `app/Orchid/Screens/`, layouts in `app/Orchid/Layouts/`. Existing screens are the example boilerplate from `orchid:install` — treat them as scaffolding to replace, not business features.
- `App\Models\User` extends `Orchid\Platform\Models\User` (Orchid auth, not the stock Laravel one). New admin-facing models need `$allowedFilters`/`$allowedSorts` (see User.php); sidebar search additionally requires a Presenter + Scout class (see `config/platform.php` `search`).
- `vendor:publish --tag=orchid-assets` refreshes the Orchid public assets.

## Conventions

- PHPStan level 7 via `phpstan.neon` (larastan extension); paths: `app/`, `bootstrap/app.php`, `config/`, `database/`, `routes/`.
- Tests: PHPUnit 12, `tests/Unit` + `tests/Feature`, `RefreshDatabase`. Fortify-feature tests skip via `skipUnlessFortifyHas()` in `tests/TestCase.php`.
- Livewire routes use `Route::livewire(...)` (e.g. `routes/settings.php`); pages live under `resources/views/pages/`, layouts under `resources/views/layouts/`.
- Frontend uses Flux Blade components (under `resources/views/flux/`) and `@laravel/passkeys` (input `resources/js/passkeys.js`).
