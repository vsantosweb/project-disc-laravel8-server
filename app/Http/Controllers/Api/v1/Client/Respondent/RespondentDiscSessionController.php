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

        $location =  \Location::get('45.166.9.160');

        $session = RespondentDiscSession::where('token',  $request->query('token'))->first();

        if (is_null($session)) {
            return $this->outputJSON([], 'Invalid session', false, 401);
        }

        $session->update([
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'active' => true,
            'geolocation' => $location->longitude .', ' . $location->latitude,
        ]);
        
        return $this->outputJSON($session->with('respondent')->get(), '', false, 200);
    }

    public function hashLogout(Request $request)
    {
        $location =  \Location::get('45.166.9.160');

        $session = RespondentDiscSession::where('token',  $request->query('token'))->first();

        if (is_null($session)) {
            return $this->outputJSON([], 'Invalid session', false, 401);
        }

        $session->update([
            'token' => Str::random(60),
            'user_agent' => $request->userAgent(),
            'active' => false,
            'was_finished' => true,
            'geolocation' => $location->longitude .', ' . $location->latitude,
        ]);
        
        return $this->outputJSON($session->with('respondent')->first(), '', false, 200);

    }
}
