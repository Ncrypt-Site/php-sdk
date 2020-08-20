<?php

use NCrypt\Client\Api\NCryptAPI;
use NCrypt\Client\Library\RequestBuilder\RequestBuilder;

include __DIR__ . '/../vendor/autoload.php';

$api = new NCryptAPI(
    new GuzzleHttp\Client()
);

$requestBuilder = new RequestBuilder();
$request = $requestBuilder->prepareSecureNoteRequest('Farshad Nematdoust', 1, false);
try {
    $result = $api->notePost($request->getNoteRequest());
    echo 'Note URL is: ' . $result->getData()->getUrl() . PHP_EOL;
    echo 'You can unseal the note with this key: ' . $request->getSecureNote()->getKey() . PHP_EOL;
} catch (Exception $e) {
    echo $e->getMessage();
}
