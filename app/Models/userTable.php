<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userTable extends Model
{
    use HasFactory;
    protected $table = 'usertable';

    protected $fillable =[
        'userName',
        'userRole',
        'userImage',
        'description',
    ];
}
