<?php

use App\Http\Controllers\AleartController;
use App\Http\Controllers\BedAssignController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodSubCategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use App\Models\Aleart;
use App\Models\BedAssign;
use App\Models\Bill;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Whoops\Run;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::user()->role_id == 1){
        $user = Auth::user();
        $bills = Bill::where('user_id', $user->id)->get();
        $bedAssing = BedAssign::where('user_id', Auth::user()->id)->first();
        $news = Aleart::all();
        return view('dashboard', compact('user',"bills", "news", "bedAssing"));
    }else{
        $users = User::where('role_id', 1)->get();
        return view('dashboard', compact('users'));
    }
    
})->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(["middleware" => ['auth']], function () {
    /**create user */
    Route::resource('user', UserController::class);
    Route::get('user/status/{user_id}', [UserController::class, 'status'])->name('user.status');

    /**category */
    Route::resource('category', CategoryController::class);
    Route::get('category/status/{category_id}', [CategoryController::class, 'status'])->name('category.status');

    /**room */
    Route::resource('room', RoomController::class);
    Route::get('room/status/{room_id}', [RoomController::class, 'status'])->name('room.status');

    /**bed */
    Route::resource('bed', BedController::class);
    Route::get('bed/status/{bed_id}', [BedController::class, 'status'])->name('bed.status');

    /**bed assign */
    Route::resource('bed-assign', BedAssignController::class);
    Route::get('bed-assing/user/info/{bed_id}', [BedAssignController::class, 'bed_assing_user_inof']);
    Route::get('bed-assign/status/{bed_assign_id}', [BedAssignController::class, 'status'])->name('bed-assign.status');

    /** food category */
    Route::resource('food-category', FoodCategoryController::class);
    Route::get('food-category/status/{food_category_id}', [FoodCategoryController::class, 'status'])->name('food-category.status');

    /**food sub category  */
    Route::resource('food-sub-category', FoodSubCategoryController::class);
    Route::get('food-sub-category/status/{food_sub_category_id}', [FoodSubCategoryController::class, 'status'])->name('food-sub-category.status');

    /**product  */
    Route::resource('product', ProductController::class);
    Route::get('product/status/{product_id}', [ProductController::class, 'status'])->name('product.status');

    /**pos */
    Route::get('pos', [PosController::class, 'create'])->name('pos.create');
    Route::get('increment/{id}', [CartController::class, 'increment']);
    Route::get('decrement/{id}', [CartController::class, 'decrement']);
    Route::get('cart/store/{id}', [CartController::class, 'store'])->name('cart.store');
    Route::get('cart/destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::put('cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
 
    /**order */
    Route::resource('order', OrderController::class);

    /**bill  */
    Route::resource('bill', BillController::class);
    Route::get('bill/status/{bill_id}', [BillController::class, 'status'])->name('bill.status');
    Route::get('print/{show}', [BillController::class, 'print']);

    /* visitor  */
    Route::resource('visitor', VisitorController::class);
    Route::get('visitor/status/{visitor_id}', [VisitorController::class, 'status'])->name('visitor.status');

    /**alert  */
    Route::resource('alert', AleartController::class);
    Route::get('alert/status/{aleart_id}', [AleartController::class, 'status'])->name('alert.status');

    /* web setting route */
    /**role  */
    Route::resource('role', RoleController::class);
    Route::get('role/status/{role_id}', [RoleController::class, 'status'])->name('role.status');

    /**role  */
    Route::resource('permission', PermissionController::class);

    /**setting */
    Route::get('/account-setting', [App\Http\Controllers\SettingController::class, 'account_setting'])->name('account-setting');
    Route::post('/account-update', [App\Http\Controllers\SettingController::class, 'account_update'])->name('account-update');
    Route::get('/profile', [App\Http\Controllers\SettingController::class, 'profile'])->name('profile');
    Route::get('/change-password/create', [App\Http\Controllers\SettingController::class, 'change_password'])->name('change-password.create');
    Route::put('/change-password/update', [App\Http\Controllers\SettingController::class, 'change_password_update'])->name('change-password.update');
    Route::get('/logouts', [App\Http\Controllers\SettingController::class, 'logouts'])->name('logouts');

});
