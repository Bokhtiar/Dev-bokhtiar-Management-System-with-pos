<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Bed extends Model
{
    use HasFactory, CrudTrait;

    /**database table with field */
    protected $table = 'beds';
    protected $primaryKey = 'bed_id';

    protected $fillable = [
        'bed_name',
        'room_id',
        'bed_body',
    ];

    /**room reletionship */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
}
