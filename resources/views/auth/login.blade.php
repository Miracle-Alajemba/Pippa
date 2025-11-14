<x-layout>
  <x-page-heading>Login</x-page-heading>

  <x-forms.form method="POST" action="/login" class="mt-10">

    <x-forms.input label="Email" name="email" type="email" placeholder="example@gmail.com" />
    <x-forms.input label="Password" name="password" type="password" placeholder="password" />

    <x-forms.button>login</x-forms.button>

  </x-forms.form>
</x-layout>
