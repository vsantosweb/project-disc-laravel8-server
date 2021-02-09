<?php

namespace App\Models\Respondent;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespondentDiscTestMessage extends Model
{
    protected $fillable = [
        'uuid',
        'customer_id',
        'respondent_disc_test_id',
        'name',
        'subject',
        'sender_name',
        'content',
        'report',
        'bounce',
    ];

    public function respondentDiscTest()
    {
        return $this->hasone(RespondentDiscTest::class);
    }
}
