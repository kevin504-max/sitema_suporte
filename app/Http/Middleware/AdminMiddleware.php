<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role_as == "1") {
                return $next($request);
            } else if (Auth::user()->role_as == "0") {
                return redirect("/")->with([
                    'status' => "success",
                    'message' => "Bem vindo ao painel do usuário.",
                ]);
            } else {
                return redirect("/")->with([
                    'status' => "error",
                    'message' => "Você não tem permissão para acessar a página de administrador.",
                ]);
            }
        } else {
            return redirect("/login")->with([
                'status' => "error",
                'message' => "Efetue login para continuar.",
            ]);
        }
    }
}
