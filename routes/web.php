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



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/view', 'UsersController@index');
Route::get('/user/profile/edit/{id}', 'UsersController@profile');
Route::post('/user/profile/save', 'UsersController@profile_save');
Route::post('user/settings', 'UsersController@settings');
Route::get('/user/view', 'UsersController@index');


// Setups Module
// Contact Submodule
Route::get('setups/contact/view_contact', 'ContactController@view_contact');
Route::get('setups/contact/add_contact','ContactController@add_contact');
Route::post('setups/contact/insert_contact','ContactController@insert_contact');
Route::get('setups/contact/delete_contact/{id}','ContactController@delete_contact');
Route::get('setups/contact/edit_contact/{id}','ContactController@edit_contact');
Route::post('setups/contact/update_contact/{id}','ContactController@update_contact');
// End Contact Submodule

// Event Submodule
Route::get('setups/event/add_event','EventController@add_event');
Route::post('setups/event/insert_event','EventController@insert_event');
Route::get('setups/event/view_event','EventController@view_event');
Route::get('setups/event/delete_event/{id}','EventController@delete_event');
Route::get('setups/event/edit_event/{id}','EventController@edit_event');
Route::post('setups/event/update_event/{id}','EventController@update_event');
// End Event Submodule
// End Setups Module

// Purchase Order
Route::get('purchase/add_purchase_order','PurchaseController@add_purchase_order');
Route::post('purchase/insert_purchase_order','PurchaseController@insert_purchase_order');
Route::get('purchase/view_purchase_order','PurchaseController@view_purchase_order');
Route::get('purchase/view_all_details_po/{id}','PurchaseController@view_all_details_po');
Route::get('purchase/edit_purchase_order/{id}','PurchaseController@edit_purchase_order');
Route::post('purchase/update_purchase_order/{id}','PurchaseController@update_purchase_order');
Route::get('purchase/delete_purchase_order/{id}','PurchaseController@delete_purchase_order');
Route::get('purchase/delete_purchase_item/{id}','PurchaseController@delete_purchase_item');
//End Purchase Order




//Account Group Route Start
Route::get('/account-group/list/', 'AccountGroupController@index');
Route::get('/account-group/add-new/', 'AccountGroupController@accountGroupAdd');
Route::get('/account-group/edit/{id}', 'AccountGroupController@accountGroupEdit');
Route::post('/account-group/save/', 'AccountGroupController@accountGroupEditSave');
Route::post('account-group/new/save', 'AccountGroupController@accountGroupSave');
Route::get('account-group/delete/{id}', 'AccountGroupController@accountGroupDelete');
Route::get('account-group/status/{id}', 'AccountGroupController@accountGroupStatus');
//Account Group Route End

//account route start
Route::get('/account/list/', 'AccountController@index');
Route::get('/account/add-new/', 'AccountController@addAccount');
Route::post('account/new/save', 'AccountController@accountSave');
Route::get('/account/read/{id}', 'AccountController@accountRead');
Route::get('/account/edit/{id}', 'AccountController@accountEdit');
Route::get('account/status/{id}', 'AccountController@accountStatus');
Route::get('account/delete/{id}', 'AccountController@accountDelete');
Route::post('account/edit/save', 'AccountController@accountEditSave');
//Account route end

//Expenses route start
Route::get('expenses/view/', 'ExpensesController@index');
Route::get('expense/add-new/', 'ExpensesController@addExpenses');
Route::post('expense/new/save', 'ExpensesController@addExpensesSave');
Route::get('expense/edit/{id}', 'ExpensesController@EditExpenses');
Route::get('expense/read/{id}', 'ExpensesController@ReadExpenses');
Route::post('expense/edit/save', 'ExpensesController@ExpensesEditSave');
Route::get('expense/delete/{id}', 'ExpensesController@ExpensesDelete');
//Expenses route end

//Tax route start
Route::get('tax/view/', 'TaxController@index');
Route::get('tax/add-new/', 'TaxController@addTax');
Route::get('tax/edit/{id}', 'TaxController@EditTax');
Route::get('tax/read/{id}', 'TaxController@ReadTax');
Route::post('tax/new/save', 'TaxController@TaxSave');
Route::post('tax/edit/save', 'TaxController@TaxEditSave');
Route::get('tax/delete/{id}', 'TaxController@TaxDelete');
//Tax route end








