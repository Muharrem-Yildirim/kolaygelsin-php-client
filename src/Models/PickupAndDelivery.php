<?php

namespace MuharremYildirim\KolayGelsin\Models;

use MuharremYildirim\KolayGelsin\Traits\Postable;

/** 
 * @property mixed $ShipmentId
 * @property mixed $DeliveryCancellationReason
 */
class PickupAndDelivery extends AbstractModel
{
    use Postable;

    protected $fillable = [
        'ShipmentId',
        'DeliveryCancellationReason'
    ];

    protected $endpoint = 'CancelPickupAndDelivery';
}
