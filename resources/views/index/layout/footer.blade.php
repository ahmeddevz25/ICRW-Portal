<!-- =======================================================
     SITE FOOTER (UNIFIED LUXURY ACADEMIC FOOTER)
     ======================================================= -->
<footer class="main-footer reveal-on-scroll" id="siteFooter">
  <div class="bg-image zoom-two" style="background-image: url('{{ asset('index/images/background/4.jpg') }}'); opacity: 0.10;"></div>

  <!-- Widgets Section -->
  <div class="widgets-section">
    <div class="auto-container">
      <div class="row clearfix">

        <!-- Column 1: Brand & Identity -->
        <div class="footer-column col-xl-4 col-lg-5 col-md-12 col-sm-12 stagger-child stagger-delay-1">
          <div class="footer-widget about-widget">
            <a href="{{ route('home') }}" class="footer-brand-wrap text-decoration-none">
              <img src="{{ asset('index/welcome/logo.png') }}" alt="ICRW Seal" class="footer-brand-logo">
              <div class="footer-brand-text">
                <span class="footer-brand-l1">Institute of Creative</span>
                <span class="footer-brand-l2">and Research Writing</span>
                <span class="footer-brand-motto">Where Ideas become Words</span>
              </div>
            </a>
            <p class="footer-about-desc">
              An online educational platform dedicated to nurturing creativity, strengthening research skills, and
              connecting minds across borders. Online | Live &amp; Interactive | Certification Provided.
            </p>
            <!-- Social Icons -->
            <ul class="footer-social-links">
              <li><a href="https://www.facebook.com/profile.php?id=61594750606831&sk=directory_intro" target="_blank" title="Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
              <li><a href="https://www.instagram.com/icrwofficial?igsh=ZDN1bTU2cGl4bzB6" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a></li>
              <li><a href="https://www.linkedin.com/company/institute-of-creative-and-research-writing/" target="_blank" title="LinkedIn"><i class="fa-brands fa-linkedin-in"></i></a></li>
              <li><a href="https://wa.me/923001234279" target="_blank" title="WhatsApp Admissions"><i class="fa-brands fa-whatsapp"></i></a></li>
            </ul>
          </div>
        </div>

        <!-- Column 2: Institutional -->
        <div class="footer-column col-xl-2 col-lg-3 col-md-6 col-sm-6 stagger-child stagger-delay-2">
          <div class="footer-widget">
            <h4 class="footer-widget-heading">Institutional</h4>
            <ul class="footer-links-list">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li><a href="{{ route('home') }}#about">About ICRW</a></li>
              <li><a href="{{ route('faculty') }}">Faculty &amp; Leadership</a></li>
              <li><a href="javascript:void(0)" onclick="openFullCatalogModal()">All Upcoming Workshops</a></li>
              <li><a href="{{ route('home') }}#certification">Verify Certificate</a></li>
              <li><a href="#home" class="text-gold">Back to Top ↑</a></li>
            </ul>
          </div>
        </div>

        <!-- Column 3: Curriculum Tracks -->
        <div class="footer-column col-xl-3 col-lg-4 col-md-6 col-sm-6 stagger-child stagger-delay-3">
          <div class="footer-widget">
            <h4 class="footer-widget-heading">Curriculum Tracks</h4>
            <ul class="footer-links-list">
              <li><a href="javascript:void(0)" onclick="openFullCatalogModal()">Track 1: Creative Writing &amp; Fiction</a></li>
              <li><a href="javascript:void(0)" onclick="openFullCatalogModal()">Track 2: Academic &amp; Research</a></li>
              <li><a href="javascript:void(0)" onclick="openFullCatalogModal()">Track 3: Reading &amp; Critical Thinking</a></li>
              <li><a href="javascript:void(0)" onclick="openFullCatalogModal()">Track 4: Interdisciplinary Studies</a></li>
              <li><a href="javascript:void(0)" onclick="openFullCatalogModal()">Track 5: Specialised Writing &amp; IELTS</a></li>
              <li><a href="{{ route('home') }}#elibrary-section">Digital E-Library Resources</a></li>
            </ul>
          </div>
        </div>

        <!-- Column 4: Admissions & Contact -->
        <div class="footer-column col-xl-3 col-lg-6 col-md-12 col-sm-12 stagger-child stagger-delay-4">
          <div class="footer-widget contact-widget">
            <h4 class="footer-widget-heading">Admissions &amp; Contact</h4>
            <ul class="footer-contact-details">
              <li>
                <i class="fa fa-envelope text-warning"></i>
                <a href="mailto:icrwofficial@gmail.com">icrwofficial@gmail.com</a>
              </li>
              <li>
                <i class="fa-brands fa-whatsapp text-success"></i>
                <a href="https://wa.me/923001234279" target="_blank">+92 (300) 123-4279</a>
              </li>
              <li>
                <i class="fa-solid fa-globe text-info"></i>
                <a href="https://www.icrw.net" target="_blank">www.icrw.net</a>
              </li>
            </ul>

          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Footer Bottom Copyright & Policies -->
  <div class="footer-bottom-wrap">
    <div class="auto-container">
      <div class="footer-bottom-inner">
        <div class="copyright-info">
          © {{ date('Y') }} Institute of Creative and Research Writing (ICRW). All Rights Reserved. 
          <span class="tagline-highlight">Where Ideas Become Words.</span>
        </div>
        <div class="footer-legal-links">
          <a href="javascript:void(0)" onclick="openDisclaimerModal()">Guest Speakers Disclaimer</a>
          <span class="sep">•</span>
          <a href="javascript:void(0)" onclick="openFullCatalogModal()">Workshops Directory</a>
          <span class="sep">•</span>
          <a href="{{ route('home') }}#about">About Us</a>
        </div>
      </div>
    </div>
  </div>
</footer>

