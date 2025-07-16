<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use App\Models\Mode;
use App\Models\Projet;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class ViewController extends Controller
{
    public function permissions(): View
    {
        $permissions = Permission::all();
        $roles = Role::all();

        return view('app.permissions', compact('permissions','roles'));
    }
    public function projets(): View
    {
        $projets = Projet::with(['users.userInfo'])->orderByDesc('created_at')->get();

        return view('app.projets', compact('projets'));
    }
    public function fonctions(): View
    {
        $fonctions = Fonction::with(['projets'])->orderByDesc('created_at')->get();
        $projets = Projet::orderByDesc('created_at')->get();
        return view('app.fonctions', compact('fonctions', 'projets'));
    }
    public function modes(): View
    {
        $modes = Mode::orderByDesc('created_at')->get();
        $projets = Projet::orderByDesc('created_at')->get();
        return view('app.modes', compact('modes', 'projets'));
    }
    public function statuses(): View
    {
        $statuses = Status::orderBy('label')->get();
        return view('app.statuses', compact('statuses'));
    }

    
    public function membres(): View
    {
        $projets = Projet::with(['users.userInfo'])->orderByDesc('created_at')->get();
        return view('app.membres', compact('projets'));
    }
    public function user_infos($id): View
    {
        $user = User::with(['userinfo', 'entreprise'])->findOrFail($id);
        return view('app.profile.infos', compact('user'));
    }
    public function user_history($id): View
    {
        $user = User::with(['userinfo', 'entreprise'])->findOrFail($id);
        return view('app.profile.history', compact('user'));
    }
    public function user_edit($id): View
    {
        $projets = Projet::orderByDesc('created_at')->get();
        $statuses = Status::orderBy('label')->get();
        $user = User::with(['userinfo', 'entreprise'])->findOrFail($id);
        return view('app.profile.edit', compact(['user', 'projets', 'statuses']));
    }

    public function clients(): View
    {
        $projets = Projet::orderByDesc('created_at')->get();
        return view('app.clients', compact('projets'));
    }
    public function new_particulier(): View
    {
        $projets = Projet::orderByDesc('created_at')->get();
        $statuses = Status::orderBy('label')->get();
        return view('app.new_particulier', compact('projets', 'statuses'));
    }
    public function new_entreprise(): View
    {
        $projets = Projet::orderByDesc('created_at')->get();
        $statuses = Status::orderBy('label')->get();
        return view('app.new_entreprise', compact('projets', 'statuses'));
    }
    public function new_dossier(): View
    {
        $projets = Projet::orderByDesc('created_at')->get();
        return view('app.new_dossier', compact('projets'));
    }
    
    //GET Data requests
    public function membres_get_all()
    {
        $users = User::role(['membre', 'admin', 'superAdmin'])->get();

        $formatted = $users->map(function ($user) {
            $avatar = optional($user->userInfo)->avatar_url;

            return [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $avatar ? asset('storage/' . $avatar) : null,
                'role' => ucfirst($user->getRoleNames()->first()),
                'projets' => e($user->projets->pluck('name')->implode(';')) ?? null,
                'status' => $user->userInfo->status ?? 'néant',
                'action' => '',
            ];
        });

        return response()->json($formatted);
    }
    public function clients_get_all()
{
    $authUser = Auth::user();
    $authProjects = $authUser->projets->pluck('id')->toArray();

    // Get all clients
    $clients = User::role(['particulier', 'entreprise'])->get();

    // Filter clients who share at least one project with the authenticated user
    $filteredClients = $clients->filter(function ($client) use ($authProjects) {
        $clientProjects = $client->projets->pluck('id')->toArray();
        return count(array_intersect($authProjects, $clientProjects)) > 0;
    });

    // Format the output
    $formatted = $filteredClients->map(function ($client) use ($authProjects) {
        $avatar = optional($client->userInfo)->avatar_url;
        $sharedProjects = $client->projets->filter(function ($project) use ($authProjects) {
            return in_array($project->id, $authProjects);
        });

        return [
            'id' => $client->id,
            'name' => $client->name,
            'email' => $client->email,
            'gsm' => $client->userInfo->gsm ?? null,
            'avatar' => $avatar ? asset('storage/' . $avatar) : null,
            'role' => ucfirst($client->getRoleNames()->first()),
            'projets' => $sharedProjects->pluck('name')->implode(';') ?? null,
            'status' => $client->statuses[0]->label ?? 'néant',
            'action' => '',
        ];
    });

    return response()->json($formatted);
}

}
