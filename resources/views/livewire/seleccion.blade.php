<div>
    <h2>Citas medicas</h2>
    <div>
        <div class="flex flex-col">
            <div class="m-4">
                <label for="">Compañias: </label>
                <select name="compania" id="compania" wire:model.live="companiasSeleccion">
                    <option value="">Seleccione una compañia</option>
                    @foreach ($companias as $compania)
                        <option value="{{ $compania->id }}">{{ $compania->denominacion }}</option>
                    @endforeach
                </select>
            </div>

            @if ($especialidades != null)
                <div class="m-4">
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
                <div class="m-4">
                    <label for="">Especialistas: </label>
                    <select name="especialistas" id="especialistas" wire:model.live="especialistaSeleccion">
                        <option value="">Seleccione un@ especialista</option>
                        @foreach ($especialistas as $especialista)
                            <option value="{{ $especialista->id }}">{{ $especialista->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            @if ($especialistaSeleccion != null)
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <tr>
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th></th>
                            <th>Lunes</th>
                            <th>Martes</th>
                            <th>Miercoles</th>
                            <th>Jueves</th>
                            <th>Viernes</th>
                        </thead>
                    </tr>
                    <tbody>

                        @for ($i = 9; $i <= 21; $i++)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <tr>
                            <th>{{$i}}:00</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
