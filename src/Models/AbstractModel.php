<?php

namespace MuharremYildirim\KolayGelsin\Models;

use MuharremYildirim\KolayGelsin\Client;
use MuharremYildirim\KolayGelsin\Traits\Fillable;

abstract class AbstractModel
{
    use Fillable;

    /**
     * client
     *
     * @var Client
     */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
}
