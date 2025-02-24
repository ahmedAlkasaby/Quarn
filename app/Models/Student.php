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

    public function scopeFilter($query, $search = null)
    {
        $query->when($search, function ($q, $search) {
            $q->where('name', 'like', '%' . $search . '%')
              ->orWhereHas('circle', function ($circleQuery) use ($search) {
                  $circleQuery->where('name', 'like', '%' . $search . '%'); 
              });
        });
    }

}
