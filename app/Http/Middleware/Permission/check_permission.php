<?php

namespace App\Http\Middleware\Permission;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class check_permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $name_permission): Response
    {
        try{
            $id_permission = Permission::where('name', $name_permission)->first()->id;
            if(!Auth::user()->role->role_permission->map->permission_id->contains($id_permission)){
                abort(403);
            }
            return $next($request); 
        } catch (\Throwable $th) {
            return redirect()->route('no_permission'); // cambiar a una vista de acceso denegado
        }
    }
}
