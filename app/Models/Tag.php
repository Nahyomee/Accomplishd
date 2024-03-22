<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'tag', 'colour'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'task_tags');
    }

    


}
