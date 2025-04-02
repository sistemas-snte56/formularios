<div>
    <form wire:submit.prevent="buscarRFC">
        <div class="row gy-3">
            <div class="col-md-12">
                <label for="cc-name" class="form-label"> <strong>RFC</strong> </label>
                <input type="text" id="rfc" name="rfc" wire:model="rfc" class="form-control" placeholder="Ingresa tu RFC" required="">

                <div class="my-4">
                    @error('rfc')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                    @enderror

                    @if (session()->has('error'))
                        <small class="text-danger">
                            {{ session('error') }}
                        </small>
                    @endif
                </div>
            </div>
        </div>

        <button class="btn btn-primary  px-4 py-2" type="submit">Buscar</button>

    </form>




    <!-- Mostrar datos si el RFC es encontrado -->
    @if ($userData)
        <div class="mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">APELLIDO PATERNO</th>
                        <th scope="col">APELLIDO MATERNO</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $userData->nombre }}</td>
                        <td>{{ $userData->apaterno }}</td>
                        <td>{{ $userData->amaterno }}</td>
                        <td>
                            <button wire:click="downloadPdf" class="btn btn-success px-4 py-2">
                                Descargar PDF
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endif

</div>