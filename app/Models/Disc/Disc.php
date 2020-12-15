<?php

namespace App\Models\Disc;

use App\Mail\Disc\SendDiscTest;
use App\Models\Respondent\RespondentDiscSession;
use App\Models\Respondent\RespondentDiscTest;
use App\Models\Respondent\RespondentList;
use App\Notifications\DiscTestSessionCreatedNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\str;

class Disc extends Model
{
    use HasFactory;

    protected $table = 'disc';
    protected $fillable = ['name', 'letter'];

    public function intensities()
    {
        return $this->hasMany(DiscIntensity::class);
    }

    public function generateTestDiscToList($uuids = [])
    {
        $lists = RespondentList::whereIn('uuid', $uuids)->with('respondents')->get();

        foreach ($lists as $list) {

            foreach ($list->respondents as $respondent) {

                $session =  RespondentDiscSession::firstOrCreate([
                    'token' => hash('sha256', microtime()),
                    'email' => $respondent->email,
                ]);

                $discTest = RespondentDiscTest::firstOrCreate([
                    'respondent_id' => $respondent->id,
                    'code' => Str::random(15),
                    'metadata'=> 'asdasd'
                ]);

                $session->session_url = env('APP_URL') .
                DIRECTORY_SEPARATOR .
                'authDisc' . DIRECTORY_SEPARATOR .
                $session->token . DIRECTORY_SEPARATOR .
                $respondent->uuid. DIRECTORY_SEPARATOR .
                $discTest->code;
                $session->save();

                $sessions[] = $session;
                $respondent->session = $session;
                $respondent->notify(new DiscTestSessionCreatedNotification($respondent));
            }
        }
        return $sessions;
    }
}
