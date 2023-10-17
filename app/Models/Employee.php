<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['nom','prenom','adresse','service_id'];

    public function service(){
        return $this->belongsTo(Service::class);
     }
     public function reclamation(){
        return $this->hasMany(Reclamation::class);
     }
     public function task(){
      return $this->hasMany(Task::class);
   }
}
