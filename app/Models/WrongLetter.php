<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WrongLetter extends Model
{
    use HasFactory;

    protected $table = 'wrong_letters';

    protected $guarded = [];
}
