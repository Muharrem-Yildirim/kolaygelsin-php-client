<?php

namespace MuharremYildirim\KolayGelsin\Traits;

use MuharremYildirim\KolayGelsin\Models\Response;

trait Postable
{
    /**
     * post
     *
     * @return AbstractModel
     */
    public function post()
    {
        return (new Response())->fill(
            array_merge(
                ['Model' => get_class($this)],
                json_decode($this->client->sendRequest($this->endpoint, $this->getFillables(), 'POST')->getBody()->getContents(), true)
            )
        );
    }
}
