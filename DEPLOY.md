# Деплой на боевой сервер — autoelektrik42.ru (reg.ru, SSH)

## Шаг 0. Подготовка (5 минут)

1. **Залить последний коммит на GitHub** (на своём компьютере, в папке проекта):
   ```bash
   git push origin master
   ```
2. **Панель reg.ru → «Виртуальный хостинг» → autoelektrik42.ru:**
   - PHP-версия: **8.3 или 8.4** (8.2 не подойдёт);
   - Включить бесплатный **SSL-сертификат** (Let's Encrypt);
   - Создать **MySQL-базу** (записать имя базы, логин, пароль);
   - Корневая директория сайта (документ-рут) → папка **`public`** (например `~/autoelektrik42.ru/public` или как в панели).

## Шаг 1. SSH на сервер

```bash
ssh ЛОГИН@ХОСТ
cd ~/autoelektrik42.ru   # или куда указывает панель
```

## Шаг 2. Забрать код

```bash
git clone https://github.com/xNPC/avto-elektrik.git ./
```

> **Если репозиторий приватный** — клонирование без токена не пройдёт. Варианты:
> 1. Сделать репозиторий публичным (Settings → Danger Zone → Change visibility), либо
> 2. Загрузить готовый бандл: в инструкции из чата был `avto-elektrik-deploy.zip` (собран для FTP) — распаковать его в текущую папку:
>    ```bash
>    unzip avto-elektrik-deploy.zip -d ./
>    ```
>    Бандл уже содержит vendor, тогда **Шаг 4 выполнять не нужно**.

## Шаг 3. Файл .env

Создать файл `.env` (команда `nano .env`, вставить текст ниже, заменить `БАЗА_ИМЯ`, `БАЗА_ЛОГИН`, `БАЗА_ПАРОЛЬ` на данные из панели, `Ctrl+O` → `Enter` → `Ctrl+X`):

```
APP_NAME='Частный автоэлектрик'
APP_ENV=production
APP_DEBUG=false
APP_URL=https://autoelektrik42.ru

APP_LOCALE=ru
APP_FALLBACK_LOCALE=ru
APP_FAKER_LOCALE=ru_RU

APP_MAINTENANCE_DRIVER=file

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=warning

DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=БАЗА_ИМЯ
DB_USERNAME=БАЗА_ЛОГИН
DB_PASSWORD=БАЗА_ПАРОЛЬ

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=log
MAIL_SCHEME=null
MAIL_HOST=127.0.0.1
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_FROM_ADDRESS="hello@autoelektrik42.ru"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME="${APP_NAME}"

SCOUT_DRIVER=null
```

Если на сервере CLI-версия PHP отличается (например `php8.3`), в командах ниже заменяйте `php` на `php8.3`.

## Шаг 4. Пакеты и ключ

```bash
composer install --no-dev --optimize-autoloader --no-interaction
php artisan key:generate
```

> **Если composer на сервере нет** — используйте бандл из шага 2 (в нём vendor уже собран), тогда `composer install` пропускаете. `php artisan key:generate` выполнить обязательно.

## Шаг 5. Миграции (создадут таблицы БД)

```bash
php artisan migrate --force
```

## Шаг 6. Администратор для /admin

```bash
php artisan tinker --execute="$u = App\Models\User::create(['name' => 'Администратор', 'email' => 'admin@autoelektrik42.ru', 'password' => Illuminate\Support\Facades\Hash::make('СМЕНИТЕ_ЭТОТ_ПАРОЛЬ'), 'email_verified_at' => now()]); $u->permissions = ['platform.systems.manage' => true]; $u->save();"
```

Пароль в команде заменить на свой (не забудьте после входа сменить email/пароль в настройках профиля `/admin`).

## Шаг 7. Права на запись

```bash
chmod -R 775 storage bootstrap/cache
```

## Шаг 8. Проверка

1. Открыть `https://autoelektrik42.ru` — лендинг, картинки, шрифты;
2. `https://autoelektrik42.ru/robots.txt` — должен показать `Sitemap: https://autoelektrik42.ru/sitemap.xml`;
3. `https://autoelektrik42.ru/sitemap.xml` — XML с главной;
4. `https://autoelektrik42.ru/admin` — вход админом из шага 6;
5. Страница в Google Chrome → «Просмотр кода»: title, description, JSON-LD (AutoRepair + FAQPage), canonical.

## Шаг 9. SEO-регистрация (после проверки)

1. **Яндекс.Вебмастер** (`webmaster.yandex.ru`) → добавить сайт → подтверждение. Полученный код вписать в `config/landing.php` → `yandex_verification`, закоммитить, обновить на сервере (`git pull`), кэш не нужен.
2. **Google Search Console** → аналогично → `google_verification`.
3. В обоих сервисах: «Проверить сайт», подать `https://autoelektrik42.ru/sitemap.xml`.
4. **Яндекс Бизнес**: создать карточку организации (телефон, график, категория «Автоэлектрик»).