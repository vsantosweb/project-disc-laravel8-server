<?php

namespace App\Http\Controllers\Api\v1\Client\Disc;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiscSessionController extends DiscController
{
    public function start()
    {
        $newDiscSession =  $this->discSession->firstOrCreate([
            'uuid' => Str::uuid(),
            'expire_at' => now()->addMinutes(60),
            'has_expired' => 0,
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

        return $this->outputJSON($newDiscSession->with('graph')->find($newDiscSession->id),'', false);
    }
}
