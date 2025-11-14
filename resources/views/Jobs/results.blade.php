<x-layout>
  <x-page-heading>Your Search Results</x-page-heading>
  <div class=" mt-10 space-y-6">
    @foreach ($jobs as $job)
      <x-job-card-wide :$job />
    @endforeach

  </div>
</x-layout>
