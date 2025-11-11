{{-- <button
    {{ $attributes->merge(['class' => 'rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold']) }}>{{ $slot }}</button> --}}

<button {{ $attributes->merge(['class' => 'rounded-md bg-indigo-600 px-3 py-2 text-sm font-bold']) }}>
    {{ $slot }}
</button>
