<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TunelDoTempo;

class TunelDoTempoController extends Controller
{
    public function index()
    {
        $tunelDoTempoEntries = TunelDoTempo::all();
        return view('tunel_do_tempo', ['entries' => $tunelDoTempoEntries]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'situacao' => 'required',
            'data' => 'required|date',
            'administrador' => 'required',
            'qntd_dias' => 'required|integer',
            'motivo' => 'required',
        ]);

        TunelDoTempo::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Registro adicionado com sucesso!');
    }
}