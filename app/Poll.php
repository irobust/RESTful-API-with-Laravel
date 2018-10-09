<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(required={"title"})
 */
class Poll extends Model
{
    /**
     * @OA\Property(type="string", description="poll title")
     */
    protected $fillable = ['title'];
    protected $hidden = ['questions'];

    /**
     * @OA\Property(ref="#/components/schemas/Question")
     */
    public function questions(){
        return $this->hasMany(Question::class);
    }
}
