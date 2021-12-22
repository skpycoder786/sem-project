<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_todo extends Model
{
    use HasFactory;
    protected $table = 'teacher_todo';
    protected $fillable = ['teacher_id', 'task', 'status'];
}
