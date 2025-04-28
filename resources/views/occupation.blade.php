<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg px-6 py-12">
                <img src="{{ asset('images/404.svg') }}" alt="Coming Soon Illustration" class="mx-auto w-[600px] aspect-auto mb-12" />
                <div class="text-4xl font-bold text-center">
                    {{ __('Opps! sorry, page not found') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>