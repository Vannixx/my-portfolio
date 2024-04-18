<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class socialTable extends Model
{
    use HasFactory;
    protected $table = 'socialtable';

    protected $fillable =[
        'socialIcons',
        'socialLink'
    ];
}
