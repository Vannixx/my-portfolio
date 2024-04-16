<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userTable extends Model
{
    use HasFactory;

    protected $fillable =[
        'userName',
        'userRole',
        'userImage',
        'description'
    ];
}