Route::get('/setups/category/add', 'CategorySetupController@index');
Route::post('/setups/category/store', 'CategorySetupController@store');
Route::get('/setups/category', 'CategorySetupController@show');
Route::get('/setups/category/delete/{id}', 'CategorySetupController@delete');
Route::get('/setups/category/edit/{id}', 'CategorySetupController@edit');
Route::post('/setups/category/edit/{id}', 'CategorySetupController@update');
Route::get('/setups/category/change_status/{id}', 'CategorySetupController@change_status');


Route::get('/setups/country/add', 'CountrySetupController@index');
Route::post('/setups/country/store', 'CountrySetupController@store');
Route::get('/setups/country', 'CountrySetupController@show');
Route::get('/setups/country/delete/{id}', 'CountrySetupController@delete');
Route::get('/setups/country/edit/{id}', 'CountrySetupController@edit');
Route::post('/setups/country/edit/{id}', 'CountrySetupController@update');
Route::get('/setups/country/change_status/{id}', 'CountrySetupController@change_status');



Route::get('/setups/region/add', 'RegionSetupController@index');
Route::post('/setups/region/store', 'RegionSetupController@store');
Route::get('/setups/region', 'RegionSetupController@show');
Route::get('/setups/region/delete/{id}', 'RegionSetupController@delete');
Route::get('/setups/region/edit/{id}', 'RegionSetupController@edit');
Route::post('/setups/region/edit/{id}', 'RegionSetupController@update');
Route::get('/setups/region/change_status/{id}', 'RegionSetupController@change_status');



Route::get('/setups/location/add', 'LocationSetupController@index');
Route::post('/setups/location/store', 'LocationSetupController@store');
Route::get('/setups/location', 'LocationSetupController@show');
Route::get('/setups/location/delete/{id}', 'LocationSetupController@delete');
Route::get('/setups/location/edit/{id}', 'LocationSetupController@edit');
Route::post('/setups/location/edit/{id}', 'LocationSetupController@update');
Route::get('/setups/location/change_status/{id}', 'LocationSetupController@change_status');



Route::get('/sales/customers/add', 'CustomerSetupController@index');
Route::post('/sales/customers/store', 'CustomerSetupController@store');
Route::get('/sales/customers', 'CustomerSetupController@show');
Route::get('/sales/customers/delete/{id}', 'CustomerSetupController@delete');
Route::get('/sales/customers/edit/{id}', 'CustomerSetupController@edit');
Route::post('/sales/customers/edit/{id}', 'CustomerSetupController@update');


Route::get('/sales/invoice-items/add', 'InvoiceItemController@index');
Route::post('/sales/invoice-items/store', 'InvoiceItemController@store');
Route::get('/sales/invoice-items', 'InvoiceItemController@show');
Route::get('/sales/invoice-items/delete/{id}', 'InvoiceItemController@delete');
Route::get('/sales/invoice-items/edit/{id}', 'InvoiceItemController@edit');
Route::post('/sales/invoice-items/edit/{id}', 'InvoiceItemController@update');
Route::get('/sales/invoice-items/change_status/{id}', 'InvoiceItemController@change_status');



Route::get('discount-Periods-Setup','managements\DiscountPeriodsSetupController@index');
Route::get('discount-periods-add', 'managements\DiscountPeriodsSetupController@discount_add');
Route::post('discount-periods-store', 'managements\DiscountPeriodsSetupController@discount_store');
Route::get('discount-periods-edit/{id}', 'managements\DiscountPeriodsSetupController@discount_edit');
Route::post('discount-periods-update/{id}', 'managements\DiscountPeriodsSetupController@discount_update');
Route::get('discount-periods-delete/{id}', 'managements\DiscountPeriodsSetupController@discount_delete');


Route::get('acounts-discount-setup','managements\AccountDiscountSetupController@index');
Route::get('acounts-discount-add','managements\AccountDiscountSetupController@discount_add');
Route::post('acounts-discount-store','managements\AccountDiscountSetupController@discount_store');
Route::post('discount-items-store','managements\AccountDiscountSetupController@discount_items_store');
Route::get('list-of-discount-items','managements\AccountDiscountSetupController@list_of_discount_items')->name('list-of-discount-items');
Route::get('account-discount-delete/{id}','managements\AccountDiscountSetupController@account_delete');
Route::get('account-discount-edit/{id}','managements\AccountDiscountSetupController@account_edit');

Route::post('acounts-discount-update/{id}','managements\AccountDiscountSetupController@discount_update');
Route::get('discount-item-delete/{id}','managements\AccountDiscountSetupController@discount_item_delete');
Route::post('discount-items-edit','managements\AccountDiscountSetupController@discount_items_update');


//ksdkfjsbdkjfhksjdhfkj