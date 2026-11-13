<!-- =======================================================
     COMMON MODALS & TOAST NOTIFICATIONS
     ======================================================= -->

<!-- Faculty Profile & Credentials Modal -->
<div id="facultyModal" class="modal-overlay-custom" onclick="if(event.target===this) closeFacultyModal()">
  <div class="modal-card-custom" style="max-width: 600px;">
    <div class="modal-header-custom" style="padding: 14px 20px;">
      <div class="d-flex align-items-center gap-2">
        <i class="fa-solid fa-graduation-cap text-warning fs-5"></i>
        <div>
          <h3 style="margin: 0; font-size: 1.15rem;">Faculty Profile &amp; Credentials</h3>
        </div>
      </div>
      <button class="modal-close-custom" onclick="closeFacultyModal()" aria-label="Close modal">&times;</button>
    </div>

    <div class="modal-body-custom" id="facultyModalBody" style="padding: 20px; max-height: 80vh; overflow-y: auto;">
      <!-- Filled dynamically by openFacultyModal() -->
    </div>
  </div>
</div>

<!-- Disclaimer Modal -->
<div id="disclaimerModal" class="modal-overlay-custom" onclick="if(event.target===this) closeDisclaimerModal()">
  <div class="modal-card-custom">
    <div class="modal-header-custom">
      <h3>Disclaimer – Guest Speakers &amp; Contributors</h3>
      <button class="modal-close-custom" onclick="closeDisclaimerModal()">&times;</button>
    </div>
    <div class="modal-body-custom">
      <div style="font-size: 0.82rem; text-transform: uppercase; letter-spacing: 0.1em; color: var(--icrw-sage); font-weight: 700; margin-bottom: 12px;">
        Institute of Creative and Research Writing (ICRW)
      </div>
      <p>
        The Institute of Creative and Research Writing (ICRW) regularly hosts live online workshops, lectures, and
        interactive sessions featuring internationally renowned poets, writers, academicians, scholars, and industry
        experts to enrich the learning experience of our participants.
      </p>
      <div class="p-3 my-3 rounded" style="background: #f8faf9; border-left: 4px solid var(--icrw-gold); font-size: 0.92rem; color: var(--icrw-navy);">
        <strong>Important Notice:</strong> Views, opinions, beliefs, ideologies, and creative expressions shared by
        our guest speakers and contributors during these sessions are strictly their own and do not necessarily
        reflect the official views, policies, or positions of ICRW, its management, faculty, or affiliates.
      </div>
      <p>
        ICRW is an independent educational platform committed to academic freedom, creative expression, and open
        intellectual dialogue. We provide an inclusive space for diverse perspectives, artistic experimentation, and
        scholarly debate.
      </p>
      <p>
        Participation in these sessions is voluntary, and participants are encouraged to critically engage with the
        ideas presented while maintaining mutual respect and professional decorum.
      </p>
      <div class="text-end mt-4">
        <button class="btn btn-dark rounded-pill px-4" onclick="closeDisclaimerModal()">Understood &amp; Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Student Login / Register Modal -->
