<?php

namespace App\Models\Respondent;

use App\Models\Customer\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespondentList extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id' ,'uuid', 'name', 'description', 'settings'];
    protected $casts = ['settings' => 'object'];

    public function respondents()
    {
        return $this->hasMany(Respondent::class)->with('discTests');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
