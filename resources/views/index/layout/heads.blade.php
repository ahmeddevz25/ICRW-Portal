<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title', 'Institute of Creative and Research Writing (ICRW) | Where Ideas Become Words')</title>
<meta name="description" content="@yield('meta_description', 'Institute of Creative and Research Writing (ICRW) — Premier international learning platform offering live interactive cohorts, 1-on-1 manuscript critiques, academic publishing mentorship, and verifiable credentials.')">

<!-- Stylesheets -->
<link rel="preload" href="{{ asset('index/css/custom.css?v=6.5') }}" as="style">
<link href="{{ asset('index/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('index/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('index/css/responsive.css') }}" rel="stylesheet">
<link href="{{ asset('index/css/custom.css?v=6.5') }}" rel="stylesheet">

<!-- Font Awesome 6.5.1 CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@500;600;700;800&family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,400;1,600&family=DM+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('index/welcome/logo.png') }}" type="image/png">
<link rel="icon" href="{{ asset('index/welcome/logo.png') }}" type="image/png">

@stack('styles')

<script>
  // Lock scrollbar while preloader is active & prime reveal animation state
  document.documentElement.classList.add('js-reveal-ready');
</script>

