<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable=['name','description','duration','image','staff_id'];

    public function children(){
        return $this->belongsToMany(Child::class);
    }

    public function staff()
{
    return $this->belongsTo(Staff::class);
}

}
