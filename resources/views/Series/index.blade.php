


<x-layout title="Series">
    <a href="/series/create" class="btn btn-dark mb-3">Adiconar</a>
    
    @isset($mensagemsucesso)
        <div class="alert alert-sucess">
            {{$mensagemsucesso}}
        </div>
    @endisset

        <ul class="list-group">
             @foreach ($Series as $Series)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                   <a href="{{route('seasons.index', $Series->id)}}"> 
                     {{$Series->nome}}
                   </a>

                     <span class="d-flex">
                     <a href="{{ route('series.edit', $Series->id) }}" class="btn btn-primary btn-sm">
                        E
                    </a>
                
                     <form action="{{route('series.destroy', $Series->id)}}" method="POST" class="ms-2">
                        @csrf
                        @method('DELETE')
                        <button class="class btn btn-danger btn-sm ">
                            X
                        </button>
                        
                    </form>
                </span>
                </li>
            @endforeach
        </ul> 


       
    
     
</x-layout>



    