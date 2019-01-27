<h2>Client registration cli app</h2>

<p>Install composer dependencies: $composer install</p>
<p>Create a copy of .env file: $cp .env.example .env<p>
<p>Generate an app encryption key : $php artisan key:generate</p>
<p>Create an empty database for our application</p>
<p>In the .env file, add database information (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD)</p>
<p>Migrate the database: $php artisan migrate</p>

<h5>Client registration commands:</h5>

<p>To see the list of commands run: $php artisan list</p>
<div>
    <ul>
        <li>$php artisan client:add</li>
        <li>$php artisan client:find</li>
        <li>$php artisan client:list</li>
        <li>$php artisan client:update</li>
        <li>$php artisan client:delete</li>
    </ul>
</div>
<p>Run unit tests: $vendor/bin/phpunit </p> 

<p>Import csv file: $php artisan import:csv</p>

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
