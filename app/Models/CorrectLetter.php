<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorrectLetter extends Model
{
    use HasFactory;

    protected $table = 'correct_letters';

    protected $guarded = [];
}
