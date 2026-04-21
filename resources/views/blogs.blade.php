<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'HMIT') }} - About</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">

  <!-- Styles / Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="@container bg-neutral-900 min-h-screen dark">
  <header class="fixed top-0 left-0 z-100 w-full bg-transparent py-4">
    <div class="sm:max-w-xl lg:max-w-[85vw] mx-auto px-4">
      <nav class="flex items-center justify-between">
        <a href="/" class="size-12">
          <img src="{{ asset('images/hmit-logo.png') }}" class="w-full h-full" alt="hmit-logo">
        </a>

        {{-- Desktop nav links (hidden on mobile) --}}
        <ul id="nav-links" class="hidden lg:flex items-center justify-between gap-6">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="{{ route('about') }}">About HMIT</a></li>
          <li><a href="{{ route('services') }}">Services</a></li>
          <li><a href="{{ route('gallery') }}">Gallery</a></li>
          <li><a href="{{ route('blogs') }}">Blogs</a></li>
          <li><a href="{{ route('contacts') }}">Contact Us</a></li>
        </ul>

        {{-- Hamburger button (visible on mobile only) --}}
        <button id="menu-toggle"
          class="lg:hidden flex flex-col justify-center items-center gap-1.5 w-10 h-10 cursor-pointer"
          aria-label="Toggle menu">
          <span class="menu-bar block w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
          <span class="menu-bar block w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
          <span class="menu-bar block w-6 h-0.5 bg-white rounded transition-all duration-300"></span>
        </button>

        <div class="hidden lg:block"></div>
      </nav>
    </div>
    {{-- Mobile nav menu --}}
    <div id="mobile-nav" class="mobile-nav">
      <ul class="flex flex-col items-center gap-6 py-8">
        <li><a href="{{ route('home') }}" class="mobile-nav-link">Home</a></li>
        <li><a href="{{ route('about') }}" class="mobile-nav-link">About HMIT</a></li>
        <li><a href="{{ route('services') }}" class="mobile-nav-link">Services</a></li>
        <li><a href="{{ route('gallery') }}" class="mobile-nav-link">Gallery</a></li>
        <li><a href="{{ route('blogs') }}" class="mobile-nav-link">Blogs</a></li>
        <li><a href="{{ route('contacts') }}" class="mobile-nav-link">Contact Us</a></li>
      </ul>
    </div>
  </header>
  <div class="w-screen h-screen flex items-center justify-center">
    <h1 class="text-center text-white text-4xl font-bold">Blogs View</h1>
  </div>
</body>

</html>
