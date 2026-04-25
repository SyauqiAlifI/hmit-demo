@extends('layouts.app')

@section('content')
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
@endsection

{{-- Initialize fullpage.js kapan-kapan --}}
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
