<?php

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

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
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::post('/esempio', function () {
    $foo = request('foo');

    dd($foo);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', [
        'name' => 'Carmelo Leone',
        'frameworks' => ['laravel', 'vue', 'inertia']
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users', function () {
    $users = User::query()
        ->select('id', 'name')
        ->when(Request::input('search'), function ($query, $search) {
            $query->where('name', 'like', '%' . $search . '%');
        })
        ->paginate(10)
        ->withQueryString();

    return Inertia::render('Users/Index', [
        'users' => $users,
        'filters' => Request::only(['search'])
    ]);
});

Route::get('/users/create', function () {
    return Inertia::render('Users/Create');
});

Route::post('users', function () {
    $val_data = Validator::make(request('form'), [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8'
    ]);

    if ($val_data->fails()) {
        return redirect()->back()->withErrors($val_data->errors()->getMessages());
    }

    //create user
    $user = User::create([
        'name' => request('form.name'),
        'email' => request('form.email'),
        'password' => bcrypt(request('form.password')),
    ]);

    //redirect
    return redirect(('/users'));
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
