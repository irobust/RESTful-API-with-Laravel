<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(required={"title", "question"})
 */
class Question extends Model
{
    /**
     * @OA\Property(property="title", type="string", description="poll title")
     * @OA\Property(property="question", type="string")
     */
    protected $fillable = ['title', 'question'];
}
