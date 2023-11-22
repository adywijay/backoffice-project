<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table = "tasks";
    protected $fillable = [
        'name',
        'category',
        'start_date',
        'end_date',
        'link',
        'status',
        'user_id',
        'author_id'
    ];

    /*
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    */
}
