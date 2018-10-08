<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = ['title'];
    protected $hidden = ['questions'];

    public function questions(){
        return $this->hasMany(Question::class);
    }

    // public function toArray(){
    //     return [
    //         'title' => $this->title,
    //         'questions' => $this->questions
    //     ];
    // }
}
