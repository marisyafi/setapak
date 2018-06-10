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
Route::resource("tempat-wisata","TempatController");

Route::get("/artikel-data","ArtikelController@dataArtikel");
Route::get("/event-data","EventController@dataEvent");
Route::get("/pemandu-data","PemanduController@dataPemandu");
Route::post("/pemandustatus/{pemandu_id?}","PemanduController@status");
Route::get("/pembayaran-data","PembayaranController@dataPembayaran");
Route::post("/pembayaranstatus/{id?}","PembayaranController@status");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');