<div>
    <h2>Agendas</h2>
    <div>
        <select name="" id="" wire:model.live="especialistasSeleccion">
            <option value="">Elige un especialista</option>
            @foreach ($especialistas as $especialista)
                <option value="{{$especialista->id}}">{{$especialista->nombre}}</option>
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
                    <th>{{$i}}:00</th>
                    <td><button wire:click="anyadirDisponibilidad()">  </button></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
