# Laravel JSON Responder

A simple class to help you structure the JOSN response data.

## Install

``` bash
composer require 93gaurav93/laravel-json-responder
```

## Usage

``` php
use GauravD\LaravelJsonResponder\Facades\Responder;
...

return Responder::respond([
	'first_name' => 'John',
	'last_name' => 'Doe',
]);

```

Above will respond,

```
{
  "success": true,
  "status": "OK",
  "data": {
    "first_name": "John",
    "last_name": "Doe"
  }
}
```

# More details coming soon...