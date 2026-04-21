<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'HMIT') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">

  <!-- Styles / Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  {{-- Note untuk pak widi:
    Saya dengan beberapa abang kelas di HMIT sedang berdiskusi secara serius untuk
    mengembangkan website ini (HMIT) sebagai full web application, yang bukan hanya untuk memamerkan
    keahlian anak" HMIT, tetapi juga dapat bisa menjadi inspirasi bagi angkatan selanjutnya
    juga untuk se-indonesia bahwa Informatika di UTS tidak "kampungan" dan ada "hasilnya".

    - Salam hangat Alif & Teman-teman Tim PWTI dari HMIT
  --}}

  {{-- Ini hanyalah sebagai demonstrasi dari landing page saja --}}

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
  {{-- fullpage.js wrapper --}}
  <div id="fullpage">

    {{-- Section 1: Hero --}}
    <section class="section" id="hero">
      <div id="bg-hero" class="absolute top-0 left-0 w-full h-screen opacity-60"></div>
      <div class="z-10 absolute bottom-0 w-full h-[25vh] bg-linear-to-t from-neutral-900 from-20% to-transparent"></div>
      {{-- Outlined "HMIT" text --}}
      <div class="outlined-text-wrapper">
        <div class="echo-stack">
          <h1 class="echo-text" style="--echo-x: -32px; --echo-y: 40px; --echo-opacity: 0.1;">HMIT</h1>
          <h1 class="echo-text" style="--echo-x: -26px; --echo-y: 28px; --echo-opacity: 0.3;">HMIT</h1>
          <h1 class="echo-text" style="--echo-x: -14px;  --echo-y: 16px;  --echo-opacity: 0.5;">HMIT</h1>
          <h1 class="solid-text">HMIT</h1>
        </div>
        <p class="hero-desc">
          Himpunan Mahasiswa Informatika
        </p>
      </div>
      <div class="absolute bottom-0 w-full my-8 z-10">
        <p class="text-center font-bold text-[rgba(228,140,23,1)]!">Made by <span>Syauqi Alif Ibrahim</span></p>
      </div>
    </section>
    {{-- Section 2: About --}}
    {{-- <section class="section" id="about">
      <div class="flex items-center justify-center h-full">
        <h2 class="text-4xl font-bold text-white">About HMIT</h2>
      </div>
    </section> --}}
  </div>

  {{-- Vanta Globe --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanta/dist/vanta.globe.min.js"></script>
  <script>
    VANTA.GLOBE({
      el: "#bg-hero",
      mouseControls: false,
      touchControls: false,
      gyroControls: true,
      minHeight: 200.00,
      minWidth: 200.00,
      scale: 1.00,
      scaleMobile: 1.00,
      color: 0xe0aa00,
      size: 0.70,
      backgroundColor: 0x171717
    })
  </script>

  {{-- Mobile nav toggle --}}
  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const mobileNav = document.getElementById('mobile-nav');

    menuToggle.addEventListener('click', () => {
      const isOpen = mobileNav.classList.toggle('open');
      menuToggle.classList.toggle('active', isOpen);
    });

    mobileNav.querySelectorAll('a').forEach(link => {
      link.addEventListener('click', () => {
        mobileNav.classList.remove('open');
        menuToggle.classList.remove('active');
      });
    });
  </script>

  {{-- Initialize fullpage.js --}}
  {{-- <script>
    new fullpage('#fullpage', {
      autoScrolling: true,
      scrollOverflow: true,
      scrollingSpeed: 700,
      fitToSection: true,
      anchors: ['hero', 'about'], // section IDs
      menu: '#nav-links', // auto-highlights active nav link
      css3: true,
      easing: 'easeInOutCubic',
      navigation: true, // side dot navigation
      navigationPosition: 'right',

      // Optional: callback when leaving a section
      // onLeave: function(origin, destination, direction) {},
    });
  </script> --}}
</body>

</html>
