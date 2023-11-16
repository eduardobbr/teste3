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
        $validate = $request->validate([
            'nome' => 'required',
            'data' => 'required|date',
            'qntd_dias' => 'required|integer',
            'motivo' => 'required'
        ]);
    
        try {
            $tunelDoTempo = new TunelDoTempo();
    
            $tunelDoTempo->nome = $request->input('nome');
            $tunelDoTempo->data = $request->input('data');
            $tunelDoTempo->qntd_dias = $request->input('qntd_dias');
            $tunelDoTempo->motivo = $request->input('motivo');
            $tunelDoTempo->situacao = $request->input('situacao');
    
            $tunelDoTempo->save();
    
            // Você pode retornar diretamente a instância criada, se desejar
            return $tunelDoTempo;
        } catch (\Exception $e) {
            // Aqui você pode lidar com a exceção, se necessário
            return redirect('tuneldotempo')->with('error', 'Erro ao adicionar o registro: ' . $e->getMessage());
        }
    }
}