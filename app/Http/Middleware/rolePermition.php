<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Permition;

class rolePermition
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $uri = $request->route()->uri;

        $role_id = session('user_role') ?? '';
        

        if ($role_id) {
            $allowedRoutes = Permition::where('role_id', $role_id)->get();


            foreach ($allowedRoutes as $permission) {
                $allowedUri = $permission->route->uri;


                if (count(explode('/', $uri)) > 2) {
                    if (strstr($uri, $allowedUri))  return $next($request);
                } else {
                    if ($uri === $allowedUri) return $next($request);
                }
            }

            return abort(401);
        } else return redirect('/login');
    }
}
