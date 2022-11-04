<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory, CrudTrait;
    
    /**database table with field */
    protected $table = 'roles';
    protected $primaryKey = 'role_id';

    protected $fillable = [
        'name',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function permission()
    {
       return $this->hasOne(Permission::class);
    }
}
