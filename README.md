# nCrypt PHP SDK
nCrypt API documentation

This SDK allows you to use [nCrypt](https://ncrypt.site) in your application. It means you can easily create a secure note
inside your application. 

Swagger-CodeGen initially generated part of this SDK, and then it was modified to fit the needs, those codes will
be removed in the next couple of releases as it was my idea to release the first version as soon as possible.

- SDK version: ![version](https://img.shields.io/github/v/release/Ncrypt-Site/php-sdk)

## Requirements

PHP 7.1 and later

## Installation & Usage
### Composer
You can easily install nCrypt SDK via composer:
```bash
composer require ncrypt-site/php-sdk
```

## Getting Started

After installing the SDK, you can use it as the sample below:

```php
use NCrypt\Client\Api\NCryptAPI;
use NCrypt\Client\Library\RequestBuilder\RequestBuilder;

include './vendor/autoload.php';

$api = new NCryptAPI(
    new GuzzleHttp\Client()
);

$requestBuilder = new RequestBuilder();
$request = $requestBuilder->prepareSecureNoteRequest('Your Very Secure Note', 1, false);
try {
    $result = $api->notePost($request->getNoteRequest());
    echo 'Note URL is: ' . $result->getData()->getUrl() . PHP_EOL;
    echo 'You can unseal the note with this key: ' . $request->getSecureNote()->getKey() . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage();
}
```
#### prepareSecureNoteRequest
This method accepts three arguments, just like the fields inside the website.  
|#| Argument        | Type           | Example  |
| ------------- | :-------------: | :-------------: | :----- |
| 1 | $note      | string | Ever have that feeling where you’re not sure if you’re awake or dreaming? |
| 2 | $selfDestruct      | int      |   1 |
| 3 | $destructAfterOpening | boolean     |    true |

##### $selfDestruct acceptable values:
The following numbers are acceptable values for `$selfDestruct` argument, note that the values are based on hour and
will indicate how long we will store the notes on our servers.
```json
[
    1,
    3,
    6,
    12,
    24,
    48,
    72,
    168
]
```
## Issues
currently, there is no known issue, but feel free to open an issue in Github so that I can fix it ASAP.


