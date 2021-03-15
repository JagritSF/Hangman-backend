<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LastWord extends Model
{
    use HasFactory;

    protected $table = 'last_word';

    protected $guarded = [];
}
