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
Route::get("/artikel-data","ArtikelController@dataArtikel");
Route::post("/artikelstatus/{id?}","ArtikelController@status");

Route::resource("event","EventController");
Route::get("/event-data","EventController@dataEvent");
Route::post("/eventstatus/{id?}","EventController@status");

Route::resource("pemandu-wisata","PemanduController");
Route::get("/pemandu-data","PemanduController@dataPemandu");
Route::post("/pemandustatus/{pemandu_id?}","PemanduController@status");

Route::resource("pembayaran","PembayaranController");
Route::get("/pembayaran-data","PembayaranController@dataPembayaran");
Route::post("/pembayaranstatus/{id}","PembayaranController@status");

Route::post("/jasa-status/{id?}","PembayaranController@statusJasa");
Route::get("/jasa-hapus/{id?}","PembayaranController@destroyJasa");

Route::post("/homestay-status/{id?}","PembayaranController@statusHomestay");
Route::get("/home-hapus/{id?}","PembayaranController@destroyHome");

Route::post("/barang-status/{id?}","PembayaranController@statusBarang");
Route::get("/barang-hapus/{id?}","PembayaranController@destroyBarang");

Route::post("/bank-status/{id?}","BankController@status");
Route::resource("bank","BankController");

Route::resource("lokasi","LokasiController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');