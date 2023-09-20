<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    public function index()
    {
        try {
            $subjects = Subject::orderBy('created_at', 'desc')->get();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', acessou a página de gerenciamento de assuntos.');
            return view('admin.subject.index', compact('subjects'));
        } catch (\Throwable $th) {
            report($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', tentou acessar a página de gerenciamento de assuntos.', ['exception' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao acessar gerenciamento de assuntos! Tente novamente.'
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $subject = new Subject();
            $subject->description = $request->description;
            $subject->code = $request->code;
            $subject->save();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', criou um novo assunto, no sistema de chamados.');
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Assunto criado com sucesso!'
            ]);
        } catch (\Throwable $th) {
            report($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', tentou criar um novo assunto e falhou.', ['exception' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao criar assunto! Tente novamente.'
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $subject = Subject::find($request->id);
            $subject->description = $request->description;
            $subject->code = $request->code;
            $subject->update();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', atualizou o assunto de #ID' . $request->id . ', no sistema de chamados.');
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Assunto atualizado com sucesso!'
            ]);
        } catch (\Throwable $th) {
            report($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', tentou atualizar o assunto de #ID' . $request->id . ' e falhou.', ['exception' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao atualizar assunto! Tente novamente.'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $subject = Subject::find($request->id);
            $subject->delete();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', deletou o assunto de #ID' . $request->id . ', no sistema de chamados.');
            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Assunto deletado com sucesso!'
            ]);
        } catch (\Throwable $th) {
            report($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', tentou deletar o assunto de #ID' . $request->id . ' e falhou.', ['exception' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao deletar assunto! Tente novamente.'
            ]);
        }
    }
}
