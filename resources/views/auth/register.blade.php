<x-layout>

  <x-page-heading>Register</x-page-heading>

  {{--Display validation errors --}}
  @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-300 px-4 py-3 rounded relative mb-6">
      <ul class="list-disc pl-5">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <x-forms.form method="POST" action="/register" class="mt-10" enctype="multipart/form-data">
    <x-forms.input label="Name" name="name" placeholder="Ashley wae" />
    <x-forms.input label="Email" name="email" type="email" placeholder="Ashley@gmail.com" />
    <x-forms.input label="Password" name="password" type="password" placeholder="password" />
    <x-forms.input label="Confirm Password" name="password_confirmation" type="password"
      placeholder="confirm password" />

    <x-forms.divider />

    <x-forms.input label="Employer Name" name="employer" placeholder="employer name" />
    <x-forms.input label="Logo" name="logo" type="file" />

    <x-forms.button>Register</x-forms.button>

  </x-forms.form>
</x-layout>
