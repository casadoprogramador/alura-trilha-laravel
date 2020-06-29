<?php

namespace App\Http\Controllers;

use App\Model\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact(['series', 'mensagem']));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());
        dd($request->session()->put('mensagem', "Nome { $serie->nome } cadastrado com sucesso."));

        return redirect('/series');
    }
}
