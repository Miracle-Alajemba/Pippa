@props(['job'])

<x-panel class="flex items-start gap-6 p-6 rounded-2xl bg-white/5 border border-white/10
              backdrop-blur-sm hover:bg-white/10 hover:border-white/20 transition-all duration-300 group">

  {{-- Logo --}}
  <div class="flex-shrink-0 mt-1">
    <x-employer-logo :employer="$job->employer" :width="60" class="opacity-90 group-hover:opacity-100 transition" />
  </div>

  {{-- Main Content --}}
  <div class="flex flex-col flex-1">

    {{-- Employer --}}
    <a class="text-sm text-gray-400 font-medium hover:text-gray-300 transition">
      {{ $job->employer->name }}
    </a>

    {{-- Title --}}
    <h3 class="mt-2 text-2xl font-semibold leading-tight text-white
                   group-hover:text-indigo-400 transition-all duration-300">
      <a href="{{ $job->url }}" target="_blank">
        {{ $job->title }}
      </a>
    </h3>

    {{-- Salary --}}
    <p class="mt-3 text-sm text-gray-300">
      💸 {{ $job->salary }}
    </p>

    {{-- Posted Time --}}
    <p class="text-xs text-gray-500 mt-4">
      Posted {{ $job->created_at->diffForHumans() }}
    </p>

  </div>

  {{-- Tags --}}
  <div class="flex flex-col items-end gap-2">
    @foreach ($job->tags as $tag)
      <x-tag :$tag size="small" class="scale-95 hover:scale-100 hover:bg-indigo-600/20 transition-all" />
    @endforeach
  </div>

</x-panel>
