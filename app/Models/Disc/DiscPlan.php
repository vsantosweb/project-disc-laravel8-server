<?php

namespace App\Models\Disc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'slug',
        'price',
        'features',
        'description',
        'showcase',
    ];

    protected $casts = ['features' => 'object'];

    public function periods()
    {
        return $this->belongsToMany(DiscPlanPeriod::class, 'disc_plan_to_periods')->withPivot('discount', 'showcase');
    }
}
