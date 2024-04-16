<button {{ $attributes->merge(['type' => 'submit', 'class' => 'px-4 py-2 bg-sky-950 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-950 focus:bg-gray-950 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
