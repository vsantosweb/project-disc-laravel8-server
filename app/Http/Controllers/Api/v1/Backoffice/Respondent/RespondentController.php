<?php

namespace App\Http\Controllers\Api\v1\Backoffice\Respondent;

use App\Http\Controllers\Controller;
use App\Models\Respondent\Respondent;
use Illuminate\Http\Request;

class RespondentController extends Controller
{
    public function __construct(Respondent $respondent)
    {
        $this->respondent = $respondent;
    }

    public function getTest($uuid)
    {
        return 'ok';
    }
}
