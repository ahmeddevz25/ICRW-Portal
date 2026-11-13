@extends('index.layout')

@section('title', 'Institute of Creative and Research Writing (ICRW) | Where Ideas Become Words')

@section('meta_description', 'Institute of Creative and Research Writing (ICRW) — Premier international learning platform offering live interactive cohorts, 1-on-1 manuscript critiques, academic publishing mentorship, and verifiable credentials.')

@section('html-class', 'is-loading')

@section('preloader')
  <!-- =======================================================
       ICRW LUXURY INSTITUTIONAL PRELOADER
       ======================================================= -->
  <div id="icrwPreloader" class="icrw-preloader">
    <div class="preloader-content">

      <!-- Emblem Wrap -->
      <div class="preloader-emblem-wrap">
        <div class="preloader-orbit-outer"></div>
        <div class="preloader-orbit-inner"></div>
        <div class="preloader-glow-halo"></div>
        <div class="preloader-logo-frame">
          <img src="{{ asset('index/welcome/logo.png') }}" alt="ICRW Seal" class="preloader-seal-img">
        </div>
      </div>

      <!-- Typography -->
      <div class="preloader-brand-title">
        <span class="p-title-main">Institute of Creative &amp; Research Writing</span>
        <span class="p-title-tagline">Where Ideas become Words</span>
      </div>

      <!-- Gold Luxury Progress Bar -->
      <div class="preloader-bar-wrap">
        <div class="preloader-bar-fill"></div>
      </div>

      <!-- Micro Status Indicator -->
      <div class="preloader-status-text">
        <span class="pulse-dot-sm me-2" style="background: var(--icrw-gold);"></span>
        <span id="preloaderStatusText">Connecting to Academic Portal...</span>
      </div>

    </div>
  </div>
@endsection

