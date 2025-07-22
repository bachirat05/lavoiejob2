<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInfo;

class EnsureUserHasInfo
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Vérifie si l'utilisateur a déjà rempli ses infos
        $hasInfo = UserInfo::where('user_id', $user->id)->exists();

        if (!$hasInfo) {
            // Redirige vers le formulaire de démarrage
            return redirect()->route('Getstarted.create');
        }

        // Sinon, il peut accéder normalement
        return $next($request);
    }
}
