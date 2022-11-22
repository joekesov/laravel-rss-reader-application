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

```angular2html
composer install
```

```shell
php artisan key:generate
```

```shell
php artisan migrate
```



========================

### Install laravel

```shell
composer create-project --prefer-dist laravel/laravel:^9.0 .
```

```shell
composer require laravel/ui
```

php artisan ui bootstrap --auth

npm install

npm run build


==========================

php artisan make:migration create_rss_urls_table --create=rss_urls
php artisan make:controller RssUrlController --resource --model=RssUrl

php artisan make:migration create_posts_table --create=posts
php artisan make:controller PostController --resource --model=Post

php artisan make:seeder PostSeeder
php artisan make:factory PostFactory