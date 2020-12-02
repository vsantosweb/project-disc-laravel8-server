<?php

namespace App\Models\Customer;

use App\Models\Respondent\Respondent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, Notifiable;

    public function respondents()
    {
        return $this->hasMany(Respondent::class);
    }

}
