# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/busha/busha-pay-laravel.svg?style=flat-square)](https://packagist.org/packages/busha/busha-pay-laravel)
[![Build Status](https://img.shields.io/travis/busha/busha-pay-laravel/master.svg?style=flat-square)](https://travis-ci.org/bushaHQ/busha-pay-laravel)
[![Quality Score](https://img.shields.io/scrutinizer/g/busha/busha-pay-laravel.svg?style=flat-square)](https://scrutinizer-ci.com/g/busha/busha-pay-laravel)
[![Total Downloads](https://img.shields.io/packagist/dt/busha/busha-pay-laravel.svg?style=flat-square)](https://packagist.org/packages/busha/busha-pay-laravel)

This is where your description should go. Try and limit it to a paragraph or two, and maybe throw in a mention of what PSRs you support to avoid any confusion with users and contributors.

## Installation

You can install the package via composer:

```bash
composer require busha/busha-pay-laravel
```

##Configuration
You can publish the configuration file via this command

```bash
php artisan vendor:publish --provider="Busha\BushaPay\BushaPayServiceProvider"
```

## Usage
In your .env file and add your api key, api version and api url, see example below:

```env
BUSHAPAY_API_KEY=xxxxxxxxxxxxx
BUSHAPAY_API_VERSION=2019-06-30
BUSHAPAY_API_URL=https://api.pay.busha.co
```

#### To list all charges https://docs.api.pay.busha.co/#list-charges
```php
 BushaPay::listCharge()->getData();
 // To list with pagination and limit
 $page = 2;
 $limit = 20
 BushaPay::listCharge($page, $limit)->getData();
```

#### To show a charge
```php
 // Pass in the Charge Id or Charge Code
 BushaPay::showCharge($charge)->getData();
```

#### To create a charge
```php
 $charge = BushaPay::createCharge($data); // Returns a Charge Response
 // Interacting with the response
 $charge->getAddresses(); // Returns addresses
 $charge->getPricing(); // Returns pricing
 $charge->getChargeId(); // Returns id
 $charge->getChargeCode(); //Returns code
 // To redirect to host payment page
 $charge->redirectNow();
```

#### To cancel or resole a charge
```php
  BushaPay::cancelCharge($id);
  BushaPay::resolveCharge($id); 
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email wisdomanthoni@gmail.com instead of using the issue tracker.

## Credits

- [Wisdom Ebong](https://github.com/busha)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).