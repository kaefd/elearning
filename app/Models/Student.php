<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Student extends Model
{
    use HasFactory;
    use Sortable;
    
    protected $guarded = ['id'];
    
    public $sortable = ['name',
                        'nis',
                        'grade_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
}
