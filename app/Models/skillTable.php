<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skillTable extends Model
{
    use HasFactory;

    protected $table = 'skilltable';

    protected $fillable = [
        'skillName',
        'skillImage',
    ];
    
}
