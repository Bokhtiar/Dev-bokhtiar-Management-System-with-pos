<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory, CrudTrait;

     protected $table = 'visitors';
     protected $primaryKey = 'visitor_id';
 
     protected $fillable = [
         'name',
         'user_id',
         'description',
         'status',
     ];
 
     public function users(){
         return $this->hasMany(User::class);
     }
}
