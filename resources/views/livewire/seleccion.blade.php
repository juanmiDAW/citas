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
                                <th>{{ $i }}:00</th>
                                @for ($j = 1; $j < 6; $j++)
                                    @php
                                        $diaYHora = now()->startOfWeek()->addDays($j)->addHours($i, 0, 0);

                                        $bloqueada = \App\Models\Agenda::where(
                                            'especialista_id',
                                            $especialistaSeleccion,
                                        )
                                            ->where('disponibilidad', $diaYHora)
                                            ->first();

                                        $paciente = \App\Models\Paciente::where(
                                            'nombre',
                                            auth()->user()->name,
                                        )->first();

                                        $reservada = \App\Models\Reserva::with('paciente')
                                            ->where('reserva', $diaYHora)
                                            ->first();
                                        // dd($bloqueada);
                                    @endphp

                                    @if ($bloqueada)
                                        <td>
                                            <button
                                                class="text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Reservada</button>
                                        </td>
                                    @elseif ($reservada === null)
                                        <td>
                                            <button
                                                class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                                wire:click="reservar('{{ $diaYHora }}')">Reservar</button>
                                        </td>
                                    @elseif ($reservada->paciente->nombre == $paciente?->nombre)
                                        <td>
                                            <button
                                                class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                                wire:click="anular('{{ $reservada->id }}')">Anular</button>
                                        </td>
                                    @elseif (($reservada?->paciente->nombre ?? true) !== $paciente?->nombre)
                                        <td>
                                            <button
                                                class="text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Reservada</button>
                                        </td>
                                    @endif
                                @endfor
                            </tr>
                        @endfor
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
