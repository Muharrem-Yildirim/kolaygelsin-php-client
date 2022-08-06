<?php

namespace MuharremYildirim\KolayGelsin\Models;

use MuharremYildirim\KolayGelsin\Traits\Postable;

/** 
 * @property mixed $ShipmentItemList
 * @property mixed $Recipient
 * @property mixed $SenderCustomer
 * @property mixed $PayingParty
 * @property mixed $PackageType
 * @property mixed $OnlyDeliverToRecipient
 * @property mixed $CustomerSpecificCode
 */
class IntegrationShipment extends AbstractModel
{
    use Postable;

    protected $fillable = [
        'ShipmentItemList',
        'Recipient',
        'SenderCustomer',
        'PayingParty',
        'PackageType',
        'OnlyDeliverToRecipient',
        'CustomerSpecificCode'
    ];

    protected $endpoint = 'SaveIntegrationShipment';
}
