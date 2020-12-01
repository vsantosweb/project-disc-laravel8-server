<?php

namespace App\Http\Controllers\Api\v1\Client\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\Customer\CustomerDiscSession;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerDiscSessionController extends Controller
{
    public function hashLogged(Request $request)
    {
        if(!is_null($request->query('token')) && !is_null($request->query('uuid'))){

            $customer = Customer::where('uuid', $request->query('uuid'))->first();
            $session = CustomerDiscSession::where('token',  $request->query('token'))->first();

            if(is_null($customer) || is_null($session)){

                return $this->outputJSON('', 'Unauthorized', false, 401);
            }

            return $this->outputJSON($customer, '', false, 200);
        }
        return $this->outputJSON('', 'Bad Request', true, 401);
    }

    public function hashLogout(Request $request)
    {
        if(!is_null($request->query('token')) && !is_null($request->query('uuid'))){

            $customer = Customer::where('uuid', $request->query('uuid'))->first();
            $session = CustomerDiscSession::where('token',  $request->query('token'))->first();

            if(is_null($customer) || is_null($session)){

                return $this->outputJSON('', 'Unauthorized', false, 401);
            }
            $session->token = Str::random(60);
            $session->save();
            return $this->outputJSON('', 'Session closed', false, 200);
        }
        return $this->outputJSON('', 'Bad Request', true, 401);
    }

    public function getToken()
    {
        $session = new CustomerDiscSession;

       return $session->createToken(Customer::find(1));
    }
}
