<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use App\Models\Fonction;
use App\Models\Mode;
use App\Models\Projet;
use App\Models\ProjetFonction;
use App\Models\ProjetMode;
use App\Models\Status;
use App\Models\Statusable;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserProjet;
use App\Models\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PostController extends Controller
{
    public function create_membre(Request $request)
    {
        $request->validate([
            'role' => ['required', 'string', 'in:superAdmin,admin,membre'],
            'name' => 'required|string|max:255',
            'email' => 'required|string',
            'gsm' => 'nullable|string',
            'avatar_url' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $emailsaved = User::where('email', $request->email)->first();

        if ($emailsaved) {
            return response()->json(['message' => 'Un membre avec cet email existe déjà.'], 422);
        }
        


        $logoPath = null;

        if ($request->hasFile('avatar_url')) {
            $file = $request->file('avatar_url');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $logoPath = $file->storeAs('membres/images', $filename, 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make('Lavoiejob@2025'),
        ]);

        $user->assignRole($request->role);

        UserInfo::create([
            'user_id' => $user->id,
            'reference' => $user->id + 10,
            'status' => 'valide',
            'gsm' => $request->gsm,
            'avatar_url' => $logoPath,
        ]);

        return response()->json(['message' => 'Membre ajouté avec succès']);
    }
    
    
    //Roles and permissions
    public function new_role(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'permission' => 'nullable|array',
            'permission.*' => 'string'
        ]);

        // Create the role
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        // Fetch and sync only valid permissions
        $validPermissions = [];
        if ($request->has('permission')) {
            $validPermissions = Permission::whereIn('name', $request->permission)->pluck('name')->toArray();
        }

        $role->syncPermissions($validPermissions);

        return response()->json(['message' => 'Rôle créé avec succès']);
    }
    public function update_role(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|exists:roles,id',
            'name' => 'required|string|max:255',
            'permission' => 'nullable|array',
            'permission.*' => 'string'
        ]);

        $role = Role::findOrFail($request->id);

        try {
            // Update the role's name
            $role->name = $request->name;
            $role->save();

            // Handle permissions
            if ($request->has('permission')) {
                // Fetch valid permissions from the database
                $validPermissions = Permission::whereIn('name', $request->permission)->pluck('name')->toArray();

                // Sync permissions (detaches old ones and attaches new ones)
                $role->syncPermissions($validPermissions);
            }

            return response()->json([
                'message' => 'Rôle mis à jour avec succès.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la mise à jour.',
                'error' => $e->getMessage()  // Include actual error message for debugging
            ], 500);
        }
    }
    public function bulk_permission(Request $request)
    {
        // Validate the request
        $request->validate([
            'permissions' => 'required|array',
            'permissions.*.name' => 'required|string|max:255',
        ]);

        foreach ($request->input('permissions') as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'guard_name' => 'web',
            ]);
        }

        return response()->json(['message' => 'Permissions créées avec succès']);
    }
    public function new_permission(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Permission::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);

        return response()->json(['message' => 'Permission créé avec succès']);
    }
    public function delete_permission(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:permissions,id',
        ]);

        $permission = Permission::find($request->id);

        try {
            $permission->delete();

            return response()->json([
                'message' => 'Permission supprimé avec succès.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la suppression.',
            ], 500);
        }
    }
    public function update_permission(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:permissions,id',
            'name' => 'required|string|max:255',
        ]);

        $permission = Permission::findOrFail($request->id);

        try {

            $permission->name = $request->name;
            $permission->save();

            return response()->json([
                'message' => 'Permission mis à jour avec succès.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la mise à jour.',
            ], 500);
        }
    }
    
    //Projet
    public function new_projet(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'avatar_url' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'integration' => 'nullable|string',  // This will be a string (JSON format)
        ]);

        $logoPath = null;

        // Handle the avatar image upload
        if ($request->hasFile('avatar_url')) {
            $file = $request->file('avatar_url');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $logoPath = $file->storeAs('projets/logos', $filename, 'public');
        }

        // Create the new project
        $projet = Projet::create([
            'name' => $request->name,
            'description' => $request->description,
            'avatar_url' => $logoPath,
        ]);

        // Check if there is any integration data (users)
        if ($request->has('integration') && !empty($request->integration)) {
            // Decode the JSON string into an array
            $users = json_decode($request->integration, true);

            // Attach the users to the project using the pivot table
            foreach ($users as $user) {
                // Ensure the user ID exists before attaching it
                if (isset($user['value'])) {
                    UserProjet::create([
                        'user_id' => $user['value'],  // The 'value' key is the user ID
                        'projet_id' => $projet->id,
                    ]);
                }
            }
        }

        return response()->json(['message' => 'Projet créé avec succès']);
    }
    public function delete_projet(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:projets,id',
        ]);

        $projet = Projet::find($request->id);

        try {
            // Delete avatar file if it exists
            if ($projet->avatar_url && Storage::disk('public')->exists($projet->avatar_url)) {
                Storage::disk('public')->delete($projet->avatar_url);
            }

            // Delete the project
            $projet->delete();

            return response()->json([
                'message' => 'Projet supprimé avec succès.',
                // 'redirect' => route('projets.index'), // Optional
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la suppression.',
            ], 500);
        }
    }
    public function update_projet(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:projets,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'avatar_url' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $projet = Projet::findOrFail($request->id);

        try {
            if ($request->hasFile('avatar_url')) {
                if ($projet->avatar_url && Storage::disk('public')->exists($projet->avatar_url)) {
                    Storage::disk('public')->delete($projet->avatar_url);
                }
                $path = $request->file('avatar_url')->store('projets/logos', 'public');
                $projet->avatar_url = $path;
            }

            $projet->name = $request->name;
            $projet->description = $request->description;
            $projet->save();

            if ($request->has('integration') && !empty($request->integration)) {
                $users = json_decode($request->integration, true);
            
                // Get user IDs with allowed roles
                $allowedUserIds = User::role(['membre', 'admin', 'superAdmin'])->pluck('id')->toArray();
            
                // Delete only UserProjet entries for this projet and allowed roles
                UserProjet::where('projet_id', $projet->id)
                    ->whereIn('user_id', $allowedUserIds)
                    ->delete();
            
                // Recreate the UserProjet entries from the input
                foreach ($users as $user) {
                    if (isset($user['value']) && in_array($user['value'], $allowedUserIds)) {
                        UserProjet::create([
                            'user_id' => $user['value'],
                            'projet_id' => $projet->id,
                        ]);
                    }
                }
            }
            

            return response()->json([
                'message' => 'Projet mis à jour avec succès.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la mise à jour.',
            ], 500);
        }
    }
    
    //Fonctions
    public function new_fonction(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'projet' => 'nullable|array',
        ]);


        

        // Create the new project
        $fonction = Fonction::create([
            'name' => $request->name,
        ]);

        // Handle the avatar image upload
        if ($request->has('projet') && !empty($request->projet)) {
            foreach($request->projet as $projet){
                ProjetFonction::create([
                    'projet_id' => $projet,
                    'fonction_id' => $fonction->id,
                ]);
            }
        }
        

        return response()->json(['message' => 'Fonction créé avec succès']);
    }
    public function bulk_fonction(Request $request)
    {
        // Validate the request
        $request->validate([
            'projet' => 'nullable|array',
            'fonctions' => 'required|array',
            'fonctions.*.name' => 'required|string|max:255',
        ]);

        foreach ($request->input('fonctions') as $fonction) {
            $fonction = Fonction::create([
                'name' => $fonction['name'],
            ]);

            if ($request->has('projet') && !empty($request->projet)) {
                foreach($request->projet as $projet){
                    ProjetFonction::create([
                        'projet_id' => $projet,
                        'fonction_id' => $fonction->id,
                    ]);
                }
            }
        }

        return response()->json(['message' => 'Fonctions créées avec succès']);
    }
    public function delete_fonction(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:fonctions,id',
        ]);

        $fonction = Fonction::find($request->id);

        try {
            
            $fonction->delete();

            return response()->json([
                'message' => 'Fonction supprimée avec succès.',
                // 'redirect' => route('projets.index'), // Optional
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la suppression.',
            ], 500);
        }
    }
    public function update_fonction(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:fonctions,id',
            'name' => 'required|string|max:255',
            'projet' => 'nullable|array',
        ]);

        $fonction = Fonction::findOrFail($request->id);

        try {
            
            $fonction->name = $request->name;
            $fonction->save();

            
            if ($request->has('projet') && !empty($request->projet)) {
                ProjetFonction::where('fonction_id', $fonction->id)->delete();
                foreach($request->projet as $projet){
                    ProjetFonction::create([
                        'projet_id' => $projet,
                        'fonction_id' => $fonction->id,
                    ]);
                }
            }
           

            return response()->json([
                'message' => 'Fonction mise à jour avec succès.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la mise à jour.',
            ], 500);
        }
    }
    
    //statuses
    public function new_status(Request $request)
    {
        // Validate the request
        $request->validate([
            'label' => 'required|string|max:255',
            'type' => ['required', 'string', 'in:global,client,candidat'],
        ]);

        $name = str_replace(' ', '_', strtolower($request->label));
        
        Status::create([
            'label' => ucfirst($request->label),
            'color' => $request->color,
            'type' => $request->type,
            'name' => $name,
        ]);

        

        return response()->json(['message' => 'statut créé avec succès']);
    }
    public function bulk_status(Request $request)
    {
        // Validate the request
        $request->validate([
            'statuses' => 'required|array',
            'statuses.*.label' => 'required|string|max:255',
            'statuses.*.type' => ['required', 'string', 'in:global,client,candidat'],
        ]);

        foreach ($request->input('statuses') as $status) {
            $name = str_replace(' ', '_', strtolower($status['label']));
            $status = Status::create([
                'name' => $name,
                'label' => $status['label'],
                'type' => $status['type'],
            ]);
    
        }

        return response()->json(['message' => 'statuts créées avec succès']);
    }
    public function delete_status(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:statuses,id',
        ]);

        $status = Status::find($request->id);

        try {
            
            $status->delete();

            return response()->json([
                'message' => 'status supprimée avec succès.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la suppression.',
            ], 500);
        }
    }
    public function update_status(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:statuses,id',
            'label' => 'required|string|max:255',
            'type' => ['required', 'string', 'in:global,client,candidat'],
        ]);

        $status = Status::findOrFail($request->id);

        try {
            $name = str_replace(' ', '_', strtolower($request->label));

            $status->name = $name;
            $status->label = ucfirst($request->label);
            $status->type = $request->type;
            $status->color = $request->color;
            $status->save();


            return response()->json([
                'message' => 'status mis à jour avec succès.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la mise à jour.',
            ], 500);
        }
    }
    
    //modes
    public function new_mode(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'projet' => 'nullable|array',
        ]);
        
        $mode = Mode::create([
            'name' => $request->name,
        ]);

        if ($request->has('projet') && !empty($request->projet)) {
            foreach($request->projet as $projet){
                ProjetMode::create([
                    'projet_id' => $projet,
                    'mode_id' => $mode->id,
                ]);
            }
        }

        return response()->json(['message' => 'Mode d\'emploi créé avec succès']);
    }
    public function bulk_mode(Request $request)
    {
        // Validate the request
        $request->validate([
            'projet' => 'nullable|array',
            'modes' => 'required|array',
            'modes.*.name' => 'required|string|max:255',
        ]);

        foreach ($request->input('modes') as $mode) {
            $mode = Mode::create([
                'name' => $mode['name'],
            ]);
    
            if ($request->has('projet') && !empty($request->projet)) {
                foreach($request->projet as $projet){
                    ProjetMode::create([
                        'projet_id' => $projet,
                        'mode_id' => $mode->id,
                    ]);
                }
            }
        }

        return response()->json(['message' => 'Modes d\'emploi créées avec succès']);
    }
    public function delete_mode(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:modes,id',
        ]);

        $mode = Mode::find($request->id);

        try {
            
            $mode->delete();

            return response()->json([
                'message' => 'Mode supprimée avec succès.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la suppression.',
            ], 500);
        }
    }
    public function update_mode(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:modes,id',
            'name' => 'required|string|max:255',
            'projet' => 'nullable|array',
        ]);

        $mode = mode::findOrFail($request->id);

        try {
            
            $mode->name = $request->name;
            $mode->save();

            if ($request->has('projet') && !empty($request->projet)) {
                ProjetMode::where('mode_id', $mode->id)->delete();
                foreach($request->projet as $projet){
                    ProjetMode::create([
                        'projet_id' => $projet,
                        'mode_id' => $mode->id,
                    ]);
                }
            }
           

            return response()->json([
                'message' => 'Mode d\'emploi mis à jour avec succès.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Une erreur est survenue lors de la mise à jour.',
            ], 500);
        }
    }

    //clients
    public function new_entreprise(Request $request)
    {
        $request->validate([
            'avatar_url' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string',

            'tel' => 'nullable|string',
            'gsm' => 'required|string',
            'whatsapp' => 'nullable|string',
            'website' => 'nullable|string',
            
            'city' => 'nullable|string',
            'address' => 'required|string',
            'type_local' => 'nullable|string',
            'country' => 'nullable|string',

            'ice' => 'nullable|string',
            'rc' => 'nullable|string',
            'patente' => 'nullable|string',
            
            'industry' => 'nullable|string',
            'activity' => 'nullable|string',
            'language' => 'nullable|string',
            'founded_year' => 'nullable|string',

            'representant' => 'nullable|string',
            'representant_phone' => 'nullable|string',
            'representant_email' => 'nullable|string',

            'source' => 'nullable|string',
            'source_complement' => 'nullable|string',

            'status' => 'required|exists:statuses,id',
            'projets' => 'required|array',

            'rate' => 'nullable|string',
            'description' => 'nullable|string',
            'note' => 'nullable|string',
        ]);

        $emailsaved = User::where('email', $request->email)->first();

        if ($emailsaved) {
            return response()->json(['message' => 'Un utilisateur existe déjà avec cet email.'], 422);
        }
        
        //image
        $imagePath = null;
        if ($request->hasFile('avatar_url')) {
            $file = $request->file('avatar_url');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('clients/entreprises/images', $filename, 'public');
        }

        //user account
        $email_verified = $request->has('email_verified') ? now() : null;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => $email_verified,
            'password' => Hash::make('Lavoiejob@2025'),
        ]);
        $user->assignRole('entreprise');
        if ($request->has('projets') && !empty($request->projets)) {
            foreach($request->projets as $projet){
                UserProjet::create([
                    'projet_id' => $projet,
                    'user_id' => $user->id,
                ]);
            }
        }
        //user infos
        Entreprise::create([
            'user_id' => $user->id,
            'avatar_url' => $imagePath,
            'reference' => $user->id + 10,

            'tel' => $request->tel,
            'gsm' => $request->gsm,
            'whatsapp' => $request->whatsapp,
            'website' => $request->website,

            'city' => $request->city,
            'address' => $request->address,
            'type_local' => $request->type_local,
            'country' => $request->country,

            
            'language' => $request->language,
            'industry' => $request->industry,
            'activity' => $request->activity,
            'founded_year' => $request->founded_year,

            'representant' => $request->representant,
            'representant_phone' => $request->representant_phone,
            'representant_email' => $request->representant_email,

            'source' => $request->source,
            'source_complement' => $request->source_complement,

            'description' => $request->description,
            'rate' => $request->rate,
            'notes' => $request->notes,
        ]);

        Statusable::create([
            'statusable_id' => $user->id,
            'statusable_type' => 'App\Models\User',
            'status_id' => $request->status,
        ]);

        if($request->has('send_welcome')){
            //send email
        }

        return response()->json(['message' => 'Client "Entreprise" ajouté avec succès', 'redirect'=>route('clients.view')]);
    }
    public function new_particulier(Request $request)
    {
        $request->validate([
            'avatar_url' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string',

            'tel' => 'nullable|string',
            'gsm' => 'required|string',
            'whatsapp' => 'nullable|string',
            'cin' => 'nullable|string',
            'cin_address' => 'nullable|string',
            'cin_validity' => 'nullable|string',
            'birth_city' => 'nullable|string',
            'nationality' => 'nullable|string',
            'birth_date' => 'nullable|string',
            'logement' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',

            'marital' => 'required|string',
            'kids_number' => 'required|integer',
            'religion' => 'nullable|string',
            'language' => 'required|string',
            'animal' => 'required|string',
            'emergency_contact_name' => 'nullable|string',
            'emergency_contact_phone' => 'nullable|string',
            'emergency_contact_link' => 'nullable|string',
            'sickness' => 'nullable|string',
            'source' => 'required|string',
            'source_complement' => 'nullable|string',

            'status' => 'required|exists:statuses,id',
            'projets' => 'required|array',

            'rate' => 'nullable|string',
            'notes' => 'nullable|string',
            'presentation' => 'nullable|string',
            
        ]);

        $emailsaved = User::where('email', $request->email)->first();

        if ($emailsaved) {
            return response()->json(['message' => 'Un utilisateur avec cet email existe déjà.'], 422);
        }
        
        //image
        $imagePath = null;
        if ($request->hasFile('avatar_url')) {
            $file = $request->file('avatar_url');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $imagePath = $file->storeAs('clients/particuliers/images', $filename, 'public');
        }

        //user account
        $email_verified = $request->has('email_verified') ? now() : null;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => $email_verified,
            'password' => Hash::make('Lavoiejob@2025'),
        ]);
        $user->assignRole('particulier');
        if ($request->has('projets') && !empty($request->projets)) {
            foreach($request->projets as $projet){
                UserProjet::create([
                    'projet_id' => $projet,
                    'user_id' => $user->id,
                ]);
            }
        }
        //user infos
        $kids_detail = [];
        if ($request->has(['kid_age', 'kid_sexe', 'kid_garde'])) {
            $ages = $request->input('kid_age');
            $sexes = $request->input('kid_sexe');
            $gardes = $request->input('kid_garde');

            for ($i = 0; $i < count($ages); $i++) {
                $kids_detail[] = [
                    'kid_age' => $ages[$i] ?? null,
                    'kid_sexe' => $sexes[$i] ?? null,
                    'kid_garde' => $gardes[$i] ?? null,
                ];
            }
        }
        $kids = [
            'kids_number' => $request->input('kids_number'),
            'kids' => $kids_detail
        ];

        $emergency_contact = [
            'emergency_contact_name'=>$request->emergency_contact_name ?? '',
            'emergency_contact_phone'=>$request->emergency_contact_phone ?? '',
            'emergency_contact_link'=>$request->emergency_contact_link ?? '',
        ];

        UserInfo::create([
            'user_id' => $user->id,
            'avatar_url' => $imagePath,
            'reference' => $user->id + 10,

            'tel' => $request->tel,
            'gsm' => $request->gsm,
            'whatsapp' => $request->whatsapp,

            'cin' => $request->cin,
            'cin_address' => $request->cin_address,
            'cin_validity' => $request->cin_validity,

            'birth_city' => $request->birth_city,
            'nationality' => $request->nationality,
            'birth_date' => $request->birth_date,

            'logement' => $request->logement,
            'city' => $request->city,
            'address' => $request->address,

            'marital' => $request->marital,
            'kids' => $kids,
            'religion' => $request->religion,
            'language' => $request->language,
            'animal' => $request->animal,
            'emergency_contact' => $emergency_contact,

            'sickness' => $request->sickness,
            'source' => $request->source,
            'source_complement' => $request->source_complement,

            'rate' => $request->rate,
            'notes' => $request->notes,
            'presentation' => $request->presentation,
        ]);

        Statusable::create([
            'statusable_id' => $user->id,
            'statusable_type' => 'App\Models\User',
            'status_id' => $request->status,
        ]);

        if($request->has('send_welcome')){
            //send email
        }

        return response()->json(['message' => 'Client "Particulier" ajouté avec succès', 'redirect'=>route('clients.view')]);
    }


}
