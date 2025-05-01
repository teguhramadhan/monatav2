<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-3 py-4 bg-blue-800 border border-transparent rounded-md font-semibold text-sm uppercase text-white tracking-widest hover:bg-blue-900 focus:bg-orange-700 active:bg-orange-900 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>