<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable=['nom','budget','description','service_id'];
    public function service(){
        return $this->belongsTo(Service::class);
     }
     public function task(){
        return $this->hasMany(Task::class);
     }
}
