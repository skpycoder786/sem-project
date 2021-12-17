<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacherSubject extends Model
{
    use HasFactory;
    protected $table = 'teacher_subject';
    protected $fillable = ['subject', 'teacher_id'];
}
