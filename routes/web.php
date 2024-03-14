<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CvthequeController,
    CompetenceController,
    MetierController,
    ProfessionnelController,
};



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

// Route::get('/', function () {
//     return view('cvtheque');
// });

Route::get('/', [CvthequeController::class, 'index'])->name('accueil');

Route::get('/competences/{competence}/sup', [CompetenceController::class, 'sup'])->name('competences.sup');

Route::resource('competences', CompetenceController::class);

Route::get('/metiers/{metier}/sup', [MetierController::class, 'sup'])->name('metiers.sup');

Route::resource('metiers', MetierController::class);

Route::get('/professionnels/{professionnel}/sup', [ProfessionnelController::class, 'sup'])->name('professionnels.sup');

Route::get('/metier/{slug}/professionnels', [ProfessionnelController::class, 'index'])->name('professionnels.metier');

// Route::get('/competence/{slug}/professionnels', [ProfessionnelController::class, 'index'])->name('professionnels.competence');

Route::resource('professionnels', ProfessionnelController::class);

