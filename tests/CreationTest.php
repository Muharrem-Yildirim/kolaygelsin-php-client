<?php

declare(strict_types=1);

require dirname(__DIR__, 3) . '/vendor/autoload.php';

use MuharremYildirim\KolayGelsin\Client;
use MuharremYildirim\KolayGelsin\Models\IntegrationShipment;
use MuharremYildirim\KolayGelsin\Models\Response;
use PHPUnit\Framework\TestCase;

final class CreationTest extends TestCase
{
    private function client()
    {
        return new Client(getenv('KOLAYGELSIN_API_KEY'));
    }

    public function testCreateShipment(): void
    {
        $shipment = new IntegrationShipment($this->client());

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
                'CustomerBarcode' => 'ShpItem' . rand(0, 5000),
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
                'CustomerBarcode' => 'ShpItem' . rand(0, 5000),
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

        $this->assertInstanceOf(
            Response::class,
            $response
        );

        $this->assertObjectHasAttribute(
            'ResultCode',
            $response
        );

        $this->assertEquals(
            200,
            $response->ResultCode
        );
    }
}
