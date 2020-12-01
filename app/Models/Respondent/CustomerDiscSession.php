<?php

namespace App\Models\Respondent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class RespondentDiscSession extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['email', 'token'];

    public function createToken($respondent)
    {
        $token = $this->create([
            'token' => hash('sha256', Str::random(60)),
            'email' => $respondent->email
        ]);

        return $this;
    }

    public function checkSessionToken($token, $uuid)
    {
        if (!is_null($token) && !is_null($uuid)) {

            $respondent = Respondent::where('uuid', $uuid)->first();
            $session = $this::where('token',  $token)->first();

            if (is_null($session) && is_null($respondent)) {
                return false;
            }

            return true;
        }
    }
}
