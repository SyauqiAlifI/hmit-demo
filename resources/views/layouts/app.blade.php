<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name', 'HMIT') }} - @yield('title', 'Home')</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
    rel="stylesheet">

  <link rel="icon" href="{{ asset('favicon.ico') }}">

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

<body class="bg-neutral-900 dark">
  <x-header />
  @yield('content')
</body>

</html>
