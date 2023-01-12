<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use HasFactory, CrudTrait;

    /**database table with field */
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'user_id',
        'time',
        'total_amount',
        'created_by',
    ];

    /* user table */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* order */
    public static function orderPayment($order_id)
    {

        $carts = Cart::where('order_id', $order_id)->where('user_id', Auth::user()->id)->get();
        $total_price = 0;
        foreach ($carts as $cart) {
            $total_price += $cart->quantity * $cart->product->price;
        }
        return $total_price;

    }
}
