<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;
    protected $fillable=['firstname','lastname','email','phone_number','address','relationship_to_child'];

    public function children(){
        return $this->hasMany(Child::class);
    }
}
