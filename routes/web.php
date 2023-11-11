<?php

use App\Http\Controllers\MatchesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferralsController;
use App\Http\Controllers\SeeksController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\UserController;
use App\Models\State;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth', 'verified'])->group(function () {
    // Redirection
    Route::redirect('/', 'dashboard');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    // Profile & forms
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/edit/form/{id}', function ($id) {
        $us=State::whereBetween('StateID',[0,51])->get();
        $canada=State::whereBetween("StateID",[53,67])->get();
        return view('user.profile.form' . $id)->with(['canadas'=>$canada,'usas'=>$us]);
    });
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.delete');
    
    // Subscriptions
    Route::get('/subscriptions', [SubscriptionsController::class, 'index'])->name('subs');

    // Seeks Resourse controller
    Route::resource('seeks', SeeksController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

    //---------------- Other Dashboard links---------------------//
    // Referrals
    Route::get('/referrals', [ReferralsController::class, 'create'])->name('referrals');
    Route::post('/referrals/save', [ReferralsController::class, 'store'])->name('submit.ref');

    // matches
    Route::get('/user/match/search', [MatchesController::class, 'match'])->name('match'); //Find match button
    Route::get('/find/user/profile/{user}', [UserController::class, 'foo'])->name('user.foo'); //View single user profile

    Route::get('/match', [MatchesController::class, 'index'])->name('match.index'); //Show saved matches page
    Route::post('/match', [MatchesController::class, 'store'])->name('match.store'); //Save a match
    Route::get('/match/{match}', [MatchesController::class, 'show'])->name('match.show');
    Route::patch('/match/{match}', [MatchesController::class, 'update'])->name('match.update');
    Route::get('/match/profile/{profile}', [MatchesController::class, 'showUser'])->name('match.profile');


    //automation
    Route::get('/getcity/{state}',[ProfileController::class, 'getstate'])->name('getstate');
});

// Route::fallback(function () {
//     return view('errors.404');
// });

// Route::post('/some-form', function () {
//     // Handle form submission
// })->middleware('throttle:5,1')->name('some-form');

// n addition to handling 404 errors, you can also use middleware to handle other types of errors, such as 419 errors. In the example above, the throttle middleware is used to limit the number of requests that can be made to the /some-form route. If a user submits the form more than 5 times within a minute, they will receive a 419 error.

// You can customize the view that is returned for different types of errors by creating a view file in the resources/views/errors directory with the appropriate HTTP status code as the filename (e.g. 404.blade.php for a 404 error).
