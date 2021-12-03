<?php

use App\Http\Controllers\SearchData;
use App\Http\Controllers\LoginSystem;
use App\Http\Controllers\UpdateData;
use App\Http\Controllers\AdminCRUD;
use App\Http\Controllers\ProdiCRUD;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use app\Http\Controller\LoginController;

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

// route for home
Route::get('/', function () {
    return view('home');
});
// route for searching alumni
Route::get('/tracer', function () {
    return view('data_alumni');
});

//Routes collection for prodi
Route::post('/login_prodi', [LoginSystem::class, 'prodi_login']);
Route::get('/login_prodi', function () {
    $data = DB::table('prodi')->get();
    return view('login_prodi', compact('data'));
});
Route::post('/search_data', [SearchData::class, 'SearchProdiData']);
Route::get('/prodi_data', [SearchData::class, 'GetAllProdi']);
Route::get('/prodi', [SearchData::class, 'GetProdi']); // prodi dashboard
Route::post('/update_prodi', [UpdateData::class, 'UpdateProdi']); // route for executing update user prodi profile function
Route::get('/prodi_data/update/{nim}', function ($nim) { // route for showing prodi alumni update page
    $data = DB::table('data_alumni')->join('prodi', 'data_alumni.kode_prodi', '=', 'prodi.id')
    ->select('nim', 'no_ijasah', 'data_alumni.nama as nama', 'prodi.id as prodi',
    'prodi.nama as nama_prodi', 'fakultas', 'tanggal_lulus', 'histori')->where('nim', $nim)->first();
    return view('prodi_update_data', compact('data'));
});
Route::post('/prodi_data_update', [ProdiCRUD::class, 'UpdateData']); // route for executing update alumni function in prodi dashboard

//Routes collection for admin
Route::get('/login_admin', function () {
    return view('login_admin');
});
Route::post('/login_admin', [LoginSystem::class, 'admin_login']);
Route::get('/admin', [SearchData::class, 'GetAdmin']); // admin dashboard
Route::post('/update_admin', [UpdateData::class, 'UpdateAdmin']); // route for updating admin profile
Route::get('/admin_data', [SearchData::class, 'GetAllAlumni'])->name('admin_data'); // showing data menu in admin dashboard
Route::get('/admin_data/add', function () { // route for showing add alumni page in admin dashboard
    $data = DB::table('prodi')->get();
    return view('admin_add_data', compact('data'));
});
Route::post('/admin_data_add', [AdminCRUD::class, 'AddData']); // route for executing add alumni function in admin dashboard
Route::get('/admin_data/update/{nim}', function ($nim) { // route for showing update alumni page in admin dashboard
    $data = DB::table('data_alumni')->join('prodi', 'data_alumni.kode_prodi', '=', 'prodi.id')
    ->select('nim','kode_prodi' ,'no_ijasah', 'data_alumni.nama as nama', 'prodi.id as prodi',
    'prodi.nama as nama_prodi', 'fakultas', 'tanggal_lulus', 'histori')->where('nim', $nim)->first();
    $prodi = DB::table('prodi')->get();
    return view('admin_update_data', compact('data','prodi'));
});
Route::post('/admin_data_update', [AdminCRUD::class, 'UpdateData']); // route for executing update alumni function in admin dashboard
Route::get('/admin_data/delete/{id}', [AdminCRUD::class, 'DeleteData']);
Route::get('/admin_prodi', [AdminCRUD::class, 'ShowData'])->name('admin_prodi'); // showing menu prodi in admin dashboard
Route::get('/admin_prodi/add', function () { // route for showing add prodi page in admin dashboard
    $data = DB::table('prodi')->get();
    return view('admin_add_prodi', compact('data'));
});
Route::post('/admin_prodi_add', [AdminCRUD::class, 'AddProdi']); // route for executing add prodi function in admin dashboard
Route::get('/admin_prodi/update/{id}', function ($id) { // route for showing update prodi page in admin dashboard
    $data = DB::table('user_prodi')->where('id',$id)->first();
    $prodi = DB::table('prodi')->get();
    return view('admin_update_prodi', compact('data','prodi'));
});
Route::post('/admin_prodi_update', [AdminCRUD::class, 'UpdateProdi']); // route for executing update prodi function in admin dashboard
Route::get('/admin_prodi/delete/{id}', [AdminCRUD::class, 'DeleteProdi']);

Route::get('/search', function () { // route for showing search alumni page
    $data = DB::table('prodi')->get();
    return view('search', compact('data'));
});

Route::post('/search_result', [SearchData::class, 'SearchAlumni']); // route for executing searching alumni function

Route::get('/logout', [LoginSystem::class, 'logout']);
