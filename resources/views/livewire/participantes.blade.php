<div class="container">
    <!-- Mensajes de éxito -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-12">
            <h3>{{ $editando ? 'Editar' : 'Crear' }} Participante</h3>
            <form wire:submit.prevent="{{ $editando ? 'update' : 'store' }}">

                <div class="row">
                    <x-adminlte-input wire:model="nombre" name="nombre" label="Nombre" placeholder="Ingresa nombre" fgroup-class="col-md-4"  />
                    <x-adminlte-input wire:model="apaterno" name="apaterno" label="Primer apellido" placeholder="Ingresa apellido paterno" fgroup-class="col-md-4"  />
                    <x-adminlte-input wire:model="amaterno" name="amaterno" label="Segundo apellido" placeholder="Ingresa apellido materno" fgroup-class="col-md-4"  />
                </div>

                <x-adminlte-select name="genero"  label="Género" wire:model="genero">
                    <x-adminlte-options :options="['Hombre'=>'Hombre', 'Mujer'=>'Mujer']" empty-option="Selecciona..."/>
                </x-adminlte-select>

                <div class="row">
                    <x-adminlte-input wire:model="email" name="email" type="email" label="Correo electrónico" placeholder="mail@example.com" fgroup-class="col-md-12" />
                </div>

                <div class="row">
                    <x-adminlte-input wire:model="telefono" name="telefono" type="text" label="Teléfono" placeholder="0123456789" fgroup-class="col-md-12" />
                </div>

                <div class="row">
                    <x-adminlte-input wire:model="rfc" name="rfc" type="text" label="RFC" placeholder="13 dígitos" fgroup-class="col-md-12" />
                </div>



{{-- 
                <div class="mb-3">
                    <label for="curso_id" class="form-label">Curso</label>
                    <select class="form-control" id="curso_id" wire:model="curso_id" multiple>
                        <option selected value="">Selecciona un curso</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                        @endforeach
                    </select>
                    @error('curso_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                 --}}



                 <select class="form-control" id="curso_id" wire:model="curso_id" multiple>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                    @endforeach
                </select>




                <button type="submit" class="btn btn-primary">{{ $editando ? 'Actualizar' : 'Crear' }}</button>
            </form>
        </div>
    </div>

    <!-- Lista de Participantes -->
    <div class="row">
        <div class="col-12">
            <h3>Lista de Participantes</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Curso</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($participantes as $participante)
                        <tr>
                            <td>{{ $participante->nombre }} {{ $participante->apaterno }}</td>
                            <td>                                
                                @foreach ($participante->cursos as $curso)
                                    <li>{{$curso->nombre}}</li>
                                @endforeach
                            </td>
                            <td>
                                <button wire:click="edit({{ $participante->id }})" class="btn btn-warning">Editar</button>
                                <button wire:click="delete({{ $participante->id }})" class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            {{ $participantes->links() }}
        </div>
    </div>
</div>

