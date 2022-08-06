# kolaygelsin-php-client

[Kolaygelsin](https://kolaygelsin.com/) cargo client for PHP.

## Installation

The package is available via composer:

```Bash
$ composer require muharremyildirim/kolaygelsin-php-client
```

### Dependencies

- [Guzzle](https://packagist.org/packages/guzzlehttp/guzzle)
- [PHPUnit](https://packagist.org/packages/phpunit/phpunit)

## Basic Usage

For more examples please check out `/examples` (@@todo) folder.

### Create a new Shipment

```php
$client = new Client('PUT_YOUR_TOKEN_HERE');

$shipment = new IntegrationShipment($client);

$shipment->ShipmentItemList = [
    [
        'Width' => 10,
        'Length' => 20,
        'Height' => 30,
        'Weight' => 1,
        'ContentText' => 'Detay',
        'DeliveryNote' => 'Müşteri İrsaliye Numarası',
        'DeliveryNoteDate' => '2018-07-19T00:00:00+03:00',
        'HasCommercialValue' => true,
        'CustomerBarcode' => 'ShpItem1',
        'CustomerTrackingId' => 'ABC123456'
    ],
    [
        'Width' => 10,
        'Length' => 20,
        'Height' => 30,
        'Weight' => 1,
        'ContentText' => 'Detay',
        'DeliveryNote' => 'Müşteri İrsaliye Numarası',
        'DeliveryNoteDate' => '2018-07-19T00:00:00+03:00',
        'HasCommercialValue' => true,
        'CustomerBarcode' => 'ShpItem2',
        'CustomerTrackingId' => 'ABC123456'
    ]
];
$shipment->Recipient =  [
    'RecipientId' => 45
];
$shipment->SenderCustomer =  [
    'Address' => [
        'AddressId' => 4389
    ],
    'CustomerId' => 2124
];
$shipment->PayingParty = 1;
$shipment->PackageType = 2;
$shipment->OnlyDeliverToRecipient = true;
$shipment->CustomerSpecificCode = 'Shp1';

$response = $shipment->post();

var_dump($response,$response->Payload);
```

### Example Response:

```php
^ MuharremYildirim\KolayGelsin\Models\Response {#4 ▼
  +"Model": "MuharremYildirim\KolayGelsin\Models\IntegrationShipment"
  +"Source": ""
  +"Target": "APIReadQ"
  +"Intent": null
  +"Tag": null
  +"JobOwner": "APIReadQ"
  +"JobId": "ESUBEBETA-2022-08-06-08-39-03-28725.886"
  +"Payload": array:4 [▼
    "ShipmentId" => 70000
    "CustomerSpecificCode" => "Shp1"
    "ShipmentItemLabelList" => array:2 [▶]
    "ShipmentTrackingLink" => "https://esubebeta.klyglsn.com/shipment"
  ]
  +"Username": "-"
  +"ResultCode": 200.0
  +"ResultMessage": ""
  +"StepCount": 0
  +"Channel": "Integration"
  +"Language": null
  +"Location": null
}
```

### Add a new Recipient

```php
$client = new Client('PUT_YOUR_TOKEN_HERE');

$recipient = new Recipient($client);

$recipient->RecipientType = 2;
$recipient->Address =
    array(
        'CityId' => 34,
        'TownName' => 'Sancaktepe',
        'AddressTypeId' => 2,
        'AddressText' => 'Ekol Lojistik İmam Hatip Cd. Eyüp Sultan Mah. Sancaktepe İstanbul',
        'BuildingNumber' => 1,
        'FloorNumber' => 1,
        'DoorNumber' => 1,
        'BuldingName' => 'Ekol',
        'PostalCode' => '34500',
        'CompanyTitle' => 'Ekol Lojistik',
        'CompanyDepartment' => 'Kargo',
        'Direction' => 'Ekol lojistik lavinya tesisi samandıra',
    );
$recipient->RecipientTaxIdentityNumber = '1234567891';
$recipient->Email = 'ekol@ekol.com';
$recipient->RecipientTitle = 'Ekol Lojistik AŞ';
$recipient->Gsm = '123457890';
$recipient->OnlyDeliverToRecipient = false;
$recipient->SaveOutOfCoverage = false;

var_dump($recipient->post());
```

### Testing

This package uses [PHPUnit](https://packagist.org/packages/phpunit/phpunit) library for unit testing. You can do run tests with these commands:

For Unix:

```bash
export KOLAYGELSIN_API_KEY='YOUR_API_KEY' && ./vendor/bin/phpunit ./tests
```

For Windows:

```bash
set KOLAYGELSIN_API_KEY='YOUR_API_KEY' && ./vendor/bin/phpunit ./tests
```
