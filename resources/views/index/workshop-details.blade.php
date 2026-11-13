@extends('index.layout')

@section('title', 'Workshop Details | Institute of Creative and Research Writing (ICRW)')

@section('meta_description', 'Comprehensive syllabus, schedule, curriculum breakdown, and enrollment details for ICRW Specialized Writing Masterclasses.')

@push('styles')
  <style>
    /* Dedicated Workshop Details Styling */
    .ws-details-hero {
      background: linear-gradient(135deg, #091a2b 0%, #0d233a 50%, #15385b 100%);
      color: #ffffff;
      padding: 55px 0 45px;
      position: relative;
      border-bottom: 2px solid rgba(212, 175, 55, 0.35);
    }
    .ws-breadcrumb {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 0.82rem;
      color: #94a3b8;
      margin-bottom: 18px;
      flex-wrap: wrap;
    }
    .ws-breadcrumb a {
      color: #b0d8c2;
      text-decoration: none;
      transition: color 0.2s;
    }
    .ws-breadcrumb a:hover {
      color: #ffd700;
      text-decoration: underline;
    }
    .ws-breadcrumb .sep {
      color: rgba(255, 255, 255, 0.3);
      font-size: 0.75rem;
    }
    .ws-stream-badge-pill {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 6px 16px;
      border-radius: 999px;
      font-size: 0.78rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      margin-bottom: 16px;
      background: rgba(16, 185, 129, 0.15);
      border: 1px solid rgba(16, 185, 129, 0.4);
      color: #34d399;
    }
    .ws-badge-academic {
      background: rgba(59, 130, 246, 0.15);
      border-color: rgba(59, 130, 246, 0.4);
      color: #60a5fa;
    }
    .ws-badge-professional {
      background: rgba(245, 158, 11, 0.15);
      border-color: rgba(245, 158, 11, 0.4);
      color: #fbbf24;
    }
    .ws-hero-heading {
      font-family: var(--font-serif), Cormorant Garamond, serif;
      font-size: clamp(2rem, 3.8vw, 3rem);
      font-weight: 700;
      color: #ffffff;
      line-height: 1.18;
      margin-bottom: 16px;
    }
    .ws-hero-lead {
      font-size: 1.08rem;
      color: #cbd5e1;
      line-height: 1.65;
      max-width: 820px;
      margin-bottom: 24px;
    }
    .ws-meta-bar {
      display: flex;
      flex-wrap: wrap;
      gap: 12px 20px;
      align-items: center;
      padding-top: 14px;
      border-top: 1px solid rgba(255, 255, 255, 0.12);
    }
    .ws-meta-item {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-size: 0.86rem;
      color: #f1f5f9;
    }
    .ws-meta-item i {
      color: #ffd700;
    }
    .ws-meta-tag {
      background: rgba(212, 175, 55, 0.18);
      border: 1px solid rgba(212, 175, 55, 0.4);
      color: #ffd700;
      padding: 3px 10px;
      border-radius: 999px;
      font-size: 0.74rem;
      font-weight: 700;
      text-transform: uppercase;
    }

    /* Content Area */
    .ws-content-section {
      padding: 60px 0 80px;
      background: #f8faf9;
    }
    .ws-card-block {
      background: #ffffff;
      border-radius: 18px;
      padding: 32px;
      margin-bottom: 30px;
      border: 1px solid #e2ece6;
      box-shadow: 0 4px 20px rgba(13, 35, 58, 0.05);
    }
    .ws-block-title {
      font-family: var(--font-serif), Cormorant Garamond, serif;
      font-size: 1.6rem;
      color: #0d233a;
      margin-bottom: 18px;
      display: flex;
      align-items: center;
      gap: 12px;
      border-bottom: 2px solid #eef3f0;
      padding-bottom: 12px;
    }
    .ws-block-title i {
      color: var(--icrw-sage);
      font-size: 1.3rem;
    }

    /* Syllabus Modules */
    .ws-module-card {
      background: #fbfdfc;
      border: 1px solid #e2ece6;
      border-left: 4px solid var(--icrw-sage);
      border-radius: 12px;
      padding: 18px 22px;
      margin-bottom: 16px;
      transition: all 0.25s ease;
    }
    .ws-module-card:hover {
      border-color: var(--icrw-sage);
      transform: translateX(4px);
      box-shadow: 0 6px 18px rgba(91, 123, 104, 0.12);
    }
    .ws-module-head {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 8px;
    }
    .ws-module-num {
      font-size: 0.75rem;
      font-weight: 800;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--icrw-sage-dark);
      background: rgba(91, 123, 104, 0.12);
      padding: 3px 10px;
      border-radius: 6px;
    }
    .ws-module-title {
      font-family: var(--font-serif), Cormorant Garamond, serif;
      font-size: 1.25rem;
      font-weight: 700;
      color: #0d233a;
      margin: 0;
    }
    .ws-module-desc {
      font-size: 0.92rem;
      color: #475569;
      line-height: 1.6;
      margin: 0;
    }

    /* Key Outcomes Grid */
    .ws-outcomes-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 16px;
    }
    .ws-outcome-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      background: #f4f8f5;
      padding: 14px 18px;
      border-radius: 12px;
      border: 1px solid #dce8e0;
      font-size: 0.9rem;
      color: #1e293b;
      line-height: 1.5;
    }
    .ws-outcome-item i {
      color: #059669;
      font-size: 1rem;
      margin-top: 3px;
    }

    /* Right Sticky Sidebar */
    .ws-sticky-sidebar {
      position: sticky;
      top: 105px;
      background: #ffffff;
      border-radius: 20px;
      border: 1.5px solid rgba(212, 175, 55, 0.35);
      box-shadow: 0 15px 40px rgba(13, 35, 58, 0.08);
      overflow: hidden;
      margin-bottom: 30px;
    }
    .ws-sidebar-cover-wrap {
      position: relative;
      width: 100%;
      height: 200px;
      background: #0d233a;
      overflow: hidden;
    }
    .ws-sidebar-cover {
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0.85;
      transition: transform 0.5s ease;
    }
    .ws-sticky-sidebar:hover .ws-sidebar-cover {
      transform: scale(1.04);
    }
    .ws-sidebar-cover-overlay {
      position: absolute;
      inset: 0;
      background: linear-gradient(180deg, rgba(13, 35, 58, 0.1) 0%, rgba(13, 35, 58, 0.85) 100%);
    }
    .ws-sidebar-status-tag {
      position: absolute;
      bottom: 14px;
      left: 18px;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: rgba(9, 23, 39, 0.92);
      border: 1px solid rgba(212, 175, 55, 0.5);
      padding: 4px 12px;
      border-radius: 999px;
      color: #ffd700;
      font-size: 0.74rem;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      backdrop-filter: blur(8px);
    }
    .ws-sidebar-body {
      padding: 26px 24px;
    }
    .ws-cohort-status-row {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
      padding-bottom: 16px;
      border-bottom: 1px solid #eef3f0;
    }
    .ws-status-val {
      font-family: var(--font-serif), Cormorant Garamond, serif;
      font-size: 1.35rem;
      font-weight: 700;
      color: #0d233a;
      display: flex;
      align-items: center;
      gap: 6px;
    }
    .ws-btn-register {
      display: block;
      width: 100%;
      text-align: center;
      background: linear-gradient(135deg, #059669 0%, #10b981 50%, #34d399 100%);
      color: #042918 !important;
      font-weight: 700;
      font-size: 1rem;
      padding: 14px 20px;
      border-radius: 999px;
      text-decoration: none !important;
      box-shadow: 0 6px 20px rgba(16, 185, 129, 0.35);
      margin-bottom: 12px;
      transition: all 0.25s ease;
      cursor: pointer;
      border: none;
    }
    .ws-btn-register:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(16, 185, 129, 0.5);
      color: #000000 !important;
    }
    .ws-btn-whatsapp {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      width: 100%;
      text-align: center;
      background: #25d366;
      color: #ffffff !important;
      font-weight: 700;
      font-size: 0.92rem;
      padding: 12px 18px;
      border-radius: 999px;
      text-decoration: none !important;
      margin-bottom: 22px;
      transition: all 0.25s ease;
    }
    .ws-btn-whatsapp:hover {
      background: #1eb956;
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(37, 211, 102, 0.4);
    }
    .ws-checklist {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .ws-checklist li {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 0.86rem;
      color: #334155;
      padding: 8px 0;
      border-bottom: 1px dashed #eef2f0;
    }
    .ws-checklist li:last-child {
      border-bottom: none;
    }
    .ws-checklist li i {
      color: #10b981;
      font-size: 0.85rem;
    }

    /* Related Masterclasses Cards */
    .ws-related-card {
      display: flex;
      gap: 14px;
      align-items: center;
      padding: 12px;
      border-radius: 12px;
      background: #fbfdfc;
      border: 1px solid #e2ece6;
      margin-bottom: 10px;
      text-decoration: none !important;
      transition: all 0.2s ease;
    }
    .ws-related-card:hover {
      background: #ffffff;
      border-color: var(--icrw-sage);
      transform: translateX(4px);
      box-shadow: 0 4px 14px rgba(13, 35, 58, 0.06);
    }
    .ws-related-icon {
      width: 38px;
      height: 38px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 0.95rem;
      flex-shrink: 0;
    }
    .ws-related-title {
      font-family: var(--font-serif), Cormorant Garamond, serif;
      font-size: 1rem;
      font-weight: 700;
      color: #0d233a;
      margin-bottom: 2px;
      line-height: 1.25;
    }
    .ws-related-sub {
      font-size: 0.74rem;
      color: #64748b;
      margin: 0;
    }
  </style>
@endpush

@section('content')

  <!-- =======================================================
     HERO BANNER FOR WORKSHOP DETAILS
     ======================================================= -->
  <section class="ws-details-hero">
    <div class="auto-container">
      <!-- Breadcrumbs -->
      <nav class="ws-breadcrumb" aria-label="Breadcrumb">
        <a href="{{ route('home') }}"><i class="fa-solid fa-house me-1"></i> Home</a>
        <span class="sep">/</span>
        <a href="{{ route('home') }}#academic-streams">Academic Divisions</a>
        <span class="sep">/</span>
        <span id="wsBreadcrumbStream" style="color: #cbd5e1;">Creative Writing &amp; Poetics</span>
        <span class="sep">/</span>
        <span id="wsBreadcrumbTitle" style="color: #ffd700; font-weight: 600;">Drama and Screenplaywriting</span>
      </nav>

      <!-- Stream Badge -->
      <div id="wsStreamBadgeWrap">
        <span id="wsStreamBadge" class="ws-stream-badge-pill">
          <i class="fa-solid fa-feather-pointed me-1"></i> Creative Writing &amp; Poetics • Dramatic Arts
        </span>
      </div>

      <!-- Main Title & Lead -->
      <h1 id="wsMainTitle" class="ws-hero-heading">Drama and Screenplaywriting</h1>
      <p id="wsMainLead" class="ws-hero-lead">
        Master scriptwriting craft: three-act dramatic structure, loglines, character arcs, scene beats, and industry formatting.
      </p>

      <!-- Quick Meta Info Bar -->
      <div class="ws-meta-bar">
        <div class="ws-meta-item">
          <i class="fa-regular fa-clock"></i>
          <span id="wsMetaDuration">2-Hour Live Masterclass</span>
        </div>
        <div class="ws-meta-item">
          <i class="fa-regular fa-calendar-check"></i>
          <span id="wsMetaSchedule">Tuesday • 7:00 PM PKT</span>
        </div>
        <div class="ws-meta-item">
          <i class="fa-solid fa-users"></i>
          <span id="wsMetaSeats">Limited to 20 Seats</span>
        </div>
        <div class="ws-meta-item">
          <i class="fa-solid fa-video"></i>
          <span>Interactive Zoom Studio</span>
        </div>
        <div class="ws-meta-item">
          <span class="ws-meta-tag"><i class="fa-solid fa-certificate me-1"></i> Certificate Included</span>
        </div>
      </div>
    </div>
  </section>

  <!-- =======================================================
     MAIN WORKSHOP DETAILS & SIDEBAR SECTION
     ======================================================= -->
  <section class="ws-content-section">
    <div class="auto-container">
      <div class="row">
        
        <!-- Left Column: Comprehensive Syllabus & Outcomes -->
        <div class="col-lg-8">
          
          <!-- Block 1: Executive Overview -->
          <div class="ws-card-block">
            <h2 class="ws-block-title">
              <i class="fa-solid fa-book-open"></i> Masterclass Executive Overview
            </h2>
            <div id="wsOverviewContent" style="color: #334155; font-size: 0.96rem; line-height: 1.75;">
              <!-- Populated dynamically -->
            </div>
          </div>

          <!-- Block 2: 4-Module In-Depth Syllabus -->
          <div class="ws-card-block">
            <h2 class="ws-block-title">
              <i class="fa-solid fa-list-check"></i> Comprehensive Curriculum &amp; Modules
            </h2>
            <p style="color: #64748b; font-size: 0.9rem; margin-bottom: 22px;">
              Each module includes rigorous academic guidance, live breakdown of exemplar texts, and interactive writing prompts with direct mentor feedback.
            </p>
            <div id="wsModulesList">
              <!-- Populated dynamically -->
            </div>
          </div>

          <!-- Block 3: Key Learning Outcomes -->
          <div class="ws-card-block">
            <h2 class="ws-block-title">
              <i class="fa-solid fa-bullseye"></i> Key Learning Outcomes
            </h2>
            <div class="ws-outcomes-grid" id="wsOutcomesList">
              <!-- Populated dynamically -->
            </div>
          </div>

          <!-- Block 4: Who Should Attend & Prerequisites -->
          <div class="ws-card-block">
            <h2 class="ws-block-title">
              <i class="fa-solid fa-user-graduate"></i> Who Should Attend
            </h2>
            <div id="wsTargetAudience" style="color: #334155; font-size: 0.94rem; line-height: 1.7;">
              <!-- Populated dynamically -->
            </div>
          </div>

          <!-- Block 5: Verifiable Institutional Certification -->
          <div class="ws-card-block" style="background: linear-gradient(135deg, #0d233a 0%, #15385b 100%); color: #ffffff; border: 1.5px solid rgba(212, 175, 55, 0.4);">
            <div class="d-flex align-items-center gap-3 mb-3">
              <div style="width: 52px; height: 52px; border-radius: 50%; background: rgba(212, 175, 55, 0.2); border: 1.5px solid #ffd700; display: flex; align-items: center; justify-content: center; font-size: 1.4rem; color: #ffd700;">
                <i class="fa-solid fa-award"></i>
              </div>
              <div>
                <h3 style="font-family: var(--font-serif); font-size: 1.35rem; color: #ffffff; margin: 0;">Official ICRW Certificate of Completion</h3>
                <small style="color: #b0d8c2; text-transform: uppercase; letter-spacing: 0.05em; font-weight: 700;">Verifiable Academic Credential</small>
              </div>
            </div>
            <p style="font-size: 0.9rem; color: #cbd5e1; line-height: 1.65; margin: 0;">
              Upon completing this masterclass and submitting the required practical exercise, participants receive a serialized Certificate of Completion issued by the Institute of Creative and Research Writing (ICRW) bearing an institutional QR verification seal.
            </p>
          </div>

        </div>

        <!-- Right Column: Sticky Enrollment & Related Workshops -->
        <div class="col-lg-4">
          
          <!-- Sticky Enrollment Card -->
          <div class="ws-sticky-sidebar">
            <div class="ws-sidebar-cover-wrap">
              <img id="wsSidebarCover" src="{{ asset('index/images/custom/track_creative.jpg') }}" alt="Workshop Cover" class="ws-sidebar-cover">
              <div class="ws-sidebar-cover-overlay"></div>
              <div class="ws-sidebar-status-tag">
                <span style="width: 8px; height: 8px; border-radius: 50%; background: #10b981; display: inline-block;"></span>
                <span>Admissions Open</span>
              </div>
            </div>

            <div class="ws-sidebar-body">
              <div class="ws-cohort-status-row">
                <div>
                  <span style="font-size: 0.72rem; color: #64748b; text-transform: uppercase; font-weight: 700; letter-spacing: 0.06em; display: block;">Cohort Admissions</span>
                  <span class="ws-status-val">
                    <i class="fa-solid fa-circle-check text-success" style="font-size: 1.1rem;"></i> Admissions Open
                  </span>
                </div>
                <span class="badge rounded-pill" style="background: rgba(16, 185, 129, 0.15); color: #059669; border: 1px solid rgba(16, 185, 129, 0.35); font-size: 0.75rem; font-weight: 700; padding: 6px 12px;">Live Interactive</span>
              </div>

              <!-- Registration Trigger Button -->
              <button type="button" onclick="openAuthModal('register')" class="ws-btn-register" id="wsRegisterBtn">
                <i class="fa-solid fa-user-plus me-1"></i> Register Student Account
              </button>

              <!-- WhatsApp Direct Reservation Button -->
              <a id="wsWhatsAppBtn" href="#" target="_blank" class="ws-btn-whatsapp">
                <i class="fa-brands fa-whatsapp fs-5"></i> Inquire / Reserve via WhatsApp
              </a>

              <!-- Benefits Checklist -->
              <ul class="ws-checklist">
                <li><i class="fa-solid fa-check"></i> <span>Live Interactive Zoom Session (No Pre-records)</span></li>
                <li><i class="fa-solid fa-check"></i> <span>Dedicated Q&amp;A &amp; Direct Mentor Feedback</span></li>
                <li><i class="fa-solid fa-check"></i> <span>Downloadable Workbook &amp; Template Matrix</span></li>
                <li><i class="fa-solid fa-check"></i> <span>30-Day Replay &amp; Archival Recording Access</span></li>
                <li><i class="fa-solid fa-check"></i> <span>Verifiable Serialized Certificate of Completion</span></li>
              </ul>
            </div>
          </div>

          <!-- Related Masterclasses in this Stream -->
          <div class="ws-card-block" style="padding: 24px;">
            <h3 style="font-family: var(--font-serif); font-size: 1.25rem; color: #0d233a; margin-bottom: 14px; display: flex; align-items: center; justify-content: space-between;">
              <span>Related Masterclasses</span>
              <button type="button" onclick="openFullCatalogModal()" class="btn btn-sm btn-outline-dark rounded-pill" style="font-size: 0.72rem; padding: 2px 10px;">View All 12</button>
            </h3>
            <div id="wsRelatedList">
              <!-- Populated dynamically -->
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

@endsection

@push('scripts')
  <script>
    // =========================================================
    // COMPREHENSIVE 12-WORKSHOP DATABASE WITH COMPLETE SYLLABUS
    // =========================================================
    const workshopsData = {
      "WS-CW01": {
        id: "WS-CW01",
        track: "creative",
        trackName: "Creative Writing & Poetics",
        badgeClass: "ws-stream-badge-pill",
        streamIcon: "fa-feather-pointed",
        type: "Dramatic Arts & Screenwriting",
        title: "Drama and Screenplaywriting",
        duration: "2-Hour Live Interactive Masterclass",
        schedule: "Tuesday • 7:00 PM PKT",
        seats: "Limited to 20 Seats",
        coverImg: "{{ asset('index/images/custom/track_creative.jpg') }}",
        lead: "Master scriptwriting craft: three-act dramatic structure, loglines, character arcs, scene beats, and industry formatting.",
        overview: `<p>Screenwriting and dramatic playwriting are distinct narrative disciplines that require storytelling through visual action, dramatic conflict, and authentic dialogue. In this intensive live masterclass, participants dissect the fundamental anatomy of compelling dramatic stories for stage and screen.</p>
        <p>From crafting an irresistible one-sentence logline to mapping high-stakes character goals and subtext-driven scene reversals, this clinic equips writers with the tools demanded by contemporary producers, theatrical directors, and script competitions.</p>`,
        modules: [
          { num: "Module 01", title: "Dramatic Premise, Core Conflict & Three-Act Architecture", desc: "Deconstructing the inciting incident, plot point reversals, midpoint escalation, climax execution, and formatting the professional pitch logline." },
          { num: "Module 02", title: "Character Psychology, Motivation & Dramatic Arcs", desc: "Internal flaws vs external goals, high-stakes antagonistic forces, secondary character economy, and avoiding flat archetype traps." },
          { num: "Module 03", title: "Scene Beats, Micro-Tension & Subtext Dialogue", desc: "Structuring scenes that advance story momentum, writing dialogue that reveals hidden motivations, and eliminating unnecessary exposition dumping." },
          { num: "Module 04", title: "Industry Screenplay Formatting & Script Pitching", desc: "Standard industry screenplay typography (Final Draft guidelines), script reader expectations, query letters, and protecting creative intellectual property." }
        ],
        outcomes: [
          "Complete mastery of 3-Act and Sequence dramatic storytelling models.",
          "Ability to write tension-driven dialogue with rich psychological subtext.",
          "Creation of a submission-ready 1-page treatment and logline bible.",
          "Fluency with standard international screenplay formatting conventions."
        ],
        audience: `<p>This masterclass is designed for aspiring playwrights, screenwriters, creative literature students, narrative novelists transitioning to visual media, and storytellers eager to learn dramatic structural discipline.</p>`
      },
      "WS-CW02": {
        id: "WS-CW02",
        track: "creative",
        trackName: "Creative Writing & Poetics",
        badgeClass: "ws-stream-badge-pill",
        streamIcon: "fa-feather-pointed",
        type: "Fiction Clinic",
        title: "Short Story Writing",
        duration: "2-Hour Live Interactive Masterclass",
        schedule: "Saturday • 7:30 PM PKT",
        seats: "Limited to 20 Seats",
        coverImg: "{{ asset('index/images/custom/track_creative.jpg') }}",
        lead: "Developing compelling premise, narrative pacing, character economy, dynamic conflict, and ending resonance in modern short fiction.",
        overview: `<p>The contemporary short story demands intense concentration of imagery, swift emotional calibration, and thematic depth within an economical word count. This intensive masterclass guides writers through the delicate mechanics of flash fiction, traditional short narratives, and anthology submissions.</p>`,
        modules: [
          { num: "Module 01", title: "The Inciting Flash & Narrative Economy", desc: "Hooking the reader from line one, avoiding slow exposition, and establishing immediate narrative stakes." },
          { num: "Module 02", title: "Point of View (POV) & Psychic Distance", desc: "Choosing first, close-third, or omniscient perspectives and maintaining unbroken tonal consistency." },
          { num: "Module 03", title: "Subtext, Symbols & Emotional Climax", desc: "Using physical objects as emotional metaphors and writing endings that reverberate without forced morality." },
          { num: "Module 04", title: "Literary Magazines & Submission Protocols", desc: "Targeting top-tier literary journals, formatting manuscripts to standard guidelines, and writing effective cover notes." }
        ],
        outcomes: [
          "Completion of a polished 1,500-to-3,000 word short story draft.",
          "Sharp eye for prose economy, eliminating unnecessary adjectives and filler sentences.",
          "Understanding of the global literary journal landscape and submission cycle."
        ],
        audience: `<p>Fiction writers, creative writing graduates, and novelists seeking to master the discipline of concise narrative craft.</p>`
      },
      "WS-CW03": {
        id: "WS-CW03",
        track: "creative",
        trackName: "Creative Writing & Poetics",
        badgeClass: "ws-stream-badge-pill",
        streamIcon: "fa-feather-pointed",
        type: "Poetry Masterclass",
        title: "Poetry English",
        duration: "90-Min Live Masterclass",
        schedule: "Sunday • 6:00 PM PKT",
        seats: "Limited to 20 Seats",
        coverImg: "{{ asset('index/images/custom/track_creative.jpg') }}",
        lead: "Sonnets, free verse cadence, striking metaphor construction, sonic imagery, and modern anglophone poetic movements.",
        overview: `<p>Explore contemporary anglophone poetics through an intensive examination of sonic texture, rhythm, enjambment, and original metaphorical invention.</p>`,
        modules: [
          { num: "Module 01", title: "The Sonic Architecture of Free Verse", desc: "Line breaks, musicality without rigid metre, assonance, and rhythmic pacing." },
          { num: "Module 02", title: "Radical Metaphor & Sensory Precision", desc: "Moving beyond cliches to generate striking, original comparisons that startle and illuminate." },
          { num: "Module 03", title: "Received Forms in Modern Guise", desc: "Reimagining the sonnet, villanelle, and pantoum for 21st-century themes." },
          { num: "Module 04", title: "Chapbook Assembling & Journal Querying", desc: "Curating a coherent thematic sequence of poems for publication." }
        ],
        outcomes: [
          "Mastery of line-break mechanics and breath control in contemporary poetry.",
          "Ability to edit own drafts with ruthless aesthetic detachment.",
          "Clear strategy for entering major international poetry awards and journal submissions."
        ],
        audience: `<p>Poets, lyricists, English literature enthusiasts, and prose writers seeking to enhance their metaphorical sensitivity.</p>`
      },
      "WS-CW04": {
        id: "WS-CW04",
        track: "creative",
        trackName: "Creative Writing & Poetics",
        badgeClass: "ws-stream-badge-pill",
        streamIcon: "fa-feather-pointed",
        type: "Urdu Poetics",
        title: "Poetry Urdu (اردو شاعری)",
        duration: "2-Hour Live Masterclass",
        schedule: "Friday • 8:00 PM PKT",
        seats: "Limited to 25 Seats",
        coverImg: "{{ asset('index/images/custom/track_creative.jpg') }}",
        lead: "The classical and modern traditions of Urdu verse: bahr, radif, qafiya, ghazal architecture, and modern nazm aesthetics.",
        overview: `<p>A masterclass exploring classical and progressive Urdu poetics: from Mir and Ghalib to Faiz, Rashid, and contemporary voices.</p>`,
        modules: [
          { num: "Module 01", title: "بحر اور عروض کے بنیادی اصول", desc: "Understanding poetic metre, taqtee, and rhythmic balance in classical Urdu." },
          { num: "Module 02", title: "غزل کی ساخت: ردیف، قافیہ اور مطلع", desc: "The delicate symmetry of couplets (she'r) and preserving thematic independence." },
          { num: "Module 03", title: "جدید نظم اور علامتی شاعری", desc: "Free verse, symbolic narratives, and socio-political themes in modern Urdu." },
          { num: "Module 04", title: "اصلاحِ سخن اور تلفظ کی درستگی", desc: "Self-correction techniques, linguistic nuances, and classical diction." }
        ],
        outcomes: [
          "Ability to identify and compose within major traditional metres.",
          "Deep appreciation for classical Urdu idioms and stylistic traditions.",
          "Techniques for refining ghazals and modern nazms."
        ],
        audience: `<p>Urdu literature students, aspiring poets, and literary enthusiasts keen on mastering classical prosody.</p>`
      },
      "WS-CW05": {
        id: "WS-CW05",
        track: "creative",
        trackName: "Creative Writing & Poetics",
        badgeClass: "ws-stream-badge-pill",
        streamIcon: "fa-feather-pointed",
        type: "Artistic Penmanship",
        title: "Calligraphy & Traditional Lettering",
        duration: "2-Hour Hands-On Clinic",
        schedule: "Saturday • 3:00 PM PKT",
        seats: "Limited to 15 Seats",
        coverImg: "{{ asset('index/images/custom/track_creative.jpg') }}",
        lead: "The tactile art of beautiful lettering: classical pen angles, stroke anatomy, manuscript aesthetics, and creative visual typography.",
        overview: `<p>Discover the physical and artistic relationship between ink, pen, and paper. Learn classical lettering rules and modern creative penmanship.</p>`,
        modules: [
          { num: "Module 01", title: "Grip, Pen Angles & Tool Anatomy", desc: "Selecting nibs, inks, papers, and mastering arm movements." },
          { num: "Module 02", title: "Foundational Letterforms & Spacing", desc: "Constructing upper and lowercase alphabets with geometric rhythm." },
          { num: "Module 03", title: "Flourishes, Ligatures & Balance", desc: "Decorative accents that elevate a written page without clutter." },
          { num: "Module 04", title: "Creative Application & Manuscript Art", desc: "Designing quotes, certificates, book covers, and personal stationery." }
        ],
        outcomes: [
          "Confident handling of traditional calligraphy tools.",
          "Consistent execution of elegant, proportional script.",
          "Creation of a completed calligraphy artwork project."
        ],
        audience: `<p>Visual artists, designers, book lovers, and anyone seeking meditative creative practice through traditional ink lettering.</p>`
      },
      "WS-AR01": {
        id: "WS-AR01",
        track: "academic",
        trackName: "Academic & Research Writing",
        badgeClass: "ws-stream-badge-pill ws-badge-academic",
        streamIcon: "fa-book-bookmark",
        type: "Research Masterclass",
        title: "How to Write a Research Article",
        duration: "2-Hour Live Masterclass",
        schedule: "Saturday • 4:00 PM PKT",
        seats: "Limited to 25 Seats",
        coverImg: "{{ asset('index/images/custom/track_academic.jpg') }}",
        lead: "From thesis statement to conclusion: abstract drafting, IMRaD structure, peer-reviewed journal submission guidelines, and literature synthesis.",
        overview: `<p>Publishing in indexed, peer-reviewed international journals requires understanding what editors and reviewers demand. This masterclass deconstructs the IMRaD structure (Introduction, Methods, Results, and Discussion) with real case studies.</p>`,
        modules: [
          { num: "Module 01", title: "Research Gap, Problem Formulation & Thesis", desc: "Articulating an authentic contribution to existing scholarly conversations." },
          { num: "Module 02", title: "The IMRaD Architecture & Section Breakdown", desc: "Drafting each section with appropriate academic tone, precision, and hedging." },
          { num: "Module 03", title: "Synthesis Matrices & Paraphrasing Ethics", desc: "Integrating sources smoothly while ensuring complete plagiarism prevention." },
          { num: "Module 04", title: "Navigating Peer Review & Responding to Referees", desc: "Writing rebuttal letters that satisfy peer reviewers and journal editors." }
        ],
        outcomes: [
          "Complete template for drafting an indexable journal manuscript.",
          "Clear understanding of Scopus, Web of Science, and HEC indexing requirements.",
          "Techniques to avoid desk-rejections by international editors."
        ],
        audience: `<p>MPhil/PhD scholars, university faculty, postgraduates, and researchers in humanities and social sciences.</p>`
      },
      "WS-AR02": {
        id: "WS-AR02",
        track: "academic",
        trackName: "Academic & Research Writing",
        badgeClass: "ws-stream-badge-pill ws-badge-academic",
        streamIcon: "fa-book-bookmark",
        type: "Methodology Clinic",
        title: "Qualitative Research in Linguistics",
        duration: "2-Hour Live Masterclass",
        schedule: "Tuesday • 6:00 PM PKT",
        seats: "Limited to 25 Seats",
        coverImg: "{{ asset('index/images/custom/track_academic.jpg') }}",
        lead: "Discourse analysis (CDA), conversational transcripts, corpus-assisted qualitative analysis, and linguistic data coding frameworks.",
        overview: `<p>A methodological dive into Critical Discourse Analysis (Fairclough, van Dijk), corpus linguistics tools, conversational analysis transcripts, and qualitative coding.</p>`,
        modules: [
          { num: "Module 01", title: "Critical Discourse Analysis (CDA) Frameworks", desc: "Analyzing power, ideology, and hegemony in media and political speech." },
          { num: "Module 02", title: "Corpus-Assisted Qualitative Linguistics", desc: "Using concordance tools to support qualitative thematic interpretations." },
          { num: "Module 03", title: "Jeffersonian Transcription & Conversational Data", desc: "Transcribing natural speech, pauses, overlaps, and interactional markers." },
          { num: "Module 04", title: "Thematic Coding & NVivo Qualitative Workflows", desc: "Generating rigorous codes, themes, and methodological audit trails." }
        ],
        outcomes: [
          "Ability to design a robust qualitative linguistics research proposal.",
          "Hands-on familiarity with transcription protocols and coding software.",
          "Mastery of linking linguistic evidence directly to theoretical claims."
        ],
        audience: `<p>Applied linguistics researchers, English language educators, and qualitative social scientists.</p>`
      },
      "WS-AR03": {
        id: "WS-AR03",
        track: "academic",
        trackName: "Academic & Research Writing",
        badgeClass: "ws-stream-badge-pill ws-badge-academic",
        streamIcon: "fa-book-bookmark",
        type: "Scholarly Clinic",
        title: "Qualitative Research in Literature",
        duration: "2-Hour Live Masterclass",
        schedule: "Friday • 5:00 PM PKT",
        seats: "Limited to 25 Seats",
        coverImg: "{{ asset('index/images/custom/track_academic.jpg') }}",
        lead: "Textual hermeneutics, thematic literary analysis, archival methodologies, and qualitative theoretical frameworks for humanities research.",
        overview: `<p>How do we construct rigorous academic arguments in literary studies? This seminar explores theoretical lens application, close reading, textual hermeneutics, and archival interrogation.</p>`,
        modules: [
          { num: "Module 01", title: "Theoretical Framework Selection", desc: "Applying Postcolonial, Feminist, Eco-critical, or Psychoanalytic lenses." },
          { num: "Module 02", title: "Close Reading vs Distant Reading", desc: "Extracting subtle ideological patterns from syntax, metaphor, and structure." },
          { num: "Module 03", title: "Archival Research & Historical Contextualization", desc: "Working with primary manuscripts, colonial archives, and historical documents." },
          { num: "Module 04", title: "Structuring the Literary Dissertation Chapter", desc: "Organizing complex theoretical arguments into cohesive chapters." }
        ],
        outcomes: [
          "Techniques to formulate compelling, original literary research questions.",
          "Ability to synthesize primary literary evidence with complex literary theory.",
          "Guidance on submitting to MLA, Cambridge, and Oxford literary journals."
        ],
        audience: `<p>Literature postgraduates, doctoral candidates, and humanities professors aiming to elevate their scholarly writing.</p>`
      },
      "WS-AR04": {
        id: "WS-AR04",
        track: "academic",
        trackName: "Academic & Research Writing",
        badgeClass: "ws-stream-badge-pill ws-badge-academic",
        streamIcon: "fa-book-bookmark",
        type: "Research Fundamentals",
        title: "What is Quantitative Research",
        duration: "2-Hour Live Masterclass",
        schedule: "Wednesday • 7:00 PM PKT",
        seats: "Limited to 30 Seats",
        coverImg: "{{ asset('index/images/custom/track_academic.jpg') }}",
        lead: "Formulating hypotheses, survey research design, variables and measurement scales, statistical significance, and empirical data reporting.",
        overview: `<p>Demystifying numbers for humanities and social sciences scholars. Learn the essentials of survey instruments, Likert scales, sampling, and interpreting statistical results with clarity.</p>`,
        modules: [
          { num: "Module 01", title: "Variables, Hypotheses & Research Questions", desc: "Defining independent, dependent, and confounding variables precisely." },
          { num: "Module 02", title: "Survey Instrument Design & Reliability", desc: "Constructing valid questions, Cronbach's alpha, and pilot testing." },
          { num: "Module 03", title: "Basic Statistical Concepts (p-values, Correlation, Regression)", desc: "Understanding what data actually means without fear of math." },
          { num: "Module 04", title: "Presenting Quantitative Findings in APA Style", desc: "Formatting tables, graphs, and discussing empirical findings." }
        ],
        outcomes: [
          "Ability to evaluate and design quantitative surveys with confidence.",
          "Fluency in reading and interpreting quantitative literature in your field.",
          "Skills to collaborate on mixed-methods interdisciplinary projects."
        ],
        audience: `<p>Humanities students looking to incorporate mixed-methods, educationists, and social researchers.</p>`
      },
      "WS-PD01": {
        id: "WS-PD01",
        track: "professional",
        trackName: "Professional & Digital Writing",
        badgeClass: "ws-stream-badge-pill ws-badge-professional",
        streamIcon: "fa-pen-nib",
        type: "Publishing Masterclass",
        title: "How to Get Published",
        duration: "2-Hour Live Masterclass",
        schedule: "Sunday • 5:00 PM PKT",
        seats: "Limited to 30 Seats",
        coverImg: "{{ asset('index/images/custom/track_professional.jpg') }}",
        lead: "Query letters, literary agents, book proposals, copyright registration, university presses, and navigating publisher contracts.",
        overview: `<p>A practical, behind-the-scenes masterclass covering how traditional publishing houses (Bloomsbury, Routledge, Penguin, Oxford) and literary agents evaluate manuscripts.</p>`,
        modules: [
          { num: "Module 01", title: "The Query Letter & Synopsis Bible", desc: "Crafting the single-page pitch that captures busy literary agents and acquisition editors." },
          { num: "Module 02", title: "The Academic & Non-Fiction Book Proposal", desc: "Chapter outlines, market comparison tables, and target audience analysis." },
          { num: "Module 03", title: "Understanding Publishing Contracts & Royalties", desc: "Advances, copyright assignment, subsidiary rights, and red-flag clauses." },
          { num: "Module 04", title: "Author Platform & Book Launch Strategy", desc: "Building your scholarly or literary presence before and after publication." }
        ],
        outcomes: [
          "Creation of an agent-ready query letter and project synopsis.",
          "Knowledge of the differences between academic, trade, and hybrid presses.",
          "Confidence to negotiate contracts and protect intellectual property."
        ],
        audience: `<p>Novelists, academic authors, non-fiction writers, and researchers with completed manuscripts ready for publication.</p>`
      },
      "WS-PD02": {
        id: "WS-PD02",
        track: "professional",
        trackName: "Professional & Digital Writing",
        badgeClass: "ws-stream-badge-pill ws-badge-professional",
        streamIcon: "fa-pen-nib",
        type: "Literary Theory Clinic",
        title: "Ecocriticism & Environmental Humanities",
        duration: "90-Min Live Masterclass",
        schedule: "Wednesday • 6:30 PM PKT",
        seats: "Limited to 25 Seats",
        coverImg: "{{ asset('index/images/custom/track_professional.jpg') }}",
        lead: "Critical study of literature and the environment: Anthropocene narratives, eco-justice, climate fiction (Cli-Fi), and nature in prose.",
        overview: `<p>Explore one of the fastest-growing areas in interdisciplinary humanities. Learn how literature critiques climate collapse, indigenous ecologies, and human-nature relations.</p>`,
        modules: [
          { num: "Module 01", title: "Foundations of Ecocriticism & Nature Writing", desc: "From Romantic pastoralism to dark ecology and Anthropocene theory." },
          { num: "Module 02", title: "Climate Fiction (Cli-Fi) & Speculative Futures", desc: "Analyzing narrative strategies in global environmental storytelling." },
          { num: "Module 03", title: "Postcolonial Ecologies & Environmental Justice", desc: "Resource extraction, water wars, and environmental racism in the Global South." },
          { num: "Module 04", title: "Writing Nature Essays & Eco-Poetics", desc: "Techniques for observing landscapes and crafting evocative eco-centric prose." }
        ],
        outcomes: [
          "Comprehensive theoretical toolkit in environmental literary theory.",
          "Skills to craft compelling essays on environmental and climate themes.",
          "Strategies for publishing in specialized environmental humanities journals."
        ],
        audience: `<p>Literary scholars, environmental activists, science writers, and creative non-fiction essayists.</p>`
      },
      "WS-PD03": {
        id: "WS-PD03",
        track: "professional",
        trackName: "Professional & Digital Writing",
        badgeClass: "ws-stream-badge-pill ws-badge-professional",
        streamIcon: "fa-pen-nib",
        type: "Scholarly Masterclass",
        title: "South Asian Literature: Themes & Canons",
        duration: "2-Hour Live Masterclass",
        schedule: "Thursday • 6:00 PM PKT",
        seats: "Limited to 30 Seats",
        coverImg: "{{ asset('index/images/custom/track_professional.jpg') }}",
        lead: "Partition literature, diasporic identity, linguistic hybridity, gender politics, and decolonizing literary theory in regional anglophone prose.",
        overview: `<p>Led by faculty with extensive research publication in partition archives and postcolonial poetics (including *Dialogue on Partition*, Bloomsbury), this seminar explores how South Asian writers negotiate borders, historical trauma, gender, and hybrid linguistic idiom.</p>`,
        modules: [
          { num: "Module 01", title: "1947 Partition Literature & The Poetics of Traumatic Memory", desc: "Deconstructing border crossings, communal rupture, and oral history archives in Sidhwa, Khushwant Singh, and Manto." },
          { num: "Module 02", title: "Diasporic Dislocation, Hybridity & Third Space Identities", desc: "Exploring postcolonial theories through novels by Mohsin Hamid, Kamila Shamsie, and Jhumpa Lahiri." },
          { num: "Module 03", title: "Linguistic Subversion: Chutnification & The Regional Idiom", desc: "How South Asian writers decolonize the English language through vernacular cadencing and localized idioms." },
          { num: "Module 04", title: "Publishing Research on South Asian Literature Globally", desc: "Identifying key academic journals, writing conference abstracts for NeMLA/ACLALS, and formulating dissertation topics." }
        ],
        outcomes: [
          "In-depth critical understanding of major South Asian literary movements.",
          "Competence in applying postcolonial theory to 20th and 21st-century fiction.",
          "Techniques to analyze partition trauma and diasporic narrative strategies.",
          "Clear framework for crafting research papers for international peer review."
        ],
        audience: `<p>Postgraduate students in English and Comparative Literature, cultural studies researchers, South Asian history scholars, and avid readers of regional fiction.</p>`
      }
    };

    function getWorkshopIdFromURL() {
      const urlParams = new URLSearchParams(window.location.search);
      let id = urlParams.get('id');
      if (!id && window.location.hash) {
        id = window.location.hash.replace('#', '');
      }
      return id && workshopsData[id] ? id : 'WS-CW01';
    }

    function renderWorkshopDetails(wsId) {
      const ws = workshopsData[wsId] || workshopsData["WS-CW01"];
      
      document.title = `${ws.title} | ICRW Academic Masterclasses`;
      const pageTitleEl = document.getElementById("pageBrowserTitle");
      if (pageTitleEl) pageTitleEl.innerText = `${ws.title} | ICRW Academic Masterclasses`;

      const bcStream = document.getElementById("wsBreadcrumbStream");
      const bcTitle = document.getElementById("wsBreadcrumbTitle");
      if (bcStream) bcStream.innerText = ws.trackName;
      if (bcTitle) bcTitle.innerText = ws.title;

      const badgeWrap = document.getElementById("wsStreamBadgeWrap");
      if (badgeWrap) {
        badgeWrap.innerHTML = `
          <span class="${ws.badgeClass}">
            <i class="fa-solid ${ws.streamIcon} me-1"></i> ${ws.trackName} • ${ws.type}
          </span>
        `;
      }

      const mainTitle = document.getElementById("wsMainTitle");
      const mainLead = document.getElementById("wsMainLead");
      if (mainTitle) mainTitle.innerText = ws.title;
      if (mainLead) mainLead.innerText = ws.lead;

      const metaDur = document.getElementById("wsMetaDuration");
      const metaSched = document.getElementById("wsMetaSchedule");
      const metaSeats = document.getElementById("wsMetaSeats");
      if (metaDur) metaDur.innerText = ws.duration;
      if (metaSched) metaSched.innerText = ws.schedule;
      if (metaSeats) metaSeats.innerText = ws.seats;

      const overviewEl = document.getElementById("wsOverviewContent");
      if (overviewEl) overviewEl.innerHTML = ws.overview;

      const modulesEl = document.getElementById("wsModulesList");
      if (modulesEl) {
        modulesEl.innerHTML = ws.modules.map(m => `
          <div class="ws-module-card">
            <div class="ws-module-head">
              <span class="ws-module-num">${m.num}</span>
            </div>
            <h3 class="ws-module-title mb-2">${m.title}</h3>
            <p class="ws-module-desc">${m.desc}</p>
          </div>
        `).join('');
      }

      const outcomesEl = document.getElementById("wsOutcomesList");
      if (outcomesEl) {
        outcomesEl.innerHTML = ws.outcomes.map(o => `
          <div class="ws-outcome-item">
            <i class="fa-solid fa-circle-check"></i>
            <span>${o}</span>
          </div>
        `).join('');
      }

      const audienceEl = document.getElementById("wsTargetAudience");
      if (audienceEl) audienceEl.innerHTML = ws.audience;

      const sbCover = document.getElementById("wsSidebarCover");
      const waBtn = document.getElementById("wsWhatsAppBtn");

      if (sbCover) sbCover.src = ws.coverImg;

      if (waBtn) {
        const msg = encodeURIComponent(`Hello ICRW Admissions, I would like to reserve a seat and inquire about the masterclass: ${ws.title} (${ws.schedule}).`);
        waBtn.href = `https://wa.me/923001234279?text=${msg}`;
      }

      renderRelatedWorkshops(ws);
    }

    function renderRelatedWorkshops(currentWs) {
      const relContainer = document.getElementById("wsRelatedList");
      if (!relContainer) return;

      const sameTrack = Object.values(workshopsData).filter(w => w.id !== currentWs.id && w.track === currentWs.track);
      const pool = sameTrack.length >= 2 ? sameTrack : Object.values(workshopsData).filter(w => w.id !== currentWs.id);
      const displayItems = pool.slice(0, 3);

      relContainer.innerHTML = displayItems.map(w => {
        let iconBg = "#ecfdf5";
        let iconColor = "#059669";
        if (w.track === "academic") {
          iconBg = "#eff6ff";
          iconColor = "#2563eb";
        } else if (w.track === "professional") {
          iconBg = "#fffbeb";
          iconColor = "#d97706";
        }

        return `
          <a href="{{ route('workshop.details') }}?id=${w.id}" class="ws-related-card" onclick="switchToWorkshop('${w.id}', event)">
            <div class="ws-related-icon" style="background: ${iconBg}; color: ${iconColor};">
              <i class="fa-solid ${w.streamIcon}"></i>
            </div>
            <div>
              <h4 class="ws-related-title">${w.title}</h4>
              <p class="ws-related-sub"><i class="fa-regular fa-calendar-check me-1"></i> ${w.schedule}</p>
            </div>
          </a>
        `;
      }).join('');
    }

    function switchToWorkshop(wsId, e) {
      if (e) e.preventDefault();
      history.pushState(null, '', `{{ route('workshop.details') }}?id=${wsId}`);
      renderWorkshopDetails(wsId);
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    window.addEventListener('popstate', function() {
      renderWorkshopDetails(getWorkshopIdFromURL());
    });

    document.addEventListener("DOMContentLoaded", function() {
      renderWorkshopDetails(getWorkshopIdFromURL());
    });
  </script>
@endpush

