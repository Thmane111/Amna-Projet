<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\AccesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\Sous_CatController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AtributController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\ProposController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BlogController;

use App\Http\Controllers\SlideController;
use App\Http\Controllers\PartenaireController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\SerieController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\EcoleController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\JuryConttroller;

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
    return view('Espace.partials.main');
});






Route::get('/app', function () {
    return view('Back.partials.main');
})->middleware('auth:web','verified')->name('app.dashboard');


Route::get('/admin', function () {
    return view('Back.partials.main');

   })->middleware(['auth:admin','verified'])->name('admin.dashboard');

   Route::get('/resulat/serie/{id}',[Controller::class, 'PageSerie'])->name('espace.PageSerie');
   Route::get('/resulat/detail/resultat/{id}',[Controller::class, 'View'])->name('espace.View');
   Route::post('/resulat/detail/resultats',[Controller::class, 'DetailRecherche'])->name('espace.DetailRecherche');






Route::middleware('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile-update/{id}', [ProfileController::class, 'update_profile'])->name('profile.update_profile');
});



Route::resource('/admin/Module',ModuleController::class)->middleware('admin');
Route::resource('/admin/groupe',GroupeController::class)->middleware('admin');
Route::resource('/admin/acces',AccesController::class)->middleware('admin');
Route::resource('/admin/utilisateurs',UserController::class)->middleware('admin');
Route::resource('/admin/categorie',CategorieController::class)->middleware('admin');
Route::post('/admin/categorie-state/{id}',[CategorieController::class, 'state'])->name('categorie.state')->middleware('admin');
Route::resource('/admin/sous_categories',Sous_CatController::class)->middleware('admin');
Route::resource('/admin/menu',MenuController::class)->middleware('admin');
Route::resource('/admin/propos',ProposController::class)->middleware('admin');

Route::resource('/admin/tache',TacheController::class)->middleware('admin');
Route::post('blog/store',[BlogController::class,'store'])->name('Blog.store');
Route::resource('/admin/Attribution',AtributController::class)->middleware('admin');
Route::resource('/admin/permission',PermissionController::class)->middleware('admin');
Route::get('/admin/utilisateurs/{id}',[UserController::class,'state'])->name('utilisateurs.state')->middleware('admin');
Route::post('/logout',[AdminController::class,'store'])->name('admin.store');
Route::post('/logout',[AdminController::class, 'UserLogout'])->name('app.logout');

Route::resource('/admin/slide',SlideController::class)->middleware('admin');
Route::resource('/admin/partenaire',PartenaireController::class)->middleware('admin');
Route::resource('/admin/service',ServiceController::class)->middleware('admin');
Route::resource('/admin/page',PageController::class)->middleware('admin');
Route::resource('/admin/navigation',NavigationController::class)->middleware('admin');
Route::post('/admin/activation-module/{id}',[ModuleController::class, 'state'])->name('Module.state')->middleware('admin');
Route::post('/admin/activation-navigation/{id}',[NavigationController::class, 'state'])->name('navigation.state')->middleware('admin');
Route::post('/admin/activation-groupe/{id}',[GroupeController::class, 'state'])->name('groupe.state')->middleware('admin');
Route::post('/admin/activation-attribution/{id}',[AtributController::class, 'state'])->name('Attribution.state')->middleware('admin');
Route::post('/admin/activation-acces/{id}',[AccesController::class, 'state'])->name('acces.state')->middleware('admin');
Route::post('/admin/activation-menu/{id}',[MenuController::class, 'state'])->name('menu.state')->middleware('admin');
Route::post('/admin/activation-tache/{id}',[TacheController::class, 'state'])->name('tache.state')->middleware('admin');
Route::get('/admin/permission-active/{id}/{id2}',[PermissionController::class, 'permi2'])->name('permission.permi2')->middleware('admin');
Route::get('/admin/liste_Membre/{id}',[UserController::class, 'Liste_Membre'])->name('utilisateurs.Liste_Membre')->middleware('admin');
Route::get('/admin/formulaire-user/{id}',[UserController::class, 'create2'])->name('utilisateurs.create2')->middleware('admin');
Route::post('/admin/register-utilisateurs',[UserController::class, 'registerDash'])->name('utilisateurs.registerDash')->middleware('admin');


Route::resource('/admin/niveau',NiveauController::class)->middleware('admin');
Route::resource('/admin/serie',SerieController::class)->middleware('admin');
Route::resource('/admin/region',RegionController::class)->middleware('admin');
Route::resource('/admin/centre',CentreController::class)->middleware('admin');
Route::resource('/admin/ecole',EcoleController::class)->middleware('admin');
Route::resource('/admin/eleve',EleveController::class)->middleware('admin');
Route::resource('/admin/matiere',MatiereController::class)->middleware('admin');
Route::resource('/admin/deliberation',ResultatController::class)->middleware('admin');
Route::resource('/admin/jury',JuryConttroller::class)->middleware('admin');

