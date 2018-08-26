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

Response,

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

**Set headers,**

``` php
return Responder::setHeaders([
	'header1' => 'value1',
	'header2' => 'value2'
])->respond([
	'first_name' => 'John',
	'last_name' => 'Doe',
]);
```

**Change `success` value,**

Default : `true`

``` php
return Responder::setSuccess(false)->respond('Failed!');
```

**Change status code,**

Default : `200`

``` php
return Responder::setStatusCode(202)->respond('My message!');
```

Response,

```
{
  "success": true,
  "status": "Accepted",
  "data": "My message!"
}
```

**Chnage data wrapper**

Default : `data`

``` php
return Responder::setWrapper('contents')->respond(['name' => 'John']);
```

Response,
```
{
  "success": true,
  "status": "OK",
  "contents": {
    "name": "John"
  }
}
```

**Responding errors**

``` php
return Responder::setErrors([
	'Error 1',
	'Error 2',
])->respond();
```

Response,

``` json
{
  "success": false,
  "status": "OK",
  "errors": [
    "Error 1",
    "Error 2"
  ]
}
```




# More details coming soon...