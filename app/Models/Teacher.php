<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    
    protected $guarded = ['id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function grade()
    {
        return $this->belongsToMany(Grade::class, 'teacher_grades');
    }
}
