<?php

namespace App\Models\Respondent;

use App\Models\Respondent\Respondent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespondentDiscTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'respondent_id',
        'code',
        'metadata',
    ];

    protected $casts = ['metadata' => 'object'];

    public function respondent()
    {
        return $this->belongsTo(Respondent::class);
    }

    public function make($respondents = [])
    {
        return $respondents;
    }
}
