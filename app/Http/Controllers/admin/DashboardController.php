<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        try {
            $supports = Support::orderBy('created_at', 'desc')->get();

            Log::info(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', acessou o dashboard do colaborador.');
            return view('admin.dashboard', compact('supports'));
        } catch (\Throwable $th) {
            report($th);
            Log::error(Auth::user()->name . ' de #ID ' . Auth::user()->id . ', tentou acessar o dashboard e falhou.', ['exception' => $th->getMessage()]);

            return redirect()->back()->with([
                'status' => 'error',
                'message' => 'Erro ao acessar dashboard! Tente novamente.'
            ]);
        }
    }
}
