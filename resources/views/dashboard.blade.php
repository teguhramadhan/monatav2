<x-app-layout>

    <div class="pt-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <x-excel-upload-card />
            </div>
        </div>
    </div>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden sm:rounded-lg">
                <div class="flex justify-between items-center p-6 text-gray-900">
                    <h3 class="text-lg font-semibold">Statistik Unspec</h3>
                    <p class="text-sm text-gray-500">
                        Data per {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                    </p>
                </div>
                <canvas id="ontChart" class="w-full px-6"></canvas>
            </div>
        </div>
    </div>


    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('ontChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['22 Apr 2025', '23 Apr 2025', '24 Apr 2025', '25 Apr 2025'],
                datasets: [{
                        label: 'Total ONT',
                        data: [150, 280, 400, 420],
                        backgroundColor: 'rgba(255, 99, 132, 0.6)',
                    },
                    {
                        label: 'ONT Spec',
                        data: [90, 170, 325, 420],
                        backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    },
                    {
                        label: 'ONT Unspec',
                        data: [60, 110, 75, 0],
                        backgroundColor: 'rgba(255, 206, 86, 0.6)',
                    },
                ],
            },
            options: {
                responsive: true, // Menjadikan chart responsif
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        callbacks: {
                            afterBody: function(context) {
                                const index = context[0].dataIndex;
                                // Ambil nilai Total ONT dan ONT Spec pada index yang sama
                                const total = context
                                    .find((d) => d.dataset.label === 'Total ONT')
                                    ?.raw[index];
                                const spec = context
                                    .find((d) => d.dataset.label === 'ONT Spec')
                                    ?.raw[index];

                                // Pastikan keduanya dalam tipe data number
                                if (Number(total) === Number(spec)) {
                                    return '✅ Valid (Total ONT = Spec)';
                                } else {
                                    return '❌ Invalid (Spec ≠ Total)';
                                }
                            },
                        },
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Jumlah',
                        },
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Tanggal',
                        },
                        ticks: {
                            autoSkip: true,
                            maxTicksLimit: 5, // Mengatur jumlah tanggal yang ditampilkan di x-axis pada mobile
                        },
                    },
                },
            },
        });
    </script>
    @endpush

</x-app-layout>