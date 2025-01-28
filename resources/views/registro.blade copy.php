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
                    <form action="{{route('registro.store')}}" method="post"  enctype="multipart/form-data" novalidate>
                        @csrf
                        <input type="hidden" name="tema" value="{{ $tema->id }}">
                        <livewire:region/>
                        <x-adminlte-select name="select_genero" label-class="text-orange" label="* GÉNERO" fgroup-class="col-md-12">
                            <option value="">Selecciona...</option>
                            @foreach ($generos as $id => $genero)
                                <option value="{{ $id }}" {{ old('select_genero') ==  $id  ? 'selected' : '' }}>{{ $genero }}</option>
                            @endforeach
                        </x-adminlte-select>

                        <x-adminlte-input name="nombre" label-class="text-orange" label="* NOMBRE (S)" placeholder="Ingresa tu nombre" type="text" 
                            fgroup-class="col-md-12" value="{{old('nombre')}}" />
                        <x-adminlte-input name="apellido_paterno" label-class="text-orange" label="* APELLIDO PATERNO" placeholder="Primer apellido" type="text" 
                            fgroup-class="col-md-12" value="{{old('apellido_paterno')}}" />
                        <x-adminlte-input name="apellido_materno" label-class="text-orange" label="* APELLIDO MATERNO" placeholder="Segundo apellido" type="text" 
                            fgroup-class="col-md-12" value="{{old('apellido_materno')}}" />
                        <x-adminlte-input name="rfc" label-class="text-orange" label="* RFC" placeholder="Tú RFC con homoclave" type="text" 
                            fgroup-class="col-md-12" value="{{old('rfc')}}">
                            <x-slot name="bottomSlot">
                                <span class="text-sm text-gray">
                                    [El formato del RFC es con homoclave]
                                </span>
                            </x-slot>                            
                        </x-adminlte-input>
                        <x-adminlte-input name="numero_de_personal" label="* NÚMERO DE PERSONAL" 
                            fgroup-class="col-md-12" value="{{old('numero_de_personal')}}"  label-class="text-orange" placeholder="¿Cúal es tú número de personal?" type="numeric">
                            <x-slot name="bottomSlot">
                                <span class="text-sm text-gray">
                                    [Solo se admitén números]
                                </span>
                            </x-slot>                            
                        </x-adminlte-input>
                            
                        <x-adminlte-select name="select_nivel_educativo" label-class="text-orange" label="* NIVEL EDUCATIVO"  fgroup-class="col-md-12" :value="old('select_nivel_educativo')" >
                            <x-adminlte-options :options="[
                                    'PREESCOLAR' => 'PREESCOLAR',
                                    'PRIMARIA' => 'PRIMARIA',
                                    'EDUCACIÓN ESPECIAL' => 'EDUCACIÓN ESPECIAL',
                                    'SECUNDARIA' => 'SECUNDARIA',
                                    'TELESECUNDARIA' => 'TELESECUNDARIA',
                                    'EDUCACIÓN FÍSICA' => 'EDUCACIÓN FÍSICA',
                                    'NIVELES ESPECIALES' => 'NIVELES ESPECIALES',
                                    'PAAE' => 'PAAE',
                                    'BACHILLERATO' => 'BACHILLERATO',
                                    'TELEBACHILLERATO' => 'TELEBACHILLERATO',
                                    'NORMALES' => 'NORMALES',
                                    'UPV' => 'UPV',
                                    'JUBILADOS' => 'JUBILADOS',
                                ]" 
                                placeholder="¿A que nivel educativo perteneces?"/>
                                <x-slot name="bottomSlot">
                                    <span class="text-sm text-gray">
                                        [Selecciona un nivel educativo]
                                    </span>
                                </x-slot>                                 
                        </x-adminlte-select>

                        <x-adminlte-input name="email" label="* CORREO ELECTRÓNICO" 
                            fgroup-class="col-md-12" value="{{old('email')}}"  label-class="text-orange" placeholder="Tú email" type="text"/>

                        <x-adminlte-input name="telefono" label="* TELÉFONO" 
                            fgroup-class="col-md-12" value="{{old('telefono')}}"  label-class="text-orange" placeholder="¿Ingresa tú número telefónico?" type="text">
                            <x-slot name="bottomSlot">
                                <span class="text-sm text-gray">
                                    [Tú número de telefono debe contener 10 dígitos]
                                </span>
                            </x-slot> 
                        </x-adminlte-input>



                        <x-adminlte-input-file name="talon" label-class="text-orange" label="* TALON DE PAGO" placeholder="Busca tú archivo..."
                            fgroup-class="col-md-12" accept="application/pdf" legend="Cargar" >
                            <x-slot name="bottomSlot">
                                <span class="text-sm text-gray">
                                    [Tú talón de pago debe ser en formato PDF]
                                </span>
                            </x-slot>
                        </x-adminlte-input-file>


                        <x-adminlte-input-file name="ine_frontal" label-class="text-orange" label="* ANVERSO INE" placeholder="Sube una foto..."
                            fgroup-class="col-md-12" accept="image/*"  legend="Cargar" >
                            <x-slot name="bottomSlot">
                                <span class="text-sm text-gray">
                                    [Selecciona la imagen frontal de tu credencial]
                                </span>
                            </x-slot>
                        </x-adminlte-input-file>

                        <x-adminlte-input-file name="ine_reverso" label-class="text-orange" label="* REVERSO INE" placeholder="Sube una foto..."
                            fgroup-class="col-md-12" accept="image/*"  legend="Cargar" >
                            <x-slot name="bottomSlot">
                                <span class="text-sm text-gray">
                                    [Selecciona la imagen reversa de tu credencial]
                                </span>
                            </x-slot>
                        </x-adminlte-input-file>

                        <x-adminlte-input-file name="formato" label-class="text-orange" label="* Sube formato" placeholder="Busca tú archivo..."
                            fgroup-class="col-md-12" accept="image/*"  legend="Cargar"   preview/>


                        <div class="form-group col-md-12">
                            <label for=""> &nbsp; </label>
                            <button class="btn btn-primary  float-right" type="submit">
                                <i class="fas fa-lg fa-fw fa-save"></i> Guardar
                            </button>
                        </div>  

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')

    @if(session('success_registro'))
        <script>
            $(document).ready(function(){
                let mensaje = "{{ session ('success_registro') }}"
                Swal.fire({
                    icon: 'success',
                    title: mensaje,
                    text: 'El registro se guardo satisfactoriamente.',
                    showConfirmButton: true,
                });
            });
        </script>
    @endif 

    @if(session('error_try'))
        <script>
            $(document).ready(function(){
                let mensaje = "{{ session ('error_try') }}"
                Swal.fire({
                    icon: 'warning',
                    title: mensaje,
                    text: 'Por favor, inténtalo de nuevo.',
                    showConfirmButton: true,
                });
            });
        </script>
    @endif 
@stop
