<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory, CrudTrait;
    /**database table with field */
    protected $table = 'bills';
    protected $primaryKey = 'bill_id';

    protected $fillable = [
        'user_id',
        'bed_assign_id',
        'month',
        'year',
        'day',
        'bill_body',
    ];

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

    /**bed reletionship */
    public function bedAssign()
    {
        return $this->belongsTo(BedAssign::class, 'bed_assign_id', 'bed_assign_id');
    }
}
