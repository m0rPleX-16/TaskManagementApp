<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Enums\TaskStatus;

class Task extends Model
{
    //
    use HasFactory;
    
    protected $table = 'task';
    
    protected $fillable = [
        'user_id',
        'categories_id',
        'title',
        'description',
        'due_date',
        'status'
    ];

    /**
     * Casts
     *
     * Ensure `due_date` is a Carbon instance so `format()` works in views.
     */
    protected $casts = [
        'due_date' => 'date',
        'status' => TaskStatus::class,
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class);
    }
}