<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name','circle_id'];

    public function circle()
    {
        return $this->belongsTo(Circle::class,'circle_id','id');
    }
}
