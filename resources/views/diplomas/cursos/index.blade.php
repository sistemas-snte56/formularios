@extends('adminlte::page')

@section('title', 'Cursos')

@section('content_header')
    <h1>Cursos</h1>
@stop



@section('content')

<!-- <div class="container"> -->
    <!-- <div class="row g-5"> -->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    Cursos
                </div>
                <div class="card-body">
                    @livewire('cursos')
                </div>
            </div>
        </div>
    <!-- </div> -->
<!-- </div> -->

@stop



@section('css')

@stop

@section('js')

@stop
