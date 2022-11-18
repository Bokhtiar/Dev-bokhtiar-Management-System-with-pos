<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, CrudTrait;
    
    /**database table with field */
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'payment',
        'total_amount',
        'created_by',
    ];

    /**user table */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
