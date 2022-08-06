<?php

namespace MuharremYildirim\KolayGelsin\Models;

/** 
 * @property mixed $ShipmentIdList
 * @property mixed $CustomerSpecificCodeList
 * @property mixed $CustomerBarcodeList
 * @property mixed $CustomerTrackingIdList
 * @property mixed $CustomerTrackingIdList
 * @property mixed $OnlyLatestEvents
 */
class CorporateShipmentsStatus extends AbstractModel
{
    protected $fillable = [
        'ShipmentIdList',
        'CustomerSpecificCodeList',
        'CustomerBarcodeList',
        'CustomerTrackingIdList',
        'OnlyLatestEvents'
    ];

    protected $endpoint = 'GetCorporateShipmentsStatus';
}
