<div>
    <!-- Input para ingresar el RFC -->
    <div>
        <form wire:submit="BuscarRFC">
            <input type="text" wire:model="rfc" placeholder="Ingresa RFC" class="form-input">
            @error('rfc') <span class="error">{{ $message }}</span> @enderror
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>
    </div>

    <!-- Mensaje de error si no se encuentra el RFC -->
    @if ($errorMessage)
        <div class="error-message">
            {{ $errorMessage }}
        </div>
    @endif

    <!-- Tabla con los resultados -->
    @if ($participante)
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nombre</th>
                    <th>Descargar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $participante->nombre }} {{ $participante->apaterno }} {{ $participante->amaterno }}</td>
                    <td><button wire:click="descargarDiploma">Descargar</button></td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
