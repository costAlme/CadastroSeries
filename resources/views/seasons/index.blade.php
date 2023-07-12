


<x-layout title="Series">
        <ul class="list-group">
             @foreach ($season as $seasons)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                 
                Temporada {{$seasons->number}}

                  <span class="badge bg-secondary">
                        {{$seasons->episodes->count()}}
                 </span>
                </li>
            @endforeach
        </ul>  
</x-layout>



    