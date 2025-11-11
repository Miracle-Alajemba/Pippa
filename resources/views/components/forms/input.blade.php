{{-- @props(['label', 'name', 'type' => 'text', 'value' => '']) --}}
@props(['label', 'name'])


{{--
@php
    $defaults = [
        'name' => $name,
        'id' => $name,
        'type' => $type,
        'value' => old($name),
        'class' => 'w-full rounded-md border-white-300 focus:border-indigo-500 focus:ring-indigo-500',
    ];
@endphp  or this one below --}}

@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'rounded-xl bg-white/10 border border-white/10 px-5 py-4 w-full',
        'value' => old($name),
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-forms.field>
