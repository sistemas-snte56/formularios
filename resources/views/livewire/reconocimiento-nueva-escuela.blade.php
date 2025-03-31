<div>
    <div style="margin-top: 150px;margin-bottom: 150px;">
        <form wire:submit.prevent="buscarRFC" >

            <div class="mb-4">
                <label for="rfc" class="block">RFC</label>
                <input type="text" id="rfc" wire:model="rfc" class="border rounded px-4 py-2 w-full" placeholder="Ingresa el RFC" style="border: 1px solid gray;">
            </div>

            <div class="mb-4">
                <div style="color: #f87171; font-size: 0.875rem; margin-left: 5px; margin-top: 5px;">
                    <!-- Mostrar errores de validación -->
                    @error('rfc') 
                        <span >
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>
        
            <div class="mb-4">
                <div style="color: #f87171; font-size: 0.875rem; margin-left: 5px; margin-top: 5px;">
                    @if (session()->has('error'))
                        <div class="mt-2 text-red-500">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary text-white px-4 py-2 rounded">Buscar</button>
        

        </form>




        <hr>


        <!-- Mostrar datos si el RFC es encontrado -->
        @if ($userData)
            <div class="mt-4">
                <p><strong>Nombre:</strong> {{ $userData->nombre }} {{ $userData->apaterno }} {{ $userData->amaterno }}</p>

                <!-- Botón para descargar el PDF -->
                <button wire:click="downloadPdf" class="btn bg-green-500 text-orange px-4 py-2 rounded mt-2">
                    Descargar PDF
                </button>
            </div>
        @endif

    </div>
</div>