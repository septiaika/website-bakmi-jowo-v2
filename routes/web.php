<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AdminUlasanController;
use App\Http\Controllers\OrderController;
use App\Models\Menu;
use App\Models\Galeri;
use App\Models\Testimoni;
use App\Http\Controllers\CartController;

Route::get('/galeri/trash', [GaleriController::class, 'trash']);
Route::post('/galeri/restore/{id}', [GaleriController::class, 'restore'])->name('galeri.restore');
Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

Route::get('/menu/trash', [MenuController::class, 'trash'])->name('menu.trash');

Route::post('/menu/restore/{id}', [MenuController::class, 'restore'])->name('menu.restore');

Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');


Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');

/* ================= HALAMAN UMUM ================== */

Route::get('/', [MenuController::class, 'beranda'])->name('beranda');


/* ===== ORDER / CART ===== */
Route::post('/order/add', [OrderController::class, 'add'])->name('order.add');
Route::delete('/order/delete/{id}', [OrderController::class, 'delete'])->name('order.delete');
Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');

/* ===== PAGE ===== */
Route::view('/profil', 'profil');
Route::view('/kontak', 'kontak');

Route::get('/order-success', function () {
    return view('order-success');
})->name('order.success');

Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

/* ================= LOGIN ================= */

Route::get('/login', fn () => view('login'))->name('login');

Route::post('/login', function (Request $request) {

    if (Auth::attempt($request->only('email','password'))) {
        $request->session()->regenerate();
        return redirect('/dashboard');
    }

    return back()->with('error','Email atau password salah, Silahkan periksa kembali.');
});

/* ================= TESTIMONI ================= */

Route::post('/testimoni', function (Request $request) {

    $request->validate([
        'nama' => 'required',
        'email' => 'nullable|email',
        'pesan' => 'required',
        'rating' => 'required|integer|min:1|max:5'
    ], [
        'rating.required' => 'Silakan berikan rating dengan memilih jumlah bintang terlebih dahulu. ⭐'
    ]);

    Testimoni::create($request->all());

    return back()->with('success','Terima kasih atas ulasannya ❤️');
})->name('testimoni.store');
/* ================================================= */
/* ===================== ADMIN ===================== */
/* ================================================= */

Route::middleware('auth')->group(function () {

    /* ===== DASHBOARD ===== */
    Route::get('/dashboard', function () {
        return view('dashboard.index', [
            'totalMenu'   => Menu::count(),
            'totalGaleri' => Galeri::count(),
            'totalTestimoni' => Testimoni::count(),
            'rating'         => Testimoni::avg('rating'),
        ]);
    })->name('dashboard');


    /* ===== MENU CRUD ===== */
    Route::get('/dashboard/menu', [MenuController::class,'adminIndex'])
        ->name('dashboard.menu.index');

    Route::post('/dashboard/menu', [MenuController::class,'store'])
        ->name('dashboard.menu.store');

    Route::get('/dashboard/menu/{menu}/edit', [MenuController::class,'edit'])
        ->name('dashboard.menu.edit');

    Route::put('/dashboard/menu/{menu}', [MenuController::class,'update'])
        ->name('dashboard.menu.update');

    Route::delete('/dashboard/menu/{menu}', [MenuController::class,'destroy'])
        ->name('dashboard.menu.destroy');


    /* ===== GALERI CRUD ===== */
    Route::get('/dashboard/galeri', [GaleriController::class,'admin'])
        ->name('dashboard.galeri.index');

    Route::post('/dashboard/galeri', [GaleriController::class,'store'])
        ->name('dashboard.galeri.store');

    Route::get('/dashboard/galeri/{galeri}/edit', [GaleriController::class,'edit'])
        ->name('dashboard.galeri.edit');

    Route::put('/dashboard/galeri/{galeri}', [GaleriController::class,'update'])
        ->name('dashboard.galeri.update');

    Route::delete('/dashboard/galeri/{galeri}', [GaleriController::class,'destroy'])
        ->name('dashboard.galeri.destroy');

    /* ====================== ULASAN ADMIN ==================== */

    Route::get('/dashboard/ulasan', [AdminUlasanController::class, 'index'])
    ->name('dashboard.ulasan');

    Route::get('/dashboard/ulasan/{id}/edit', [AdminUlasanController::class, 'edit'])
        ->name('dashboard.ulasan.edit');

    Route::put('/dashboard/ulasan/{id}', [AdminUlasanController::class, 'update'])
        ->name('dashboard.ulasan.update');

    Route::delete('/dashboard/ulasan/{id}', [AdminUlasanController::class, 'destroy'])
        ->name('dashboard.ulasan.delete');
    
    /* ===== LOGOUT (PAKAI GET SUPAYA TIDAK ERROR) ===== */
    Route::get('/logout', function (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');

});
