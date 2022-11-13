<?php

namespace App\Models;

use App\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory, CrudTrait;

    /**database table with field */
    protected $table = 'carts';
    protected $primaryKey = 'cart_id';

    protected $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'quantity',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    /** totoal item cart number */
    public static function total_item_cart()
    {
        if (Auth::check()) {
            $cart = cart::where('user_id', Auth::id())
                ->where('order_id', NULL)
                ->get();
        }
        $total_item = 0;
        foreach ($cart as $v_cart) {
            $total_item += $v_cart->quantity;
        }
        return $total_item;
    }

    /**cart item list */
    public static function item_cart()
    {
        if (Auth::check()) {
            $cart = cart::where('user_id', Auth::id())
                ->where('order_id', NULL)
                ->get();
        }
        return $cart;
    }
}
