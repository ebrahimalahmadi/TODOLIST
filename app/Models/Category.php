<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;


    protected $fillable = [
        'name',
        'color',
        'icon',
    ];

    // this function defines the relationship many to many between Category and Task
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
