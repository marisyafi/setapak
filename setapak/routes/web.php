<?php

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
    return view('auth.login');
});

Route::resource("artikels","ArtikelController");
Route::resource("event","EventController");
Route::resource("pembayaran","PembayaranController");
Route::resource("pemandu-wisata","PemanduController");

Route::get("/artikel-data","ArtikelController@dataArtikel");
Route::get("/event-data","EventController@dataEvent");
Route::get("/pemandu-data","PemanduController@dataPemandu");
Route::post("/pemandustatus/{pemandu_id?}","PemanduController@status");
Route::get("/pembayaran-data","PembayaranController@dataPembayaran");
Route::post("/pembayaranstatus/{id}","PembayaranController@status");
Route::post("/jasa-status/{id?}","PembayaranController@statusJasa");
Route::post("/homestay-status/{id?}","PembayaranController@statusHomestay");
Route::post("/barang-status/{id?}","PembayaranController@statusBarang");
Route::get("/jasa-hapus/{id?}","PembayaranController@destroyJasa");
Route::get("/home-hapus/{id?}","PembayaranController@destroyHome");
Route::get("/barang-hapus/{id?}","PembayaranController@destroyBarang");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');