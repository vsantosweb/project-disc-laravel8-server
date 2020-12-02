<?php

namespace App\Models\Disc\Respondent;

use App\Models\Respondent\Respondent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespondentDiscTest extends Model
{
    use HasFactory;

    public function respondent()
    {
        return $this->belongsTo(Respondent::class);
    }
}
