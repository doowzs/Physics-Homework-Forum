<?php

namespace App\Models;

use App\Models\Traits\Assignment\AssignmentRelationships;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use AssignmentRelationships;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'name',
        'content',
        'content_html',
        'due_time',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'due_time' => 'datetime',
    ];
}