
<x-layout title="Series">

    <form action={{route('series.store')}} method="post">
        @csrf
    
       
    <div class="row mb-3">
        <div class="col-8">
            <label class="form-label" for="nome">Nome</label>
            <input type="text" 
            autofocus
            class="form-control" 
            name="nome" 
            id="nome" 
            value="{{old('nome')}}">
            
        </div>

        <div class="col-2">
            <label class="form-label" for="seasonQty">N Temporadas</label>
            <input type="text" 
            class="form-control" 
            name="seasonQty" 
            id="seasonQty" 
            value="{{old('seasonQty')}}">
            
        </div>

        <div class="col-2">
            <label class="form-label" for="episodesPerSeason">Eps / Temporadas</label>
            <input type="text" 
            class="form-control" 
            name="episodesPerSeason" 
            id="episodesPerSeason" 
            value="{{old('episodesPerSeason')}}">
            
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>



    