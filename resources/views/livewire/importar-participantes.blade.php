<div class="p-4 space-y-4">
    <h2 class="text-xl font-bold">Importar Participantes</h2>

    @if (session()->has('mensaje'))
        <div class="bg-green-100 text-green-700 p-2 rounded">
            {{ session('mensaje') }}
        </div>
    @endif

    <form wire:submit.prevent="importar" class="space-y-4">
        <div>
            <label for="curso_id">Curso</label>
            <select wire:model="curso_id" class="w-full border p-2 rounded">
                <option value="">Selecciona un curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                @endforeach
            </select>
            @error('curso_id') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label for="archivo">Archivo CSV</label>
            <input type="file" wire:model="archivo" class="w-full border p-2 rounded">
            @error('archivo') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
            Importar
        </button>
    </form>
</div>