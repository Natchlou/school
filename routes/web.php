<?php

use App\Http\Controllers\DevoirController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TimetableController;
use App\Http\Requests\RecapFormRequest;
use App\Models\Agenda;
use App\Models\Devoir;
use App\Models\Files;
use App\Models\Note;
use App\Models\Recap;
use App\Models\Timetable;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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

Carbon::setLocale('fr');

Route::get('/', function () {
    return view('eleve.index', [
        'cours' => Timetable::all(),
        'recaps' => Recap::query()->where('user_id', '=', Auth::user()->id)->get(),
        'devoirs' => Devoir::query()->where('date', '>=', Carbon::now())->get(),
        'notes' => Note::query()->where('user_id', '=', Auth::user()->id)->get(),
        'ressources' => Files::all(),
    ]);
})->middleware('auth');
Route::get('/notes', function () {
    return view('eleve.note', [
        'notes' => Note::query()->where('user_id', '=', Auth::user()->id)->get(),
        'n' => null,
    ]);
})->middleware('auth');
Route::get('/notes/{id}', function (string $id) {
    $note = Note::findOrFail($id);
    return view('eleve.note', [
        'notes' => Note::query()->where('user_id', '=', Auth::user()->id)->get(),
        'n' => $note,
    ]);
})->middleware('auth')->name('notes.show');

Route::middleware(['auth', 'role:Teacher|Admin'])->prefix('prof')->group(function () {
    Route::get('/', function () {
        return view('prof.index', [
            'cours' => Timetable::all(),
            'agendas' => Agenda::all(),
            'appels' => [],
            'cahiers' => []
        ]);
    })->middleware('auth')->name('prof.index');
    Route::resource('/devoir', DevoirController::class);
    Route::resource('/note', NoteController::class);
    Route::resource('/file', FilesController::class);
});

Route::get('/prof/appel', function () {
    return view('prof.appel', ['cours' => Timetable::all(), 'users' => User::pluck('name', 'id')]);
})->middleware('auth')->name('appel.index');
Route::post('/prof/appel', function (RecapFormRequest $request) {
    Recap::create($request->validated());
    return to_route('appel.index')->with('success', 'L\'appel a bien été pris en compte');
})->middleware('auth');

Route::middleware(['auth', 'role:Admin'])->prefix('direction')->group(function () {
    Route::get('/', function () {
        return view('direction.index');
    });
    Route::resource('timetable', TimetableController::class)->except(['show']);
});

Route::get('/vie-scolaire', function () {
    return view('vie-scolaire.index', ['recaps' => Recap::query()->where('is_justify','off')->get()]);
})->name('vie-scolaire.index');

Route::get('/vie-scolaire/justifier/{recap:id}', function (Recap $recap) {
    $recap->update([
        'is_justify' => 'on'
    ]);
    $recap->save();
    return to_route('vie-scolaire.index')->with('success','L\'absence ou le retard a bien été justifier');
});

Auth::routes();
