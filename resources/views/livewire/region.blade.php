                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="select_region" class="form-label text-orange">SELECCIONA REGIÓN</label>
                            <select name="select_region" id="select_region" class="form-control" wire:model.live="regionId">
                                <option value="">Selecciona...</option>
                                @foreach ($regiones as $region)
                                    <option value="{{ $region->id }}" {{ $region->id == old('select_region', $regionId) ? 'selected' : '' }}>
                                        {{ $region->region }} - {{ $region->sede }}
                                    </option>
                                @endforeach
                            </select>
                            @error('select_region')
                                <p style="font-size:12px; color:#DC3545"><strong>{{ $message }}</strong></p>
                            @enderror
                        </div>
                        
                        <div class="form-group col-md-12">
                            <label for="delegacion" class="form-label text-orange">SELECCIONA DELEGACIÓN</label>
                            <select name="select_delegacion" id="select_delegacion" class="form-control" wire:model="delegacionId">
                                <option value="">Selecciona...</option>
                                @foreach ($delegaciones as $delegacion)
                                    <option value="{{ $delegacion->id }}">
                                        {{ $delegacion->deleg_delegacional }} - {{ $delegacion->nivel_delegacional }} / {{ $delegacion->sede_delegacional }}
                                    </option>
                                @endforeach
                            </select>
                            @error('delegacionId')
                                <p style="font-size:12px; color:#DC3545"><strong>{{ $message }}</strong></p>
                            @enderror
                        </div>
                        
                        

                        <x-adminlte-select name="select_genero" label-class="text-orange" label="GENERO" fgroup-class="col-md-12">
                            <option value="">Selecciona...</option>
                            @foreach ($generos as $genero)
                                <option value="{{ $genero->id }}" @if(old('select_genero') == $genero->id) selected @endif >{{ $genero->genero }}</option>
                            @endforeach
                        </x-adminlte-select>                        

                        <x-adminlte-input name="nombre" label-class="text-orange" label="NOMBRE (S)" placeholder="Ingresa tu nombre" type="text" 
                            fgroup-class="col-md-12" value="{{old('nombre')}}" />
                        <x-adminlte-input name="apellido_paterno" label-class="text-orange" label="APELLIDO PATERNO" placeholder="Primer apellido" type="text" 
                            fgroup-class="col-md-12" value="{{old('apellido_paterno')}}" />
                        <x-adminlte-input name="apellido_materno" label-class="text-orange" label="APELLIDO MATERNO" placeholder="Segundo apellido" type="text" 
                            fgroup-class="col-md-12" value="{{old('apellido_paterno')}}" />
                        <x-adminlte-input name="telefono" label="TELÉFONO" 
                            fgroup-class="col-md-12" value="{{old('telefono')}}"  label-class="text-orange" placeholder="A diez dígitos" type="text"/>
                        <x-adminlte-input name="email" label="CORREO ELECTRÓNICO" 
                            fgroup-class="col-md-12" value="{{old('email')}}"  label-class="text-orange" placeholder="Tú email" type="text"/>
                        <x-adminlte-input name="rfc" label-class="text-orange" label="RFC" placeholder="Ingresa tu rfc" type="text" 
                            fgroup-class="col-md-12" value="{{old('rfc')}}" />
                            




                        <div class="form-group col-md-12">
                            <label for=""> &nbsp; </label>
                            <button class="btn btn-primary  float-right" type="submit">
                                <i class="fas fa-lg fa-fw fa-save"></i> Guardar
                            </button>
                        </div>                        
                    </div>