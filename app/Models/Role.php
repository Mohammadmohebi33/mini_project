<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const Admin = 0 ;
    const Author = 1 ;
    const Member = 3 ;

    public static $roleName = ['admin' , 'author' , 'member'];

    protected $guarded = [];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
