<x-layout>
  <div class="space-y-10 pt-6">
    <section class="text-center">
      <h1 class="text-4xl font-bold text-capitalize">Let's Help you Find Your Next Job</h1>
      <x-forms.form action="/search" class="mt-6" method="GET">
        <x-forms.input name="q" placeholder="Web Developer........" :label="false"></x-forms.input>
      </x-forms.form>
    </section>
    <section class="pt-10">
      <x-section-heading>Featured Jobs</x-section-heading>
      <div class="mt-6 grid gap-8 lg:grid-cols-3">
        @foreach ($featuredJobs as $job)
          <x-job-card :$job />
        @endforeach
      </div>
    </section>
    <section>
      <x-section-heading>Tags</x-section-heading>
      <div class="mt-4 space-x-1">
        @foreach ($tags as $tag)
          <x-tag :$tag />
        @endforeach

      </div>
    </section>
    <section>
      <x-section-heading>
        Recent Jobs
      </x-section-heading>
      <div class="mt-6 space-y-6">
        @foreach ($jobs as $job)
          <x-job-card-wide :$job />
        @endforeach

      </div>
    </section>
  </div>
</x-layout>
