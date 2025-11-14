@props(['name', 'label'])

<div class="flex items-center gap-x-2 text-left">
    <span class="inline-block h-2 w-2 bg-white"></span>
    <label class="text-sm font-medium text-white" for="{{ $name }}">
        {{ $label }}
    </label>
</div>
