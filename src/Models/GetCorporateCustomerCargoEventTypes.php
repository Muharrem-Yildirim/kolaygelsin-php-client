<?php

namespace MuharremYildirim\KolayGelsin\Models;

use MuharremYildirim\KolayGelsin\Traits\Postable;

class CorporateCustomerCargoEventTypes extends AbstractModel
{
    use Postable;

    protected $endpoint = 'GetCorporateCustomerCargoEventTypes';
}
