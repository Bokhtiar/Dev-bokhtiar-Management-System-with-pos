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
        'room_charge',
        'room_body',
    ];

    /**validation */
    public function scopeValidation($value, $request)
    {
        return Validator::make($request, [
            'room_name' => 'string | required | min:3',
            'room_charge' => 'integer | required'
        ])->validate();
    }
}
