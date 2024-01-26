<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Domain\DeleteDomainController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\User\DeleteUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Link\GetLinkController;
use App\Http\Controllers\Link\EditLinkController;
use App\Http\Controllers\User\GetUsersController;
use App\Http\Controllers\Link\CreateLinkController;
use App\Http\Controllers\Link\DeleteLinkController;
use App\Http\Controllers\Link\UpdateLinkController;
use App\Http\Controllers\Domain\GetDomainController;
use App\Http\Controllers\Company\GetCompanyController;
use App\Http\Controllers\Domain\CreateDomainController;
use App\Http\Controllers\Link\CreateLinkViewController;
use App\Http\Controllers\Company\UpdateCompanyController;
use App\Http\Controllers\Company\CreateCompanyController;
use App\Http\Controllers\User\CreateUserInCompanyController;

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
Route::get('/register', function () {
    return view('Register');
});

Route::post('/register', RegisterController::class)->name('register');

Route::get('/', function () {
    if(request()->user()?->roles->first()->name === 'root') {
        return redirect('/admin/companies');
    }

   return redirect('dash/user');
});

Route::get('/not_found', function () {
   return view('NotFound');
});

Route::prefix('login')->group(function () {
    Route::get('', function ()  {
        return view('Login');
    });
    Route::post('', LoginController::class)->name('login');
});

Route::middleware('auth')->get('/logout', function () {
    Auth::logout();

    return view('Login');
})->name('logout');

Route::prefix('dash')->middleware('auth')->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('', GetUsersController::class)->name('get_user');
        Route::post('/', CreateUserInCompanyController::class)->name('create_user_in_company');
        Route::get('/delete', DeleteUserController::class)->name('delete_user');
        Route::get('/create', function () {
            return view('User/CreateUser', ['owner' => request()->user()]);
        })->name('create_user_view');
    });

    Route::prefix('domain')->group(function () {
        Route::get('/', GetDomainController::class)->name('get_domain');
        Route::post('/', CreateDomainController::class)->name('create_domain');
        Route::get('/delete', DeleteDomainController::class)->name('delete_domain');
        Route::get('/create', function () {
            return view('Domain/CreateDomain', [
                'ipAddress' => request()->server('REMOTE_ADDR'),
                'owner' => request()->user()
                ]);
        })->name('create_domain_view');
    });

    Route::prefix('link')->group(function () {
        Route::get('/', GetLinkController::class)->name('get_link');
        Route::post('/', CreateLinkController::class)->name('link_create');
        Route::post('/update', UpdateLinkController::class)->name('update_link');
        Route::get('/edit', EditLinkController::class)->name('edit_link');
        Route::get('/create', CreateLinkViewController::class)->name('link_create_view');
        Route::get('/delete', DeleteLinkController::class)->name('delete_link');
    });
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::prefix('companies')->group(function () {
        Route::post('/', CreateCompanyController::class)->name('create_company');
        Route::get('/', GetCompanyController::class)->name('get_company');
        Route::put('/', UpdateCompanyController::class)->name('update_company');
        Route::get('/create', function () {
            return view('Company/CreateCompany', ['owner' => request()->user()]);
        })->name('create_company_view');
    });
});

Route::middleware('auth')->get('/profile', function () {
    return view('Profile', ['owner' => request()->user()]);
})->name('profile');

Route::get('/{any}', RedirectController::class);
