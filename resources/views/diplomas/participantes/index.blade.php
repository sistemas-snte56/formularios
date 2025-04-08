@extends('adminlte::page')

@section('title', 'Participantes')

@section('content_header')
    <h1>Participantes</h1>
@stop



@section('content')

        <div class="container">
            <div class="card">
                <div class="card-header">
                    Cursos
                </div>
                <div class="card-body">
                    @livewire('participantes')
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    @livewire('importar-participantes')
                </div>
            </div>
        </div>

@stop



@section('css')

@stop

@section('js')

@stop
