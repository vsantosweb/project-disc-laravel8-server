<?php

namespace App\Http\Controllers\Api\v1\Client\Customer;

use App\Http\Controllers\Controller;
use App\Models\Disc\Disc;
use App\Models\Respondent\RespondentDiscTest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerDiscController extends Controller
{
    public function create(Request $request)
    {
        $disc = new Disc;

        try {
            return $this->outputJSON($disc->generateTestDiscToList($request->respondent_lists), 'Envio para listas realizado com sucesso!', false, 200);
        } catch (\Exception $e) {
            return $this->outputJSON('', $e->getMessage(), false, 400);
        }
    }

    public function filter(Request $request)
    {
        $discTestQuery =  DB::table('respondent_disc_tests AS test')
            ->select('test.code as disc_test_code', 'test.was_finished', 'test.created_at', 'test.updated_at', 'respondent.name', 'respondent.email')
            ->join('respondents AS respondent', 'test.respondent_id', '=', 'respondent.id')
            ->join('customers AS customer', 'customer.id', 'respondent.customer_id')->where('respondent.customer_id', auth()->user()->id);

        $discTestQuery = isset($request->was_finished) ? $discTestQuery->where('was_finished', $request->was_finished) : $discTestQuery;
        $discTestQuery = isset($request->email) ? $discTestQuery->where('respondent.email', $request->email) : $discTestQuery;

        return $this->outputJSON($discTestQuery->paginate(25), '', false);
    }
}
