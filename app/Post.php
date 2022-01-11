<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title','description', 'user_id',
    ];
    public function user(){
//        return $this->belongsTo(ِ'App\User');
        return $this->belongsTo(User::class , 'user_id');   // $this دي عائدخ علي الموديل اللي اسمه Post
    }
}
