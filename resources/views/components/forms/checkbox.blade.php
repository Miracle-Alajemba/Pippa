@props(['label', 'name'])

@php
  $defaults = [
    'type' => 'checkbox',
    'id' => $name,
    'name' => $name,
    'value' => old($name),
    'class' => 'h-5 w-5 rounded-md border-white/20 bg-white/5
                        checked:bg-indigo-600 checked:border-indigo-600
                        focus:ring-indigo-500 focus:ring-offset-0 transition-all cursor-pointer'
  ];
@endphp

<x-forms.field :$label :$name>
  <label for="{{ $name }}" class="flex items-center gap-3 w-full cursor-pointer
               rounded-xl border border-white/10 bg-white/5
               px-5 py-4 hover:bg-white/10 transition">

    <input {{ $attributes($defaults) }}>

    <span class="text-sm font-medium text-gray-300">
      {{ $label }}
    </span>
  </label>
</x-forms.field>
