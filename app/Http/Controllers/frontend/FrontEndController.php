<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FrontEndController extends Controller
{
    public function index()
    {
        try {
            return view('frontend.index');
        } catch (\Throwable $th) {
            report($th);
            Log::error('Erro ao acessar página inicial.', ['exception' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao acessar página inicial! Tente novamente.'
            ]);
        }
    }

    public function supportPage()
    {
        try {
            if (! Auth::check()) {
                return redirect()->route('login')->with([
                    'status' => 'error',
                    'message' => 'Você precisa estar logado para acessar o sistema!'
                ]);
            } else if (Auth::user()->role_as == 1) {
                Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', tentou acessar a página de suporte.');

                return redirect()->route('dashboard.index')->with([
                    'status' => 'success',
                    'message' => 'Bem vindo ao painel do administrador!'
                ]);
            }

            $supports = Support::where('requester_id', Auth::user()->id)->orderBy('status', 'asc')->get();
            $subjects = Subject::all();

            return view('support.index', compact('supports', 'subjects'));
        } catch (\Throwable $th) {
            report($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', tentou acessar a página de suporte.', ['exception' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao acessar página de suporte! Tente novamente.'
            ]);
        }
    }
}
