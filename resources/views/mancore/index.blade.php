<x-app-layout>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-3 py-4">
        <div class="bg-white p-6 overflow-hidden sm:rounded-lg">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 pb-4">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 items-center">Tabel Mancore FTM</h2>
                <x-add-mancore-button
                    type="submit"
                    class="w-full md:w-1/6 lg:w-1/6">
                    {{ __('Add Mancore') }}
                </x-add-mancore-button>
            </div>
            <form method="GET" action="{{ route('mancore.index') }}" class="mb-4">
                <div class="flex flex-col md:flex-row md:items-end gap-4">
                    <div class="flex-1">
                        <label for="sto" class="block mb-1 text-sm font-medium text-gray-700">Cari Berdasarkan STO :</label>
                        <select name="sto" id="sto" onchange="this.form.submit()"
                            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-orange-300">
                            <option value="">-- Pilih STO --</option>
                            @foreach($listSto as $stoOption)
                            <option value="{{ $stoOption }}" {{ request('sto') == $stoOption ? 'selected' : '' }}>
                                {{ $stoOption }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex-1">
                        <label for="search" class="block mb-1 text-sm font-medium text-gray-700">Cari Berdasarkan Data :</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}"
                            class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-orange-300"
                            placeholder="Cari GPON, IP, ODC, dll...">
                    </div>
                </div>
            </form>

            @if(request('sto'))
            <table class="w-full divide-y divide-gray-200 text-sm text-center pt-4">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-center font-semibold text-gray-700">STO</th>
                        <th class="px-6 py-3 text-center font-semibold text-gray-700">GPON Slot Port</th>
                        <th class="px-6 py-3 text-center font-semibold text-gray-700">GPON IP</th>
                        <th class="px-6 py-3 text-center font-semibold text-gray-700">Eakses</th>
                        <th class="px-6 py-3 text-center font-semibold text-gray-700">Oakses</th>
                        <th class="px-6 py-3 text-center font-semibold text-gray-700">ODC</th>
                        <th class="px-6 py-3 text-center font-semibold text-gray-700">Detail</th>
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
                            <x-secondary-button onclick="openModal('Detail data untuk {{ $mancore->gpon_slot_port }}')">
                                {{ __('Detail') }}
                            </x-secondary-button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $mancores->appends(['sto' => request('sto')])->links() }}
        </div>
        @else
        <p class="text-gray-500 text-center">Silakan pilih STO terlebih dahulu untuk menampilkan data.</p>
        @endif
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

    <!-- JS fitur search otomatis -->
    <script>
        const searchInput = document.getElementById('search');
        let typingTimer;
        const doneTypingInterval = 900; // waktu tunda (ms)

        searchInput.addEventListener('input', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(() => {
                this.form.submit(); // submit form pencarian otomatis
            }, doneTypingInterval);
        });
    </script>

</x-app-layout>