@section('content')

    <!-- =======================================================
       HERO BANNER SECTION
       ======================================================= -->
    <section class="hero-icrw-banner">
      <div class="auto-container">
        <div class="row align-items-center g-4 g-lg-5">
          <div class="col-lg-7">
            <h1 class="hero-title" id="heroTitle" aria-label="Master the Art of Writing Through Live Interactive Workshops &amp; Masterclasses">
              <span class="hero-typewriter-text" id="heroTypewriterText"></span><span class="hero-typewriter-cursor" id="heroTypewriterCursor" aria-hidden="true"></span>
              <noscript>Master the Art of Writing Through <span class="hero-title-highlight">Live Interactive Workshops</span> &amp; Masterclasses</noscript>
            </h1>
            <p class="hero-subtitle">
              The Institute of Creative and Research Writing (ICRW) delivers focused, single-session live workshops and
              expert literary masterclasses — tailored for emerging storytellers, researchers, and professional
              communicators with direct mentor feedback.
            </p>
            <div class="hero-actions">
              <a href="javascript:void(0)" onclick="openAuthModal('register')" class="btn-hero-primary">
                <i class="fa-solid fa-user-plus me-1"></i>
                <span>Register</span>
              </a>
              <a href="javascript:void(0)" onclick="openDisclaimerModal()" class="btn-hero-policy">
                <i class="fa fa-scale-balanced text-warning me-1"></i>
                <span>Guest Speakers Policy</span>
              </a>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="hero-image-showcase">
              <!-- Interactive 3D Frame with Client Founder Photo -->
              <div class="hero-image-frame" id="heroInteractiveFrame">
                
                <!-- Floating Top Founder Badge -->
                <div class="hero-floating-top-badge" onclick="openFacultyModal('syrrina')" title="Click to view Founder's Credentials &amp; Published Works">
                  <i class="fa-solid fa-graduation-cap text-warning fs-6"></i>
                  <div class="founder-badge-info">
                    <span class="founder-badge-title">Dr. Syrrina Ahsan Ali Haque</span>
                    <span class="founder-badge-role">CEO &amp; Founder • Postdoc Fellow (USA)</span>
                  </div>
                  <i class="fa-solid fa-arrow-up-right-from-square ms-2 text-warning" style="font-size: 0.72rem;"></i>
                </div>

                <div class="hero-image-inner" onclick="openFacultyModal('syrrina')" style="cursor: pointer;" title="Click to view Dr. Syrrina's Academic Dossier">
                  <img src="{{ asset('index/images/custom/hero_founder_syrrina.jpg') }}" alt="Dr. Syrrina Ahsan Ali Haque - CEO &amp; Founder, Institute of Creative and Research Writing (ICRW)" class="hero-main-photo">
                </div>

                <!-- Floating Bottom Award Card -->
                <div class="hero-floating-bottom-card" onclick="openFacultyModal('syrrina')" title="Click to view Award Details &amp; Publications">
                  <div class="floating-bottom-header">
                    <span class="floating-live-badge"><span class="badge-dot-amber"></span> International Acclaim</span>
                    <span class="badge-accreditation"><i class="fa-solid fa-award text-warning"></i> Winner</span>
                  </div>
                  <strong class="floating-award-title">NeMLA Book Award (Boston, USA)</strong>
                  <p class="floating-award-sub">Author of <em>Dialogue on Partition</em> (Bloomsbury Publishing)</p>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =======================================================
       3 ACADEMIC TRACKS
       ======================================================= -->
    <section class="stream-divisions-section" id="academic-streams" style="background: linear-gradient(180deg, #f8faf9 0%, #edf4f0 100%);">
      <div class="auto-container">
        <div class="text-center mb-4 reveal-on-scroll">
          <span class="stream-section-badge">Academic Divisions</span>
          <h2 class="stream-section-title">Three Specialized Writing Streams</h2>
          <p class="stream-section-subtitle">Focused, single-session masterclasses and intensive writing clinics designed to elevate creative craft, scholarly publishing standards, and professional communications.</p>
        </div>

        <div class="streams-trio-wrapper reveal-on-scroll">
          <div class="row g-3 g-md-4 justify-content-center">
            <!-- Stream 1: Creative Writing -->
            <div class="col-lg-4 col-md-4 col-sm-6 stream-item-reveal stream-col-1">
              <div class="stream-circle-showcase">
                <a href="javascript:void(0)" onclick="openFullCatalogModal('creative')" class="stream-portal-link" title="Explore Creative Writing Masterclasses">
                  <div class="stream-portal-circle">
                    <div class="stream-portal-ring"></div>
                    <div class="stream-portal-img-wrap">
                      <img src="{{ asset('index/images/custom/track_creative.jpg') }}" alt="Creative Writing and Poetics Craft" class="stream-portal-img">
                    </div>
                    <div class="stream-portal-icon stream-icon-creative">
                      <i class="fa-solid fa-feather-pointed"></i>
                    </div>
                  </div>
                </a>
                <div class="stream-details">
                  <h3 class="stream-title mb-0">
                    <a href="javascript:void(0)" onclick="openFullCatalogModal('creative')" class="stream-badge-title stream-pill-creative" title="Explore Creative Writing &amp; Poetics">
                      Creative Writing &amp; Poetics
                    </a>
                  </h3>
                </div>
              </div>
            </div>

            <!-- Stream 2: Academic Research -->
            <div class="col-lg-4 col-md-4 col-sm-6 stream-item-reveal stream-col-2">
              <div class="stream-circle-showcase">
                <a href="javascript:void(0)" onclick="openFullCatalogModal('academic')" class="stream-portal-link" title="Explore Academic Research Clinics">
                  <div class="stream-portal-circle">
                    <div class="stream-portal-ring"></div>
                    <div class="stream-portal-img-wrap">
                      <img src="{{ asset('index/images/custom/track_academic.jpg') }}" alt="Academic and Research Writing Desk" class="stream-portal-img">
                    </div>
                    <div class="stream-portal-icon stream-icon-academic">
                      <i class="fa-solid fa-book-bookmark"></i>
                    </div>
                  </div>
                </a>
                <div class="stream-details">
                  <h3 class="stream-title mb-0">
                    <a href="javascript:void(0)" onclick="openFullCatalogModal('academic')" class="stream-badge-title stream-pill-academic" title="Explore Academic &amp; Research Writing">
                      Academic &amp; Research Writing
                    </a>
                  </h3>
                </div>
              </div>
            </div>

            <!-- Stream 3: Professional Writing -->
            <div class="col-lg-4 col-md-4 col-sm-6 stream-item-reveal stream-col-3">
              <div class="stream-circle-showcase">
                <a href="javascript:void(0)" onclick="openFullCatalogModal('professional')" class="stream-portal-link" title="Explore Professional Writing Intensives">
                  <div class="stream-portal-circle">
                    <div class="stream-portal-ring"></div>
                    <div class="stream-portal-img-wrap">
                      <img src="{{ asset('index/images/custom/track_professional.jpg') }}" alt="Professional and Digital Writing Desk" class="stream-portal-img">
                    </div>
                    <div class="stream-portal-icon stream-icon-professional">
                      <i class="fa-solid fa-pen-nib"></i>
                    </div>
                  </div>
                </a>
                <div class="stream-details">
                  <h3 class="stream-title mb-0">
                    <a href="javascript:void(0)" onclick="openFullCatalogModal('professional')" class="stream-badge-title stream-pill-professional" title="Explore Professional &amp; Digital Writing">
                      Professional &amp; Digital Writing
                    </a>
                  </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =======================================================
       ABOUT ICRW SECTION
       ======================================================= -->
    <section class="about-institute-section reveal-on-scroll" id="about">
      <div class="auto-container">
        <div class="row align-items-center g-4 g-lg-5">
          <div class="col-lg-6 reveal-slide-left">
            <div class="about-image-frame interactive-hover-lift">
              <img src="{{ asset('index/images/custom/about_study.jpg') }}" alt="ICRW Scholarly Study Desk" class="about-study-photo">
            </div>
          </div>

          <div class="col-lg-6 reveal-slide-right">
            <span class="about-badge">About The Institute</span>
            <h2 class="about-title">
              Bridging Creative Passion with Academic Rigour
            </h2>
            <p class="about-lead-text">
              The <strong>Institute of Creative and Research Writing (ICRW)</strong> is an independent academic and
              literary platform delivering focused, single-session live workshops and masterclasses on Zoom &mdash;
              connecting emerging writers and researchers directly with published authors, critics, and scholars for
              intensive craft training and personalized mentor critique.
            </p>

            <div class="row g-3">
              <div class="col-sm-6 stagger-child stagger-delay-1">
                <div class="about-feature-card interactive-hover-lift">
                  <div class="about-feature-icon icon-critique">
                    <i class="fa-solid fa-comments"></i>
                  </div>
                  <div>
                    <strong class="about-feature-title">Direct Mentor Critique</strong>
                    <span class="about-feature-desc">Hands-on feedback on your writing</span>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 stagger-child stagger-delay-2">
                <div class="about-feature-card interactive-hover-lift">
                  <div class="about-feature-icon icon-guest">
                    <i class="fa-solid fa-chalkboard-user"></i>
                  </div>
                  <div>
                    <strong class="about-feature-title">Guest Speaker Series</strong>
                    <span class="about-feature-desc">Published authors &amp; scholars</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =======================================================
       UPCOMING SINGLE WORKSHOP SPOTLIGHT
       ======================================================= -->
    <section class="single-workshop-spotlight-section reveal-on-scroll" id="single-workshop">
      <div class="auto-container">

        <!-- Section Header -->
        <div class="text-center mb-4 reveal-on-scroll">
          <div class="d-inline-flex align-items-center gap-2 spotlight-live-badge mb-2">
            <span class="pulse-live-indicator"><span class="pulse-core"></span></span>
            <span>UPCOMING LIVE MASTERCLASS SPOTLIGHT</span>
          </div>
          <h2 class="spotlight-section-heading">
            Featured Single-Session Workshop on Zoom
          </h2>
          <p class="spotlight-section-sub">
            ICRW delivers standalone, focused live masterclasses &mdash; no lengthy multi-week courses. Enroll directly
            for our next scheduled live session with intimate mentor critique.
          </p>
        </div>

        <!-- Stream Tab Selectors -->
        <div class="d-flex justify-content-center gap-2 mb-4 flex-wrap">
          <button type="button" class="btn btn-sm single-ws-tab-btn active stream-tab-btn" onclick="switchSingleWorkshop('creative', this)" style="border-radius: 999px; font-weight: 600; padding: 6px 18px; border: 1.5px solid #5b7b68; color: #1e3d2f; background: rgba(91,123,104,0.12);">
            <i class="fa-solid fa-feather-pointed me-1 text-success"></i> Creative Writing
          </button>
          <button type="button" class="btn btn-sm single-ws-tab-btn stream-tab-btn" onclick="switchSingleWorkshop('academic', this)" style="border-radius: 999px; font-weight: 600; padding: 6px 18px; border: 1.5px solid #1f476e; color: #0d233a; background: rgba(31,71,110,0.08);">
            <i class="fa-solid fa-book-bookmark me-1 text-primary"></i> Academic &amp; Research
          </button>
          <button type="button" class="btn btn-sm single-ws-tab-btn stream-tab-btn" onclick="switchSingleWorkshop('professional', this)" style="border-radius: 999px; font-weight: 600; padding: 6px 18px; border: 1.5px solid #d97706; color: #78350f; background: rgba(217,119,6,0.08);">
            <i class="fa-solid fa-pen-nib me-1 text-warning"></i> Professional &amp; Digital
          </button>
        </div>

        <!-- Single Workshop Showcase Card -->
        <div class="single-workshop-card reveal-scale-up interactive-hover-lift" id="singleWorkshopCard">
          <div class="row g-0 align-items-stretch">

            <!-- Left Column: Visual & Live Status -->
            <div class="col-lg-5 col-md-5">
              <div class="spotlight-poster-frame">
                <img src="{{ asset('index/images/custom/track_creative.jpg') }}" alt="Featured Workshop" id="swImg" class="spotlight-poster-img">
                <div class="spotlight-poster-overlay"></div>

                <!-- Floating Top Badges -->
                <div class="spotlight-floating-top">
                  <span class="spotlight-pill-zoom">
                    <i class="fa-solid fa-video me-1"></i> Live via Zoom
                  </span>
                  <span class="spotlight-pill-track" id="swTrackTag">Creative Writing Masterclass</span>
                </div>

                <!-- Floating Bottom Info Box -->
                <div class="spotlight-floating-bottom">
                  <div class="spotlight-floating-meta">
                    <span id="swDuration"><i class="fa-regular fa-clock text-info me-2"></i>120-Min Live Intensive</span>
                    <span class="spotlight-tag-certificate"><i class="fa-solid fa-award text-warning me-1"></i> Verifiable Credential</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Right Column: Workshop Details, Takeaways & Reservation -->
            <div class="col-lg-7 col-md-7">
              <div class="spotlight-content-body">

                <!-- Title -->
                <h3 class="spotlight-card-title" id="swTitle">
                  Fiction Architecture &amp; Scene Psychology
                </h3>

                <!-- Description -->
                <p class="spotlight-card-desc" id="swDesc">
                  An intensive 2-hour craft masterclass designed to elevate narrative pacing, scene-by-scene conflict
                  dynamics, and subtextual tension. Bring your current opening pages for live line-by-line critique.
                </p>

                <!-- 4 Key Session Takeaways (2x2 Grid) -->
                <div class="spotlight-takeaways-grid mb-3">
                  <div class="takeaway-item">
                    <i class="fa-solid fa-circle-check text-success"></i>
                    <span id="swP1">Three-Act Structure &amp; Dynamic Scene Pacing</span>
                  </div>
                  <div class="takeaway-item">
                    <i class="fa-solid fa-circle-check text-success"></i>
                    <span id="swP2">Direct Line-by-Line Manuscript Critique</span>
                  </div>
                  <div class="takeaway-item">
                    <i class="fa-solid fa-circle-check text-success"></i>
                    <span id="swP3">Downloadable Scene Matrix &amp; Prompt Kit</span>
                  </div>
                  <div class="takeaway-item">
                    <i class="fa-solid fa-circle-check text-success"></i>
                    <span id="swP4">Verifiable ICRW Completion Certificate</span>
                  </div>
                </div>

                <!-- Live Schedule & Limited Seats Progress Box -->
                <div class="spotlight-schedule-box mb-3">
                  <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <div class="spotlight-schedule-time" id="swSchedule">
                      <i class="fa-regular fa-calendar-check text-warning me-2"></i>
                      Saturday &bull; 8:00 PM &ndash; 10:00 PM PKT
                    </div>
                    <div class="spotlight-seats-info">
                      <i class="fa-solid fa-user-group text-primary me-1"></i>
                      <strong id="swSeatsText">Only 7 of 25 Seats Left</strong>
                    </div>
                  </div>
                  <!-- Mini Progress Bar -->
                  <div class="spotlight-progress-wrap mt-2">
                    <div class="spotlight-progress-bar" id="swSeatBar" style="width: 72%;"></div>
                  </div>
                </div>

                <!-- CTA Row -->
                <div class="spotlight-actions-row">
                  <button type="button" onclick="openAuthModal('register')" class="btn-spotlight-whatsapp btn-spotlight-register" id="swRegBtn">
                    <i class="fa-solid fa-user-plus fs-5"></i>
                    <span>Register for Workshop</span>
                  </button>
                </div>

              </div>
            </div>

          </div>
        </div>

      </div>
    </section>

    <!-- =======================================================
       ACADEMIC LEADERSHIP & DISTINGUISHED FACULTY
       ======================================================= -->
    <section class="faculty-leadership-section reveal-on-scroll" id="faculty-section">
      <div class="auto-container">

        <!-- Section Header -->
        <div class="text-center mb-5 reveal-on-scroll">
          <span class="stream-section-badge">Academic Leadership</span>
          <h2 class="stream-section-title">Faculty &amp; Experts on Board</h2>
          <p class="stream-section-subtitle">
            Learn directly from internationally acclaimed authors, university professors, researchers, and inclusive
            pedagogy specialists.
          </p>
        </div>

        <!-- Faculty Grid -->
        <div class="row g-4 align-items-stretch">

          <!-- Faculty Member 1: Dr. Syrrina Ahsan Ali Haque -->
          <div class="col-lg-6 reveal-slide-left">
            <div class="faculty-card-testimonial interactive-hover-lift h-100">
              <!-- Top Identity Row -->
              <div class="faculty-id-header">
                <div class="faculty-avatar-box">
                  <a href="{{ route('faculty') }}#dr-syrrina" title="View Full Profile of Dr. Syrrina Ahsan Ali Haque">
                    <img src="{{ asset('index/assets/faculty_syrrina.jpg') }}" alt="Dr. Syrrina Ahsan Ali Haque" class="faculty-avatar-img">
                  </a>
                  <span class="faculty-verified-seal" title="Verified Faculty"><i class="fa-solid fa-check"></i></span>
                </div>
                <div class="faculty-id-info">
                  <h3 class="faculty-card-name" style="margin-bottom: 5px;">
                    <a href="{{ route('faculty') }}#dr-syrrina" class="text-decoration-none text-reset" title="View Full Profile">
                      Dr. Syrrina Ahsan Ali Haque
                    </a>
                  </h3>
                  <span class="faculty-badge-role">CEO &amp; Founder • Postdoc Fellow (USA)</span>
                  <p class="faculty-card-subtitle">
                    <i class="fa-solid fa-building-columns text-primary me-1"></i>
                    Visiting Professor &amp; Former Head DELL, Univ. of Lahore
                  </p>
                </div>
              </div>

              <!-- Testimonial Quote Block -->
              <div class="faculty-quote-box">
                <i class="fa-solid fa-quote-left faculty-quote-icon"></i>
                <p class="faculty-quote-text">
                  &ldquo;Where Ideas become Words. Dedicated to bridging scholarly rigour and literary creativity across
                  global borders, guiding learners from initial concepts to internationally published research.&rdquo;
                </p>
              </div>

              <!-- Highlights -->
              <div class="faculty-highlights-row">
                <span class="faculty-highlight-pill">
                  <i class="fa-solid fa-trophy text-warning"></i> NeMLA Book Award Winner
                </span>
                <span class="faculty-highlight-pill">
                  <i class="fa-solid fa-graduation-cap text-primary"></i> SUNY Buffalo Fellow
                </span>
                <span class="faculty-highlight-pill">
                  <i class="fa-solid fa-book-bookmark text-success"></i> Bloomsbury Author
                </span>
              </div>

              <!-- View Full Profile Action -->
              <div class="faculty-card-action">
                <a href="{{ route('faculty') }}#dr-syrrina" class="btn-faculty-view-more text-decoration-none" title="View Full Profile &amp; Accreditations">
                  <span><i class="fa-regular fa-id-badge text-warning me-1"></i> View Full Profile &amp; Accreditations</span>
                  <i class="fa-solid fa-arrow-right-long"></i>
                </a>
              </div>
            </div>
          </div>

          <!-- Faculty Member 2: Ms. Amber Arif -->
          <div class="col-lg-6 reveal-slide-right">
            <div class="faculty-card-testimonial interactive-hover-lift h-100">
              <!-- Top Identity Row -->
              <div class="faculty-id-header">
                <div class="faculty-avatar-box">
                  <a href="{{ route('faculty') }}#ms-amber" title="View Full Profile of Ms. Amber Arif">
                    <img src="{{ asset('index/assets/faculty_amber.jpg') }}" alt="Ms. Amber Arif" class="faculty-avatar-img">
                  </a>
                  <span class="faculty-verified-seal" title="Verified Faculty"><i class="fa-solid fa-check"></i></span>
                </div>
                <div class="faculty-id-info">
                  <h3 class="faculty-card-name" style="margin-bottom: 5px;">
                    <a href="{{ route('faculty') }}#ms-amber" class="text-decoration-none text-reset" title="View Full Profile">
                      Ms. Amber Arif
                    </a>
                  </h3>
                  <span class="faculty-badge-role">Head of ICT, STEM &amp; Assistive Tech • Canada</span>
                  <p class="faculty-card-subtitle">
                    <i class="fa-solid fa-laptop-code text-info me-1"></i>
                    Master’s in Computer Science • Assistive Technology Coach (Canada)
                  </p>
                </div>
              </div>

              <!-- Testimonial Quote Block -->
              <div class="faculty-quote-box">
                <i class="fa-solid fa-quote-left faculty-quote-icon"></i>
                <p class="faculty-quote-text">
                  &ldquo;Empowering every learner with adaptive technology and standardized exam mastery, guiding
                  students to consistently secure top world and regional Cambridge distinctions.&rdquo;
                </p>
              </div>

              <!-- Highlights -->
              <div class="faculty-highlights-row">
                <span class="faculty-highlight-pill">
                  <i class="fa-solid fa-star text-warning"></i> World-Top Distinctions
                </span>
                <span class="faculty-highlight-pill">
                  <i class="fa-solid fa-certificate text-primary"></i> UCLES &amp; Pearson Examiner
                </span>
                <span class="faculty-highlight-pill">
                  <i class="fa-solid fa-universal-access text-success"></i> Assistive Tech (Canada)
                </span>
              </div>

              <!-- View Full Profile Action -->
              <div class="faculty-card-action">
                <a href="{{ route('faculty') }}#ms-amber" class="btn-faculty-view-more text-decoration-none" title="View Full Profile &amp; Accreditations">
                  <span><i class="fa-regular fa-id-badge text-warning me-1"></i> View Full Profile &amp; Accreditations</span>
                  <i class="fa-solid fa-arrow-right-long"></i>
                </a>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- =======================================================
       OFFICIAL CREDENTIAL VERIFICATION
       ======================================================= -->
    <section class="py-5 reveal-on-scroll" id="certification" style="background: #ffffff;">
      <div class="auto-container py-4">
        <div class="cert-section-wrapper reveal-scale-up interactive-hover-lift">
          <div class="row align-items-center g-5">
            <div class="col-lg-6 reveal-slide-left">
              <span style="font-family: var(--font-display); font-size: 0.78rem; letter-spacing: 0.2em; text-transform: uppercase; color: var(--icrw-gold); font-weight: 700;">
                Tamper-Proof Accreditations
              </span>
              <h2 style="font-family: var(--font-serif); font-size: 2.4rem; color: #ffffff; font-weight: 700; margin-top: 8px; line-height: 1.2;">
                Official Credential Verification System
              </h2>
              <p style="color: #cbd5e1; line-height: 1.65; margin-top: 14px; font-size: 0.95rem;">
                Every certificate of completion issued by the Institute of Creative and Research Writing bears an
                institutional registration code and digital seal. Academic institutions, publishers, and employers can
                verify participant completion records instantly.
              </p>

              <div class="mt-4">
                <label for="certInput" style="font-size: 0.85rem; color: #cbd5e1; margin-bottom: 6px; display: block; font-weight: 500;">
                  Enter Certificate Verification ID:
                </label>
                <div class="d-flex gap-2">
                  <input type="text" id="certInput" placeholder="e.g. ICRW-2026-CW01" class="form-control" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.25); color: #fff; padding: 12px 18px; border-radius: 999px;">
                  <button onclick="verifyCert()" class="btn btn-warning" style="background: var(--icrw-gold); border: none; color: #0d233a; font-weight: 700; padding: 12px 28px; border-radius: 999px; white-space: nowrap;">
                    <i class="fa fa-shield-halved me-1"></i> Verify
                  </button>
                </div>
                <div style="font-size: 0.78rem; color: #94a3b8; margin-top: 8px;">
                  Try Sample Codes: 
                  <span onclick="document.getElementById('certInput').value='ICRW-2026-CW01'; verifyCert();" style="color: var(--icrw-gold); cursor: pointer; text-decoration: underline;">ICRW-2026-CW01</span>
                  | 
                  <span onclick="document.getElementById('certInput').value='ICRW-2026-AR04'; verifyCert();" style="color: var(--icrw-gold); cursor: pointer; text-decoration: underline;">ICRW-2026-AR04</span>
                </div>
              </div>

              <!-- Verification Result Box -->
              <div id="certResultBox" style="display: none; margin-top: 20px; padding: 18px; border-radius: 12px; font-size: 0.9rem; line-height: 1.5; border: 1px solid;">
              </div>
            </div>

            <div class="col-lg-6 text-center reveal-slide-right">
              <div style="position: relative; display: inline-block;">
                <img src="{{ asset('index/assets/certificate.jpg') }}" alt="Official ICRW Certificate of Completion Specimen" class="cert-preview-img">
                <div style="margin-top: 12px; font-size: 0.82rem; color: #94a3b8; font-style: italic;">
                  Official ICRW Certificate Specimen with Medallion Seal &amp; Verification QR
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =======================================================
       STUDENT PORTAL & E-LIBRARY SECTION
       ======================================================= -->
    <section class="py-5 reveal-on-scroll" id="portal-simulator" style="background: #ffffff;">
      <div class="auto-container py-4">
        <div class="row align-items-center g-5">
          <div class="col-lg-6 reveal-slide-left">
            <span style="font-family: var(--font-display); font-size: 0.8rem; letter-spacing: 0.18em; text-transform: uppercase; color: var(--icrw-sage); font-weight: 700;">
              Virtual Campus
            </span>
            <h2 style="font-family: var(--font-serif); font-size: 2.5rem; color: var(--icrw-navy); font-weight: 700; margin-top: 8px;">
              Integrated Student Portal &amp; Manuscript Sandbox
            </h2>
            <p style="color: #475569; line-height: 1.7; margin-top: 16px; font-size: 0.95rem;">
              Enrolled participants receive dedicated access to our secure student workspace. Submit weekly drafts,
              access recorded lectures from international masterclasses, and receive line-by-line editorial feedback
              directly from mentors.
            </p>

            <div class="d-flex flex-column gap-3 mt-4">
              <div class="p-3 rounded-3 d-flex align-items-center gap-3 interactive-hover-lift stagger-child stagger-delay-1" style="background: #f8faf9; border: 1px solid #e2ece6;">
                <i class="fa fa-folder-closed text-success fs-4"></i>
                <div>
                  <strong style="color: var(--icrw-navy); font-size: 0.95rem; display: block;">Recorded Lecture Archives</strong>
                  <span style="font-size: 0.82rem; color: #64748b;">Never miss a live session; review HD class recordings anytime.</span>
                </div>
              </div>
              <div class="p-3 rounded-3 d-flex align-items-center gap-3 interactive-hover-lift stagger-child stagger-delay-2" style="background: #f8faf9; border: 1px solid #e2ece6;">
                <i class="fa fa-file-lines text-primary fs-4"></i>
                <div>
                  <strong style="color: var(--icrw-navy); font-size: 0.95rem; display: block;">Manuscript Critiques &amp; Rubrics</strong>
                  <span style="font-size: 0.82rem; color: #64748b;">Detailed rubric feedback on fiction and scholarly drafts.</span>
                </div>
              </div>
              <div class="p-3 rounded-3 d-flex align-items-center gap-3 interactive-hover-lift stagger-child stagger-delay-3" style="background: #f8faf9; border: 1px solid #e2ece6;">
                <i class="fa fa-award text-warning fs-4"></i>
                <div>
                  <strong style="color: var(--icrw-navy); font-size: 0.95rem; display: block;">Verifiable Digital Credentials</strong>
                  <span style="font-size: 0.82rem; color: #64748b;">Direct download of tamper-proof certificates upon evaluation.</span>
                </div>
              </div>
            </div>

            <div class="mt-4">
              <button onclick="openStudentPortal()" class="header-cta-btn" style="padding: 13px 30px;">
                Launch Interactive Portal Demo →
              </button>
            </div>
          </div>

          <!-- E-Library Resources Preview -->
          <div class="col-lg-6 reveal-slide-right" id="elibrary-section">
            <div class="interactive-hover-lift" style="background: #0d233a; border-radius: 20px; padding: 35px; color: #fff; box-shadow: 0 16px 40px rgba(13,35,58,0.18);">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <span style="font-size: 0.72rem; letter-spacing: 0.15em; text-transform: uppercase; color: var(--icrw-gold); font-family: var(--font-display); font-weight: 700;">
                    Open Scholarly Access
                  </span>
                  <h3 style="font-family: var(--font-serif); font-size: 1.6rem; color: #fff; margin: 4px 0 0;">ICRW Digital E-Library</h3>
                </div>
                <i class="fa fa-book-bookmark" style="font-size: 32px; color: var(--icrw-gold);"></i>
              </div>
              <p style="font-size: 0.88rem; color: #cbd5e1; line-height: 1.6; margin-bottom: 24px;">
                Curated repository of academic style guides, citation cheat sheets (APA 7th, MLA 9th, Chicago), literary
                journals, and manuscript submission checklists.
              </p>

              <div class="d-flex flex-column gap-2" id="libraryItemsList">
                <!-- Rendered via JavaScript -->
              </div>

              <div class="mt-4 text-center">
                <button onclick="showToast('Downloading complete ICRW Academic Guidebook PDF...')" class="btn btn-outline-light btn-sm rounded-pill px-4">
                  <i class="fa fa-download me-1"></i> Download Complete Resource Bundle
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =======================================================
       OFFICIAL DISCLAIMER BANNER
       ======================================================= -->
    <section class="py-4 reveal-on-scroll" style="background: #f1f5f3; border-top: 1px solid #e2ece6; border-bottom: 1px solid #e2ece6;">
      <div class="auto-container">
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
          <div class="d-flex align-items-center gap-3">
            <i class="fa fa-scale-balanced fs-3 text-warning"></i>
            <div>
              <strong style="color: var(--icrw-navy); font-size: 0.95rem; display: block;">Institutional Policy – Guest Speakers &amp; Contributors</strong>
              <span style="font-size: 0.82rem; color: #64748b;">
                Views and expressions shared by guest speakers during live workshops are their own and do not necessarily reflect ICRW official policies.
              </span>
            </div>
          </div>
          <button onclick="openDisclaimerModal()" class="btn btn-outline-dark btn-sm rounded-pill px-3" style="font-size: 0.82rem; font-weight: 600;">
            Read Full Disclaimer
          </button>
        </div>
      </div>
    </section>

