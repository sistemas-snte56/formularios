@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')
@inject('preloaderHelper', 'JeroenNoten\LaravelAdminLte\Helpers\PreloaderHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="contenedor">
        <div class="card">
            <div class="card-header">
                <h4><strong>FORMULARIO DE REGISTRO</strong></h4>
            </div>
            <div class="card-body">
                <div class="card-title">
                    <h4 class="mb-2" style="color: #89194b;">
                        <strong>
                            {{ $tema->titulo }}
                        </strong>
                    </h4>
                </div>
                <div class="card-text">
                    <form action="{{route('registro.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="tema" value="{{ $tema->id }}">
                        <livewire:region/>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop
