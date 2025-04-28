<x-app-layout>

    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden sm:rounded-lg">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Mancore FTM</h2>

                <table class="w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">STO</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">GPON Slot Port</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">GPON IP</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Eakses</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Oakses</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">ODC</th>
                            <th class="px-6 py-3 text-left font-semibold text-gray-700">Detail</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($mancores as $mancore)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $mancore->sto }}</td>
                            <td class="px-6 py-4">{{ $mancore->gpon_slot_port }}</td>
                            <td class="px-6 py-4">{{ $mancore->gpon_ip }}</td>
                            <td class="px-6 py-4">{{ $mancore->eakses }}</td>
                            <td class="px-6 py-4">{{ $mancore->oakses }}</td>
                            <td class="px-6 py-4">{{ $mancore->odc }}</td>
                            <td class="px-6 py-4">
                                <x-primary-button onclick="openModal('Detail data untuk {{ $mancore->gpon_slot_port }}')">
                                    {{ __('Detail') }}
                                </x-primary-button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container mx-auto p-6">

    </div>

    <!-- Modal Placeholder -->
    <div id="modal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center">
        <div class="bg-white p-6 rounded-lg w-96 max-w-full">
            <h3 class="text-xl font-semibold text-gray-800" id="modal-title"></h3>
            <p class="mt-4 text-gray-600" id="modal-content"></p>
            <div class="mt-4 flex justify-end">
                <x-primary-button onclick="closeModal()">Close</x-primary-button>
            </div>
        </div>
    </div>


</x-app-layout>