@endsection

@push('scripts')
  <script>
    // Single Workshop Spotlight Data
    const singleWorkshopsData = {
      creative: {
        badge: "Stream 01 &bull; Creative Writing &amp; Fiction",
        badgeClass: "stream-pill-creative",
        trackTag: "Creative Writing Masterclass",
        title: "Fiction Architecture &amp; Scene Psychology",
        desc: "An intensive 2-hour craft masterclass designed to elevate narrative pacing, scene-by-scene conflict dynamics, and subtextual tension. Bring your current opening pages for live line-by-line critique.",
        img: "{{ asset('index/images/custom/track_creative.jpg') }}",
        schedule: "Saturday &bull; 8:00 PM &ndash; 10:00 PM PKT",
        duration: "120-Min Live Intensive",
        seats: "Only 7 of 25 Seats Left",
        seatPercent: "72%",
        p1: "Three-Act Structure & Dynamic Scene Pacing",
        p2: "Direct Line-by-Line Manuscript Critique",
        p3: "Downloadable Scene Matrix & Prompt Kit",
        p4: "Verifiable ICRW Completion Certificate",
        waMsg: "Hello ICRW, I would like to register for the single masterclass: Fiction Architecture & Scene Psychology"
      },
      academic: {
        badge: "Stream 02 &bull; Academic &amp; Research Writing",
        badgeClass: "stream-pill-academic",
        trackTag: "Academic Research Clinic",
        title: "Systematic Literature Review &amp; Synthesis Matrices",
        desc: "Build PRISMA-compliant search flows, thematic coding spreadsheets, and synthesize hundreds of academic papers into coherent scholarly arguments with published mentor critique.",
        img: "{{ asset('index/images/custom/track_academic.jpg') }}",
        schedule: "Sunday &bull; 3:00 PM &ndash; 5:00 PM PKT",
        duration: "120-Min Live Intensive",
        seats: "Only 9 of 25 Seats Left",
        seatPercent: "64%",
        p1: "PRISMA-Compliant Search Protocols",
        p2: "Live Review of Draft Synthesis Tables",
        p3: "Excel Synthesis & Thematic Templates",
        p4: "Verifiable ICRW Completion Certificate",
        waMsg: "Hello ICRW, I would like to register for the single masterclass: Systematic Literature Review & Synthesis Matrices"
      },
      professional: {
        badge: "Stream 03 &bull; Professional &amp; Digital Writing",
        badgeClass: "stream-pill-professional",
        trackTag: "Professional Writing Intensive",
        title: "Thought Leadership Op-Eds &amp; Media Commentary",
        desc: "Pitch leading national and international dailies (Dawn, Tribune, Al Jazeera) and write compelling analytical op-eds that influence opinion and establish professional authority.",
        img: "{{ asset('index/images/custom/track_professional.jpg') }}",
        schedule: "Friday &bull; 7:30 PM &ndash; 9:30 PM PKT",
        duration: "120-Min Live Intensive",
        seats: "Only 6 of 20 Seats Left",
        seatPercent: "70%",
        p1: "Op-Ed Hook Craft & Media Pitching Strategy",
        p2: "Live Headline & Lead Editorial Critique",
        p3: "Editor Pitch Email Samples & Style Deck",
        p4: "Verifiable ICRW Completion Certificate",
        waMsg: "Hello ICRW, I would like to register for the single masterclass: Thought Leadership Op-Eds & Media Commentary"
      }
    };

    function switchSingleWorkshop(streamKey, tabBtn) {
      const data = singleWorkshopsData[streamKey];
      if (!data) return;

      document.querySelectorAll('.single-ws-tab-btn').forEach(btn => btn.classList.remove('active'));
      if (tabBtn) tabBtn.classList.add('active');

      const card = document.getElementById('singleWorkshopCard');
      if (card) {
        card.classList.add('fade-transition');
        setTimeout(() => {
          const badgeEl = document.getElementById('swBadge');
          if (badgeEl) {
            badgeEl.innerHTML = data.badge;
            badgeEl.className = 'stream-badge-pill ' + data.badgeClass;
          }
          const trackEl = document.getElementById('swTrackTag');
          if (trackEl) trackEl.innerText = data.trackTag;
          const titleEl = document.getElementById('swTitle');
          if (titleEl) titleEl.innerHTML = data.title;
          const descEl = document.getElementById('swDesc');
          if (descEl) descEl.innerText = data.desc;
          const imgEl = document.getElementById('swImg');
          if (imgEl) imgEl.src = data.img;
          const schedEl = document.getElementById('swSchedule');
          if (schedEl) schedEl.innerHTML = '<i class="fa-regular fa-calendar-check text-warning me-2"></i>' + data.schedule;
          const durEl = document.getElementById('swDuration');
          if (durEl) durEl.innerHTML = '<i class="fa-regular fa-clock text-info me-2"></i>' + data.duration;
          const seatsEl = document.getElementById('swSeatsText');
          if (seatsEl) seatsEl.innerText = data.seats;
          const barEl = document.getElementById('swSeatBar');
          if (barEl) barEl.style.width = data.seatPercent;

          const p1 = document.getElementById('swP1');
          if (p1) p1.innerText = data.p1;
          const p2 = document.getElementById('swP2');
          if (p2) p2.innerText = data.p2;
          const p3 = document.getElementById('swP3');
          if (p3) p3.innerText = data.p3;
          const p4 = document.getElementById('swP4');
          if (p4) p4.innerText = data.p4;

          const waBtn = document.getElementById('swWaBtn');
          if (waBtn && waBtn.tagName === 'A') waBtn.href = 'https://wa.me/923001234279?text=' + encodeURIComponent(data.waMsg);

          card.classList.remove('fade-transition');
        }, 180);
      }
    }

    // E-Library Resources
    const libraryItems = [
      { title: "APA 7th Edition Comprehensive Style Guide & Reference Sheet", type: "PDF Guide", size: "2.4 MB" },
      { title: "Academic Journal Article Submission & Peer-Review Checklist", type: "Checklist", size: "850 KB" },
      { title: "The Craft of Flash Fiction: Micro-Narrative Structure Handbook", type: "Monograph", size: "1.8 MB" },
      { title: "Turnitin Similarity Reduction & Scholarly Paraphrasing Kit", type: "Toolkit", size: "1.1 MB" }
    ];

    function renderLibrary() {
      const container = document.getElementById("libraryItemsList");
      if (!container) return;
      container.innerHTML = "";

      libraryItems.forEach(item => {
        const el = document.createElement("div");
        el.className = "d-flex justify-content-between align-items-center p-2 rounded";
        el.style.background = "rgba(255,255,255,0.06)";
        el.innerHTML = `
          <div class="d-flex align-items-center gap-2">
            <i class="fa fa-file-pdf text-danger"></i>
            <div style="font-size: 0.84rem; color: #fff;">${item.title}</div>
          </div>
          <button onclick="showToast('Downloading: ${item.title}')" class="btn btn-sm btn-link text-warning p-0" style="text-decoration: none; font-size: 0.8rem; white-space: nowrap;">
            <i class="fa fa-download me-1"></i> ${item.size}
          </button>
        `;
        container.appendChild(el);
      });
    }

    // Certificate Verification
    function verifyCert() {
      const input = document.getElementById("certInput").value.trim().toUpperCase();
      const box = document.getElementById("certResultBox");
      if (!input) {
        box.style.display = "block";
        box.style.background = "rgba(239, 68, 68, 0.15)";
        box.style.borderColor = "#ef4444";
        box.innerHTML = "<strong>Error:</strong> Please enter a verification code (e.g. ICRW-2026-CW01).";
        return;
      }

      box.style.display = "block";
      box.style.background = "rgba(52, 211, 153, 0.15)";
      box.style.borderColor = "#34d399";
      box.innerHTML = `
        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 6px;">
          <i class="fa fa-circle-check" style="color: #34d399; font-size: 18px;"></i>
          <strong style="color: #34d399;">VERIFIED CREDENTIAL RECORD</strong>
        </div>
        <div><strong>Credential:</strong> Certificate of Completion &amp; Distinction</div>
        <div><strong>Institutional Code:</strong> ${input}</div>
        <div><strong>Status:</strong> Active / Verifiable Transcript on File</div>
        <div><strong>Issued By:</strong> Institute of Creative and Research Writing (ICRW)</div>
      `;
    }

    // Hero 3D Interactive Tilt Effect
    (function initHero3DTilt() {
      const card = document.getElementById('heroInteractiveFrame');
      if (!card) return;

      card.addEventListener('mousemove', function(e) {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;
        const centerX = rect.width / 2;
        const centerY = rect.height / 2;
        const rotateX = ((y - centerY) / centerY) * -5;
        const rotateY = ((x - centerX) / centerX) * 5;
        card.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) scale3d(1.02, 1.02, 1.02)`;
      });

      card.addEventListener('mouseleave', function() {
        card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
      });
    })();

    // Global flag tracking preloader status
    let isPreloaderComplete = false;

    // Typewriter
    (function initHeroTypewriter() {
      const heroWords = [
        { text: "Master", isHighlight: false },
        { text: "the", isHighlight: false },
        { text: "Art", isHighlight: false },
        { text: "of", isHighlight: false },
        { text: "Writing", isHighlight: false },
        { text: "Through", isHighlight: false, isEndPhrase: true },
        { text: "Live", isHighlight: true },
        { text: "Interactive", isHighlight: true },
        { text: "Workshops", isHighlight: true, isEndPhrase: true },
        { text: "&", isHighlight: false },
        { text: "Masterclasses", isHighlight: false }
      ];

      const charList = [];
      heroWords.forEach(function (w, wIdx) {
        for (let c = 0; c < w.text.length; c++) {
          charList.push({ char: w.text[c], isHighlight: w.isHighlight });
        }
        if (wIdx < heroWords.length - 1) {
          const spaceHighlight = (w.isEndPhrase && w.isHighlight) ? false : w.isHighlight;
          charList.push({ char: ' ', isHighlight: spaceHighlight });
        }
      });

      const config = {
        charSpeed: 78,
        loopDelay: 6000,
        deleteSpeed: 18,
        loop: true
      };

      let typewriterTimer = null;
      let loopTimer = null;
      let isBackspacing = false;
      let currentIndex = 0;
      let isStarted = false;

      function renderHTML(upToIndex) {
        let html = '';
        let inHighlight = false;

        for (let i = 0; i <= upToIndex && i < charList.length; i++) {
          const item = charList[i];
          if (item.isHighlight && !inHighlight) {
            html += '<span class="hero-title-highlight">';
            inHighlight = true;
          } else if (!item.isHighlight && inHighlight) {
            html += '</span>';
            inHighlight = false;
          }
          if (item.char === '&') {
            html += '&amp;';
          } else {
            html += item.char;
          }
        }
        if (inHighlight) {
          html += '</span>';
        }
        return html;
      }

      function clearTimers() {
        if (typewriterTimer) clearTimeout(typewriterTimer);
        if (loopTimer) clearTimeout(loopTimer);
      }

      function typeNextChar() {
        const textEl = document.getElementById('heroTypewriterText');
        if (!textEl) return;

        if (currentIndex < charList.length) {
          textEl.innerHTML = renderHTML(currentIndex);
          currentIndex++;
          typewriterTimer = setTimeout(typeNextChar, config.charSpeed);
        } else {
          isBackspacing = false;
          if (config.loop) {
            loopTimer = setTimeout(startBackspace, config.loopDelay);
          }
        }
      }

      function backspaceChar() {
        const textEl = document.getElementById('heroTypewriterText');
        if (!textEl) return;

        if (currentIndex > 0) {
          currentIndex--;
          textEl.innerHTML = renderHTML(currentIndex - 1);
          typewriterTimer = setTimeout(backspaceChar, config.deleteSpeed);
        } else {
          textEl.innerHTML = '';
          typewriterTimer = setTimeout(function () {
            currentIndex = 0;
            isBackspacing = false;
            typeNextChar();
          }, 500);
        }
      }

      function startBackspace() {
        clearTimers();
        isBackspacing = true;
        backspaceChar();
      }

      window.startHeroTypewriter = function (forceRestart) {
        const textEl = document.getElementById('heroTypewriterText');
        if (!textEl) return;
        if (!forceRestart && isStarted) return;
        isStarted = true;
        clearTimers();
        isBackspacing = false;
        currentIndex = 0;
        textEl.innerHTML = '';
        typewriterTimer = setTimeout(typeNextChar, 180);
      };

      window.resetHeroTypewriter = function () {
        clearTimers();
        isStarted = false;
      };
    })();

    // ICRW Luxury Preloader Controller
    (function () {
      const preloader = document.getElementById('icrwPreloader');
      const statusEl = document.getElementById('preloaderStatusText');
      const minDisplayTime = 1200; // Snappy 1.2s smooth glide (eliminates sluggish wait)
      const startTime = Date.now();
      let heroInTriggered = false;

      function triggerHeroIn() {
        if (heroInTriggered) return;
        heroInTriggered = true;
        const hero = document.querySelector('.hero-icrw-banner');
        if (hero) hero.classList.add('hero-entrance-active');
        if (window.startHeroTypewriter) window.startHeroTypewriter(false);
      }

      setTimeout(function () {
        if (statusEl) statusEl.innerText = "Loading Masterclasses & Research Modules...";
      }, 450);

      setTimeout(function () {
        if (statusEl) statusEl.innerText = "Welcome to ICRW Portal";
      }, 900);

      function hidePreloader() {
        const elapsed = Date.now() - startTime;
        const remaining = Math.max(0, minDisplayTime - elapsed);

        setTimeout(function () {
          if (preloader) preloader.classList.add('loaded');
          document.documentElement.classList.remove('is-loading');
          isPreloaderComplete = true;
          triggerHeroIn();
          setTimeout(function () {
            if (preloader) preloader.style.display = 'none';
          }, 500);
        }, remaining);
      }

      if (document.readyState === 'complete') {
        hidePreloader();
      } else {
        window.addEventListener('load', hidePreloader);
        setTimeout(hidePreloader, 2200);
      }

      setTimeout(function () {
        document.documentElement.classList.remove('is-loading');
        isPreloaderComplete = true;
        triggerHeroIn();
      }, 1600);
    })();

    // Continuous Scroll-Reveal Observer
    (function initContinuousScrollReveal() {
      const heroEl = document.querySelector('.hero-icrw-banner');
      const revealElements = document.querySelectorAll(
        '.reveal-on-scroll, .reveal-slide-left, .reveal-slide-right, .reveal-scale-up, .stream-item-reveal'
      );

      if ('IntersectionObserver' in window) {
        if (heroEl) {
          let heroHasLeftViewport = false;
          const heroObserver = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
              if (!isPreloaderComplete) return;
              if (entry.isIntersecting) {
                heroEl.classList.add('hero-entrance-active');
                if (heroHasLeftViewport) {
                  heroHasLeftViewport = false;
                  if (window.startHeroTypewriter) window.startHeroTypewriter(true);
                }
              } else {
                heroEl.classList.remove('hero-entrance-active');
                heroHasLeftViewport = true;
                if (window.resetHeroTypewriter) window.resetHeroTypewriter();
              }
            });
          }, { root: null, threshold: 0.15 });
          heroObserver.observe(heroEl);
        }

        const scrollObserver = new IntersectionObserver(function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('is-visible');
            } else {
              entry.target.classList.remove('is-visible');
            }
          });
        }, { root: null, rootMargin: '0px 0px -25px 0px', threshold: 0.05 });

        revealElements.forEach(function (el) {
          scrollObserver.observe(el);
        });
      } else {
        revealElements.forEach(function (el) {
          el.classList.add('is-visible');
        });
      }
    })();

    document.addEventListener("DOMContentLoaded", function () {
      renderLibrary();
    });
  </script>
@endpush

