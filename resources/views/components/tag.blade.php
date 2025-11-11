@props(['tag', 'size' => 'base'])

@php
    $classes = 'duration-300 text-2xs rounded-xl bg-white/10 px-3 py-1 font-bold transition-colors hover:bg-white/25';

    if ($size == 'base') {
        $classes .= ' px-5 py-1 text-sm';
    }

    if ($size == 'small') {
        $classes .= ' px-3 py-1 text-2xs';
    }
@endphp

<a href="/tags/{{ strtolower($tag->name) }}"{{ $attributes->merge(['class' => $classes]) }}>
    {{ $tag->name }}
</a>
