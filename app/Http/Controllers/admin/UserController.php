<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::where('role_as', 0)->orderBy('created_at', 'desc')->get();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', acessou a página de gerenciamento de usuários.');
            return view('admin.users.index', compact('users'));
        } catch (\Throwable $th) {
            report($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', tentou acessar a página de gerenciamento de usuários.', ['exception' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao acessar gerenciamento de usuários! Tente novamente.'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $user = User::find($request->id);
            $user->delete();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', deletou o usuário de #ID' . $request->id . ', no sistema de chamados.');
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Usuário deletado com sucesso!'
            ]);
        } catch (\Throwable $th) {
            report($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', tentou deletar o usuário de #ID' . $request->id . ' e falhou.', ['exception' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao deletar usuário! Tente novamente.'
            ]);
        }
    }
}
