<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Serie;
use App\Models\Season;
use App\Models\Episode;


class SeriesController extends Controller
{

    private $objChave;

    public function __construct()
    {
        $this->objChave= new Serie();
    }


  
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $Series = Serie::all();
        $mensagemsucesso = session('mensagem.sucesso');

         return view('series.index', compact('Series'))->
         with('mensagemsucesso', $mensagemsucesso);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('series.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $request->validate([
            'nome' => ['required' , 'min:3']
        ]);

        
        $Series = Serie::create($request->all());

        $Seasons =  [];
        for($i = 1 ; $i <= $request->seasonsQty; $i++){
                $Seasons [] = [ 
                    'series_id' => $Series->id,
                    'number' => $i,
                ];
        }
        Season::insert($Seasons);

        $episodes = [];
        foreach($Series->season as $Seasons) {
        for($j = 1; $j <= $request->episodesPerSeason; $j++){
            $episodes[] = [
                'series_id' => $Seasons->id,
                'number' => $j,
            ];
          }     
    }
        Episode::insert($episodes);

        return to_route('series.index')->with('mensagem.sucesso', "Serie '{$Series->nome}' adicionada com sucesso");
        
        // ou pode ser passado assim
        /*
        return to_route('series.index');

        return redirect()->route('series.create');
        */
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Serie $series)
    {   
       

       // return to_route('series.edit', ['series', $series->id]);

        return view('series.edit')->with('series', $series);

      /* return to_route('series.edit', compact(
            'series'
           ));
      */

      //return view('series.edit', compact('series'));
           
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Serie $series)
    {
            $series->fill($request->all());
            $series->save();

            return to_route('series.index')->with('mensagem.sucecsso', "Serie '{$series->nome}' atualizada com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $series, Request $request)
    {
        
        $series->delete();
        $request->session()->flash('mensagem.sucesso', "Serie '{$series->nome}' removida com sucesso");

        return to_route('series.index');
    }
}
