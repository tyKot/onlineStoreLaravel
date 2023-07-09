<?php

use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminContestsController;
use App\Http\Controllers\Admin\AdminAnnouncementsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/catalog', [ProductController::class, 'catalogPage'])->name('catalog.list');
Route::get('/catalogFind', [ProductController::class, 'findProduct'])->name('catalog.find');
Route::get('/sortCategory', [ProductController::class, 'catalogSort'])->name('catalog.sort');
Route::get('/sortBetween', [ProductController::class, 'sortBetween'])->name('catalog.sort.between');

Route::get('/profile', [ProfileController::class, 'profilePage'])->name('profile.page');
Route::post('/profileEx', [ProfileController::class, 'pointsExchange'])->name('exchange.points');

Route::get('/cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('/cartadd', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cartpurchase', [CartController::class, 'purchaseProduct'])->name('cart.purchase');
Route::post('/cartupdate', [CartController::class, 'cartUpdate'])->name('cart.update');
Route::get('/cartdelete', [CartController::class, 'deleteFromCart'])->name('cart.delete');
Route::post('/cartclear', [CartController::class, 'clearCart'])->name('cart.clear');


Route::get('/sendmail', [HomeController::class, 'sendMail'])->name('sendMail');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'adminauth'], function () {
    Route::get('/', [AdminUsersController::class, 'showUsers'])->name('showUsers');
    Route::post('/register', [AdminUsersController::class, 'createUser'])->name('createUser');
    Route::get('/edituser', [AdminUsersController::class, 'editUser'])->name('editUser');
    Route::post('/editusergenpas', [AdminUsersController::class, 'regeneratePassword'])->name('editUserReGenPass');
    Route::post('/edituser', [AdminUsersController::class, 'postEditUser'])->name('postEditUser');
    Route::post('/delete', [AdminUsersController::class, 'deleteUser'])->name('deleteUser');


    // Route::get('/edituser/file-import-export', [AdminUsersController::class, 'fileImportExport']);
    Route::post('/edituser/file-import', [AdminUsersController::class, 'fileImport'])->name('file.import');
    Route::get('/edituser/file-export', [AdminUsersController::class, 'fileExport'])->name('file.export');

    Route::get('/products', [AdminProductsController::class, 'showProducts'])->name('showProducts');
    Route::post('/products', [AdminProductsController::class, 'addProduct'])->name('addProduct');
    Route::post('/add-product-category', [AdminProductsController::class, 'addProductCategory'])->name('addProductCategory');
    Route::post('/delete-product-category', [AdminProductsController::class, 'deleteCategoryProduct'])->name('deleteCategoryProduct');
    Route::get('/productsEdit', [AdminProductsController::class, 'editProduct'])->name('editProduct');
    Route::post('/productsEdit', [AdminProductsController::class, 'postEditProduct'])->name('postEditProduct');
    Route::post('/productsDelete', [AdminProductsController::class, 'deleteProduct'])->name('deleteProduct');

    Route::get('/orders', [AdminOrdersController::class, 'showOrders'])->name('showOrders');
    Route::post('/changestatus', [AdminOrdersController::class, 'changeStatus'])->name('changeStatus');

    Route::get('/contest',[AdminContestsController::class,'getContests'])->name('announcementContest');
    Route::post('/contest',[AdminContestsController::class,'addMili'])->name('addMili');
    Route::post('/delcontest',[AdminContestsController::class,'deleteContest'])->name('deleteContest');

    // Route::get('/announcements',[AdminAnnouncementsController::class,'getAnnouncements'])->name('showAnnouncements');
    // Route::post('/add-announcements',[AdminAnnouncementsController::class,'addAnnouncements'])->name('addAnnouncements');
    // Route::post('/add-announcement-category',[AdminAnnouncementsController::class,'addAnnouncementCategory'])->name('addAnnouncementCategory');
    // Route::post('/announcementsedit',[AdminAnnouncementsController::class,'editAnnouncements'])->name('editAnnouncements');
});


Route::get('/register', function () {
    return view('auth.register');
});

Auth::routes();