Route::get('/getEcole/{id}', [EleveController::class, 'getEcole'])->name('eleve.getEcole');
Route::get('/getEcoleCentre/{id}', [EcoleController::class, 'getEcoleCentre'])->name('ecole.getEcoleCentre');
Route::get('/getSerie/{id}', [EleveController::class, 'getSerie'])->name('eleve.getSerie');
Route::get('/eleve/liste/{id}', [EleveController::class, 'getListe'])->name('eleve.getListe');
Route::get('/eleve/liste/serie/{id}', [ResultatController::class, 'getListe'])->name('resultat.getListe');
Route::get('/matiere/liste/{id}', [MatiereController::class, 'getMatiere'])->name('matiere.getMatiere');
Route::get('/getRegionEspace/{id}', [Controller::class, 'getRegionEspace'])->name('espace.getRegionEspace');
Route::get('/getCentreEspace/{id}', [Controller::class, 'getCentreEspace'])->name('espace.getCentreEspace');
Route::get('/getEcoleEspace/{id}', [Controller::class, 'getEcoleEspace'])->name('espace.getEcoleEspace');
Route::get('/filtre/serie/{id}', [Controller::class, 'FiltreSerie'])->name('espace.FiltreSerie');
Route::get('/filtre/region/{id}', [Controller::class, 'FiltreRegion'])->name('espace.FiltreRegion');
Route::get('/filtre/centre/{id}', [Controller::class, 'FiltreCentre'])->name('espace.FiltreCentre');
Route::get('/filtre/ecole/{id}', [Controller::class, 'FiltreEcole'])->name('espace.FiltreEcole');
Route::get('/getjury/centre/{id}', [JuryConttroller::class, 'getCentre'])->name('jury.getCentre');
Route::get('/getRegion2/{id}', [JuryConttroller::class, 'getCentre2'])->name('jury.getCentre2');

Route::get('/jury/liste/{id}', [JuryConttroller::class, 'getListeJury1'])->name('jury.getListeJury1');
Route::get('/jury/liste2/{id}', [JuryConttroller::class, 'getListeJury2'])->name('jury.getListeJury2');


Route::post('/admin/activation-niveau/{id}',[NiveauController::class, 'state'])->name('niveau.state')->middleware('admin');
Route::post('/admin/activation-serie/{id}',[SerieController::class, 'state'])->name('serie.state')->middleware('admin');
Route::post('/admin/activation-region/{id}',[RegionController::class, 'state'])->name('region.state')->middleware('admin');
Route::post('/admin/activation-centre/{id}',[CentreController::class, 'state'])->name('centre.state')->middleware('admin');
Route::post('/admin/activation-ecole/{id}',[EcoleController::class, 'state'])->name('ecole.state')->middleware('admin');
Route::post('/admin/activation-eleve/{id}',[EleveController::class, 'state'])->name('eleve.state')->middleware('admin');
Route::post('/admin/activation-matiere/{id}',[MatiereController::class, 'state'])->name('matiere.state')->middleware('admin');

Route::get('/admin/deliberation-sn/{id}',[ResultatController::class, 'indexSN'])->name('resultat.indexSN')->middleware('admin');
Route::delete('/admin/reinitialiser-sn/{id}',[ResultatController::class, 'reinitialiserSN'])->name('resultat.reinitialiserSN')->middleware('admin');




Route::controller(EleveController::class)->group(function(){
    Route::get('eleve', 'index');
    Route::get('eleve-export', 'export')->name('eleve.export');
    Route::post('eleve-import', 'import')->name('eleve.import');
});

Route::controller(MatiereController::class)->group(function(){
    Route::get('matiere', 'index');
    Route::get('matiere-export', 'export')->name('matiere.export');
    Route::post('matiere-import', 'import')->name('matiere.import');
});

Route::controller(ResultatController::class)->group(function(){
    Route::get('resultat', 'index');
    Route::get('resultat-export', 'export')->name('resultat.export');
    Route::post('resultat-import', 'import')->name('resultat.import');
});

Route::controller(SerieController::class)->group(function(){
    Route::get('serie', 'index');
    Route::get('serie-export', 'export')->name('serie.export');
    Route::post('serie-import', 'import')->name('serie.import');
});

Route::controller(EcoleController::class)->group(function(){
    Route::get('ecole', 'index');
    Route::get('ecole-export', 'export')->name('ecole.export');
    Route::post('ecole-import', 'import')->name('ecole.import');
});


Route::controller(CentreController::class)->group(function(){
    Route::get('centre', 'index');
    Route::get('centre-export', 'export')->name('centre.export');
    Route::post('centre-import', 'import')->name('centre.import');
});


Route::controller(RegionController::class)->group(function(){
    Route::get('region', 'index');
    Route::get('region-export', 'export')->name('region.export');
    Route::post('region-import', 'import')->name('region.import');
});


Route::controller(JuryConttroller::class)->group(function(){
    Route::get('jury', 'index');
    Route::get('jury-export', 'export')->name('jury.export');
    Route::post('jury-import', 'import')->name('jury.import');
});




































 require __DIR__.'/authadmin.php';
require __DIR__.'/auth.php';
require __DIR__.'/authclient.php';
