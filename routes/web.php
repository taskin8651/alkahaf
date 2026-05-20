<?php

use App\Http\Controllers\Frontend\HomeController;

use App\Http\Controllers\Admin\WebsiteSettingController;
use App\Http\Controllers\Admin\TestimonialController;


Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});
 
Auth::routes();

Route::post('products/{product}/click', [HomeController::class, 'trackProductClick'])
    ->name('products.track-click');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

     Route::resource('products', ProductController::class);


    Route::get('website-settings', [WebsiteSettingController::class, 'index'])
        ->name('website-settings.index');

    Route::post('website-settings', [WebsiteSettingController::class, 'update'])
        ->name('website-settings.update');


    /*
    |--------------------------------------------------------------------------
    | Testimonials
    |--------------------------------------------------------------------------
    */
    Route::delete('testimonials/destroy', [TestimonialController::class, 'massDestroy'])
        ->name('testimonials.massDestroy');

    Route::resource('testimonials', TestimonialController::class);


    
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});


Route::get('/', [HomeController::class, 'index'])->name('home');
