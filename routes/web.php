<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\GetstartedController;
use App\Http\Controllers\GetstartedEntrController;
use App\Http\Controllers\GetstartedcandidatController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\UserInfo;
use App\Models\Entreprise;
use Spatie\Permission\Traits\HasRoles;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/notre-societe', function () {
    return view('about');
})->name('about');



Route::get('/dashboard', function (Request $request) {
    $user = $request->user();

    if ($user->hasRole('particulier')) {
        if (!UserInfo::where('user_id', $user->id)->exists()) {
            return redirect()->route('Getstarted.create');
        }
        return view('dashboard');
    }

    if ($user->hasRole('entreprise')) {
        if (!Entreprise::where('user_id', $user->id)->exists()) {
            return redirect()->route('GetstartedEntr.create');
        }
        return view('dashboard');
    }

    if ($user->hasRole('candidat')) {
        if (!UserInfo::where('user_id', $user->id)->exists()) {
            return redirect()->route('Getstartedcandidat.create');
        }
        return view('dashboard');
    }

})->middleware(['auth', 'verified'])->name('dashboard');



/* Route::get('/dashboard', function (Request $request) {
    $user = $request->user();

    $hasInfo = UserInfo::where('user_id', $user->id)->exists();
    $hasInfoE = Entreprise::where('user_id', $user->id)->exists();

    if (!$hasInfo) {
        return redirect()->route('Getstarted.create');
    } 

    if (!$hasInfoE) {
        return redirect()->route('GetstartedEntr.create');
    }

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');  */

 







/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');  */

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'ensure.userinfo'])->name('dashboard');

 */

Route::middleware('auth')->group(function () {
    Route::post('/check-email', [CheckController::class, 'check']);
    Route::post('/check-email-2', [CheckController::class, 'check2']);

    
    
    Route::get('/systeme/permissions', [ViewController::class, 'permissions'])->name('permissions.view');
    Route::post('/systeme/permissions-bulk', [PostController::class, 'bulk_permission'])->name('permissions.bulk');
    Route::post('/systeme/roles-create', [PostController::class, 'new_role'])->name('roles.new');
    Route::post('/systeme/roles-update', [PostController::class, 'update_role'])->name('roles.update');
    Route::post('/systeme/permissions-create', [PostController::class, 'new_permission'])->name('permissions.new');
    Route::post('/systeme/permissions-delete', [PostController::class, 'delete_permission'])->name('permissions.destroy');
    Route::post('/systeme/permissions-update', [PostController::class, 'update_permission'])->name('permissions.update');

    Route::get('/systeme/clients', [ViewController::class, 'clients'])->name('clients.view');
    Route::get('/systeme/client/particulier/nouveau', [ViewController::class, 'new_particulier'])->name('clients.new_particulier');
    Route::post('/systeme/client/particulier/create', [PostController::class, 'new_particulier'])->name('client.new_particulier');
    Route::get('/systeme/client/entreprise/nouveau', [ViewController::class, 'new_entreprise'])->name('clients.new_entreprise');
    Route::post('/systeme/client/entreprise/create', [PostController::class, 'new_entreprise'])->name('client.new_entreprise');
    Route::get('/systeme/clients/get-all', [ViewController::class, 'clients_get_all'])->name('clients.get_all');

    Route::get('/systeme/dossiers/new', [ViewController::class, 'new_dossier'])->name('dossiers.new_view');

    
    Route::get('/systeme/candidats', [ViewController::class, 'candidats'])->name('candidats.view');

    Route::get('/systeme/membres', [ViewController::class, 'membres'])->name('membres.view');
    Route::get('/systeme/utilisateur/{id}', [ViewController::class, 'user_infos'])->name('user.infos');
    Route::get('/systeme/utilisateur/{id}/history', [ViewController::class, 'user_history'])->name('user.history');
    Route::get('/systeme/utilisateur/{id}/edit', [ViewController::class, 'user_edit'])->name('user.edit');
    Route::get('/systeme/membres/get-all', [ViewController::class, 'membres_get_all'])->name('membres.get_all');
    Route::post('/systeme/membres/create', [PostController::class, 'create_membre'])->name('membres.new');

    Route::get('/systeme/projets', [ViewController::class, 'projets'])->name('projets.view');
    Route::post('/systeme/projets-create', [PostController::class, 'new_projet'])->name('projets.new');
    Route::post('/systeme/projets-delete', [PostController::class, 'delete_projet'])->name('projets.destroy');
    Route::post('/systeme/projets-update', [PostController::class, 'update_projet'])->name('projets.update');
    
    Route::get('/systeme/fonctions', [ViewController::class, 'fonctions'])->name('fonctions.view');
    Route::post('/systeme/fonctions-create', [PostController::class, 'new_fonction'])->name('fonctions.new');
    Route::post('/systeme/fonctions-bulk', [PostController::class, 'bulk_fonction'])->name('fonctions.bulk');
    Route::post('/systeme/fonctions-delete', [PostController::class, 'delete_fonction'])->name('fonctions.destroy');
    Route::post('/systeme/fonctions-update', [PostController::class, 'update_fonction'])->name('fonctions.update');
    
    Route::get('/systeme/modes', [ViewController::class, 'modes'])->name('modes.view');
    Route::post('/systeme/modes-create', [PostController::class, 'new_mode'])->name('modes.new');
    Route::post('/systeme/modes-bulk', [PostController::class, 'bulk_mode'])->name('modes.bulk');
    Route::post('/systeme/modes-delete', [PostController::class, 'delete_mode'])->name('modes.destroy');
    Route::post('/systeme/modes-update', [PostController::class, 'update_mode'])->name('modes.update');
    
    
    Route::get('/systeme/statuses', [ViewController::class, 'statuses'])->name('statuses.view');
    Route::post('/systeme/statuses-create', [PostController::class, 'new_status'])->name('statuses.new');
    Route::post('/systeme/statuses-bulk', [PostController::class, 'bulk_status'])->name('statuses.bulk');
    Route::post('/systeme/statuses-delete', [PostController::class, 'delete_status'])->name('statuses.destroy');
    Route::post('/systeme/statuses-update', [PostController::class, 'update_status'])->name('statuses.update');

    Route::get('/Getstarted', [GetstartedController::class, 'create'])->name('Getstarted.create');
    Route::post('/Getstarted', [GetstartedController::class, 'store'])->name('Getstarted.store');
    Route::get('/GetstartedEntr', [GetstartedEntrController::class, 'create'])->name('GetstartedEntr.create');
    Route::post('/GetstartedEntr', [GetstartedEntrController::class, 'store'])->name('GetstartedEntr.store');
    
    Route::get('/Getstartedcandidat', [GetstartedcandidatController::class, 'create'])->name('Getstartedcandidat.create');
    Route::post('/Getstartedcandidat', [GetstartedcandidatController::class, 'store'])->name('Getstartedcandidat.store');
});

require __DIR__.'/auth.php';

