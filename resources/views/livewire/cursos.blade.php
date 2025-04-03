<div >
    <!-- Mensajes de éxito -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="row mb-4">
        <div class="col-12">
            <h3>{{ $editando ? 'Editar' : 'Crear' }} Curso</h3>
            <form wire:submit.prevent="{{ $editando ? 'update' : 'store' }}">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del Curso</label>
                    <input type="text" class="form-control" id="nombre" wire:model="nombre">
                    @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="horas" class="form-label">Horas</label>
                    <input type="text" class="form-control" id="horas" wire:model="horas">
                    @error('horas') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ $editando ? 'Actualizar' : 'Crear' }}</button>
            </form>
        </div>
    </div>

    <!-- Tabla de Cursos -->
    <div class="row">
        <div class="col-12">
            <h3>Lista de Cursos</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Horas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>{{ $curso->nombre }}</td>
                            <td>{{ $curso->horas }}</td>
                            <td>
                                <button wire:click="edit({{ $curso->id }})" class="btn btn-warning">Editar</button>
                                <button wire:click="delete({{ $curso->id }})" class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginación -->
            {{ $cursos->links() }}
        </div>
    </div>
</div>

