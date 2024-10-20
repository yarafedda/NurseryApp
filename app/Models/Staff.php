<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staffs';
    protected $fillable=['firstname','lastname','position','qualification','date_hired','image'];

    public function children(){
        return $this->belongsToMany(Child::class);
    }

    public function programs()
{
    return $this->hasMany(Program::class);
}

}
