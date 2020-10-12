# monday-api-laravel

This Laravel package is a wrapper for [tblack-it/monday-api](https://github.com/tblack-it/monday-api).

## Install

Via Composer

``` bash
$ composer require proclame/monday-api-laravel
```
This package uses autodiscovery, so you don't have to manually add anything to your config/app.php.

### In case you do not use autodiscovery:

Add the ServiceProvider and the Facade to your `config/app.php`:

```php
'providers' => [
  ...
  Proclame\Monday\MondayServiceProvider::class,
],
'aliases' => [
  ...
  'Monday' => Proclame\Monday\MondayFacade::class,
]
```

*OPTIONAL* Then run the following command to publish the config to your config/ directory.
It should be enough to add MONDAY_TOKEN=MYTOKEN to your .env file.

```bash
$ php artisan vendor:publish --tag=config
```

```php
return [
    'monday_token' => 'MYTOKEN', // the token for your tenant on monday.com
];
```

## Usage

``` php
$all_boards = Monday::getBoards();
```

For more usage information, see [tblack-it/monday-api](https://github.com/tblack-it/monday-api)

## Credits

- [Nick Mispoulier][link-author] <nick@proclame.be>

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

[link-author]: https://github.com/proclame
