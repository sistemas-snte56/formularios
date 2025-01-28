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
                                <a class="btn btn-sm btn-default text-success mx-1 shadow" title="Talón" onclick="openPagina('{{$teacher->talon}}'); return false;">
                                    <i class="fa fa-xl fa-fw fa-file-pdf"></i>
                                </a>
                                <a class="btn btn-sm btn-default text-secundary mx-1 shadow" title="Talón" onclick="openPagina('{{$teacher->ine_frontal}}'); return false;" >
                                    <i class="fa fa-xl fa-fw fa-credit-card"></i>
                                </a>                            
                                <a class="btn btn-sm btn-default text-primary mx-1 shadow" title="Talón" onclick="openPagina('{{$teacher->ine_reverso}}'); return false;" >
                                    <i class="fa fa-xl fa-fw fa-credit-card"></i>
                                </a>                            
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
    <script>
        function openPagina(url) {
            var anchoVentana = window.innerWidth * 0.7;
            var altoVentana = window.innerHeight * 0.7;
            var left = (window.innerWidth - anchoVentana) / 2;
            var top = (window.innerHeight - altoVentana) / 2;
            window.open(url, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=" + top + ",left=" + left + ",width=" + anchoVentana + ",height=" + altoVentana + ",titlebar=no,location=no");
        }
    </script>
@stop