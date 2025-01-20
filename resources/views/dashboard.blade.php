@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Dashboard</h1>
@stop



@section('content')
    <div class="card">
        <div class="card-header"style="background-color: #ee7a00;">
            <h4 style="color:#FFFFFF;"><strong>FORMULARIO DE REGISTRO</strong></h4>
        </div>
        <div class="card-body">
            <div class="card-title">
                <strong>LISTA GENERAL</strong>
            </div>
            <div class="card-text">
                @php
                    $heads = [
                        'ID',
                        'REGION',
                        'DELEGACION',
                        ['label'=>'DELEGACION SEDE','no-export'=>true],
                        'NOMBRE',
                        'NUM. DE PERSONAL',
                        'RFC',
                        'TELÉFONO',
                        'CORREO ELECTRÓNICO',
                        'FOLIO',
                        ['label' => 'AJUSTES', 'no-export' => true, 'width' => 10],
                    ];

                    $config = [
                        'order' => [[0, 'asc']],
                        'columns' => [
                            ['orderable' => false, 'visible' => true],
                            ['orderable' => false, 'visible' => true],
                            ['orderable' => false, 'visible' => true],
                            ['orderable' => false, 'visible' => false],
                            ['orderable' => false, 'visible' => true],
                            ['orderable' => false, 'visible' => true],
                            ['orderable' => false, 'visible' => true],
                            ['orderable' => false, 'visible' => true],
                            ['orderable' => false, 'visible' => true],
                            ['orderable' => false, 'visible' => true],
                            ['orderable' => false, 'visible' => true],
                        ],
                        'language' => [
                            'url' => 'https://cdn.datatables.net/plug-ins/1.10.21/i18n/Spanish.json',
                        ],
                        'pageLength' => 100, // Configuración por defecto de la cantidad de entradas por página
                        'lengthMenu' => [50, 100, 200], // Opciones de entradas por página
                        'responsive' => true,                
                    ];
                    $key = 1;
                @endphp

                <x-adminlte-datatable id="table1" :heads="$heads" :config="$config" striped hoverable bordered compressed with-buttons>
                    @foreach ($usuarios as $teacher)
                        <tr>
                            <td> {{ $key ++ }} </td>
                            <td> {{ $teacher->delegacion->region->region }} - {{ $teacher->delegacion->region->sede }} </td>
                            <td> {{ $teacher->delegacion->deleg_delegacional }} </td>
                            <td> {{ $teacher->delegacion->sede_delegacional }} </td>
                            <td> {{ $teacher->nombre }} {{ $teacher->apaterno }} {{ $teacher->amaterno }} </td>
                            <td> {{ $teacher->npersonal }} </td>
                            <td> {{ $teacher->rfc }} </td>
                            <td> {{ $teacher->telefono }} </td>
                            <td> {{ $teacher->email }} </td>
                            <td> {{ $teacher->folio }} </td>
                            <td> 
                                {!! Form::open(['url' => '#', 'method' => 'POST', 'style' => 'display: inline', 'target' => '_blank']) !!}
                                    @csrf
                                    {!! Form::button('<i class="fa fa-xl fa-fw fa-file-pdf"></i>', ['class' => 'btn btn-sm btn-default text-teal mx-1 shadow', 'type' => 'submit', 'title' => 'Talon']) !!}
                                {!! Form::close() !!}
                                <a href="#" class="btn btn-sm btn-default text-primary mx-1 shadow" >
                                    <i class="fa fa-xl fa-fw fa-pen"></i>
                                </a>
                                {!! Form::open(['url' => '#', 'method' => 'DELETE', 'class' => 'formEliminar', 'title' => 'Eliminar' ,'style' => 'display: inline']) !!}
                                    @csrf
                                    {!! Form::button('<i class="fa fa-xl fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-default text-danger mx-1 shadow']) !!}
                                {!! Form::close() !!}                              
                            </td>
                        </tr>
                    @endforeach
                </x-adminlte-datatable>
            </div>
        </div>
    </div>
@stop



@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')

@stop