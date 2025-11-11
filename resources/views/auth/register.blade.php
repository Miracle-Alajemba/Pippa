<x-layout>
    <x-page-heading>Register</x-page-heading>

    <x-forms.form method="POST" action="/register" class="mt-10" enctype="multipart/form-data">
        <x-forms.input label="Name" name="name" placeholder="name" />
        <x-forms.input label="Email" name="email" type="email" placeholder="email address" />
        <x-forms.input label="Password" name="password" type="password" placeholder="password" />
        <x-forms.input label="Confirm Password" name="password_confirmation" type="password"
            placeholder="confirm password" />

        <x-forms.divider />

        <x-forms.input label="Employer Name" name="employer" placeholder="employer name" />
        <x-forms.input label="Logo" name="logo" type="file" />

        <x-forms.button>Create Account</x-forms.button>

    </x-forms.form>
</x-layout>
