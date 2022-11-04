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
}
