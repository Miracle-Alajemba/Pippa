@props(['employer', 'width' => 80])


<img src="{{ $employer->logo ? asset('storage/' . $employer->logo) : asset('images/default-logo.png') }}" alt="logo"
    class="rounded-xl" width="{{ $width }}">
