# API project with JWT Authentication
I set up an online shop using Laravel v8.It's support login,register ,cart ,wishlist ,compareList, coupon system, ...etc ,also a administration panel! 

## Database structure
To see database structure ,go to my repository about modeling a online store database 

## Route APP


```php
<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\OtherCartInstanceController;
use App\Http\Controllers\ProductController;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Coupon;

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

Route::get('/base', function () {
    return view('layouts.base');
});


///shop routes
Route::get('/boutique/{{category}}', [ProductController::class, 'index'])->name('allpro');
Route::get('/boutique', [ProductController::class, 'index'])->name('allpro');
Route::get('/search', [ProductController::class, 'search'])->name('products_search');



Route::get('/boutique/{slug}', [ProductController::class, 'show'])->name('p.show');


Route::get('/', function () {
   // dd($extract);

    return view('welcome');
});


///cart routes


Route::middleware(['auth'])->group(function () {
    Route::post('/addCart/{id}',[CartController::class,'addCart'])->name('addCart');

    Route::get('/addToCompare/{id}',[OtherCartInstanceController::class,'addToCompare'])->name('addToCompare');

    Route::post('/addToCart',[CartController::class,'store'])->name('cartadd');

    Route::get('/addtocart/{id}',[CartController::class,'addOneInCart'])->name('addOneInCart');

    Route::post('/updateCart/{id}',[CartController::class,'update'])->name('update.cart');

    Route::get('/removecart', function () {
        Cart::destroy();
        return back();
    });

    Route::get('/removecart/{id}', function ($id) {
        Cart::remove($id);
        return back();
    })->name('remove');

    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');

    Route::get('/checkout', function () {
        if(Cart::instance('default')->subtotal() <= 0){
            return redirect('/boutique');
        }
        return view('checkout.index');
    })->name('checkout');

    Route::get('/thanks',[CartController::class,'finish']);

    Route::post('/addPayment',[CheckoutController::class,'store'])->name('addpay');
});

//checkout route



///wishlist and compare route

Route::get('/addToWishlist/{id}',[OtherCartInstanceController::class,'addToWishlist'])->name('addToWishlist');

Route::get('/mywishlist', function () {
    return view('wishlist.index');
})->name('seewish');

Route::get('/removewish', function () {
    Cart::instance('wishlist')->destroy();
    return back();
});


Route::get('/mycomparelist', function () {
    return view('compare.index');
})->name('seecomp');

Route::get('/removecompare', function () {
    Cart::instance('compare')->destroy();
    return back();
});

Route::get('/removecompare/{id}', function ($id) {
    Cart::instance('compare')->remove($id);
    return back();
})->name('remcomp');

Route::get('/dashboard',[CheckoutController::class,'show'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

///coupon routes
Route::post('/addCoupon',[CouponController::class,'addCoupon'])->name('addCoupon');

Route::get('/cancelCoupon',[CouponController::class,'cancelCoupon'])->name('cancelCoupon');

//admin routes///////////////////////////////////////////////////////////////////////////////////////////////////////////



Route::middleware(['admin'])->group(function () {

    Route::get('/basead', function () {
        return view('admin.admin_base');
    });

    Route::get('/admin/addProduct', function () {
        return view('admin.product.index');
    })->name('admin_addproduct');

    Route::post('/addProduct',[ProductController::class,'store'])->name('ad_addproduct');

    Route::get('/admin/addCategory', function () {
        return view('admin.category.index');
    })->name('admin_addcategory');

    Route::get('/admin/delCategory/{id}', function ($id) {
        Category::where('id', $id)->delete();
        return back();
    })->name('admin_delcategory');

    Route::post('/addCategory',[ProductController::class,'store_category'])->name('ad_adcategory');

    Route::get('/admin/addCoupon', function () {
        return view('admin.coupon.index');
    })->name('admin_addcoupon');

    Route::get('/admin/delCoupon/{id}', function ($id) {
        Coupon::where('id', $id)->delete();
        return back();
    })->name('admin_delcoupon');

    Route::post('/addcoupon',[CouponController::class,'store'])->name('ad_adcoupon');

    Route::get('/admin/delAdmin/{id}', function ($id) {
        Admin::where('id', $id)->delete();
        return back();
    })->name('admin_deladmin');






});
Route::post('/addAdmin',[AdminController::class,'store'])->name('ad_admin');
Route::get('/admin', function () {
    return view('admin.login');
})->name('admin_login');

Route::post('/connect',[AdminController::class,'login'])->name('login_admin');
Route::get('/admin/new', function () {
    return view('admin.index');
})->name('admin');


```
## Download project to see all details
