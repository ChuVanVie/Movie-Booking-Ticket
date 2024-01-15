# Movie-Booking-Ticket
Movie Booking Ticket for Teeiv Cinema 

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
cd backend
docker exec -it mbt-backend bash
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

#### Redis configuration:

```sh
# REDIS_HOST=vote-app-redis
# REDIS_PASSWORD=null
# REDIS_PORT=6379
# REDIS_CLIENT=predis
```

#### Cronjob configuration:
This config is for the cronjob to run the command `php artisan schedule:run` every minute. It will config in cronjob of the server.
```sh
crontab -e
```
Add this line to the end of the file: `* * * * * docker exec backend php artisan schedule:run`

Check the cronjob is running:
```sh
crontab -l
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

Go to http://localhost:8080/ to test api on swagger.
```

## Frontend set up

### 1. Install dependencies:

`cd frontend`

```sh
npm install
# or
yarn install
```

### 2. Create `.env` file:

```sh
cp .env.example .env
```

set `VUE_APP_API_URL` in `.env` file:

```sh
VUE_APP_API_URL=http://localhost:8080/api
```

### 3. Run project on development mode:

```sh
npm run dev
# or
yarn dev
```

### 4. Build project:

```sh
npm run build
# or
yarn build
```
