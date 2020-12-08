<?php

namespace App\Http\Controllers\Api\v1\Client\Respondent;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\Respondent\Respondent;
use App\Models\Respondent\RespondentDiscSession;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RespondentDiscSessionController extends Controller
{
    public function hashLogged(Request $request)
    {
        if(!is_null($request->query('token')) && !is_null($request->query('uuid'))){

            $session = RespondentDiscSession::where('token',  $request->query('token'))->first();
            $respondent = Respondent::where('email', $session->email)->first();

            if(is_null($respondent) || is_null($session)){

                return $this->outputJSON('', 'Unauthorized', false, 401);
            }

            return $this->outputJSON($respondent, '', false, 200);
        }

        return $this->outputJSON('', 'Bad Request', true, 401);
    }

    public function hashLogout(Request $request)
    {
        if(!is_null($request->query('token')) && !is_null($request->query('uuid'))){

            $session = RespondentDiscSession::where('token',  $request->query('token'))->first();
            $respondent = Respondent::where('uuid', $session->email)->first();

            if(is_null($respondent) || is_null($session)){

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
        $session = new RespondentDiscSession;

       return $session->createToken(Respondent::find(1));
    }
}
