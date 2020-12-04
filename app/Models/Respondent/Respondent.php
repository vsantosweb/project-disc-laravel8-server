<?php

namespace App\Models\Respondent;

use App\Models\Customer\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;


class Respondent extends Model
{
    use Notifiable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'customer_id',
        'name',
        'email',
        'custom_fields'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'custom_fields' => 'object'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    /**
     * Cria uma sessão temporária baseada no email e um token aleatório.
     *
     * @return array
     */
    public function sessionHash()
    {
        $session = RespondentDiscSession::create([
            'email' => $this->email,
            'token' => Str::random(100)
        ]);

        return $session->token;
    }

    public function discTests()
    {
        return $this->hasMany(RespondentDiscTest::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function respondentLists()
    {
        return $this->belongsToMany(RespondentList::class, 'respondents_to_lists');

    }
}
