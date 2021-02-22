<?php

require_once __DIR__ . '/vendor/autoload.php';

use BWnek\TransferManagerLite\Clients\Curl\CurlClient;
use BWnek\TransferManagerLite\Clients\Curl\CurlLibraryFacade;
use BWnek\TransferManagerLite\TransferManager;
use Nyholm\Psr7\Factory\Psr17Factory;


// a PSR7 implementation of your choice
$psr17MotherFactory = new Psr17Factory();

$transferClient = new CurlClient(
    new CurlLibraryFacade(),
    $psr17MotherFactory,
    $psr17MotherFactory,
);
$transferManager = new TransferManager($psr17MotherFactory, $transferClient);




$response = $transferManager->get('https://vpic.nhtsa.dot.gov/api/vehicles/GetWMIsForManufacturer/hon?format=json');
$responseCode = $response->getStatusCode();
$responseBody = $response->getBody();

echo $responseBody;