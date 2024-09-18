@extends('adminlte::master')

@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')
@inject('preloaderHelper', 'JeroenNoten\LaravelAdminLte\Helpers\PreloaderHelper')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="content">
        <h2>
            contenido principal
        </h2>

        <div class="card">
            <div class="card-header"style="background-color: #ee7a00;">
                <h4 style="color:#FFFFFF;"><strong>FORMULARIO DE REGISTRO</strong></h4>
            </div>
            <div class="card-body">
                <div class="card-title">
                    <strong>Ingresa la informacion</strong>
                </div>
                <div class="card-text">
                    <form action="{{route('registro.store')}}" method="post">
                        @csrf
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
