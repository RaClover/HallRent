<?php

//use App\Http\Controllers\Partner\MarketController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuperAdmin\SuperProfileController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Partner\PartnerProfileController;
use App\Http\Controllers\User\UserProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\HallsController;
use App\Http\Controllers\User\BookingController;
use App\Http\Controllers\User\ContactUsController;
use App\Http\Controllers\User\WhishlistController;
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
Route::get('/', [HomeController::class, 'home'])->name('homePage');
Route::get('/aboutUs' , [HomeController::class , 'aboutUs'])->name('aboutUs');
Route::get('/contactUs' , [HomeController::class , 'contactUs'])->name('contactUs');
Route::get('/{city}/halls' , [HallsController::class , 'index'])->name('halls.index');
Route::get('{city}/halls/{hall}' , [HallsController::class , 'hallDetail'])->name('hallDetail');
Route::get('/users/show/{user}' , [HallsController::class , 'userPortfolio'])->name('userPortfolio');





//routes for the contact us page
Route::prefix('contactUs')->middleware('auth')->name('contactUs.')->group(function () {
    Route::get('/create', [ContactUsController::class , 'create'])->name('create');
    Route::post('/store' , [ContactUsController::class , 'store'])->name('store');
});


// WHISHLIST
Route::get('/whishlist', [WhishlistController::class, 'index'])->name('whishlist.index');
Route::post('/whishlist/{hall}', [WhishlistController::class, 'toggle'])->name('whishlist.toggle');
Route::post('/whishlist/{hall}/move-to-cart', [WhishlistController::class, 'moveToCart'])->name('whishlist.moveToCart');
Route::delete('/whishlist', [WhishlistController::class, 'destroy'])->name('whishlist.destroy');




    Route::group(['middleware' => 'auth'], function() {
        Route::inertia('/dashboard', 'Dashboard')->name('dashboard');
        Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"])
            ->middleware('auth' , 'verified');



        // SuperAdmin routes goes here

         Route::prefix('super')->name('super.')->middleware(['checkRole:super', 'verified'])->group(function () {
             Route::get('/profile', [SuperProfileController::class, 'edit'])->name('profile.edit');
             Route::patch('/profile', [SuperProfileController::class, 'update'])->name('profile.update');
             Route::delete('/profile', [SuperProfileController::class, 'destroy'])->name('profile.destroy');
             Route::inertia('/dashboard', 'Super/SuperDashboard')->name('dashboard');
             Route::get('/displayAdmins',[AdminsController::class,'index'])->name('admins');
    });


        // Admin routes goes here

         Route::prefix('admin')->name('admin.')->middleware(['checkRole:admin', 'verified'])->group(function () {
             Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
             Route::patch('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
             Route::delete('/profile', [AdminProfileController::class, 'destroy'])->name('profile.destroy');
             Route::inertia('/dashboard', 'Admin/AdminDashboard')->name('dashboard');


        });


        // Partner routes goes here
        Route::prefix('partner')->name('partner.')->middleware(['checkRole:partner', 'verified'])->group(function () {
            Route::get('/profile', [PartnerProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [PartnerProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [PartnerProfileController::class, 'destroy'])->name('profile.destroy');
            Route::inertia('/dashboard', 'Partner/PartnerDashboard')->name('dashboard');

        });



        // user routes goes here
        Route::prefix('my')->name('my.')->middleware(['checkRole:user', 'verified'])->group(function () {
            Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [UserProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [UserProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('documents' , [UserProfileController::class , 'documents'])->name('documents');
            Route::get('notifications' , [UserProfileController::class , 'notifications'])->name('notifications');
            Route::get('messages' , [UserProfileController::class , 'messages'])->name('messages');
            Route::get('bookings' , [UserProfileController::class , 'bookings'])->name('bookings');
            Route::get('wishlists' , [UserProfileController::class , 'wishlists'])->name('wishlists');
            Route::inertia('/dashboard', 'User/UserDashboard')->name('dashboard');
        });




        // bookings routes
        Route::prefix('booking')->name('booking.')->middleware(['checkRole:user,partner', 'verified'])->group(function () {
            Route::get('/book', [BookingController::class, 'book'])->name('book');
            Route::post('/book', [BookingController::class, 'book'])->name('book');
            Route::put('/book', [BookingController::class, 'book'])->name('book');
            Route::patch('/confirmation', [BookingController::class, 'book'])->name('confirmation');
        });


    });






require __DIR__.'/auth.php';
