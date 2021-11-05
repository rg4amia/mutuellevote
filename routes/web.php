<?php

use App\Http\Controllers\AdministrateurController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\VoteController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class,'index'])->name('home');
Route::get('/', [SessionController::class , 'obtenircode'])->name('obtenircode');
Route::post('/login', [SessionController::class , 'login'])->name('session.login');
Route::post('/generatecode', [SessionController::class , 'generatecode'])->name('session.generatecode');
Route::get('/showverifcode', [SessionController::class , 'showverifcode'])->name('session.showverifcode');
Route::post('/verifcode', [SessionController::class , 'verifcode'])->name('session.verifcode');
Route::get('/sms', [SessionController::class , 'sms'])->name('sms');

Route::get('/resultat', function () {
    $candidats = \App\Models\CandidatPresidentielle::all();
    return view('voting.resultat',compact('candidats'));
});



Route::group(['prefix'=>'admin','as'=>'admin.'], function () {
    Route::get('/',[AdministrateurController::class, 'index'])->name('index');
    Route::get('/import',[AdministrateurController::class, 'import'])->name('import');
    Route::post('/import_in',[AdministrateurController::class, 'import_in'])->name('import_in');
});

Route::group(['prefix'=>'vote','as'=>'vote.'], function () {
    Route::get('/',[VoteController::class, 'index'])->name('index');
    Route::get('/commisaire',[VoteController::class, 'commisaire'])->name('commisaire');
    Route::get('/voter/{id}',[VoteController::class, 'voter'])->name('voter');
    Route::get('/voter/commissaire/{id}',[VoteController::class, 'voterCommissaire'])->name('votecommissaire');
    Route::get('/felicitaion',[VoteController::class, 'felicitaion'])->name('felicitaion');
    Route::get('/votrechoix',[VoteController::class, 'votrechoix'])->name('votrechoix');
});


