<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;
    protected $table = "leave_requests";
    protected $fillable = [
        'reason',
        'duration',
        'start_date',
        'end_date',
        'status',
        'user_id',
        'approved_by',
        'approved_at'
    ];
}
