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

    public function supportDetails($supportCode)
    {
        try {
            if (! Auth::check()) {
                return redirect()->back()->with([
                    'status' => 'error',
                    'message' => 'Faça login para continuar!'
                ]);
            }

            $support = Support::where('code', $supportCode)->first();
            $subjects = Subject::all();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' acessou os detalhes do chamado de código: ' . $supportCode . ' no sistema de atendimento.');
            return view('support.details', compact('support', 'subjects'));
        } catch (\Throwable $th) {
            report ($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' tentou acessar os detalhes do chamado de código: ' . $supportCode . ' e falhou.', ['excpetion' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Ocorreu um erro ao acessar os detalhes do chamado! Tente novamente mais tarde.'
            ]);
        }
    }

    public function rateSupport(Request $request)
    {
        try {
            if (! Auth::check()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Faça login para continuar!'
                ]);
            }

            $support = Support::where('id', $request->support_id)->first();

            if ($support->requester_id != Auth::user()->id) {
                Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' tentou avaliar o atendimento do chamado de #ID: ' . $request->support_id . ' no sistema de atendimento.');

                return response()->json([
                    'status' => 'error',
                    'message' => 'Você não tem permissão para avaliar este chamado!'
                ]);
            } else if ($support->status != 0) {
                Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' tentou avaliar o atendimento do chamado de #ID: ' . $request->support_id . ' no sistema de atendimento.');

                return response()->json([
                    'status' => 'info',
                    'message' => 'Chamado não finalizado!'
                ]);
            }

            $support->rating = $request->rating;
            $support->save();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' avaliou o atendimento do chamado de #ID: ' . $request->support_id . ' no sistema de atendimento.');
            return response()->json([
                'status' => 'success',
                'message' => 'Avaliação realizada com sucesso!'
            ]);
        } catch (\Throwable $th) {
            report ($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' tentou avaliar o atendimento do chamado de #ID: ' . $request->support_id . ' e falhou.', ['excpetion' => $th->getMessage()]);

            return response()->json([
                'status' => 'error',
                'message' => 'Ocorreu um erro ao avaliar o atendimento! Tente novamente mais tarde.'
            ]);
        }
    }
}
