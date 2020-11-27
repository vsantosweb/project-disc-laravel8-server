<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDiscSession extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'token'];
}
