<?php

namespace App\Models\Disc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscQuestionOption extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'disc_question_id', 'description', 'less', 'more'];

    public function question()
    {
        return $this->belongsTo(DiscQuestion::class);
    }
}
