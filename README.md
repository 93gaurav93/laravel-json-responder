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

``` json
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

``` json
{
  "success": true,
  "status": "Accepted",
  "data": "My message!"
}
```

**Change data wrapper**

Default : `data`

``` php
return Responder::setWrapper('contents')->respond(['name' => 'John']);
```

Response,
``` json
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

### Helpers

**Respond success without data,**
``` php
Responder::respondSuccess(int $statusCode = 200);
```

**Respond `false` success without data,**
``` php
Responder::respondFailed(int $statusCode = 200);
```

**Respond errors,**
``` php
Responder::respondErrors(array $errors = [], int $statusCode = 200);
```

**Respond common errors,**

``` php
Responder::respondUnauthorizedError($message = 'Unauthorized!');
```
``` php
Responder::respondForbiddenError($message = 'Forbidden!');
```
``` php
Responder::respondNotFound($message = 'Not Found!');
```
``` php
Responder::respondInternalError($message = 'Internal Error!');
```
``` php
Responder::respondServiceUnavailable($message = 'Service Unavailable!'');
```

**Responding validation errors,**

``` php

use GauravD\LaravelJsonResponder\Facades\Responder;
use Illuminate\Support\Facades\Validator;

...

$validator = Validator::make([], ['first_name' => 'required', 'last_name' => 'required']);
return Responder::respondValidationErrors($validator);

```

Response,
``` json
{
  "success": false,
  "status": "OK",
  "errors": {
    "validation": {
      "first_name": [
        "The first name field is required."
      ],
      "last_name": [
        "The last name field is required."
      ]
    }
  }
}
```



# More details coming soon...