<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    /** @use HasFactory<\Database\Factories\TaskFactory> */
    use HasFactory, SoftDeletes;


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

    // this function returns a color based on the status of the task
    // you can use this function in the blade file to set the background color of the status badge
    public function getTaskColor(): string
    {
        return match ($this->status) {
            'pending' => '#FFC107',
            'in_progress' => '#17A2B8',
            'completed' => '#28A745',
            default => '#6C757D',
        };
    }

    // this function returns an icon based on the status of the task
    // you can use this function in the blade file to set the icon of the status badge
    public function getTaskIcon(): string
    {
        return match ($this->status) {
            'pending' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 1a7 7 0 1 1 0 14A7 7 0 0 1 8 1zm0 1a6 6 0 1 0 0 12A6 6 0 0 0 8 2zm0 2a1 1 0 0 1 1 1v2.586l1.707 1.707a1 1 0 1 1-1.414 1.414L7 8.414V5a1 1 0 0 1 1-1z"/></svg>',
            'in_progress' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><circle cx="8" cy="8" r="7" stroke="currentColor" stroke-width="2" fill="none"/><path d="M8 4v4l3 2" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"/></svg>',
            'completed' => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M13.485 1.929a.75.75 0 0 1 0 1.06l-7.07 7.07a.75.75 0 0 1-1.06 0l-3.182-3.182a.75.75 0 1 1 1.06-1.06l2.652 2.652 6.54-6.54a.75.75 0 0 1 1.06 0z"/></svg>',
            default => '<svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><circle cx="8" cy="8" r="7" stroke="currentColor" stroke-width="2" fill="none"/><text x="8" y="12" text-anchor="middle" font-size="10" fill="currentColor">?</text></svg>',
        };
    }
}