<div id="authModal" class="modal-overlay-custom" onclick="if(event.target===this) closeAuthModal()">
  <div class="modal-card-custom" style="max-width: 580px;">
    <div class="modal-header-custom">
      <div class="d-flex align-items-center gap-2">
        <i class="fa fa-graduation-cap text-warning fs-4"></i>
        <div>
          <h3 style="margin: 0; font-size: 1.25rem;">Student Virtual Campus</h3>
          <small style="color: #cbd5e1; font-size: 0.78rem;">Live Zoom Classes • Class Recordings • Manuscript Reviews</small>
        </div>
      </div>
      <button class="modal-close-custom" onclick="closeAuthModal()" aria-label="Close modal">&times;</button>
    </div>

    <!-- Auth Tabs -->
    <div class="auth-tabs-row d-flex border-bottom" style="background: #f8fafc;">
      <button id="authTabLogin" class="auth-tab-btn active" onclick="switchAuthTab('login')">
        <i class="fa-solid fa-lock me-1"></i> Student Login
      </button>
      <button id="authTabRegister" class="auth-tab-btn" onclick="switchAuthTab('register')">
        <i class="fa-solid fa-user-plus me-1"></i> Register New Student
      </button>
    </div>

    <div class="modal-body-custom" style="padding: 24px;">
      <!-- Login View -->
      <div id="authLoginView">
        <form onsubmit="handleAuthLogin(event)">
          <div class="mb-3">
            <label class="auth-form-label">Email or Student ID</label>
            <div class="auth-input-wrapper">
              <i class="fa-regular fa-envelope auth-field-icon"></i>
              <input type="email" class="auth-form-control with-icon" id="loginEmail" placeholder="student@icrw.net" required>
            </div>
          </div>
          <div class="mb-3">
            <div class="d-flex justify-content-between align-items-center mb-1">
              <label class="auth-form-label mb-0">Password</label>
              <a href="javascript:void(0)" onclick="showToast('Password reset link sent to your registered email.')" style="font-size: 0.78rem; color: var(--icrw-sage); text-decoration: none; font-weight: 500;">Forgot Password?</a>
            </div>
            <div class="auth-input-wrapper">
              <i class="fa-solid fa-key auth-field-icon"></i>
              <input type="password" class="auth-form-control with-icon with-eye" id="loginPassword" placeholder="••••••••" required>
              <button type="button" class="auth-eye-btn" onclick="toggleLoginPassword()" title="Show/Hide Password" aria-label="Toggle password visibility">
                <i class="fa-regular fa-eye" id="toggleLoginEye"></i>
              </button>
            </div>
          </div>
          <div class="mb-3 form-check d-flex align-items-center gap-2">
            <input type="checkbox" class="form-check-input mt-0" id="rememberMe" checked style="cursor: pointer;">
            <label class="form-check-label" for="rememberMe" style="font-size: 0.82rem; color: #64748b; cursor: pointer;">Remember this device</label>
          </div>

          <button type="submit" class="btn w-100 rounded-pill py-2 text-white" style="background: var(--icrw-navy); font-weight: 600; font-size: 0.95rem; box-shadow: 0 4px 14px rgba(13, 35, 58, 0.25);">
            <i class="fa-solid fa-arrow-right-to-bracket me-2"></i> Sign In to Student Portal
          </button>
        </form>

        <div class="text-center mt-3 pt-3 border-top" style="font-size: 0.83rem; color: #64748b;">
          Don't have an enrolled account?
          <a href="javascript:void(0)" onclick="switchAuthTab('register')" style="color: var(--icrw-sage); font-weight: 600; text-decoration: none;">Register Now →</a>
        </div>
      </div>

      <!-- Register View -->
      <div id="authRegisterView" style="display: none;">
        <form onsubmit="handleAuthRegister(event)">
          <div class="row g-2 mb-2">
            <div class="col-sm-6">
              <label class="auth-form-label">Full Name</label>
              <input type="text" class="auth-form-control" id="regName" placeholder="Dr. / Mr. / Ms. Name" required>
            </div>
            <div class="col-sm-6">
              <label class="auth-form-label">Email Address</label>
              <input type="email" class="auth-form-control" id="regEmail" placeholder="your.name@domain.com" required>
            </div>
          </div>

          <div class="row g-2 mb-3">
            <div class="col-sm-6">
              <label class="auth-form-label">WhatsApp / Phone</label>
              <input type="tel" class="auth-form-control" id="regPhone" placeholder="+92 300 1234567" required>
            </div>
            <div class="col-sm-6">
              <label class="auth-form-label">Create Password</label>
              <input type="password" class="auth-form-control" id="regPass" placeholder="At least 6 characters" required minlength="6">
            </div>
          </div>

          <button type="submit" class="btn w-100 rounded-pill py-2 text-white" style="background: var(--icrw-sage); font-weight: 600; font-size: 0.95rem; box-shadow: 0 4px 14px rgba(91, 123, 104, 0.25);">
            <i class="fa-solid fa-user-check me-2"></i> Register Student Account
          </button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Student Portal Simulator Modal -->
