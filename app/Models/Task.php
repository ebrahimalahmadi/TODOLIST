<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
        'category_id',
        'user_id',
    ];

    // this function defines the data type of the due_date field
    protected $casts = [
        'due_date' => 'datetime',
    ];


    // this function defines the relationship many to many between Task and Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // this function defines the relationship many to many between Task and User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
