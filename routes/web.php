<?php

use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PinController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\BuatAlbumController;
use App\Http\Controllers\UbahPasswordController;

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

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [AuthController::class, 'register']);

Route::post('/registered', [AuthController::class, 'registered']);
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/auth', [AuthController::class, 'auth']);
    Route::get('/explore', function (){
        return view('page.explore');
    });
    
    Route::get('/getDataExplore', [ExploreController::class, 'getdata']);

    Route::post('/likefotos',[ExploreController::class, 'likefotos']);

    Route::get('/profile', function(){
        $user = auth()->user();
        return view('page.profile', compact('user'));
    });
    Route::get('/dataprofile', [ProfilController::class, 'getdataprofile']);
    Route::get('/getdataprofile/', [ProfilController::class, 'getdata']);
    
    Route::get('/pin', function (){
        $album = Album::where('id_user', Auth::user()->id)->get();
        return view('page.pin', compact('album'));
    });
    
    Route::get('/explore-detail/{id}', function (){
        return view('page.explore-detail');
    });

    Route::post('/savepin', [PinController::class, 'savepin']);

    Route::get('/explore-detail/{id}/getdatadetail',[ExploreController::class, 'getdatadetail']);

    Route::get('/explore-detail/getComment/{id}',[ExploreController::class, 'ambildatakomentar']);
    
    Route::get('/detail-explore-postingan', function (){
        return view('page.detail-explore-postingan');
    });

    Route::post('/explore-detail-kirimkomentar',[ExploreController::class, 'kirimkomentar']);
    Route::get('/edit-postingan', function (){
        return view('page.edit-postingan');
    });

    Route::get('/profile', function (){
        return view('page.profile');
    });

    Route::get('/album', [AlbumController::class, 'index']);
    Route::post('/buatalbum', [AlbumController::class, 'storeAlbum']);
    Route::get('/detailalbum/{id}', [AlbumController::class, 'detail']);

    Route::get('/buatalbum', function () {
        return view('page.buatalbum');
    });

    Route::get('/ubahprofil', function (){
        $user = auth()->user();
        return view('page.ubahprofil', compact('user'));
    });

    Route::post('/ubahprofil', [AuthController::class, 'ubahprofil']);

    Route::post('/ubahPassword', [UserController::class, 'ubahPassword'])->name('ubahpassword')->middleware('auth');

    Route::get('/my-pin', function (){
        return view('page.my-pin');
    });
    
    Route::get('/dataprofile/', [ProfilController::class, 'getdataprofile']);
    Route::get('/getdataprofile/', [ProfilController::class, 'getdata']);
    
    Route::get('/logout', [AuthController::class, 'logout']);
    
//

    Route::get('edit-postingan/{id}', [FotoController::class,'editpostingan']);
    Route::get('/hapus/{id}', [FotoController::class, 'hapuspostingan']);

    Route:: get('/ubahpassword',function(){
        return view('page.ubah-password');
    });
