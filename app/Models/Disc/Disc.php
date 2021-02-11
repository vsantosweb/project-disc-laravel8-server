<?php

namespace App\Models\Disc;

use App\Mail\Disc\SendDiscTest;
use App\Models\Respondent\RespondentDiscMessage;
use App\Models\Respondent\RespondentDiscSession;
use App\Models\Respondent\RespondentDiscTest;
use App\Models\Respondent\RespondentList;
use App\Notifications\DiscTestSessionCreatedNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function generateTestDiscToList($data)
    {
        $lists = RespondentList::whereIn('uuid', $data->respondent_lists)->with('respondents')->get();
        

        if($lists->isEmpty()){
            throw new \Exception('No registered lists');
        }
      $message =  RespondentDiscMessage::create([
            'uuid' => Str::uuid(),
            'customer_id' => auth()->user()->id,
            'name' => $data->name,
            'subject' => $data->subject,
            'content' => $data->content,
            'respondent_lists' => json_encode($data->respondent_lists),
            'sender_name' => auth()->user()->name
        ]);

        foreach ($lists as $list) {

            if ($list->respondents->isEmpty()) {

                throw new \Exception('No respondents on the list: ' . $list->name, 1);
            }

            foreach ($list->respondents as $respondent) {

                $session =  RespondentDiscSession::firstOrCreate([
                    'token' => hash('sha256', microtime()),
                    'email' => $respondent->email,
                ]);

                $discTest = RespondentDiscTest::firstOrCreate([
                    'respondent_id' => $respondent->id,
                    'respondent_disc_message_id' => $message->id,
                    'code' => Str::random(15),
                    'metadata' => ''
                ]);

                $session->session_url = env('APP_URL') .
                    DIRECTORY_SEPARATOR .
                    'authDisc' . DIRECTORY_SEPARATOR .
                    $session->token . DIRECTORY_SEPARATOR .
                    $respondent->uuid . DIRECTORY_SEPARATOR .
                    $discTest->code;
                $session->save();

                $sessions[] = $session;
                $respondent->session = $session;
                $respondent->notify(new DiscTestSessionCreatedNotification($respondent));
            }

            $message->lists()->attach($list->id);
        }
        return $sessions;
    }
}
