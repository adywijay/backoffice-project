<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempTask extends Model
{
    use HasFactory;
    protected $table = "temp_tasks";
    protected $fillable = [
        'task_id',
        'task_assign_to_id',
        'executors_id',
        'actions',
        'project_name',
        'status'
    ];
}
