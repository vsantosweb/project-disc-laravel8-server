<?php

namespace App\Models\Respondent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RespondentDiscSession extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'token'];
    protected $hidden = ['updated_at', 'created_at', 'id', 'email'];
    public function createToken($respondent)
    {
        $token = $this->create([
            'token' => hash('sha256', $respondent->email),
            'email' => $respondent->email
        ]);

        $token->uuid = $respondent->uuid;
        return $token;
    }

    public function checkSessionToken($token, $uuid)
    {
        if (!is_null($token) && !is_null($uuid)) {

            $respondent = Respondent::where('uuid', $uuid)->first();

            if(hash('sha256', $respondent->email) == $token){
                return true;
            }

            return false;
        }
        return false;
    }
}
