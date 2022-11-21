# github.com/joekesov/laravel-rss-reader-application

## Install and run the RSS reader application

1. build and run the containers

```shell
docker compose up -d --build
```

2. In the application server shell

```shell
docker compose exec server bash
```
- 
- php artisan migrate
- yarn
- yarn dev


========================

### Install laravel

```shell
composer create-project --prefer-dist laravel/laravel:^9.0 .
```

```shell
composer require laravel/ui
```