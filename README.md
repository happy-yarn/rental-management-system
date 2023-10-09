## About

A simple rental management system to reduce background jobs and ease of manage tenant profile and tracking of payments, complains, maintenance and so on...

### Requirements
To run this application you need to have:
- PHP Version: `^8.2`
- Exif PHP Extension
- GD PHP Extension
- Imagick PHP Extension
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Fileinfo PHP extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- [Redis](https://pecl.php.net/package/redis)

### Official and third-party libraries
List of used packages:

- [Laravel Sanctum](https://laravel.com/docs/10.x/sanctum) for SPA authentication.
- [Laravel IDE Helper Generator](https://github.com/barryvdh/laravel-ide-helper) to generate accurate autocompletion.
- [Laravel Telescope](https://laravel.com/docs/10.x/telescope) provides insight into the requests coming into your application, exceptions, log entries, database queries, queued jobs, mail, notifications, cache operations, scheduled tasks, variable dumps, and more.
- [Laravel Horizon](https://laravel.com/docs/10.x/horizon) provides a beautiful dashboard and code-driven configuration for your Laravel powered Redis queues. Horizon allows you to easily monitor key metrics of your queue system such as job throughput, runtime, and job failures.
- [Laravel Pint](https://laravel.com/docs/10.x/pint) is an opinionated PHP code style fixer for minimalists. Pint is built on top of PHP-CS-Fixer and makes it simple to ensure that your code style stays clean and consistent.
- [Predis](https://github.com/predis/predis) A flexible and feature-complete Redis client for PHP.
- [Laravel Media Library](https://github.com/spatie/laravel-medialibrary) Associate files with Eloquent models.
- [flysystem aws s3](https://github.com/thephpleague/flysystem-aws-s3-v3) Flysystem Adapter for AWS SDK V3

### Getting started
Please read and ask if It's not clear from environment setup and development

#### Clone the project
There is different of way cloning the project with https, ssh and cli.

**Clone through web**
`git clone https://github.com/happy-yarn/rental-management-system.git`

**Clone through ssh**
`git clone git@github.com:happy-yarn/rental-management-system.git`

**Clone through cli**
`gh repo clone happy-yarn/rental-management-system`

**Create environment file**
On `project` directory create `.env` and copy the `.env.example_using_docker` (Applicable for WSL2 with Docker Desktop) If purely windows copy the `.env.example` and paste everything on `.env`

#### Environment setup
We might have different environment some might use, If you choose not to use WSL2 with Windows It's ok as long It runs.

#### Windows with WSL2

- You can watch how to setup WSL2 [here](https://www.youtube.com/watch?v=n-J9438Mv-s)
- Download [Docker Desktop](https://www.docker.com/products/docker-desktop/)

#### Purely windows

- Download and install [Laragon Full](https://laragon.org/download/index.html)
- Update [PHP Version to 8.2](https://pen-y-fan.github.io/2023/01/15/how-to-update-the-php-version-in-laragon/)
- Enable all the required PHP extensions
- Disabled apache and enable nginx
- Update nginx directory root to `C:\project-path\public`
- Download and install [composer](https://getcomposer.org/download/)
- Add PHP to your [environment variable](https://learn.microsoft.com/en-us/iis/application-frameworks/install-and-configure-php-on-iis/install-and-configure-php)

### Work on project
Assuming above is done, open your command line and navigate to your path e.g. `cd C:\project-path` or on WSL open Ubuntu app and navigate to your cloned repository.

On command line write `php artisan generate:key` to generate `APP_KEY`

#### Understanding environment file
As you notice we have a file `.env` and directory `config` that contains **PHP** files as these files read the `.env`

**The database (Only for purely windows)**
Create your database using phpmyadmin or your favorite MySQL GUI and configure above.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
Change the redis configuration as well. Mostly just the `REDIS_HOST`
```
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
REDIS_TLS=false
```

#### Running commands
Everything is setup and It's time to test if everything is working.

```
composer install
yarn
php artisan telescope:install
php artisan horizon:install
php artisan migrate
```
With this It will install Laravel framework and front end dependencies and will generate your database table.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
