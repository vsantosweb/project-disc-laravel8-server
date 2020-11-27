<?php

namespace App\Http\Controllers\Api\v1\Client\Disc;

use App\Http\Controllers\Controller;
use App\Models\Disc\DiscCombination;
use App\Models\Disc\DiscProfile;
use App\Models\Disc\DiscRanges;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiscSessionController extends DiscController
{
    public function start()
    {

        // for($i = 0; $i < count($ragens); $i++){
        //     for($j = 0; $j < count($ragens[$i]); $j++){

        //         print_r($ragens[$i][$j]);

        //     }

        // }

        return;
        $newDiscSession =  $this->discSession->firstOrCreate([
            'uuid' => Str::uuid(),
            'expire_at' => now()->addMinutes(60),
            'has_finished' => 0,
            'active' => 1,
        ]);

        $newDiscSession->graph()->create([
            'uuid' => Str::uuid(),
            'graphs' => json_decode(str_replace(array("\r", "\n", " "), "", '{
                "graphs": [{
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


        foreach ($request->graphDiff as $letter => $result) {

            foreach (DiscRanges::all() as $discRanges) {
                if ($letter == $discRanges->disc->letter) {

                    if (false !== array_search($result, json_decode($discRanges->range))) {
                        $profile[] = $discRanges->segment->number;
                    }
                }
            }
        }
        if(count($profile) < 4){
            return 'Combinação inválida';
        }
        return DiscCombination::where('code', $profile[0] . $profile[1] . $profile[2] . $profile[3])->with('profile', 'category')->first();
    }
}
