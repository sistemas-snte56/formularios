<div>
    <div class="col-md-10 col-lg-10 col-xl-10 mx-auto mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="card-title text-center mb-4" style="color: #af272f;">
                    <strong>
                        DESCARGA DE DIPLOMA
                    </strong>
                </h3>

                <!-- Formulario de inicio de sesión -->
                <form wire:submit.prevent="submit" >
                    <div class="mb-3">
                        <label for="rfc" class="form-label">Ingresa tu RFC</label>
                        <input wire:model="rfc" type="text" class="form-control @error('rfc') is-invalid @enderror" id="rfc" name="rfc" placeholder="AABB00112233CCA" >
                    </div>
                    <!-- Mostrar mensaje de error para el campo RFC -->
                    @error('rfc')
                        <div class="text-danger mb-3">{{ $message }}</div>
                    @enderror

                    <button type="submit" class="btn btn-primary w-20">Iniciar Sesión</button>
                </form>


                @if (session()->has('error'))
                    <div class="alert alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session()->has('message'))
                    <div class="alert alert-success mt-3">
                        {{ session('message') }}
                    </div>
                @endif



                @if (isset($participante)) 
                    <table class="table table-bordered mt-3">
                        <thead class="bg-light">
                            <tr>
                                <th scope="col" style="width: 18%">Campo</th>
                                <th scope="col">Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($participante)
                                <!-- Mostrar los datos del participante si existe -->
                                <tr>
                                    <td>Nombre</td>
                                    <td>{{ $participante->nombre }} {{ $participante->apaterno }} {{ $participante->amaterno }}</td>
                                </tr>
                                <tr>
                                    <td>Correo</td>
                                    <td>{{ $participante->email }}</td>
                                </tr>
                                <tr>
                                    <td class="center text-center" colspan="2">
                                        <a href="{{ route('evaluacion.formativa.download', $participante->folio) }}" class="btn btn-success" target="_blank" rel="noopener noreferrer">Descargar</a>
                                    </td>
                                </tr>
                            @else
                                <!-- Mostrar mensaje de "sin datos" si no se encuentra el participante -->
                                <tr>
                                    <td class="center text-center" colspan="2">No hay información que mostrar</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                @endif




            </div>
        </div>
    </div>
</div>
