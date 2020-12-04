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
        return $this->belongsToMany(Respondent::class, 'respondents_to_lists', 'respondent_list_id' ,'respondent_id')->with('discTests');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
