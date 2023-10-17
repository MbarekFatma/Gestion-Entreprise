<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $fillable=['title','description','employee_id'];
    public function employe(){
        return $this->belongsTo(Employee::class);
     }
}
