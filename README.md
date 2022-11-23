# github.com/joekesov/laravel-rss-reader-application

## Install and run the RSS reader application

1. From .env.example file create a new .env file and choose the port number for the REST API
- make the same action for codebase/.env from codebase/.env.example it's for the Laravel configuration

2. build and run the containers

```shell
docker compose up -d --build
```

3. In the application server shell

```shell
docker compose exec server bash
```

```angular2html
composer install
```

```shell
php artisan key:generate
```

```shell
php artisan migrate
```
```shell
npm install
```

```shell
npm run build
```

4. Check in any browser if the below url is working. And if so you could manage some RSS data.

```
http://localhost:8101/
```