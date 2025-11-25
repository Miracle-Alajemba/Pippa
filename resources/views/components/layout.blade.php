<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Pippa</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white font-[Hanken_Grotesk,sans-serif] pb-12">
  <div class="px-5 sm:px-10">

    {{-- NAVBAR --}}
    <nav class="flex items-center justify-between py-4 border-b border-white/10 bg-black relative">

      {{-- Logo --}}
      <a href="/">
        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Pippa Logo" class="h-10">
      </a>

      {{-- Desktop Navigation --}}
      <div class="hidden md:flex items-center space-x-8 font-semibold text-sm">
        <a href="{{ route('about') }}"
          class="hover:text-indigo-400 transition {{ request()->routeIs('about') ? 'text-indigo-400 underline' : '' }}">
          About
        </a>

        <a href="{{ route('jobs') }}"
          class="hover:text-indigo-400 transition {{ request()->routeIs('jobs') ? 'text-indigo-400 underline' : '' }}">
          Jobs
        </a>

        <a href="#" class="hover:text-indigo-400 transition">Salary</a>
        <a href="#" class="hover:text-indigo-400 transition">Companies</a>
      </div>

      {{-- Desktop CTA / Auth --}}
      <div class="hidden md:flex items-center space-x-6 font-semibold">

        @auth
          <a href="/jobs/create" class="px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 transition">
            Post a Job
          </a>

          <form method="POST" action="/logout">
            @csrf
            @method('DELETE')
            <button class="hover:text-red-400 transition">Logout</button>
          </form>
        @endauth

        @guest
          <a href="/register" class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-500 transition">
            Sign Up
          </a>

          <a href="/login" class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-500 transition">
            Log In
          </a>
        @endguest

      </div>

      {{-- Mobile Menu Toggle --}}
      <button id="menu-toggle" class="md:hidden flex flex-col space-y-1.5 focus:outline-none">
        <span class="block w-6 h-0.5 bg-white"></span>
        <span class="block w-6 h-0.5 bg-white"></span>
        <span class="block w-6 h-0.5 bg-white"></span>
      </button>

      {{-- Mobile Menu --}}
      <div id="mobile-menu"
        class="absolute left-0 top-full hidden w-full bg-black border-t border-white/10 py-4 text-center flex-col space-y-4 md:hidden">

        <a href="{{ route('jobs') }}" class="block hover:text-indigo-400 transition">
          Jobs
        </a>

        <a href="#" class="block hover:text-indigo-400 transition">Career</a>
        <a href="#" class="block hover:text-indigo-400 transition">Salary</a>
        <a href="#" class="block hover:text-indigo-400 transition">Companies</a>

        <a href="/jobs/create"
          class="mx-auto w-40 text-center px-4 py-2 rounded-lg bg-white/10 hover:bg-white/20 transition">
          Post a Job
        </a>
      </div>

    </nav>

    {{-- Main Content --}}
    <main class="max-w-[1200px] mx-auto mt-10">
      {{ $slot }}
    </main>

  </div>

  {{-- Mobile Menu Script --}}
  <script>
    document.getElementById('menu-toggle').addEventListener('click', () => {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    });
  </script>

</body>

</html>
