<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SupportController extends Controller
{
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
}
