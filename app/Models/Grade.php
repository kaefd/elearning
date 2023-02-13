<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Grade extends Model
{
    use HasFactory;
    use Sortable;
    
    protected $guarded = ['id'];

    
    public function student()
    {
        return $this->hasMany(Student::class);
    }
    
    public function teacher()
    {
        return $this->belongsToMany(Teacher::class, 'teacher_grades');
    }
}
