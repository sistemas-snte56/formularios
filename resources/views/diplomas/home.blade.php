<!-- resources/views/home.blade.php -->

@extends('components.layouts.app')

@section('title', 'Página de Inicio')

@section('content')
    <div class="row w-100 justify-content-center">
        @livewire('consultar-diploma')
    </div>

    
@endsection