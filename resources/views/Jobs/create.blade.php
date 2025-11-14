<x-layout>

  <x-page-heading> Create New Job</x-page-heading>
  {{--Display validation errors --}}
  {{-- @if ($errors->any())
  <div class="bg-red-100 border border-red-400 text-red-300 px-4 py-3 rounded relative mb-6">
    <ul class="list-disc pl-5">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif --}}

  <x-forms.form method="POST" action="/jobs" class="mt-10" enctype="multipart/form-data">
    <x-forms.input label="Employer Name" name="employer" placeholder="CEO" />
    <x-forms.input label="Salary" name="Salary" placeholder="$90,0000" />
    <x-forms.input label="Location" name="location" placeholder="Winter Park, Florida" />

    <x-forms.select label="Schedul" name="Schedule">
      <option>Part Time</option>
      <option>FullTime</option>
    </x-forms.select>
    <x-forms.input label="URL" name="url" placeholder="https://acme/jobs/ceo-wanted" />

    <x-forms.button>Create </x-forms.button>

  </x-forms.form>
</x-layout>
