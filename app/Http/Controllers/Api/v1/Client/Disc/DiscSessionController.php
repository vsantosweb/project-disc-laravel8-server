<?php

namespace App\Http\Controllers\Api\v1\Client\Disc;

use App\Http\Controllers\Controller;
use App\Mail\mailToOwners;
use App\Models\Customer\Customer;
use App\Models\Disc\DiscCombination;
use App\Models\Disc\DiscProfile;
use App\Models\Disc\DiscRanges;
use App\Models\Respondent\Respondent;
use App\Models\Respondent\RespondentDemograph;
use App\Models\Respondent\RespondentDemographic;
use App\Models\Respondent\RespondentDiscTest;
use App\Notifications\TestFinished;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class DiscSessionController extends DiscController
{
    public function start(Request $request)
    {

        // return $sesion->createToken(Customer::find(1));

        $newDiscSession =  $this->discSession->firstOrCreate([
            'uuid' => Str::uuid(),
            'expire_at' => now()->addMinutes(60),
            'has_finished' => 0,
            'active' => 1,
        ]);

        $newDiscSession->graph()->create([
            'uuid' => Str::uuid(),
            'graphs' => json_decode(str_replace(array("\r", "\n", " "), "", '{
                "items": [{
                        "graphName": "less",
                        "graphLetters": {
                            "D": ' . 0 . ',
                            "I":' . 0 . ',
                            "S": ' . 0 . ',
                            "C": ' . 0 . '
                        }
                    },
                    {
                        "graphName": "more",
                        "graphLetters": {
                            "D": ' . 0 . ',
                            "I":' . 0 . ',
                            "S": ' . 0 . ',
                            "C": ' . 0 . '
                        }
                    },
                    {
                        "graphName": "difference",
                        "graphLetters": {
                            "D": ' . 0 . ',
                            "I":' . 0 . ',
                            "S": ' . 0 . ',
                            "C": ' . 0 . '
                        }
                    }
                ]
            }'))
        ]);

        return $this->outputJSON($newDiscSession->with('graph')->find($newDiscSession->id), '', false);
    }

    public function finish(Request $request)
    {
        $graphs = $request->graphs['items'];

        for ($i = 0; $i < count($graphs); $i++) {
            foreach ($graphs[$i]['graphLetters'] as $letter => $value) {
                foreach (DiscRanges::all() as $discRanges) {
                    if ($discRanges->graphType->name == $graphs[$i]['graphName']) {
                        foreach ($discRanges->range as $rangeIntensity) {
                            if ($letter == $discRanges->disc->letter) {
                                if (false !== array_search($value, $rangeIntensity->range)) {
                                    $profile[$graphs[$i]['graphName']][] = $discRanges->segment->number;
                                    $intensities[$graphs[$i]['graphName']][] =  $rangeIntensity->intensity;
                                }
                            }
                        }
                    }
                }
            }
        }

        if (count($profile['difference']) < 4) {

            return 'Combinação inválida';
        }

        $code = $profile['difference'][0] . $profile['difference'][1] . $profile['difference'][2] . $profile['difference'][3];

        $combination = DiscCombination::where('code', $code)->with('profile', 'category')->first();
        $combination->intensities = $intensities;
        $combination->graphs = $request->graphs['items'];

        if ($combination->disc_profile_id == 3 || $combination->disc_profile_id == 4 || $combination->disc_profile_id == 5) {
            return $this->outputJSON('Desvio', '', true, 200);
        }

        $respondent = Respondent::where('uuid', $request->respondent_uuid)->firstOrFail();

        $respondentTest = RespondentDiscTest::where('code', $request->disc_test_code)->where('was_finished', 0)->firstOrFail();

        $respondentTest->update([
            'metadata' => $combination,
            'was_finished' => 1,
            'ip' => $request->ip()
        ]);

        if ($request->demographic_data) {

            $newDemograph = RespondentDemographic::create($request->demographic_data);
            $newDemograph->metadata = ['intensities ' => $combination->intensities, $combination->graphs, $combination->profile->name . ' ' . $combination->category->name];
            $newDemograph->save();
        }

        if (!empty($respondent->list->settings->ownerMailList)) {
            Notification::route('mail', $respondent->list->settings->ownerMailList)->notify(new TestFinished($respondentTest));
        }

        return $this->outputJSON($combination, '', false);
    }
}
