<?php

namespace MuharremYildirim\KolayGelsin\Models;

use MuharremYildirim\KolayGelsin\Traits\Postable;

/** 
 * @property mixed $RecipientType
 * @property mixed $Address
 * @property mixed $RecipientTaxIdentityNumber
 * @property mixed $Email
 * @property mixed $RecipientTitle
 * @property mixed $OnlyDeliverToRecipient
 * @property mixed $SaveOutOfCoverage
 */

class Recipient extends AbstractModel
{
    use Postable;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'RecipientType',
        'Address',
        'RecipientTaxIdentityNumber',
        'Email',
        'RecipientTitle',
        'Gsm',
        'OnlyDeliverToRecipient',
        'SaveOutOfCoverage',
    ];

    protected $endpoint = 'SaveRecipient';
}
