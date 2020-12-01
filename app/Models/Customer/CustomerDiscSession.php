<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class CustomerDiscSession extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['email', 'token'];

    public function createToken($customer)
    {
        $token = $this->create([
            'token' => hash('sha256', Str::random(60)),
            'email' => $customer->email
        ]);
        return ['token' => $token];
    }

    public function checkSessionToken($token, $uuid)
    {
        if (!is_null($token) && !is_null($uuid)) {

            $customer = Customer::where('uuid', $uuid)->first();
            $session = $this::where('token',  $token)->first();

            if (is_null($session) && is_null($customer)) {
                return false;
            }

            return true;
        }
    }
}
