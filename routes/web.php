<?php

use App\Http\Controllers\ContentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
// use App\Http\Controllers\PricingController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\TemplateController;
// use App\Http\Controllers\TemplateTypeController;
// use App\Http\Controllers\UserController;


use App\Http\Controllers\ProductController;
use App\Http\Controllers\PriceController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\SalesmanAllocationController;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;



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

// Route::get('/', function () {
//     return view('welcome');
// });

// Resourses (Controller alias name)
Route::resource('loginCon', 'LoginController');
Route::resource('RegisterCon', 'RegisterController');
Route::resource('DashboardCon', 'DashboardController');


// Routes
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'chk_login'])->name('check_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/users/list', [LoginController::class, 'get_all_users'])->name('get_all_users');

// Route::get('/test/register', [RegisterController::class, 'register1']);
// Route::post('/test/register', [RegisterController::class, 'register1_process']);

Route::get('/forgot-password', [RegisterController::class, 'forgot_password'])->name('forgot_password');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



// Route::get('/dashboard/employee/list', [UserController::class, 'index'])->name('users_list');
// Route::get('/dashboard/employee/add', [UserController::class, 'add_users'])->name('users_add');
// Route::post('/dashboard/employee/add', [UserController::class, 'add_users_data'])->name('users_add_data');
// Route::get('/dashboard/employee/update/{id}', [UserController::class, 'update_users'])->name('users_update');
// Route::post('/dashboard/employee/update', [UserController::class, 'update_users_data'])->name('users_update_data');
// Route::get('/dashboard/employee/delete/{id}', [UserController::class, 'delete_users'])->name('users_delete');
// Route::get('/dashboard/employee/status_change/{id}/{op}', [UserController::class, 'status_change'])->name('users_status_change');



Route::get('/dashboard/products/list', [ProductController::class, 'index'])->name('product_list');
Route::get('/dashboard/products/add', [ProductController::class, 'add_products'])->name('product_add');
Route::post('/dashboard/products/add', [ProductController::class, 'add_products_data'])->name('product_add_data');
Route::get('/dashboard/products/update/{id}', [ProductController::class, 'update_products'])->name('product_update');
Route::post('/dashboard/products/update', [ProductController::class, 'update_products_data'])->name('product_update_data');
Route::get('/dashboard/products/delete/{id}', [ProductController::class, 'delete_products'])->name('product_delete');
Route::get('/dashboard/products/status_change/{id}/{op}', [ProductController::class, 'status_change'])->name('product_status_change');



Route::get('/dashboard/prices/list', [PriceController::class, 'index'])->name('price_list');
Route::get('/dashboard/prices/add', [PriceController::class, 'add_price'])->name('price_add');
Route::post('/dashboard/prices/add', [PriceController::class, 'add_price_data'])->name('price_add_data');
Route::get('/dashboard/prices/update/{id}', [PriceController::class, 'update_price'])->name('price_update');
Route::post('/dashboard/prices/update', [PriceController::class, 'update_price_data'])->name('price_update_data');
Route::get('/dashboard/prices/delete/{id}', [PriceController::class, 'delete_price'])->name('price_delete');
Route::get('/dashboard/prices/status_change/{id}/{op}', [PriceController::class, 'status_change'])->name('price_status_change');


Route::get('/dashboard/salesmans/list', [SalesmanController::class, 'index'])->name('salesman_list');
Route::get('/dashboard/salesmans/add', [SalesmanController::class, 'add_salesman'])->name('salesman_add');
Route::post('/dashboard/salesmans/add', [SalesmanController::class, 'add_salesman_data'])->name('salesman_add_data');
Route::get('/dashboard/salesmans/update/{id}', [SalesmanController::class, 'update_salesman'])->name('salesman_update');
Route::post('/dashboard/salesmans/update', [SalesmanController::class, 'update_salesman_data'])->name('salesman_update_data');
Route::get('/dashboard/salesmans/delete/{id}', [SalesmanController::class, 'delete_salesman'])->name('salesman_delete');
Route::get('/dashboard/salesmans/status_change/{id}/{op}', [SalesmanController::class, 'status_change'])->name('salesman_status_change');


Route::get('/dashboard/roles/list', [RolesController::class, 'index'])->name('roles_list');
Route::get('/dashboard/roles/add', [RolesController::class, 'add_roles'])->name('roles_add');
Route::post('/dashboard/roles/add', [RolesController::class, 'add_roles_data'])->name('roles_add_data');
Route::get('/dashboard/roles/update/{id}', [RolesController::class, 'update_roles'])->name('roles_update');
Route::post('/dashboard/roles/update', [RolesController::class, 'update_roles_data'])->name('roles_update_data');
Route::get('/dashboard/roles/delete/{id}', [RolesController::class, 'delete_roles'])->name('roles_delete');
Route::get('/dashboard/roles/status_change/{id}/{op}', [RolesController::class, 'status_change'])->name('roles_status_change');


Route::get('/dashboard/shop/list', [ShopController::class, 'index'])->name('shop_list');
Route::get('/dashboard/shop/add', [ShopController::class, 'add_shop'])->name('shop_add');
Route::post('/dashboard/shop/add', [ShopController::class, 'add_shop_data'])->name('shop_add_data');
Route::get('/dashboard/shop/update/{id}', [ShopController::class, 'update_shop'])->name('shop_update');
Route::post('/dashboard/shop/update', [ShopController::class, 'update_shop_data'])->name('shop_update_data');
Route::get('/dashboard/shop/delete/{id}', [ShopController::class, 'delete_shop'])->name('shop_delete');
Route::get('/dashboard/shop/status_change/{id}/{op}', [ShopController::class, 'status_change'])->name('shop_status_change');


Route::get('/dashboard/order/list', [OrdersController::class, 'index'])->name('order_list');
Route::get('/dashboard/order/view/{id}', [OrdersController::class, 'view'])->name('order_view');


Route::get('/dashboard/salesman-allocation/list', [SalesmanAllocationController::class, 'index'])->name('salesmanAllocation_list');
Route::get('/dashboard/salesman-allocation/add', [SalesmanAllocationController::class, 'add'])->name('salesmanAllocation_add');
Route::post('/dashboard/salesman-allocation/add', [SalesmanAllocationController::class, 'add_data'])->name('salesmanAllocation_add_data');
Route::get('/dashboard/salesman-allocation/update/{id}', [SalesmanAllocationController::class, 'update'])->name('salesmanAllocation_update');
Route::post('/dashboard/salesman-allocation/update', [SalesmanAllocationController::class, 'update_data'])->name('salesmanAllocation_update_data');
Route::get('/dashboard/salesman-allocation/delete/{id}', [SalesmanAllocationController::class, 'delete'])->name('salesmanAllocation_delete');
Route::get('/dashboard/salesman-allocation/status_change/{id}/{op}', [SalesmanAllocationController::class, 'status_change'])->name('salesmanAllocation_status_change');
