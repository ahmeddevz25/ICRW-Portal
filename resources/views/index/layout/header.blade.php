<!-- =======================================================
     MAIN HEADER (STICKY & REFINED DROPDOWN)
     ======================================================= -->
<header class="main-header header-style-one" id="home">
  <div class="main-box">

    <!-- Logo Box -->
    <div class="logo-box">
      <a href="{{ route('home') }}" class="header-brand-link" title="Institute of Creative and Research Writing">
        <img src="{{ asset('index/welcome/logo.png') }}" alt="ICRW Seal">
        <div class="header-brand-text">
          <span class="brand-line-1">Institute of Creative</span>
          <span class="brand-line-2">and Research Writing</span>
          <span class="brand-motto">Where Ideas become Words</span>
        </div>
      </a>
    </div>

    <!-- Navigation Outer -->
    <div class="nav-outer">
      <nav class="nav main-menu">
        <ul class="navigation">
          <li class="{{ request()->routeIs('home') ? 'current' : '' }}"><a href="{{ route('home') }}/">Home</a></li>
          <li><a href="{{ request()->routeIs('home') ? '#about' : route('home').'/#about' }}">About Us</a></li>
          <li class="{{ request()->routeIs('faculty') ? 'current' : '' }}"><a href="{{ route('faculty') }}">Faculty</a></li>
          <li><a href="{{ request()->routeIs('home') ? '#elibrary-section' : route('home').'/#elibrary-section' }}">E-Library</a></li>
          <li><a href="{{ request()->routeIs('home') ? '#certification' : route('home').'/#certification' }}">Verification</a></li>
        </ul>
      </nav>

      <!-- Outer Box (Auth Buttons & Mobile Toggler) -->
      <div class="outer-box">
        <a href="{{ request()->routeIs('home') ? '#single-workshop' : route('home').'/#single-workshop' }}" class="header-cta-btn d-none d-xl-inline-flex">
          Upcoming Workshop
        </a>
        <div class="header-nav-divider d-none d-xl-block"></div>
        
        <!-- Student Login & Register Buttons -->
        <button type="button" onclick="openAuthModal('login')" class="header-auth-btn header-login-btn" title="Sign In">
          <i class="fa-regular fa-user"></i> <span>Login</span>
        </button>
        <button type="button" onclick="openAuthModal('register')" class="header-auth-btn header-register-btn" title="Register New Student Account">
          <i class="fa-solid fa-user-plus"></i> <span>Register</span>
        </button>

        <!-- Mobile Nav Toggler -->
        <div class="mobile-nav-toggler" onclick="openMobileMenu()"><i class="fa fa-bars"></i></div>
      </div>
    </div>

  </div>

  <!-- Mobile Menu Drawer -->
  <div class="mobile-menu" id="customMobileMenu">
    <div class="menu-backdrop" onclick="closeMobileMenu()" role="button" aria-label="Close menu backdrop"></div>
    <nav class="menu-box">
      <div class="upper-box">
        <div class="nav-logo">
          <a href="{{ route('home') }}" onclick="closeMobileMenu()" class="d-flex align-items-center gap-2 text-decoration-none">
            <img src="{{ asset('index/welcome/logo.png') }}" alt="ICRW Seal" style="height: 44px; width: 44px; object-fit: contain;">
            <span style="font-family: var(--font-serif); font-size: 1.1rem; color: #fff; font-weight: 700;">ICRW</span>
          </a>
        </div>
        <div class="close-btn" onclick="closeMobileMenu()"><i class="fa fa-times"></i></div>
      </div>

      <!-- Mobile Student Auth Action Box -->
      <div class="mobile-auth-box p-3" style="background: rgba(255, 255, 255, 0.05); border-radius: 12px; margin: 12px 18px 16px; border: 1px solid rgba(255, 255, 255, 0.1);">
        <div style="font-size: 11px; text-transform: uppercase; letter-spacing: 0.1em; color: var(--icrw-gold); font-weight: 700; margin-bottom: 8px;">
          Student Virtual Campus
        </div>
        <div class="d-flex gap-2">
          <button type="button" onclick="closeMobileMenu(); openAuthModal('login');" class="btn btn-outline-light btn-sm w-50 rounded-pill" style="font-weight: 600; font-size: 13px;">
            <i class="fa-regular fa-user me-1"></i> Login
          </button>
          <button type="button" onclick="closeMobileMenu(); openAuthModal('register');" class="btn btn-warning btn-sm w-50 rounded-pill text-dark" style="font-weight: 700; font-size: 13px; background: var(--icrw-gold); border-color: var(--icrw-gold);">
            <i class="fa-solid fa-user-plus me-1"></i> Register
          </button>
        </div>
      </div>

      <ul class="navigation clearfix">
        <li><a href="javascript:void(0)" onclick="closeMobileMenu(); openStudentPortal();" style="color: var(--icrw-gold) !important; font-weight: 700;"><i class="fa-solid fa-video me-1"></i> Live Zoom &amp; Recordings</a></li>
        <li><a href="{{ route('home') }}/" onclick="closeMobileMenu()">Home</a></li>
        <li><a href="{{ request()->routeIs('home') ? '#about' : route('home').'/#about' }}" onclick="closeMobileMenu()">About Us</a></li>
        <li><a href="{{ route('faculty') }}" onclick="closeMobileMenu()">Faculty &amp; Leadership</a></li>
        <li><a href="{{ request()->routeIs('home') ? '#elibrary-section' : route('home').'/#elibrary-section' }}" onclick="closeMobileMenu()">E-Library</a></li>
        <li><a href="{{ request()->routeIs('home') ? '#certification' : route('home').'/#certification' }}" onclick="closeMobileMenu()">Certificate Verification</a></li>
      </ul>
      <ul class="contact-list-one">
        <li>
          <div class="contact-info-box">
            <i class="fa-solid fa-phone"></i>
            <span class="title">WhatsApp Admissions</span>
            <a href="https://wa.me/923001234279">+92 (300) 123-4279</a>
          </div>
        </li>
        <li>
          <div class="contact-info-box">
            <i class="fa-solid fa-envelope"></i>
            <span class="title">Official Email</span>
            <a href="mailto:icrwofficial@gmail.com">icrwofficial@gmail.com</a>
          </div>
        </li>
      </ul>
      <ul class="social-links d-flex gap-3 justify-content-center p-3">
        <li><a href="https://www.facebook.com/profile.php?id=61594750606831&sk=directory_intro" target="_blank" style="color: #fff; font-size: 18px;"><i class="fa-brands fa-facebook-f"></i></a></li>
        <li><a href="https://www.instagram.com/icrwofficial?igsh=ZDN1bTU2cGl4bzB6" target="_blank" style="color: #fff; font-size: 18px;"><i class="fa-brands fa-instagram"></i></a></li>
        <li><a href="https://www.linkedin.com/company/institute-of-creative-and-research-writing/" target="_blank" style="color: #fff; font-size: 18px;"><i class="fa-brands fa-linkedin-in"></i></a></li>
      </ul>
    </nav>
  </div>
</header>
<!-- End Main Header -->

