<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use App\Models\Mode;
use App\Models\Projet;
use App\Models\ProjetFonction;
use App\Models\ProjetMode;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\UserProjet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CheckController extends Controller
{
    public function check(Request $request)
    {
        $email = $request->input('email');
        $exists = User::where('email', $email)->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }
    public function check2(Request $request)
    {
        $email = $request->input('email');
        $id = $request->input('id');
        $exists = User::where('email', $email)->whereNot('id', $id)->exists();

        return response()->json([
            'exists' => $exists
        ]);
    }

}