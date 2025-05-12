<div>
    <h2>Citas medicas</h2>
    <div>
        <div class="flex flex-col">
            <div>
                <label for="">Compañias: </label>
                <select name="compania" id="compania" wire:model.live="companiasSeleccion">
                    <option value="">Seleccione una compañia</option>
                    @foreach ($companias as $compania)
                        <option value="{{ $compania->id }}">{{ $compania->denominacion }}</option>
                    @endforeach
                </select>
            </div>

            @if ($especialidades != null)
                <div>
                    <label for="">Especidades: </label>
                    <select name="especialidad" id="especialidad" wire:model.live="especialidadesSeleccion">
                        <option value="">Seleccione una especialidad</option>
                        @foreach ($especialidades as $especialidad)
                            <option value="{{ $especialidad->id }}">{{ $especialidad->especialidad }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if ($especialistas != null)
            <div>
                <label for="">Especialistas: </label>
                <select name="especialistas" id="especialistas" wire:model.live="especialidadesSeleccion">
                    <option value="">Seleccione un@ especialista</option>
                    @foreach ($especialistas as $especialista)
                        <option value="{{ $especialista->id }}">{{ $especialista->nombre }}</option>
                    @endforeach
                </select>
            </div>
        @endif
        </div>
    </div>
</div>
