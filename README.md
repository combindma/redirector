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

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Combindma\Redirector\RedirectorServiceProvider" --tag="redirector-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Combindma\Redirector\RedirectorServiceProvider" --tag="redirector-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Combind](https://github.com/combindma)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
