<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentSubject extends Model
{
    use HasFactory;
    protected $table = 'student_subject';
    protected $fillable = ['subject', 'student_id'];
}
