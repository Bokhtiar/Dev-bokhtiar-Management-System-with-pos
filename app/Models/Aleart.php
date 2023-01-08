<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aleart extends Model
{
    use HasFactory, CrudTrait;

    /**database table with field */
    protected $table = 'alearts';
    protected $primaryKey = 'aleart_id';

    protected $fillable = [
        'title',
        'body',
        'image',
    ];

}
