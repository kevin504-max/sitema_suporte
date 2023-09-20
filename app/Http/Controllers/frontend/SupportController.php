<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Support;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SupportController extends Controller
{
    public function index()
    {
        try {
            $subjects = Subject::orderBy('created_at', 'desc')->get();
            $supports = Support::orderBy('created_at', 'desc')->get();
            $assistants = User::where('role_as', 1)->get();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', acessou a página de gerencimento de chamados.');
            return view('admin.supports.index', compact('supports', 'subjects', 'assistants'));
        } catch (\Throwable $th) {
            report($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', tentou acessar a página de gerencimento de chamados.', ['exception' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao acessar gerenciamento de chamados! Tente novamente.'
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $data = [
                'requester_id' => Auth::user()->id,
                'subject_id' => $request->subject,
                'code' => 'SUP-' . rand(1000, 9999),
                'description' => $request->description,
                'rating' => 0,
            ];

            $support = Support::create($data);

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' abriu um chamado de #ID ' . $support->id . ', no sistema de atendimento.');
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Chamado aberto com sucesso!'
            ]);
        } catch (\Throwable $th) {
            report($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' tentou abrir um chamdo e falhou.', ['excpetion' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Ocorreu um erro ao abrir o chamado! Tente novamente mais tarde.'
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $support = Support::find($request->id);
            $support->assistant_id = $request->assistant;
            $support->status = $request->status;

            if ($request->has('file')) {
                $file = $request->file('file');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/supports'), $fileName);
                $support->file = $fileName;
            }

            $support->save();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' atualizou o chamado de #ID ' . $support->id . ', no sistema de atendimento.');
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Chamado atualizado com sucesso!'
            ]);
        } catch (\Throwable $th) {
            report($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' tentou atualizar o chamdo de #ID ' . $support->id . ' e falhou.', ['excpetion' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Ocorreu um erro ao atualizar o chamado! Tente novamente mais tarde.'
            ]);
        }
    }

    public function attend($supportId)
    {
        try {
            if (! Auth::check()) {
                return redirect()->back()->with([
                    'status' => 'error',
                    'message' => 'Faça login para continuar!'
                ]);
            } else if (Auth::user()->role_as != 1) {
                Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' tentou atender o chamado de #ID ' . $supportId . ' e falhou.');

                return redirect()->back()->with([
                    'status' => 'error',
                    'message' => 'Você não tem permissão para atender chamados!'
                ]);
            }

            $support = Support::find($supportId);

            if ($support->status == 1 && $support->assistant_id == null) {
                $support->assistant_id = Auth::user()->id;
                $support->status = 2;
            }

            $support->update();

            $subjects = Subject::orderBy('created_at', 'desc')->get();
            $assistants = User::where('role_as', 1)->get();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' iniciou o atentimento do chamado de #ID ' . $supportId . ' no sistema de atendimento.');
            return view('admin.supports.attend', compact('support', 'subjects', 'assistants'));
        } catch (\Throwable $th) {
            report ($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ' tentou atender o chamado de #ID ' . $supportId . ' e falhou.', ['excpetion' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Ocorreu um erro ao atender o chamado! Tente novamente mais tarde.'
            ]);
        }
    }
}
