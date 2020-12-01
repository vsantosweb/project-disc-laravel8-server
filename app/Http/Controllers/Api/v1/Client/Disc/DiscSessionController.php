<?php

namespace App\Http\Controllers\Api\v1\Client\Disc;

use App\Http\Controllers\Controller;
use App\Models\Disc\DiscCombination;
use App\Models\Disc\DiscProfile;
use App\Models\Disc\DiscRanges;
use App\Models\Respondent\Respondent;
use Illuminate\Http\Request;
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
        $graphDiff = $request->graphs['items'][2];

        foreach ($graphDiff['graphLetters'] as $letter => $result) {

            foreach (DiscRanges::all() as $discRanges) {
                foreach ($discRanges->range as $rangeIntensity) {

                    $test[] = $rangeIntensity->intensity;

                    if ($letter == $discRanges->disc->letter) {
                        $ok[] =  $rangeIntensity->range;
                        if (false !== array_search($result, $rangeIntensity->range)) {
                            $profile[] = $discRanges->segment->number;
                            $intensities[] =  $rangeIntensity->intensity;
                        }
                    }
                }
            }
        }

        if (count($profile) < 4) {

            return 'Combinação inválida';
        }

        $combination = DiscCombination::where('code', $profile[0] . $profile[1] . $profile[2] . $profile[3])->with('profile', 'category')->first();

        if ($combination->disc_profile_id == 3 || $combination->disc_profile_id == 4 || $combination->disc_profile_id == 5) {
            return $this->outputJSON('Desvio', '', true, 200);
        }

        $respondent = Respondent::where('uuid', $request->respondent_uuid)->firstOrFail();

        $combination->intensities = $intensities;
        return $this->outputJSON($combination, '', false);
    }
}
