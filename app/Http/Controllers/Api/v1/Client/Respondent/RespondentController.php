<?php

namespace App\Http\Controllers\Api\v1\Client\Respondent;

use App\Http\Controllers\Controller;
use App\Models\Respondent\Respondent;
use App\Models\Respondent\RespondentDiscTest;
use Illuminate\Http\Request;

class RespondentController extends Controller
{
    public function getTest($code)
    {
      try {

        $respondentTest = RespondentDiscTest::where('code', $code)->with('respondent')->firstOrFail();

        $respondentTest->metadata = json_decode($respondentTest->metadata);
        return $this->outputJSON($respondentTest, '', false);

      } catch (\Throwable $th) {
          return $th;
      }
    }
}
