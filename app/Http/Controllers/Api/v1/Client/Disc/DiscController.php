<?php

namespace App\Http\Controllers\Api\v1\Client\Disc;

use App\Http\Controllers\Api\v1\Backoffice\Disc\DiscController as DiscDiscController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscController extends DiscDiscController
{
    public function questions()
    {
        return $this->outputJSON($this->discQuestion->with('options')->get(),'', false);
    }

    public function questionShow($uuid)
    {
        return $this->outputJSON($this->discQuestion->where('uuid', '$uuid')->with('options')->get(),'', false);
    }
}
