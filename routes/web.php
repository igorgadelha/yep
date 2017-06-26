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

Route::get('/',['as'=>'home', 'uses' => function () {
    return view('home');
}]);

Route::group(['prefix' => 'admin','middleware' => 'auth'], function () {

  Route::get('/categories', [ 'as' => 'categories.index', 'uses' => 'CategoriesController@index' ]);
  Route::get('/categories/create',  [ 'as' => 'categories.create', 'uses' => 'CategoriesController@create' ]);
  Route::get('/categories/edit/{id}',  [ 'as' => 'categories.edit', 'uses' => 'CategoriesController@edit' ]);
  Route::delete('/categories/delete/{id}',  [ 'as' => 'categories.delete', 'uses' => 'CategoriesController@delete' ]);
  Route::post('/categories/store',  [ 'as' => 'categories.store', 'uses' => 'CategoriesController@store' ]);
  Route::post('/categories/update/{id}',  [ 'as' => 'categories.update', 'uses' => 'CategoriesController@update' ]);

  Route::resource('produtos','ProductsController',[
    'names' => [
      'index' => 'products.index',
      'show' => 'products.show',
      'create' => 'products.create',
      'store' => 'products.store',
      'edit' => 'products.edit',
      'update' => 'products.update',
      'destroy' => 'products.destroy',
    ]
  ]);
  // Route::get('/produtos', [ 'as' => 'products.index', 'uses' => 'ProductsController@index' ]);

  Route::resource('clientes','ClientsController',[
    'names' => [
      'index' => 'clients.index',
      'show' => 'clients.show',
      'create' => 'clients.create',
      'store' => 'clients.store',
      'edit' => 'clients.edit',
      'update' => 'clients.update',
      'destroy' => 'clients.destroy',
      'data' => 'clients.data',
    ]
  ]);
  Route::resource('clientes','ClientsController',[
    'names' => [
      'index' => 'clients.index',
      'show' => 'clients.show',
      'create' => 'clients.create',
      'store' => 'clients.store',
      'edit' => 'clients.edit',
      'update' => 'clients.update',
      'destroy' => 'clients.destroy',
    ]
  ]);
  Route::get('clientes/data',['as' => 'clients.data','uses' => 'ClientsController@data']);

  Route::resource('pedidos','OrdersController',[
    'names' => [
      'index' => 'orders.index',
      'show' => 'orders.show',
      'create' => 'orders.create',
      'store' => 'orders.store',
      'edit' => 'orders.edit',
      'update' => 'orders.update',
      'destroy' => 'orders.destroy',
    ]
  ]);


});

Route::resource('checkout','CheckoutController',[
    'names' => [
        'index' => 'checkout.index',
        'show' => 'checkout.show',
        'create' => 'checkout.create',
        'store' => 'checkout.store',
        'edit' => 'checkout.edit',
        'update' => 'checkout.update',
        'destroy' => 'checkout.destroy',
    ]
]);

Route::get('restaurantes/{id}/produtos',['as' => 'restaurants.itens','uses' => 'RestaurantsController@produtos']);

Route::resource('restaurantes','RestaurantsController',[
    'names' => [
        'index' => 'restaurants.index',
        'show' => 'restaurants.show',
        'create' => 'restaurants.create',
        'store' => 'restaurants.store',
        'edit' => 'restaurants.edit',
        'update' => 'restaurants.update',
        'destroy' => 'restaurants.destroy',
    ]

  ]);

    Route::resource('cupons','CupomsController',[
      'names' => [
        'index' => 'cupoms.index',
        'show' => 'cupoms.show',
        'create' => 'cupoms.create',
        'store' => 'cupoms.store',
        'edit' => 'cupoms.edit',
        'update' => 'cupoms.update',
        'destroy' => 'cupoms.destroy',
      ]
    ]);


Route::get('cart/add/{id}',['as' => 'cart.add','uses' => 'CartController@add']);
Route::get('cart/checkout',['as' => 'cart.checkout','uses' => 'CartController@itens']);
Route::put('cart/update/{id}',['as' => 'cart.update','uses' => 'CartController@update']);
Route::delete('cart/remove/{id}',['as' => 'cart.destroy','uses' => 'CartController@destroy']);
// shipping
Route::get('cart/shipping',['as' => 'cart.shipping','uses' => 'CartController@shipping']);
Route::post('cart/shipping',['as' => 'cart.shipping','uses' => 'CartController@storeShipping']);
// payment
Route::get('cart/payment',['as' => 'cart.payment','uses' => 'CartController@payment']);
Route::post('cart/payment',['as' => 'cart.payment','uses' => 'CartController@storePayment']);
Route::post('cart/payment/confirmation',['as' => 'cart.payment','uses' => 'CartController@confirmation']);
