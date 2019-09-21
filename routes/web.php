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
    return view('welcome');
});

//*** login ***
Route::get('/login','loginController@index')->name('login.index');
//Route::get('/test/123','loginController@test')->name('test.index');

Route::post('/login','loginController@signin');
//### login ###

//*** logout ***
Route::get('/logout', 'logoutController@index')->name('logout.index');
//### logout

//*** registration ***
Route::get('/registration','registrationController@index')->name('registration.index');

Route::post('/registration','registrationController@signup');

//### registration ###



//*** portal common ***
Route::get('/portal','portalController@index')->name('portal.index');

//### portal common ###

//*** portal super admin *** 
Route::get('/portal/superadmin','superadminController@index')->name('superadmin.index');
Route::get('/portal/superadmin/addAdmin','superadminController@addAdminView')->name('addAdminView.index');
Route::get('/portal/superadmin/userList','superadminController@userListView')->name('userListView.index');
Route::get('/portal/superadmin/removeUser/{id}','superadminController@removeUser')->name('removeUserSuper');


Route::post('/portal/superadmin/addAdmin','superadminController@addAdmin');
//### portal super admin ###

//*** portal  admin *** 
Route::get('/portal/admin','adminController@index')->name('admin.index');
Route::get('/portal/admin/userList','adminController@userListView')->name('userListViewA.index');
Route::get('/portal/admin/removeUser/{id}','adminController@removeUser')->name('removeUser');


//### portal  admin ###

//*** portal user  *** 
Route::get('/portal/user','userController@index')->name('user.index');
Route::get('/portal/user/profile','userController@profileView')->name('profileView.index');
Route::get('/portal/user/addProduct','userController@addProductView')->name('addProductView.index');
Route::get('/portal/user/updateProduct/{p_id}','userController@productUpdateView')->name('productUpdateView');
Route::get('/portal/user/removeProduct/{p_id}','userController@deleteProduct')->name('removeProduct');
Route::get('/portal/user/create','userController@createinvoiceView')->name('createinvoiceView.index');
Route::get('/portal/user/previousInvoiceList','userController@previousInvoiceView')->name('previousInvoiceView.index');
Route::get('/portal/user/updateInvoice/{invoice_number}','userController@invoiceUpdateView')->name('invoiceUpdateView');



//Route::get('/portal/user/create/invoice','userController@createinvoice')->name('createinvoice.index');





Route::post('/portal/user/profile','userController@profileUpdate');
Route::post('/portal/user/updateProduct/{p_id}','userController@productUpdate');
Route::post('/portal/user/addProduct','userController@addProduct');
Route::post('/portal/user/updateInvoice/{invoice_number}','userController@invoiceUpdate');


//Route::post('/portal/user/create','userController@createinvoice');
Route::post('/portal/user/create','userController@createinvoice');
//Route::post('/portal/user/create','userController@productFetch')->name('product.fetch');


/*Route::get('/autocomplete', 'userController@index1');
Route::post('/autocomplete/fetch', 'userController@productFetch')->name('product.fetch');*/

//### portal user  ###
