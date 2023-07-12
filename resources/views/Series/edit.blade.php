
<x-layout title="Editar Serie  {!! $series->nome !!} ">
    <x-series.form :action="route('series.store')" 
    :nome="$series->nome" :update="true" />
</x-layout>

    