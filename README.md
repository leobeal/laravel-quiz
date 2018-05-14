# LaravelQuiz

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

LaravelQuiz is a simple Questions package.

## Installation

Via Composer



## Instalation

``` bash
composer require leobeal/laravelquiz
```

In Laravel 5.5 the service provider will automatically get registered. In older versions of the framework just add the service provider in config/app.php file:

```php
'providers' => [
    // ...
    Leobeal\LaravelQuiz\QuizServiceProvider::class,
];
```

You can publish the config with:

```bash
php artisan vendor:publish --provider="Leobeal\LaravelQuiz\QuizServiceProvider"
```

Change `config/quiz.php` according to your needs.

* The migrations won't be published and will be executed from the vendor folder.

After changing the config, run the migrations

```bash
php artisan migrate
```

Add the Quizzable Trait to your model

>```php
>use Illuminate\Database\Eloquent\Model;
>use Leobeal\LaravelQuiz\Model\Quizzable;
>
>class Course extends Model
>{
>    use Quizzable;
>
>    // ...
>}
>```

## License

This package is open-sourced software licensed under the MIT license.

[ico-version]: https://img.shields.io/packagist/v/leobeal/laravelquiz.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/leobeal/laravelquiz.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/leobeal/laravelquiz/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/leobeal/laravelquiz
[link-downloads]: https://packagist.org/packages/leobeal/laravelquiz
[link-travis]: https://travis-ci.org/leobeal/laravelquiz
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/leobeal
[link-contributors]: ../../contributors]