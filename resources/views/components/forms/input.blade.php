@props(['label', 'name', 'type' => 'text', 'placeholder' => ''])

@php
    $defaults = [
        'type' => $type,
        'id' => $name,
        'name' => $name,
        'placeholder' => $placeholder,
        'value' => old($name),
        'class' => 'w-full rounded-lg bg-white/10 border border-white/10 px-4 py-4 text-sm text-white
                    placeholder-white/50 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500
                    transition-all outline-none',
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes->merge($defaults) }}>
</x-forms.field>
