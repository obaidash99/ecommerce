<?php

use \Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeaturesController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\HomeContentController;
use \Admin\ProductController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\StaticContentController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckOutController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\FrontendController as UserFrontendController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Frontend\ProductsController;
use Frontend\ProfileController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::get('/', [UserFrontendController::class, 'index']);
Route::get('category', [UserFrontendController::class, 'category']);
Route::get('category/{slug}', [UserFrontendController::class, 'viewCategory']);
Route::get('category/{cate_slug}/{prod_slug}', [UserFrontendController::class, 'viewProduct']);

Route::post('newsletter', [NewsletterController::class, 'add']);

Route::get('all-products', [ProductsController::class, 'index']);
Route::get('view-product/{slug}', [ProductsController::class, 'viewProduct']);

Route::get('product-list', [UserFrontendController::class, 'productListAjax']);
Route::post('search-product', [UserFrontendController::class, 'searchProduct']);

Route::get('load-cart-data', [CartController::class, 'cartCount']);
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart-item', [CartController::class, 'updateProduct']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/send-message', [ContactController::class, 'storeMessage']);

Route::get('load-wishlist-data', [WishlistController::class, 'wishlistCount']);
Route::post('add-to-wishlist', [WishlistController::class, 'addToWishlist']);
Route::post('remove-wishlist-item', [WishlistController::class, 'removeItem']);

Route::get('about-us', [AboutUsController::class, 'index']);


Route::group(['middleware' => ['auth']], function () {

        Route::resource('profile', ProfileController::class);

    Route::get('cart', [CartController::class, 'viewCart']);
    Route::get('checkout', [CheckOutController::class, 'index']);
    Route::post('place-order', [CheckOutController::class, 'placeOrder']);

    Route::post('proceed-to-pay', [CheckOutController::class, 'razorpayCheck']);

    Route::get('my-orders', [UserController::class, 'index']);
    Route::get('view-order/{id}', [UserController::class, 'view']);

    Route::get('wishlist', [WishlistController::class, 'index']);

    Route::post('add-rating', [RatingController::class, 'add']);

    Route::get('add-review/{product_slug}/userreview', [ReviewController::class, 'add']);
    Route::post('add-review', [ReviewController::class, 'create']);
    Route::get('edit-review/{product_slug}/userreview', [ReviewController::class, 'edit']);
    Route::put('update-review', [ReviewController::class, 'update']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [FrontendController::class, 'index']);

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

//    Route::resource('orders', OrdersController::class);
    Route::get('orders', [OrdersController::class, 'index']);
    Route::get('admin/view-order/{id}', [OrdersController::class, 'view']);
    Route::put('update-order/{id}', [OrdersController::class, 'update']);
    Route::get('order-history', [OrdersController::class, 'history']);

//    Route::resource('messages', MessagesController::class)->only(['index', 'show', 'destroy']);
    Route::get('messages', [MessagesController::class, 'index']);
    Route::get('view-message/{id}', [MessagesController::class, 'show']);
    Route::get('delete-message/{id}', [MessagesController::class, 'destroy']);

    Route::get('newsletters', [NewsletterController::class, 'view']);

    Route::get('team', [TeamController::class, 'index']);
    Route::get('add-member', [TeamController::class, 'add']);
    Route::post('insert-member', [TeamController::class, 'insert']);
    Route::get('edit-member/{id}', [TeamController::class, 'edit']);
    Route::put('update-member/{id}', [TeamController::class, 'update']);
    Route::get('delete-member/{id}', [TeamController::class, 'destroy']);
    Route::get('view-member/{id}', [TeamController::class, 'view']);

    Route::get('testimonials', [TestimonialsController::class, 'index']);
    Route::get('add-testimonial', [TestimonialsController::class, 'add']);
    Route::post('insert-testimonial', [TestimonialsController::class, 'insert']);
    Route::get('edit-testimonial/{id}', [TestimonialsController::class, 'edit']);
    Route::put('update-testimonial/{id}', [TestimonialsController::class, 'update']);
    Route::get('delete-testimonial/{id}', [TestimonialsController::class, 'destroy']);
    Route::get('view-testimonial/{id}', [TestimonialsController::class, 'view']);

    Route::get('features', [FeaturesController::class, 'index']);
    Route::get('add-feature', [FeaturesController::class, 'add']);
    Route::post('insert-feature', [FeaturesController::class, 'insert']);
    Route::get('edit-feature/{id}', [FeaturesController::class, 'edit']);
    Route::put('update-feature/{id}', [FeaturesController::class, 'update']);
    Route::get('delete-feature/{id}', [FeaturesController::class, 'destroy']);

    Route::get('static-content', [StaticContentController::class, 'index']);
    Route::get('add-head', [StaticContentController::class, 'addHead']);
    Route::get('add-why', [StaticContentController::class, 'addWhy']);
    Route::post('insert-head', [StaticContentController::class, 'insertHead']);
    Route::post('insert-why', [StaticContentController::class, 'insertWhy']);
    Route::get('edit-head/{id}', [StaticContentController::class, 'editHead']);
    Route::get('edit-why/{id}', [StaticContentController::class, 'editWhy']);
    Route::put('update-head/{id}', [StaticContentController::class, 'updateHead']);
    Route::put('update-why/{id}', [StaticContentController::class, 'updateWhy']);
    Route::get('delete-head/{id}', [StaticContentController::class, 'destroyAbout']);
    Route::get('delete-why/{id}', [StaticContentController::class, 'destroyWhy']);

    Route::get('home-head', [HomeContentController::class, 'index']);
    Route::get('add-home-head', [HomeContentController::class, 'addHead']);
    Route::post('insert-home-head', [HomeContentController::class, 'insertHead']);
    Route::get('edit-home-head/{id}', [HomeContentController::class, 'editHead']);
    Route::put('update-home-head/{id}', [HomeContentController::class, 'updateHead']);
    Route::get('add-home-sec', [HomeContentController::class, 'addSec']);
    Route::post('insert-home-sec', [HomeContentController::class, 'insertSec']);
    Route::get('edit-home-sec/{id}', [HomeContentController::class, 'editSec']);
    Route::put('update-home-sec/{id}', [HomeContentController::class, 'updateSec']);



    Route::get('users', [DashboardController::class, 'users']);
    Route::get('view-user/{id}', [DashboardController::class, 'viewUser']);
});
