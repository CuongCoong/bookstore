<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ForumAdController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Người dùng
Route::get('/dang_nhap', [HomeController::class, 'dang_nhap'])->name('home.dang_nhap');
Route::get('/dang_ki', [HomeController::class, 'dang_ki'])->name('home.dang_ki');
Route::post('/dang_nhap', [HomeController::class, 'check']);
Route::post('/dang_ki', [HomeController::class, 'dangki']);
Route::group(['prefix' => ''], function () {
    Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::get('/info_cus/{cus}', [HomeController::class, 'info_cus'])->name('info_cus');
    Route::post('/info_cus1/{cus}', [HomeController::class, 'post_cus'])->name('doi_info');
    Route::get('/pass/{cus}', [HomeController::class, 'pass'])->name('pass');
    Route::post('/pass/{cus}', [HomeController::class, 'post_pass']);
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/thong_tin/{sp}', [HomeController::class, 'thong_tin'])->name('index.thong_tin');
    Route::post('/comment_sp/{sp}',[HomeController::class,'cmt_sp'])->name('cmt_sp');
    Route::get('/Feedback',[HomeController::class,'feedback'])->name('feedback');
    Route::post('/send',[HomeController::class,'post_feedback'])->name('send');


    Route::get('/gian_hang', [HomeController::class, 'gian_hang'])->name('gian_hang');
    Route::get('/search', [HomeController::class, 'search'])->name('search');
});
//diễn đàn
Route::group(['prefix' => 'forum'], function () {
    Route::get('/bang_tin', [ForumController::class, 'forum'])->name('index.forum');
    Route::post('/bang_tin', [ForumController::class, 'post_forum']);
    Route::post('/rep_cmt_for/{cmt}',[ForumController::class,'rep_cmt_for'])->name('rep_cmt_for');
    Route::post('/comment_forum', [ForumController::class, 'comment'])->name('comment');
    Route::get('/info_forum/{forum}', [ForumController::class, 'info'])->name('forum.info');
});


//giỏ hàng
Route::group(['prefix' => 'gio_hang'], function () {
    Route::get('/thong_tin', [CartController::class, 'thong_tin'])->name('gio_hang.thong_tin');
    Route::get('/them/{sp}', [CartController::class, 'them'])->name('gio_hang.them');
    Route::get('/sua/{sp}', [CartController::class, 'sua'])->name('gio_hang.sua');
    Route::get('/xoa/{sp}', [CartController::class, 'xoa'])->name('gio_hang.xoa');
    Route::get('/huy', [CartController::class, 'huy'])->name('gio_hang.huy');
});
//Đặt hàng
Route::group(['prefix' => 'dat_hang', 'middleware' => 'cus'], function () {
    Route::get('/thanh_toan', [OrderController::class, 'thanh_toan'])->name('dat_hang.thanh_toan');
    Route::post('/thanh_toan', [OrderController::class, 'post_thanh_toan']);
    Route::get('/lich_su', [OrderController::class, 'lich_su'])->name('dat_hang.lich_su');
    Route::get('/chi_tiet/{don}', [OrderController::class, 'chi_tiet'])->name('dat_hang.chi_tiet');
});


//admin
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login_ad']);
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('index_ad');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    

    //danh mục
    Route::group(['prefix' => 'danh_muc'], function () {
        Route::get('/danh_sach', [CategoryController::class, 'danh_sach'])->name('dm.danh_sach');
        Route::get('/them', [CategoryController::class, 'them'])->name('dm.them');
        Route::post('/them', [CategoryController::class, 'add']);
        Route::get('/sua/{dm}', [CategoryController::class, 'sua'])->name('dm.sua');
        Route::post('/sua/{dm}', [CategoryController::class, 'update']);
        Route::get('/xoa/{dm}', [CategoryController::class, 'xoa'])->name('dm.xoa');
    });

    //kích cỡ
    Route::group(['prefix' => 'kich_co'], function () {
        Route::get('/danh_sach', [SizeController::class, 'danh_sach'])->name('kc.danh_sach');
        Route::get('/them', [SizeController::class, 'them'])->name('kc.them');
        Route::post('/them', [SizeController::class, 'add']);
        Route::get('/xoa/{kc}', [SizeController::class, 'xoa'])->name('kc.xoa');
    });

    //banner

    Route::group(['prefix' => 'banner'], function () {
        Route::get('/kho_banner', [BannerController::class, 'kho_banner'])->name('banner.kho');

        Route::post('/kho_banner', [BannerController::class, 'them']);
        Route::get('/xoa/{ban}', [BannerController::class, 'xoa'])->name('banner.xoa');
    });
    Route::group(['prefix' => 'san_pham'], function () {
        Route::get('/thu_vien', [ProductController::class, 'thu_vien'])->name('sp.thu_vien');
        Route::get('/them', [ProductController::class, 'them'])->name('sp.them');
        Route::post('/them', [ProductController::class, 'add']);
        Route::get('/sua/{sp}', [ProductController::class, 'sua'])->name('sp.sua');
        Route::post('/sua/{sp}', [ProductController::class, 'update']);
        Route::get('/xoa/{sp}', [ProductController::class, 'xoa'])->name('sp.xoa');
    });
    //Forum admin
    Route::group(['prefix' => 'Forum_ad'], function () {
        Route::get('/forum', [ForumAdController::class, 'forum'])->name('ad.forum');
        Route::post('/forum', [ForumAdController::class, 'post_forum']);
        Route::get('/duyet_bai', [ForumAdController::class, 'duyet'])->name('forum.duyet');
        Route::post('/duyet_bai/{duyet}', [ForumAdController::class, 'post_duyet'])->name('duyet');
        Route::get('/comment/{forum}', [ForumAdController::class, 'info'])->name('forum.comment');
        Route::post('/comment_forum', [ForumAdController::class, 'comment_ad'])->name('comment_ad');
        Route::get('/xoa/{forum}', [ForumAdController::class, 'xoa_forum'])->name('forum.xoa');
        Route::get('/ad_feedback', [ForumAdController::class, 'ad_feedback'])->name('ad_feedback');
        Route::get('/xoa_feedback/{fb}', [ForumAdController::class, 'xoa_fb'])->name('xoa.feedback');
        Route::get('/triet_li', [ForumAdController::class, 'triet_li'])->name('triet_li');
        Route::post('/triet_li', [ForumAdController::class, 'post_triet_li']);
    });
    //Đơn hàng
        Route::group(['prefix'=>'don_hang'],function(){
            Route::get('/quan_li_don',[AdminOrderController::class,'don_hang'])->name('ad.don_hang');
            Route::get('/info_don/{don}',[AdminOrderController::class,'info_order'])->name('don_hang_ad.info');
            Route::put('/submit/{don}', [AdminOrderController::class, 'xac_nhan'])->name('xac_nhan');
            

        });


});
