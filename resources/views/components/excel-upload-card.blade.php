<div class="bg-white rounded-2xl p-6 border border-gray-200">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Check Massal</h2>
        <p class="text-sm text-gray-500 mt-1">Unggah file Excel (.xlsx atau .xls) untuk diproses.</p>
    </div>

    <form>
        <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
            <x-text-input
                type="file"
                name="excel_file"
                accept=".xlsx,.xls"
                class="block w-full sm:flex-1 text-sm border rounded-md text-gray-600 px-4 py-2
                       file:rounded-lg file:border-0
                       file:text-sm file:font-semibold file:mr-4 file:py-2
                       file:bg-orange-200 file:text-orange-900
                       hover:file:bg-orange-500 hover:file:text-white transition" />

            <x-primary-button
                type="submit"
                disabled
                class="w-full sm:w-auto py-2 px-4 opacity-70 cursor-not-allowed">
                {{ __('Upload') }}
            </x-primary-button>
        </div>
    </form>

    <div class="mt-6 text-sm text-red-900 italic">
        Fitur upload belum aktif. Hanya tampilan saja.
    </div>
</div>