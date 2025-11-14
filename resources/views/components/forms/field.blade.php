@props(['label', 'name'])

<div class="space-y-1">
    <x-forms.label :$name :$label />
    <div>
        {{ $slot }}
    </div>
</div>
