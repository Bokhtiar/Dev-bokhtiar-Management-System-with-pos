<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Room extends Model
{
    use HasFactory;
    use CrudTrait;

    /**database table with field */
    protected $table = 'rooms';
    protected $primaryKey = 'room_id';

    protected $fillable = [
        'room_name',
        'category_id',
        'room_body',
    ];

    /**category reletion */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }
}
