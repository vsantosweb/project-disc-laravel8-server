<?php

namespace App\Http\Controllers\Api\v1\Client\Customer;

use App\Http\Controllers\Controller;
use App\Models\Disc\Disc;
use Illuminate\Http\Request;

class CustomerDiscController extends Controller
{
    public function create(Request $request)
    {
        $disc = new Disc;

        return $this->outputJSON($disc->generateTestDiscToList($request->respondent_lists), 'Envio para listas realizado com sucesso!', false, 200);
    }
}
