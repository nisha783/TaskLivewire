<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    // Allow mass assignment for the 'task' field
    protected $fillable = ['task'];
}
