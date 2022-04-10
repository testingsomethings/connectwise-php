# Connectwise PHP Client for Laravel
***USE THIS FORK AT YOUR OWN RISK. FOR EDUCATIONAL PURPOSES ONLY, NOT FOR PRODUCTION**
[![Latest Version on Packagist](https://img.shields.io/packagist/v/acadea/connectwise-php.svg?style=flat-square)](https://packagist.org/packages/acadea/connectwise-php)
[![Build Status](https://img.shields.io/travis/acadea/connectwise-php/master.svg?style=flat-square)](https://travis-ci.org/acadea/connectwise-php)
[![Quality Score](https://img.shields.io/scrutinizer/g/acadea/connectwise-php.svg?style=flat-square)](https://scrutinizer-ci.com/g/acadea/connectwise-php)
[![Total Downloads](https://img.shields.io/packagist/dt/acadea/connectwise-php.svg?style=flat-square)](https://packagist.org/packages/acadea/connectwise-php)


Lightweight and Extensible Connectwise PHP client for Laravel 6.
***USE THIS FORK AT YOUR OWN RISK. FOR EDUCATIONAL PURPOSES ONLY, NOT FOR PRODUCTION**

## Installation

You can install the package via composer:

```bash
composer require acadea/connectwise-php
```

Add the following env variable to .env

```dotenv
CW_COMPANY_ID=
CW_PRIVATEKEY=
CW_PUBLICKEY=

# e.g https://api-au.myconnectwise.net/v4_6_release/apis/3.0/
CW_API_VERSION_BASEURL=
# you can find this at api addr : /v4_6_release/apis/3.0/system/info/locations
CW_HOMEOFFICE_LOCATION=   
CW_CLIENT_ID=

```

## Usage

Easily use the API client. The request method returns a laravel Collection object. 

```php

ConnectwiseClient::request('get', 'company/companies');
ConnectwiseClient::request('get', 'company/companies/1');
ConnectwiseClient::request('post', 'company/companies', $payloadArray);
ConnectwiseClient::request('patch', 'company/companies/1', $payloadArray);
ConnectwiseClient::request('delete', 'company/companies/1');

```

Or use the Connectwise Class. Conveniently preloaded with 'get', 'create', 'update', 'find', 'delete' and 'count' methods

```php
$cw = new Connectwise('company/companies');
$collection = $cw->get([
  'conditions'=> "identifier='XYZTestCompany'"
])

$collection = $cw->update( $id,
  [
      [
          'op' => 'replace',
          'path' => 'phoneNumber',
          'value' => '054684321',
      ],
      [
          'op'   => 'replace',
          'path' => 'city',
          'value' => 'heya',
      ],
  ]

$collection = $cw->delete($id);

$collection = $cw->find($id);

$int = $cw->count($filter);

```

#### Extends the Connectwise class to create your own endpoint client

Make sure to include the uri property to customise the endpoint. 
```php
use Acadea\Connectwise;

class Company extends Connectwise
{
    protected $uri = "company/companies"

    public function getInvoices()
    {
        // ....
    }
}

```


### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email hello@acadea.com.au instead of using the issue tracker.


## Credits

- [Sam Ngu](https://github.com/sam-ngu)
- [All Contributors](../../contributors)

## About us

Acadea is a technology-focused company based in Perth, Western Australia. Our primary focus is on web development and software integrations!
On top of that we also teach people about technology and programming.

##### [Visit our Website](https://acadea.com.au)

##### [Contact us: hello@acadea.com.au](mailto:hello@acadea.com.au)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
***USE THIS FORK AT YOUR OWN RISK. FOR EDUCATIONAL PURPOSES ONLY, NOT FOR PRODUCTION**
