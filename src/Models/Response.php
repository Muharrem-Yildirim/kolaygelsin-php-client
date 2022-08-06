<?php

namespace MuharremYildirim\KolayGelsin\Models;

use MuharremYildirim\KolayGelsin\Traits\Fillable;

/** 
 * @property mixed $Model
 * @property mixed $Source
 * @property mixed $Target
 * @property mixed $Intent
 * @property mixed $Tag
 * @property mixed $JobOwner
 * @property mixed $JobId
 * @property mixed $Payload
 * @property mixed $ResultCode
 * @property mixed $ResultMessage
 * @property mixed $StepCount
 * @property mixed $Channel
 * @property mixed $Language
 * @property mixed $Location
 */

class Response extends AbstractModel
{
    use Fillable;

    protected $fillable = [
        'Model',
        'Source',
        'Target',
        'Intent',
        'Tag',
        'JobOwner',
        'JobId',
        'Payload',
        'Username',
        'ResultCode',
        'ResultMessage',
        'StepCount',
        'Channel',
        'Language',
        'Location'
    ];

    public function __construct()
    {
    }
}
