<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Course extends Model
{
    use HasFactory;

    protected $guarded =[];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }



    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }



    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s' , $date)->format('Y-m-d');
    }

    public function getImageAttribute($data)
    {
        return 'http://localhost:8000/storage/course/'. $data;
    }

}
