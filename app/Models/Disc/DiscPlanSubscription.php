<?php

namespace App\Models\Disc;

use App\Models\Customer\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscPlanSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'customer_id',
        'name',
        'slug',
        'status',
        'amount',
        'validity_days',
        'expire_at',
        'features',
        'description',
    ];

    protected $casts = ['features' => 'object'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
