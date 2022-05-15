# 🛠 Eloquent utilities for improved DX

[![Latest Version on Packagist](https://img.shields.io/packagist/v/dive-be/eloquent-utils.svg?style=flat-square)](https://packagist.org/packages/dive-be/eloquent-utils)


This package provides declarative versions for some of the common tasks when dealing with `Eloquent` models, 
and also a couple of other goodies.

## Installation

You can install the package via composer:

```bash
composer require dive-be/eloquent-utils
```

## Usage

Again, the primary purpose is to provide a **declarative** interface for frequent **imperative** tasks.
The added benefit is that a person skimming through the model can immediately see what's going on due to the declarative nature.

### DisablesTimestamps

Disables the `created_at` and `updated_at` auto-updates.

```php
class Country extends Model
{
    use \Dive\Eloquent\DisablesTimestamps;
}
```

### Unguarded

Disables [mass assignment](https://laravel.com/docs/9.x/eloquent#mass-assignment) on a **per model basis**.

```php
class Product extends Model
{
    use \Dive\Eloquent\Unguarded;
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email oss@dive.be instead of using the issue tracker.

## Credits

- [Muhammed Sari](https://github.com/mabdullahsari)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
