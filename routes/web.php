
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\GuardianController;
use App\Http\Controllers\API\ChildController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\StaffController;
use App\Http\Controllers\API\ContactController;


// Home route protected by authentication
Route::get('/home', [ProgramController::class, 'index'])->name('home')->middleware('auth');

Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);



Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Children registration page
Route::get('/childregistration', function () {
    return view('childregistration');
})->name('childregistration');

// Staff route
Route::get('/staff', function () {
    return view('staff');
})->name('staff');

Route::get('/staff', [StaffController::class, 'index']);

// About and Contact pages
Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Guardian registration routes
Route::get('/register/guardian', function () {
    return view('guardianregistration');
})->name('guardian.registration');
Route::post('/register/guardian', [GuardianController::class, 'store'])->name('register.guardian');

// Child registration routes
Route::get('/register/child', function () {
    return view('childregistration');
})->name('child.registration');
Route::post('/register/child', [ChildController::class, 'store'])->name('register.child');


Route::post('/contact', [ContactController::class, 'sendMail'])->name('contact.send');













