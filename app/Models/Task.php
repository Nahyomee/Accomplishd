<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'due_date', 'priority', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'task_tags');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'task_categories');
    }

    public function scopeUpcoming(Builder $query, $user = null)
    {
        $date = Carbon::today()->toDateString();
        $query->where('due_date', '>', $date);
        if($user != null){
            $query->where('user_id', $user);
        }
    }

    public function scopeToday(Builder $query, $user = null)
    {
        $date = Carbon::today()->toDateString();
        $query->where('due_date', $date);
        if($user != null){
            $query->where('user_id', $user);
        }
    }

    public function scopeOverdue(Builder $query, $user = null)
    {
        $date = Carbon::today()->toDateString();
        $query->where('due_date', '<', $date);
        if($user != null){
            $query->where('user_id', $user);
        }
    }

}
