<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Apis\RoleController;
use App\Http\Controllers\Apis\ShopController;
use App\Http\Controllers\Apis\OrderController;
use App\Http\Controllers\Apis\ProductController;
use App\Http\Controllers\Apis\SalesmanController;
use App\Http\Controllers\Apis\CityController;
use App\Http\Controllers\Apis\StateController;
use App\Http\Controllers\Apis\CountryController;
use App\Http\Controllers\Apis\CustomerController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::post('users/login', 'ApiController@userLogin');
Route::post('/users/login', [ApiController::class, 'userLogin'])->name('user_login');
Route::post('/users/register', [ApiController::class, 'userRegister'])->name('user_register');

Route::post('/template/templatetypes', [ApiController::class, 'templatetypes'])->name('template.templatetypes');
Route::post('/template/templates', [ApiController::class, 'templates'])->name('template.templates');
Route::post('/project/create', [ApiController::class, 'projectCreate'])->name('project.projectcreate');
Route::post('/project/list', [ApiController::class, 'projectList'])->name('project.projectlist');


Route::get('/roles/list/{id?}', [RoleController::class, 'list'])->name('roles.list');
Route::post('/roles/add', [RoleController::class, 'add'])->name('roles.add');
Route::post('/roles/update', [RoleController::class, 'update'])->name('roles.update');
Route::get('/roles/delete/{id?}', [RoleController::class, 'delete'])->name('roles.delete');
Route::get('/roles/empty', [RoleController::class, 'empty'])->name('roles.empty');


Route::post('/salesman/get', [SalesmanController::class, 'get'])->name('salesman.get');
Route::get('/salesman/get/teamleads', [SalesmanController::class, 'get_teamleads'])->name('salesman.get.teamleads');
Route::get('/salesman/get/salesmans', [SalesmanController::class, 'get_salesmans'])->name('salesman.get.salesman');

Route::get('/teamleads/get/salesman/{id?}', [SalesmanController::class, 'teamleads_get_salesman'])->name('teamleads.get.salesman');


Route::get('/salesman/list/{id?}', [SalesmanController::class, 'list'])->name('salesman.list');
Route::post('/salesman/add', [SalesmanController::class, 'add'])->name('salesman.add');
Route::post('/salesman/update', [SalesmanController::class, 'update'])->name('salesman.update');
Route::get('/salesman/delete/{id?}', [SalesmanController::class, 'delete'])->name('salesman.delete');
Route::get('/salesman/empty', [SalesmanController::class, 'empty'])->name('salesman.empty');


Route::get('/shop/list/pincode/{pincode?}', [ShopController::class, 'list_by_pincode'])->name('shop.list.pincode');
Route::get('/shop/list/{id?}', [ShopController::class, 'list'])->name('shop.list');
Route::post('/shop/add', [ShopController::class, 'add'])->name('shop.add');
Route::get('/shop/visit/{id}', [ShopController::class, 'shop_visit'])->name('shop.visit');

Route::post('/shop/details', [ShopController::class, 'get_shop_details'])->name('shop.details');


Route::get('/products/list/{id?}', [ProductController::class, 'list'])->name('products.list');


Route::get('/city/list/{id?}', [CityController::class, 'list'])->name('city.list');
Route::get('/state/list/{id?}', [StateController::class, 'list'])->name('state.list');
Route::get('/country/list/{id?}', [CountryController::class, 'list'])->name('country.list');


Route::post('/create/order', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/list', [OrderController::class, 'list'])->name('order.list');
Route::post('/create/order/shop', [OrderController::class, 'create_order_with_shop'])->name('order.create_order_with_shop');
Route::post('create/customer/order', [OrderController::class, 'create_customer_order'])->name('order.create_customer_order');

Route::post('/create/test', [OrderController::class, 'test'])->name('order.test');


Route::post('/shop/test/add', [ShopController::class, 'test_add'])->name('shop.test.add');


Route::post('/customer/login', [CustomerController::class, 'index'])->name('customer.login');
Route::post('/customer/register', [CustomerController::class, 'add'])->name('customer.register');



Route::get('/generate/uniquecode', function(){
    return response()->json([
            "data"=>rand(11111111, 99999999)
        ], 200);
});


