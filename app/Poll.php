<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(required={"title"})
 */
class Poll extends Model
{
    /**
     * @OA\Property(property="title", type="string", description="poll title")
     */
    protected $fillable = ['title'];
    protected $hidden = ['questions'];

    /**
     * @OA\Property(
     *        property="questions", type="array", 
     *        @OA\Items(ref="#/components/schemas/Question")
     * )
     */
    public function questions(){
        return $this->hasMany(Question::class);
    }
}
