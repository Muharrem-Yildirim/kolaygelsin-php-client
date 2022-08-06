<?php

namespace MuharremYildirim\KolayGelsin\Models;

use MuharremYildirim\KolayGelsin\Traits\Postable;

/** 
 * @property mixed $DocumentId
 * @property mixed $DocumentType
 */
class DocumentForHistory extends AbstractModel
{
    use Postable;

    protected $fillable = [
        'DocumentId',
        'DocumentType'
    ];

    protected $endpoint = '/GetDocumentForHistory';
}
