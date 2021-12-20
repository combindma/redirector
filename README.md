# Redirection Laravel Package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/combindma/redirector.svg?style=flat-square)](https://packagist.org/packages/combindma/redirector)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/combindma/redirector/run-tests?label=tests)](https://github.com/combindma/redirector/actions?query=workflow%3ATests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/combindma/redirector/Check%20&%20fix%20styling?label=code%20style)](https://github.com/combindma/redirector/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/combindma/redirector.svg?style=flat-square)](https://packagist.org/packages/combindma/redirector)

## Installation

You can install the package via composer:

```bash
composer require combindma/redirector
```

The package will automatically register itself.

Next you must register the `Combindma\Redirector\RedirectsMissingPages`-middleware:
```php
//app/Http/Kernel.php

protected $middleware = [
       ...
       \Combindma\Redirector\RedirectsMissingPages::class,
    ],
```

You must publish and run the migrations with:

```bash
php artisan vendor:publish --tag="redirector-migrations"
php artisan migrate
```

You must publish the config file with:
```bash
php artisan vendor:publish --tag="redirector-config"
```

This is the contents of the published config file:

```php
return [
    /*
     * This is the class responsible for providing the URLs which must be redirected.
     * The only requirement for the redirector is that it needs to implement the
     * `Spatie\MissingPageRedirector\Redirector\Redirector`-interface
     */
    'redirector' => \Combindma\Redirector\UrlsRedirector::class,

    /*
     * By default the package will only redirect 404s. If you want to redirect on other
     * response codes, just add them to the array. Leave the array empty to redirect
     * always no matter what the response code.
     */
    'redirect_status_codes' => [
        \Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND,
    ],

    /*
     * When using the `ConfigurationRedirector` you can specify the redirects in this array.
     * You can use Laravel's route parameters here.
     */
    'redirects' => [
        //        '/non-existing-page' => '/existing-page',
        //        '/old-blog/{url}' => '/new-blog/{url}',
    ],
];
```


## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Combind](https://github.com/combindma)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
