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
- All contact data lives in `config/landing.php` (real phone `+7 (951) 594-26-26`, WhatsApp, Telegram, MAX messenger link, city, hours). Edit that file, not the blades.
- Fonts: Manrope (body) + Unbounded (display, `font-display` class) via `bunny()` in `vite.config.js`; theme vars in `resources/css/app.css`. Landing is dark-only (no `dark:` variants); the app pages keep the light/dark Flux theme.
- Works section (`landing/works.blade.php`) shows real photos (6, `public/images/works/`, config `works` array with w/h) and reviews (`landing/reviews.blade.php`) is a JS carousel of 21 real Avito screenshots (`public/images/reviews/`, `resources/js/reviews-carousel.js`). FAQ JSON-LD lives in `landing/faq.blade.php`.
- SEO: canonical, geo tags, `application/ld+json` (AutoRepair + FAQPage) in welcome/faq blades; `GET /sitemap.xml` and `GET /robots.txt` routes in `routes/web.php` render `resources/views/sitemap.blade.php` / `resources/views/robots.blade.php` (robots disallows `/admin`, Sitemap URL from `url()` — **no static `public/robots.txt`**, it was deleted).
- **`@json()` Blade directive cannot handle complex inline arrays (it splits on commas) — build the array in `@php` first and pass a variable.**
- Registration is disabled: `Features::registration()` removed from `config/fortify.php`; `resources/views/pages/auth/login.blade.php` guards the sign-up link with `@if (Route::has('register'))`.
- `tests/Feature/LandingPageTest.php` asserts `/` loads, contact links, SEO markup and sitemap. Landing tests pass; the `composer test` gate is red only due to pre-existing Orchid↔starter-kit conflicts (see below).

## Known broken state (pre-existing, not caused by the landing)

- PHPUnit is **green** (33 passed / 11 skipped). Two-factor auth was **disabled** (removed `Features::twoFactorAuthentication()` from `config/fortify.php`) — the 2FA/security tests skip via `skipUnlessFortifyHas()`. The app's user-menu avatars no longer call `$user->initials()` (Flux derives initials from `name`) — do not reintroduce `initials()`/two-factor without adding the starter-kit methods to `App\Models\User`.
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

## Production / deployment (autoelektrik42.ru)

- **Site is live**: `https://autoelektrik42.ru`, reg.ru Host-0 shared hosting, SSH path `/var/www/u3614515/data/www/autoelektrik42.ru` (document root → `public/`).
- Repo: GitHub `xNPC/avto-elektrik`, branch `master`. SSH exists; Node **does not** exist on the server.
- **Deploy flow**: run `npm run build` locally → commit `public/build` (committed assets, fonts bundled) → `git push` → on server `git pull`. `composer` is unreliable on the server — fallback: deploy bundle `C:\OSPanel\temp\PHP-8.5\default\opencode\avto-elektrik-deploy.zip` (already contains vendor, built `--no-dev`); unzip extracts into a top-level `avto-elektrik-deploy/` folder — move contents up or use `-d` carefully.
- `DEPLOY.md` at project root: full step-by-step deploy + prod `.env` template. Prod `.env`: `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://autoelektrik42.ru`, `DB_HOST=localhost`, `SESSION/CACHE/QUEUE=database`. **Never commit `.env` or DB creds.**
- Admin panel `/admin` (Orchid): admin user `admin@autoelektrik42.ru` exists on prod (password managed by owner, do not store here).
- SEO config in `config/landing.php`: `yandex_verification = a3d345c5eb9bfea9`, `metrika_id = 111742357` (Yandex.Metrika, exact snippet in `welcome.blade.php`), `google_verification = ''` (still TODO), `og_image = /og-image.png`.
- Favicons in `public/`: `favicon.svg` (primary), `favicon.ico` (multi-size 16+32+48, rebuilt via ImageMagick from SVG), `favicon-120.png` (Yandex recommends 120×120), `apple-touch-icon.png` (180×180). ImageMagick available locally: `C:\OSPanel\addons\ImageMagick-vs17\magick.exe`.
- `robots.txt` + `sitemap.xml` are served by routes (no static files) — Sitemap URL derives from `APP_URL` (was a dev-domain bug, fixed).
- Yandex Webmaster: site added, «Переобход главной» requested for favicon (~3 days). Yandex Metrika counter ID `111742357` is live.

## Status & backlog

- **Done**: landing + SEO pass (title, dynamic robots, JSON-LD url/image/E.164, og w/h, unique work alts), prod deployment, multi-size favicons, Yandex Metrika, Yandex verification code.
- **Known behavior**: Yandex initially built the snippet from a work photo alt («Выполненная работа №1 — автоэлектрик в Кемерово») — normalizes as the site matures; don't chase exact snippet control.
- **Backlog (owner decisions needed)**:
  - `google_verification` code — user has to add site to Google Search Console and paste the code;
  - «Стоимость услуг» block — competitor (`autodiagnost42.ru`) has explicit prices; needs real numbers from the owner;
  - callback/lead form (phone/WhatsApp/MAX only right now);
  - real captions for the 6 work photos (`figcaption` + `caption` in `config/landing.php`) — needs owner descriptions; current alts are generic «Выполненная работа №N…»;
  - Yandex Webmaster: verify favicon status in «Оптимизация → Диагностика сайта».
- **Deliberately NOT copied from competitor** (penalty risks): `aggregateRating`/`Review` in JSON-LD, keyword-stuffed paragraphs, 40+ unrelated services (шиномонтаж, детейлинг, кузовной ремонт).
- `DEPLOY.md` in repo is the single deploy reference.