<div id="portalModal" class="modal-overlay-custom" onclick="if(event.target===this) closeStudentPortal()">
  <div class="modal-card-custom" style="max-width: 800px;">
    <div class="modal-header-custom">
      <div class="d-flex align-items-center gap-2">
        <i class="fa fa-user-graduate text-warning"></i>
        <h3>ICRW Student Portal Simulation</h3>
      </div>
      <button class="modal-close-custom" onclick="closeStudentPortal()">&times;</button>
    </div>
    <div class="modal-body-custom">
      <div class="d-flex justify-content-between align-items-center p-3 mb-4 rounded-3" style="background: #f8faf9; border: 1px solid #e2ece6;">
        <div>
          <span style="font-size: 0.78rem; color: #64748b; text-transform: uppercase;">Active Participant</span>
          <h4 style="font-family: var(--font-serif); font-size: 1.25rem; color: var(--icrw-navy); margin: 0;">Enrolled Student Profile</h4>
        </div>
        <span class="badge bg-success px-3 py-2">Enrolled: 2026 Cohort</span>
      </div>

      <div class="row g-3 mb-4">
        <div class="col-sm-4">
          <div class="p-3 text-center rounded-3" style="background: #f8faf9; border: 1px solid #e2ece6;">
            <div style="font-size: 1.5rem; font-weight: 700; color: var(--icrw-navy);">3 / 8</div>
            <div style="font-size: 0.78rem; color: #64748b;">Live Workshops Attended</div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="p-3 text-center rounded-3" style="background: #f8faf9; border: 1px solid #e2ece6;">
            <div style="font-size: 1.5rem; font-weight: 700; color: var(--icrw-sage);">94%</div>
            <div style="font-size: 0.78rem; color: #64748b;">Attendance Record</div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="p-3 text-center rounded-3" style="background: #f8faf9; border: 1px solid #e2ece6;">
            <div style="font-size: 1.5rem; font-weight: 700; color: var(--icrw-gold);">2 Drafts</div>
            <div style="font-size: 0.78rem; color: #64748b;">Critiques Returned</div>
          </div>
        </div>
      </div>

      <h5 style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--icrw-navy); margin-bottom: 12px;">Active Enrolled Workshop:</h5>
      <div class="p-3 rounded-3 mb-4" style="border: 1px solid #e2ece6; background: #ffffff;">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
          <div>
            <strong>CW-01: Advanced Fiction Architecture &amp; Character Psychology</strong>
            <div style="font-size: 0.82rem; color: #64748b;">Instructor: Dr. Syrrina Ahsan Ali Haque • Live Session Thursdays 7:00 PM PKT</div>
          </div>
          <button onclick="showToast('Connecting to secure Zoom Virtual Classroom... Meeting ID: 849 2039 1192')" class="btn btn-sm btn-success rounded-pill px-3" style="font-weight: 600;">
            <i class="fa fa-video me-1"></i> Join Live Zoom Class
          </button>
        </div>
      </div>

      <!-- Paid Workshop Recorded Lectures Section -->
      <h5 style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--icrw-navy); margin: 20px 0 12px; display: flex; align-items: center; justify-content: space-between;">
        <span><i class="fa-solid fa-play-circle text-primary me-2"></i>Paid Workshop Class Recordings:</span>
        <span class="badge bg-light text-dark border" style="font-size: 0.75rem;">Lifetime Student Access</span>
      </h5>
      <div class="d-flex flex-column gap-2 mb-4">
        <div class="p-2 px-3 rounded-3 d-flex justify-content-between align-items-center" style="background: #f8fafc; border: 1px solid #e2e8f0;">
          <div class="d-flex align-items-center gap-3">
            <span class="badge bg-secondary">Session 1</span>
            <div>
              <strong style="font-size: 0.88rem; color: var(--icrw-navy); display: block;">Sensory Imagination &amp; Voice Archetypes</strong>
              <small class="text-muted">Recorded on Oct 03, 2026 • 1h 48m • HD 1080p</small>
            </div>
          </div>
          <button onclick="showToast('Streaming Session 1 Recording (HD Cloud Stream)...')" class="btn btn-sm btn-outline-primary rounded-pill px-3">
            <i class="fa fa-play me-1"></i> Watch Recording
          </button>
        </div>
        <div class="p-2 px-3 rounded-3 d-flex justify-content-between align-items-center" style="background: #f8fafc; border: 1px solid #e2e8f0;">
          <div class="d-flex align-items-center gap-3">
            <span class="badge bg-secondary">Session 2</span>
            <div>
              <strong style="font-size: 0.88rem; color: var(--icrw-navy); display: block;">Plot Architecture: The 7 Narrative Arcs</strong>
              <small class="text-muted">Recorded on Oct 05, 2026 • 2h 05m • HD 1080p</small>
            </div>
          </div>
          <button onclick="showToast('Streaming Session 2 Recording (HD Cloud Stream)...')" class="btn btn-sm btn-outline-primary rounded-pill px-3">
            <i class="fa fa-play me-1"></i> Watch Recording
          </button>
        </div>
        <div class="p-2 px-3 rounded-3 d-flex justify-content-between align-items-center" style="background: #f8fafc; border: 1px solid #e2e8f0;">
          <div class="d-flex align-items-center gap-3">
            <span class="badge bg-secondary">Session 3</span>
            <div>
              <strong style="font-size: 0.88rem; color: var(--icrw-navy); display: block;">Creative Non-Fiction: Memoir &amp; Personal Lyricism</strong>
              <small class="text-muted">Recorded on Oct 10, 2026 • 1h 55m • HD 1080p</small>
            </div>
          </div>
          <button onclick="showToast('Streaming Session 3 Recording (HD Cloud Stream)...')" class="btn btn-sm btn-outline-primary rounded-pill px-3">
            <i class="fa fa-play me-1"></i> Watch Recording
          </button>
        </div>
      </div>

      <div class="d-flex justify-content-between align-items-center pt-3 border-top">
        <button onclick="showToast('Draft submission system opened.');" class="btn btn-outline-primary btn-sm rounded-pill">
          <i class="fa fa-cloud-arrow-up me-1"></i> Submit Weekly Manuscript Draft
        </button>
        <button class="btn btn-dark btn-sm rounded-pill px-4" onclick="closeStudentPortal()">Close Simulator</button>
      </div>
    </div>
  </div>
