<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Permission extends Model
{
    use HasFactory, CrudTrait;

    /**database field create */
    protected $fillable = [
        'role_id',	'permission',
    ];

    protected $casts  = [
        'permission' => 'json'
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }
}
