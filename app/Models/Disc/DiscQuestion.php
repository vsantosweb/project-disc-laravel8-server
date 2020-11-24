<?php

namespace App\Models\Disc;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'uuid'];

    public function options()
    {
        return $this->hasMany(DiscQuestionOption::class);
    }
}
