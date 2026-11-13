@extends('index.layout')

@section('title', 'Faculty & Leadership | Institute of Creative and Research Writing (ICRW)')

@section('meta_description', 'Meet the leadership and distinguished faculty at ICRW: Dr. Syrrina Ahsan Ali Haque (CEO & Founder) and Ms. Amber Arif (Head of ICT & Assistive Learning).')

@push('styles')
  <link rel="stylesheet" href="{{ asset('index/styles.css') }}">
  <link rel="stylesheet" href="{{ asset('index/css/faculty.css') }}">
@endpush

@section('content')

  <!-- Page Hero Banner -->
  <section class="hero-section" style="padding: 70px 0 50px;">
    <div class="hero-bg-overlay"></div>
    <div class="container text-center" style="max-width: 860px; margin: 0 auto; text-align: center; position: relative; z-index: 2;">
      <span class="hero-badge-tag">
        <span class="pulse"></span>
        <span>Distinguished Academic Leadership</span>
      </span>
      <h1 class="hero-title" style="font-size: clamp(2rem, 3.5vw, 2.9rem); margin-bottom: 16px;">
        Faculty &amp; Experts on Board
      </h1>
      <p class="hero-subtitle" style="font-size: 1.05rem; margin-bottom: 24px;">
        "The Institute brings together internationally acclaimed writers, poets, scholars, researchers, professors, educationists, and special needs experts."
      </p>
      <p style="color: #b0d8c2; font-size: 0.88rem; font-style: italic;">
        Bringing World-Class Authors and Research Supervisors Directly Into Your Classroom
      </p>
    </div>
  </section>

  <!-- Leadership Detailed Section -->
  <section class="section-py" style="background: #ffffff;">
    <div class="container" style="max-width: 1100px;">

      <!-- Leader 1: Dr. Syrrina Ahsan Ali Haque -->
      <div class="faculty-spotlight-card card-3d-interactive" id="dr-syrrina" style="margin-bottom: 40px; padding: 36px;">
        <div class="faculty-header-row" style="align-items: flex-start; gap: 28px;">
          <div class="faculty-photo-wrap" style="width: 140px; height: 180px; border-radius: 16px;">
            <img src="{{ asset('index/assets/faculty_syrrina.jpg') }}" alt="Dr. Syrrina Ahsan Ali Haque - CEO &amp; Founder, ICRW">
          </div>
          <div class="faculty-meta">
            <h2 class="faculty-name-highlight">
              <span>Dr. Syrrina Ahsan Ali Haque</span>
              <span class="faculty-verified-badge" title="Verified Distinguished Faculty &amp; Founder"><i class="fa-solid fa-circle-check"></i></span>
            </h2>
            <div class="faculty-role-pill-wrap">
              <span class="faculty-role-badge-prominent">
                <i class="fa-solid fa-award" style="color: #d4af37; font-size: 0.95rem;"></i>
                <span>CEO &amp; Founder • Postdoc Fellow (USA)</span>
              </span>
            </div>
            <p class="faculty-affiliations" style="font-size: 0.9rem; line-height: 1.65;">
              <strong style="color: #0d233a; font-weight: 700; font-size: 0.96rem; display: block; margin-bottom: 4px;">Visiting Professor &amp; Former Head DELL (University of Lahore)</strong>
              Teaches English Literature, Creative &amp; Academic Writing, and Research Methodology at:
              <em>Kinnaird College for Women, University of Lahore, University at Buffalo (SUNY USA), Lahore School of Economics (LSE), LGSIDP - University of London, and Government College University (GCU).</em>
            </p>
          </div>
        </div>

        <div style="font-size: 0.9rem; color: var(--text-body); line-height: 1.7; margin: 20px 0;">
          <p style="margin-bottom: 12px;">
            Dr. Syrrina Ahsan Ali Haque completed her postdoctoral fellowship from the <strong>University at Buffalo, USA</strong>, and serves as a <strong>Member of the Board of Governors SPS</strong>. An internationally recognized scholar and author, her book manuscript <em>Dialogue on Partition: Literature Knows No Borders</em> won the prestigious <strong>Book Award at the NeMLA 51st Convention in Boston, USA</strong>.
          </p>
          <p style="margin-bottom: 12px;">
            She has delivered keynote talks at universities and on television, and conducted workshops on literary criticism, creative writing, and academic research methodology across the globe. Her scholarly research articles and chapters have been published in peer-reviewed journals and books by <strong>Routledge</strong> and <strong>Cambridge Scholars</strong>. Her research paper received the <strong>Best Paper Award in Japan</strong>, she won the <strong>Summer Fellowship Award, USA</strong>, and was placed on the Principal’s Roll of Honor list.
          </p>
        </div>

        <!-- Books and Academic Bibliography Box -->
        <div class="faculty-books-box" style="padding: 20px;">
          <div class="faculty-books-title" style="font-size: 0.85rem; margin-bottom: 12px;">
            <span><svg class="academic-icon-svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg> Published Books &amp; Literary Works:</span>
          </div>
          <ul class="faculty-books-list" style="font-size: 0.85rem; gap: 10px;">
            <li>
              <span class="bullet" style="color: var(--icrw-sage); font-size: 1rem;">✦</span>
              <span><strong>Dialogue on Partition: Literature Knows No Borders (2021)</strong> — <em>Publisher: Bloomsbury</em>. Winner of the NeMLA Book Award, Boston, USA. Currently being taught in universities across the USA, India, and Pakistan.</span>
            </li>
            <li>
              <span class="bullet" style="color: var(--icrw-sage); font-size: 1rem;">✦</span>
              <span><strong>Sand in the Castle: A Collection of Short Stories (2010)</strong> — Published in USA. Currently taught in literature courses in the USA and Pakistan.</span>
            </li>
            <li>
              <span class="bullet" style="color: var(--icrw-sage); font-size: 1rem;">✦</span>
              <span><strong>Cultural Confessions in Khaled Hosseini’s Works (2017)</strong> — Academic non-fiction examining diaspora, trauma, and identity.</span>
            </li>
            <li>
              <span class="bullet" style="color: var(--icrw-sage); font-size: 1rem;">✦</span>
              <span><strong>A Cartographic Journey of Race, Gender and Power: Global Identity</strong> — Edited volume on transcultural theory and postcolonial dynamics.</span>
            </li>
            <li>
              <span class="bullet" style="color: var(--icrw-sage); font-size: 1rem;">✦</span>
              <span><em>Upcoming Novel:</em> <strong>Mynah: A Saga of Migrations (2027)</strong> — To be launched internationally in the UK, USA, Australia, India, and Pakistan.</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- Leader 2: Ms. Amber Arif -->
      <div class="faculty-spotlight-card card-3d-interactive" id="ms-amber" style="margin-bottom: 40px; padding: 36px;">
        <div class="faculty-header-row" style="align-items: flex-start; gap: 28px;">
          <div class="faculty-photo-wrap" style="width: 140px; height: 180px; border-radius: 16px;">
            <img src="{{ asset('index/assets/faculty_amber.jpg') }}" alt="Ms. Amber Arif - Head of ICT, STEM &amp; Assistive Learning Initiatives, ICRW">
          </div>
          <div class="faculty-meta">
            <h2 class="faculty-name-highlight">
              <span>Ms. Amber Arif</span>
              <span class="faculty-verified-badge" title="Verified Distinguished Faculty"><i class="fa-solid fa-circle-check"></i></span>
            </h2>
            <div class="faculty-role-pill-wrap">
              <span class="faculty-role-badge-prominent">
                <i class="fa-solid fa-laptop-code" style="color: #0284c7; font-size: 0.95rem;"></i>
                <span>Head of ICT, STEM &amp; Assistive Tech • Canada</span>
              </span>
            </div>
            <p class="faculty-affiliations" style="font-size: 0.9rem; line-height: 1.65;">
              <strong style="color: #0d233a; font-weight: 700; font-size: 0.96rem; display: block; margin-bottom: 4px;">Former Head of Department &amp; ICT Teacher (Lahore Grammar School - LGS)</strong>
              External Examiner &amp; Moderator (Pearson Edexcel &amp; Cambridge Assessment International Education - UCLES) • Assistive Technology Coach (Canada) • Master’s in Computer Science.
            </p>
          </div>
        </div>

        <div style="font-size: 0.9rem; color: var(--text-body); line-height: 1.7; margin: 20px 0;">
          <p style="margin-bottom: 12px;">
            Amber Arif is an experienced ICT and STEM educator, curriculum developer, and instructional leader currently based in Canada, with a career spanning over two decades across Pakistan, the UK, and Canada. In Pakistan, she served as Head of Department and ICT Teacher at <strong>Lahore Grammar School</strong>, where she designed curricula and taught O-Level, A-Level Computer Studies, IGCSE ICT, and Applied ICT while consulting for educational institutions.
          </p>
          <p style="margin-bottom: 12px;">
            Her students consistently achieved top academic distinctions, securing multiple <strong>world-highest and regional-top marks</strong> across Cambridge examinations. Her UK experience includes teaching across secondary and Special Educational Needs (SEN) environments, and serving as an <strong>External Examiner and Moderator for Pearson Edexcel and Cambridge Assessment International Education (UCLES)</strong> for O-Level, IGCSE, and A-Level examinations.
          </p>
          <p style="margin-bottom: 12px;">
            In Canada, she leads innovative STEM, coding, and LEGO Robotics initiatives, coaching robotics teams and managing regional coding programs. She serves as a specialized <strong>Assistive Technology Coach</strong> empowering K–12 students with special needs using adaptive learning tools, multimodal speech-to-text workflows, and cognitive structuring aids.
          </p>
        </div>

        <!-- Qualifications & CPD Certifications Box -->
        <div class="faculty-books-box" style="padding: 20px;">
          <div class="faculty-books-title" style="font-size: 0.85rem; margin-bottom: 12px;">
            <span><svg class="academic-icon-svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg> International Qualifications &amp; Specializations:</span>
          </div>
          <ul class="faculty-books-list" style="font-size: 0.85rem; gap: 10px;">
            <li>
              <span class="bullet" style="color: var(--icrw-sage); font-size: 1rem;">✦</span>
              <span><strong>Cambridge Assessment (UCLES):</strong> Examiner and Moderator development courses in the UK, UAE, and online for O/A-Levels.</span>
            </li>
            <li>
              <span class="bullet" style="color: var(--icrw-sage); font-size: 1rem;">✦</span>
              <span><strong>Pearson Edexcel:</strong> Certified External Examiner and curriculum consultant across primary, secondary, and tertiary stages.</span>
            </li>
            <li>
              <span class="bullet" style="color: var(--icrw-sage); font-size: 1rem;">✦</span>
              <span><strong>CPD Certifications (UK):</strong> Safeguarding Children, Autism Spectrum Awareness, Safer Working Practices, and Safeguarding Children with Disabilities.</span>
            </li>
            <li>
              <span class="bullet" style="color: var(--icrw-sage); font-size: 1rem;">✦</span>
              <span><strong>Digital Humanities Lead at ICRW:</strong> Computational narrative mining, distant reading, and technological literacy for literary scholars.</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- Section: Visiting Faculty & Scholars Panel -->
      <div style="background: var(--bg-card-subtle); border: 1px solid var(--border-subtle); border-radius: 16px; padding: 32px; text-align: center;">
        <span class="section-tag">Global Collaboration</span>
        <h3 style="font-family: var(--font-serif); font-size: 1.4rem; color: var(--icrw-navy); margin-bottom: 10px;">
          Distinguished Guest Authors &amp; Visiting Scholars
        </h3>
        <p style="max-width: 780px; margin: 0 auto 24px; font-size: 0.88rem; color: var(--text-muted); line-height: 1.6;">
          In addition to core leadership, ICRW collaborates with guest novelists, PEN awardees, British Council master trainers, Cambridge assessors, and journal peer-reviewers across South Asia, the UK, and North America.
        </p>
        <div style="display: flex; justify-content: center; gap: 12px; flex-wrap: wrap;">
          <a href="{{ route('home') }}#single-workshop" class="btn btn-primary">Browse Workshop Offerings</a>
          <a href="mailto:icrwofficial@gmail.com" class="btn btn-secondary">Apply as a Visiting Guest Speaker</a>
        </div>
      </div>

    </div>
  </section>

@endsection

