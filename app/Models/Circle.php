<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Circle extends MainModel
{
    use HasFactory;
    protected $fillable = ['name', 'date','teacher_id'];


    public function students()
    {
        return $this->hasMany(Student::class,'circle_id','id');
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id','id');
    }

    public function scopeFilter($query, $search=null,$teacher_id = null)
    {
        $query->when($search, function ($q, $search) {

            $q->where('name', 'like', '%' . $search . '%');

        });
        $query->when($teacher_id, function ($q, $teacher_id) {
            $q->where('teacher_id', $teacher_id);
        });

    }

}
