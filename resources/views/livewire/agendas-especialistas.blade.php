<div>
    <h2>Agendas</h2>
    <div>
        <select name="" id="" wire:model.live="especialistasSeleccion">
            <option value="">Elige un especialista</option>
            @foreach ($especialistas as $especialista)
                <option value="{{ $especialista->id }}">{{ $especialista->nombre }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <tr class="m-4">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <th class="p-4"></th>
                    <th class="p-4">Lunes</th>
                    <th class="p-4">Martes</th>
                    <th class="p-4">Miercoles</th>
                    <th class="p-4">Jueves</th>
                    <th class="p-4">Viernes</th>
                </thead>
            </tr>
            <tbody>

                @for ($i = 9; $i <= 21; $i++)
                    <tr class=" p-4 bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <tr>
                        <th>{{ $i }}:00</th>
                        @for ($j = 1; $j < 6; $j++)
                            @php
                                $diaYHora = now()->startOfWeek()->addDays($j)->addHours($i, 0, 0);
                                $bloqueada = \App\Models\Agenda::where('especialista_id', $especialistasSeleccion)
                                    ->where('disponibilidad', $diaYHora)
                                    ->first();

                                $reservada = \App\Models\Reserva::where('reserva', $diaYHora)->first();

                            @endphp

                            @if ($bloqueada)
                                <td>
                                    <button
                                        class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800"
                                        wire:click="anular('{{ $bloqueada->id }}')">Anular</button>
                                </td>
                            @elseif($reservada)
                                <td>

                                    <button
                                        class="text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">Reservada</button>
                                </td>
                            @else
                                <td>
                                    <button
                                        class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800"
                                        wire:click="bloquear('{{ $diaYHora }}')">Bloquear</button>
                                </td>
                            @endif
                        @endfor
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
