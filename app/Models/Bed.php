<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Bed extends Model
{
    use HasFactory;
    use CrudTrait;

    /**database table with field */
    protected $table = 'beds';
    protected $primaryKey = 'bed_id';

    protected $fillable = [
        'bed_name',
        'room_id',
        'bed_body',
    ];

    /**validation */
    public function scopeValidation($value, $request)
    {
        return Validator::make($request, [
            'bed_name' => 'string | required | min:3',
            'room_id' => 'required'
        ])->validate();
    }

    /**room reletionship */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
}
