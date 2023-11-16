<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TunelDoTempo;

class TunelDoTempoController extends Controller
{
    public function index()
    {
        $entries = TunelDoTempo::all(); // Recupera todos os registros do banco de dados
        return view('tuneldotempo', compact('entries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'data' => 'required|date',
            'qntd_dias' => 'required|integer',
            'motivo' => 'required',
        ]);

        return redirect('tuneldotempo')->with('success', 'Registro adicionado com sucesso!');
    }
}