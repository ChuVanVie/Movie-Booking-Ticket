# Movie-Booking-Ticket
Movie Booking Ticket for Teeiv Cinema 


# Vote App

## Components Versions

- [Nginx](https://hub.docker.com/_/nginx)
- [PHP:8.1-FPM](https://hub.docker.com/_/php/tags?page=1&name=fpm)
- [MySQL 8.0](https://hub.docker.com/_/mysql)

## Backend set up

### 1. Build `docker-compose.yml`:

```sh
docker compose build
```

### 2. Run `docker-compose.yml`:

```sh
docker compose up -d
```

### 3. Exec into `backend` container:

```sh
docker exec -it mbt-backend bash
# cd backend
```

### 4. **Laravel** set up:

```sh
composer install
cp .env.example .env
```

#### Config DB and Mail connection in `.env` file:

```sh
DB_CONNECTION=mysql
DB_HOST=mbt-db
DB_PORT=3306
DB_DATABASE=mbt
DB_USERNAME=admin
DB_PASSWORD=12345678

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=vietcv37@gmail.com
MAIL_PASSWORD="gbuu vxsv rbdd bjos"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=vietcv37@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

VITE_APP_URL=http://localhost:8080/openapi.yaml
APP_FRONTEND_URL=
```

```sh
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan storage:link
```

#### Passport install:

```sh
php artisan passport:install
```

Config `PASSPORT_PASSWORD_GRANT_CLIENT_ID` and `PASSPORT_PASSWORD_GRANT_CLIENT_SECRET` in `.env` file
following `oauth_clients` table.
_Example:_

```sh
PASSPORT_PASSWORD_GRANT_CLIENT_ID=2
PASSPORT_PASSWORD_GRANT_CLIENT_SECRET=K3AKgZGMtXo9lPXBDT6UFrnyr4o0XThrZvthfsUq
```

### 5. Stop and clear services:

```sh
docker compose down -v
```

### 6. Install dependencies and build swagger:

```sh
npm install
# or
yarn install

yarn build
```

```sh
Go to http://localhost:8080/ to test api on swagger.
```

