                    <div class="row">

                        <x-adminlte-select name="select_region" label-class="text-orange" label="SELECCIONA REGIÓN" fgroup-class="col-md-12" wire:model.live="regionId" value={{$regionId}}>
                            <option value="">Selecciona...</option>
                            @foreach ($regiones as $region)
                                <option value="{{$region->id}}" {{ old('select_region',$regionId) == $region->id ? 'selected' : '' }}>
                                    {{ $region->region }} - {{ $region->sede }}
                                </option>
                            @endforeach
                        </x-adminlte-select>


                        <x-adminlte-select name="select_delegacion" label-class="text-orange" label="SELECCIONA DELEGACIÓN" fgroup-class="col-md-12" wire:model="delegacionId">
                            <option value="">Selecciona...</option>
                            @foreach ($delegaciones as $delegacion)
                                <option value="{{ $delegacion->id }}" {{ old('select_delegacion', $delegacionId) == $delegacion->id ? 'selected' : '' }}>
                                    {{ $delegacion->deleg_delegacional }} - {{ $delegacion->nivel_delegacional }} / {{ $delegacion->sede_delegacional }}
                                </option>
                            @endforeach
                        </x-adminlte-select>              
                        
                        
                        <div class="col-md-3 mb-3">
                            <label for="select_region">Región</label>
                            <select class="custom-select d-block w-100 @error('select_region') is-invalid @enderror" id="select_region" name="select_region" wire:model.live="regionId" required>
                                <option value="">Selecciona...</option>
                                @foreach ($regiones as $id => $region)
                                    <option value="{{ $id }}" {{ old('select_region') ==  $id  ? 'selected' : '' }}>{{ $region }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <ul>
                                    <li><strong>El campo region es requerido.</strong></li>
                                    @error('select_region')
                                        <li><strong>{{$message}}</strong></li>
                                    @enderror
                                </ul>
                            </div> 
                        </div>                        
                                               
                        <div class="col-md-3 mb-3">
                            <label for="select_delegacion">Delegación</label>
                            <select class="custom-select d-block w-100 @error('select_delegacion') is-invalid @enderror" id="select_delegacion" name="select_delegacion" wire:model="delegacionId" required>
                                <option value="">Selecciona...</option>
                                @foreach ($delegaciones as $id => $delegacion)
                                    <option value="{{ $id }}" {{ old('select_delegacion') ==  $id  ? 'selected' : '' }}>{{ $delegacion }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                <ul>
                                    <li><strong>El campo delegacion es requerido.</strong></li>
                                    @error('select_delegacion')
                                        <li><strong>{{$message}}</strong></li>
                                    @enderror
                                </ul>
                            </div> 
                        </div>                          
                    </div>