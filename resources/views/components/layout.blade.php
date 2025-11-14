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

<body class="bg-black font-[Hanken_Grotesk,sans-serif] text-white pb-15">
  <div class="px-5 sm:px-10">
    <nav class="relative flex items-center justify-between border-b border-white/10 bg-black py-4">
      <!-- Logo -->
      <a href="/">
        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="Pippa Logo" class="h-10">
      </a>

      <!-- Desktop Menu -->
      <div class="hidden space-x-6 font-bold md:flex">
        <a href="#">Jobs</a>
        <a href="#">Career</a>
        <a href="#">Salary</a>
        <a href="#">Companies</a>
      </div>

      <!-- CTA Button (desktop only) -->
      @auth
        <div class="hidden md:block">
          <a href="/jobs/create" class="rounded-lg bg-white/10 px-4 py-2 transition-colors hover:bg-white/25">Post
            a Job</a>
        </div>
      @endauth

      @guest
        <div class="space-x-6 font-bold">
          <a href="/register" class="rounded-lg bg-indigo-600 px-4 py-2 transition-colors hover:bg-white/25">Sign Up</a>
          <a href="/login" class="rounded-lg bg-indigo-600 px-4 py-2 transition-colors hover:bg-white/25">Log In</a>
        </div>
      @endguest

      <!-- Hamburger Icon (mobile only) -->
      <button id="menu-toggle" class="flex items-center space-x-2 focus:outline-none md:hidden">
        <!-- Simple hamburger icon using Tailwind -->
        <div class="space-y-1.5">
          <span class="block h-0.5 w-6 bg-white"></span>
          <span class="block h-0.5 w-6 bg-white"></span>
          <span class="block h-0.5 w-6 bg-white"></span>
        </div>
      </button>

      <!-- Mobile Menu -->
      <div id="mobile-menu"
        class="absolute left-0 top-full hidden w-full flex-col items-center space-y-4 border-t border-white/10 bg-black py-4 text-center md:hidden">
        <a href="#" class="block">Jobs</a>
        <a href="#" class="block">Career</a>
        <a href="#" class="block">Salary</a>
        <a href="#" class="block">Companies</a>
        <a href="#" class="rounded-lg bg-white/10 px-4 py-2 transition-colors hover:bg-white/25">Post
          a Job</a>
      </div>
    </nav>

    <main class="mx-auto mt-10 max-w-[1200px]">
      {{ $slot }}
    </main>
  </div>

  <script>
    document.getElementById('menu-toggle').addEventListener('click', () => {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    });
  </script>
</body>

</html>
