<?php

use App\Http\Controllers\AddAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\backend\AmenitiesController;
use App\Http\Controllers\backend\PropertyTypeController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('admin.admin_login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::get('/admin/change/password', [AdminController::class, 'AdminchangePassword'])->name('admin.change.password');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::post('/admin/update/passwrod', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');
}); // End

Route::middleware(['auth', 'roles:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'AgentDashboard'])->name('agent.dashboard');
}); // End

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');

Route::middleware(['auth', 'roles:admin'])->group(function () {

    Route::controller(PropertyTypeController::class)->group(function () {
        Route::get('/all/type', 'AllType')->name('all.type')->middleware('permission:all.type');
        Route::get('/add/type', 'AddType')->name('add.type')->middleware('permission:add.type');
        Route::post('/store/type', 'StoreType')->name('store.type');
        Route::post('/update/type/{id}', 'UpdateType')->name('update.type');
        Route::get('/edit/type/{id}', 'EditType')->name('edit.type')->middleware('permission:edit.type');
        Route::get('/delete/type/{id}', 'DeleteType')->name('delete.type');
    });

    /////////////////////////////////////////////

    Route::controller(AmenitiesController::class)->group(function () {
        Route::get('/all/amenities', 'AllAmenities')->name('all.amenities');
        Route::get('/add/amenities', 'AddAmenities')->name('add.amenities');
        Route::post('/store/amenities', 'StoreAmenities')->name('store.amenities');
        Route::post('/update/amenities/{id}', 'UpdateAmenities')->name('update.amenities');
        Route::get('/edit/amenities/{id}', 'EditAmenities')->name('edit.amenities');
        Route::get('/delete/amenities/{id}', 'DeleteAmenities')->name('delete.amenities');
    });
    ///////////////////////////////////////
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::post('/update/permission/{id}', 'UpdatePermission')->name('update.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::get('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
    });
    /////////////////////////////////////
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/role', 'AllRole')->name('all.role');
        Route::get('/add/role', 'AddRole')->name('add.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        Route::post('/update/role/{id}', 'UpdateRole')->name('update.role');
        Route::get('/edit/role/{id}', 'EditRole')->name('edit.role');
        Route::get('/delete/role/{id}', 'DeleteRole')->name('delete.role');
    });
    /////////////////////////////////////
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/role/permission', 'AllRolePermission')->name('all.role.permission');
        Route::get('/add/role/permission', 'AddRolePermission')->name('add.role.permission');
        Route::post('/store/role/permission', 'StoreRolePermission')->name('role.pemission.store');
        Route::post('/update/role/permission/{id}', 'UpdateRolePermission')->name('update.role.permission');
        Route::get('/edit/role/permission/{id}', 'EditRolePermission')->name('edit.role.permission');
        Route::get('/delete/role/permission/{id}', 'DeleteRolePermission')->name('delete.role.permission');
    });

    /////////////////////////////////////
    Route::controller(AddAdminController::class)->group(function () {
        Route::get('all/admin', 'AllAdmin')->name('all.admin');
        Route::get('add/admin', 'AddAdmin')->name('add.admin');
        Route::post('storee/admin', 'AddStore')->name('storee.admin');
        Route::post('update/admin/{id}', 'UpdateAdmin')->name('update.admin');
        Route::get('edit/admin/{id}', 'EditAdmin')->name('edit.admin');
        Route::get('delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');
    });


}); // End

require __DIR__ . '/auth.php';
