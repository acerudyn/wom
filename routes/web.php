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

Route::get('/registernew', function () {
    return view('auth/registernew');
});
Route::get('/reset', function () {
    return view('auth/passwords/resetnew');
});

/* <================== HOTEL TABLE CONTROLLER ==================> */
Route::get('/addHotel', 'hotelController@create');
Route::post('/storeHotel', 'hotelController@store');
Route::get('/showHotel', 'hotelController@index');
Route::get('/viewHotel/{id}', 'hotelController@view');
Route::get('/editHotel/{id}', 'hotelController@edit');
Route::post('/updateHotel/{id}', 'hotelController@update');
Route::get('/deleteHotel/{id}', 'hotelController@destroy');

/* <================== RO TABLE CONTROLLER ==================> */
Route::get('/addRo', 'roController@create');
Route::post('/storeRo', 'roController@store');
Route::get('/showRo', 'roController@index');
Route::get('/viewRo/{id}', 'roController@view');
Route::get('/editRo/{id}', 'roController@edit');
Route::post('/updateRo/{id}', 'roController@update');
Route::get('/deleteRo/{id}', 'roController@destroy');
Route::post('/uploadRo', 'roController@importPart');

/* <================== MSO TABLE CONTROLLER ==================> */
Route::get('/addMso', 'msoController@create');
Route::post('/storeMso', 'msoController@store');
Route::get('/showMso', 'msoController@index');
Route::get('/viewMso/{id}', 'msoController@view');
Route::get('/editMso/{id}', 'msoController@edit');
Route::post('/updateMso/{id}', 'msoController@update');
Route::get('/deleteMso/{id}', 'msoController@destroy');
Route::post('/uploadMso', 'msoController@importPart');

/* <================== PARTNER TABLE CONTROLLER ==================> */
Route::get('/addPartner', 'partnerController@create');
Route::post('/storePartner', 'partnerController@store');
Route::get('/showPartner', 'partnerController@index');
Route::get('/viewPartner/{id}', 'partnerController@view');
Route::get('/editPartner/{id}', 'partnerController@edit');
Route::post('/updatePartner/{id}', 'partnerController@update');
Route::get('/deletePartner/{id}', 'partnerController@destroy');

/* <================== SPK TABLE CONTROLLER ==================> */
Route::get('/addSpk', 'spkController@create');
Route::post('/storeSpk', 'spkController@store');
Route::get('/showSpk', 'spkController@index');
Route::get('/viewSpk/{id}', 'spkController@view');
Route::get('/editSpk/{id}', 'spkController@edit');
Route::post('/updateSpk/{id}', 'spkController@update');
Route::get('/deleteSpk/{id}', 'spkController@destroy');
Route::post('/uploadSpk', 'spkController@importPart');
Route::get('/viewSpkPdf/{id}', 'spkController@viewPdf');

Route::get('/streamSpkPdf/{id}', 'spkController@streamPdf');
Route::get('/downloadSpkPdf/{id}', 'spkController@downloadPdf');

/* <================== DATA SPK CONTROLLER ==================> */
Route::get('/showLookup', 'DataSpkController@lookup');
Route::post('/storeLookup', 'DataSpkController@filter');


/*------------------------Admin RO--------------------------*/
Route::get('/showSpkByRo', 'spkController@indexRo');
Route::get('/editSpkByRo/{id}', 'spkController@editRo');
Route::post('/updateSpkByRo/{id}', 'spkController@updateRo');

/*------------------------Admin MSO--------------------------*/
Route::get('/showSpkByMso', 'spkController@indexMso');
Route::get('/editSpkByMso/{id}', 'spkController@editMso');
Route::post('/updateSpkByMso/{id}', 'spkController@updateMso');

/*------------------------Admin Partner--------------------------*/
Route::get('/showSpkByPartner', 'spkController@indexPartner');

/*------------------------Admin Finance--------------------------*/
Route::get('/showSpkByFinance', 'spkController@indexFinance');


/* <================== USER TABLE CONTROLLER ==================> */
Route::get('/addUser', 'userController@create');
Route::post('/storeUser', 'userController@store');
Route::get('/showUser', 'userController@index');
Route::get('/showProfil/{id}', 'userController@profil');
Route::get('/viewUser/{id}', 'userController@view');
Route::get('/editUser/{id}', 'userController@edit');
Route::get('/editUserByAdmin/{id}', 'userController@editByAdmin');
Route::post('/updateUser/{id}', 'userController@update');
Route::post('/updateUserByAdmin/{id}', 'userController@updateByAdmin');
Route::get('/deleteUser/{id}', 'userController@destroy');

Auth::routes();

Route::get('/home', 'dashboardController@index');
Route::get('/dashboard', 'dashboardController@index');
//Route::get('/', 'indexController@index');
Route::get('/', function () {
    return view('auth/login');
});

Route::get('/invoice', function () {
    return view('admin/invoiceBlank');
});

Route::get('/404', function () {
    return view('errors/404');
});

Route::get('/pdf', function () {
    return view('admin/pdfBlank');
});
