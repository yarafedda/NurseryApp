<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $fillable=['firstname','lastname','date_of_birth','gender','guardian_id'];

    public function parent(){
        return $this->belongsTo(Guardian::class);
    }

    public function staffs(){
        return $this->belongsToMany(Staff::class);
    }

    public function programs(){
        return $this->belongsToMany(Program::class);
    }

}
