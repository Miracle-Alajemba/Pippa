@props(['job'])

<x-panel class="flex flex-col p-6 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm
              hover:bg-white/10 hover:border-white/20 transition-all duration-300 group">

  {{-- Employer --}}
  <div class="flex items-center justify-between mb-4">
    <div class="text-sm font-medium text-gray-300">
      {{ $job->employer->name }}
    </div>

    {{-- Logo aligned right --}}
    <x-employer-logo :employer="$job->employer" :width="40" class="opacity-80 group-hover:opacity-100 transition" />
  </div>

  {{-- Posted Time --}}
  <p class="text-gray-400 text-xs mb-4">
    Posted {{ $job->created_at->diffForHumans() }}
  </p>

  {{-- Title --}}
  <div class="py-4">
    <h3 class="text-lg font-semibold leading-tight text-white
                group-hover:text-indigo-400 transition-colors duration-300">
      <a href="{{ $job->url }}" target="_blank">
        {{ $job->title }}
      </a>
    </h3>

    {{-- Salary --}}
    <p class="mt-2 text-sm text-gray-300">
      💸 {{ $job->salary }}
    </p>
  </div>

  {{-- Footer: Tags + Logo --}}
  <div class="mt-6 flex items-center justify-between">

    {{-- Tags --}}
    <div class="flex flex-wrap gap-1.5">
      @foreach ($job->tags as $tag)
        <x-tag :$tag size="small" class="scale-95 hover:scale-100 transition-transform" />
      @endforeach
    </div>

  </div>

</x-panel>