</div>

<!-- Live Workshops & Masterclasses Directory Modal -->
<div id="catalogModal" class="modal-overlay-custom" onclick="if(event.target===this) closeFullCatalogModal()">
  <div class="modal-card-custom" style="max-width: 960px;">
    <div class="modal-header-custom">
      <div class="d-flex align-items-center gap-2" id="catalogModalHeaderTitle">
        <i class="fa fa-book-bookmark text-warning"></i>
        <h3 id="catalogModalTitle">ICRW Live Workshops &amp; Masterclasses Directory</h3>
      </div>
      <button class="modal-close-custom" onclick="closeFullCatalogModal()" aria-label="Close directory">&times;</button>
    </div>
    <div class="modal-body-custom">
      <p id="catalogModalSubtitle" style="font-size: 0.9rem; color: #64748b; margin-bottom: 14px;">
        Explore our offerings categorized by academic stream. Click any workshop to view syllabus and reserve a seat.
      </p>

      <!-- Stream Filter Tabs inside Modal -->
      <div class="catalog-stream-tabs" id="catalogModalFilterTabs">
        <button type="button" class="catalog-tab-btn tab-all" onclick="filterCatalogModal('all')">
          <i class="fa-solid fa-list-ul"></i> All Offerings (12)
        </button>
        <button type="button" class="catalog-tab-btn tab-creative" onclick="filterCatalogModal('creative')">
          <i class="fa-solid fa-feather-pointed"></i> Creative Writing (5)
        </button>
        <button type="button" class="catalog-tab-btn tab-academic" onclick="filterCatalogModal('academic')">
          <i class="fa-solid fa-book-bookmark"></i> Academic &amp; Research (4)
        </button>
        <button type="button" class="catalog-tab-btn tab-professional" onclick="filterCatalogModal('professional')">
          <i class="fa-solid fa-pen-nib"></i> Professional &amp; Digital (3)
        </button>
      </div>

      <div class="row g-3" id="catalogModalList" style="max-height: 520px; overflow-y: auto;">
        <!-- Populated by populateFullCatalogModal -->
      </div>

      <div class="text-end pt-3 mt-3 border-top">
        <button class="btn btn-dark rounded-pill btn-sm px-4" onclick="closeFullCatalogModal()">Close Directory</button>
      </div>
    </div>
  </div>
</div>

<!-- Toast Box -->
<div id="toastBox" class="toast-box"></div>

<!-- Floating Scroll To Top Button -->
<button type="button" class="scroll-to-top-btn" id="scrollTopBtn" onclick="scrollToTop()" aria-label="Scroll to top" title="Scroll to top">
  <i class="fa fa-chevron-up"></i>
</button>

