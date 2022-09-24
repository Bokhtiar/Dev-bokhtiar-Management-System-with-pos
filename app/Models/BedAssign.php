<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class BedAssign extends Model
{
    use HasFactory, CrudTrait;

    /**database table with field */
    protected $table = 'bed_assigns';
    protected $primaryKey = 'bed_assign_id';

    protected $fillable = [
        'bed_id',
        'room_id',
        'user_id',
        'category_id',
        'bed_assign_body',
    ];

    /**validation */
    public function scopeValidation($value, $request)
    {
        return Validator::make($request, [
            'bed_id' => 'required',
            'room_id' => 'required',
            'user_id' => 'required',
            'category_id' => 'required',
        ])->validate();
    }

    /**user reletionship */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**category reletionship */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id');
    }

    /**room reletionship */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }

    /**bed reletionship */
    public function bed()
    {
        return $this->belongsTo(Bed::class, 'bed_id', 'bed_id');
    }
}
