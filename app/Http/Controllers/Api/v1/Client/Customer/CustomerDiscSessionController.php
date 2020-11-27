<?php

namespace App\Http\Controllers\Api\v1\Client\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\Customer\CustomerDiscSession;
use Illuminate\Http\Request;

class CustomerDiscSessionController extends Controller
{
    public function checkSessionHash(Request $request)
    {
        if(!is_null($request->query('token')) && !is_null($request->query('uuid'))){

            $customer = Customer::where('uuid', $request->query('uuid'))->first();
            $session = CustomerDiscSession::where('token',  $request->query('token'))->first();

            if(is_null($session) && is_null($session)){
                return $this->outputJSON('', 'Invalid Session', false, 401);
            }

            return $this->outputJSON($customer, '', false, 200);
        }
        return $this->outputJSON('', 'Bad Request', true, 400);

    }
}
