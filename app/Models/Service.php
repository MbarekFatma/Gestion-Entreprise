<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable=['nom','spc'];

    public function employee(){
       return $this->hasMany(Employee::class);
    }
    public function project(){
        return $this->hasMany(Project::class);
     }
}
