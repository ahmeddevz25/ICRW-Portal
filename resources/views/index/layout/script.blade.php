<!-- =======================================================
     SCRIPTS & CLIENT CONTROLLERS
     ======================================================= -->
<script src="{{ asset('index/js/jquery.js') }}"></script>
<script src="{{ asset('index/js/bootstrap.min.js') }}"></script>

<script>
  // Mobile Drawer Controller
  function openMobileMenu() {
    var menu = document.getElementById("customMobileMenu");
    if (menu) {
      menu.classList.add("menu-open");
      menu.style.setProperty("display", "block", "important");
    }
    document.body.classList.add("mobile-menu-visible");
    document.body.style.overflow = "hidden";
  }

  function closeMobileMenu() {
    var menu = document.getElementById("customMobileMenu");
    if (menu) {
      menu.classList.remove("menu-open");
      setTimeout(function () {
        if (!document.body.classList.contains("mobile-menu-visible")) {
          menu.style.setProperty("display", "none", "important");
        }
      }, 300);
    }
    document.body.classList.remove("mobile-menu-visible");
    document.body.style.overflow = "";
  }

  // Sticky Header & Scroll Top Button Visibility
  window.addEventListener('scroll', function () {
    var h = document.querySelector('.main-header');
    if (h) {
      if (window.scrollY > 15) {
        h.classList.add('scrolled');
      } else {
        h.classList.remove('scrolled');
      }
    }

    var btn = document.getElementById('scrollTopBtn');
    if (btn) {
      if (window.scrollY > 300) {
        btn.classList.add('visible');
      } else {
        btn.classList.remove('visible');
      }
    }
  });

  function scrollToTop() {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  }

  // Toast Notification
  function showToast(msg) {
    const t = document.getElementById("toastBox");
    if (!t) return;
    t.textContent = msg;
    t.style.display = "block";
    setTimeout(() => {
      t.style.display = "none";
    }, 3200);
  }

  // =========================================================
  // WORKSHOPS DIRECTORY DATA
  // =========================================================
  const allWorkshops = [
    {
      id: "WS-CW01",
      track: "creative",
      type: "Dramatic Arts",
      title: "Drama and Screenplaywriting",
      duration: "2-Hour Live Masterclass",
      schedule: "Tuesday • 7:00 PM PKT",
      seats: "Limited to 20 Seats",
      desc: "Master scriptwriting craft: three-act dramatic structure, loglines, character arcs, scene beats, and industry formatting.",
      img: "{{ asset('index/images/custom/track_creative.jpg') }}"
    },
    {
      id: "WS-CW02",
      track: "creative",
      type: "Fiction Clinic",
      title: "Short Story Writing",
      duration: "2-Hour Live Masterclass",
      schedule: "Saturday • 7:30 PM PKT",
      seats: "Limited to 20 Seats",
      desc: "Developing compelling premise, narrative pacing, character economy, dynamic conflict, and ending resonance in modern short fiction.",
      img: "{{ asset('index/images/custom/track_creative.jpg') }}"
    },
    {
      id: "WS-CW03",
      track: "creative",
      type: "Poetry Masterclass",
      title: "Poetry English",
      duration: "90-Min Live Masterclass",
      schedule: "Sunday • 6:00 PM PKT",
      seats: "Limited to 20 Seats",
      desc: "Sonnets, free verse cadence, striking metaphor construction, sonic imagery, and modern anglophone poetic movements.",
      img: "{{ asset('index/images/custom/track_creative.jpg') }}"
    },
    {
      id: "WS-CW04",
      track: "creative",
      type: "Urdu Poetics",
      title: "Poetry Urdu (اردو شاعری)",
      duration: "2-Hour Live Masterclass",
      schedule: "Friday • 8:00 PM PKT",
      seats: "Limited to 25 Seats",
      desc: "The classical and modern traditions of Urdu verse: bahr, radif, qafiya, ghazal architecture, and modern nazm aesthetics.",
      img: "{{ asset('index/images/custom/track_creative.jpg') }}"
    },
    {
      id: "WS-CW05",
      track: "creative",
      type: "Artistic Penmanship",
      title: "Calligraphy & Traditional Lettering",
      duration: "2-Hour Hands-On Clinic",
      schedule: "Saturday • 3:00 PM PKT",
      seats: "Limited to 15 Seats",
      desc: "The tactile art of beautiful lettering: classical pen angles, stroke anatomy, manuscript aesthetics, and creative visual typography.",
      img: "{{ asset('index/images/custom/track_creative.jpg') }}"
    },
    {
      id: "WS-AR01",
      track: "academic",
      type: "Research Masterclass",
      title: "How to Write a Research Article",
      duration: "2-Hour Live Masterclass",
      schedule: "Saturday • 4:00 PM PKT",
      seats: "Limited to 25 Seats",
      desc: "From thesis statement to conclusion: abstract drafting, IMRaD structure, peer-reviewed journal submission guidelines, and literature synthesis.",
      img: "{{ asset('index/images/custom/track_academic.jpg') }}"
    },
    {
      id: "WS-AR02",
      track: "academic",
      type: "Methodology Clinic",
      title: "Qualitative Research in Linguistics",
      duration: "2-Hour Live Masterclass",
      schedule: "Tuesday • 6:00 PM PKT",
      seats: "Limited to 25 Seats",
      desc: "Discourse analysis (CDA), conversational transcripts, corpus-assisted qualitative analysis, and linguistic data coding frameworks.",
      img: "{{ asset('index/images/custom/track_academic.jpg') }}"
    },
    {
      id: "WS-AR03",
      track: "academic",
      type: "Scholarly Clinic",
      title: "Qualitative Research in Literature",
      duration: "2-Hour Live Masterclass",
      schedule: "Friday • 5:00 PM PKT",
      seats: "Limited to 25 Seats",
      desc: "Textual hermeneutics, thematic literary analysis, archival methodologies, and qualitative theoretical frameworks for humanities research.",
      img: "{{ asset('index/images/custom/track_academic.jpg') }}"
    },
    {
      id: "WS-AR04",
      track: "academic",
      type: "Research Fundamentals",
      title: "What is Quantitative Research",
      duration: "2-Hour Live Masterclass",
      schedule: "Wednesday • 7:00 PM PKT",
      seats: "Limited to 30 Seats",
      desc: "Formulating hypotheses, survey research design, variables and measurement scales, statistical significance, and empirical data reporting.",
      img: "{{ asset('index/images/custom/track_academic.jpg') }}"
    },
    {
      id: "WS-PD01",
      track: "professional",
      type: "Publishing Masterclass",
      title: "How to Get Published",
      duration: "2-Hour Live Masterclass",
      schedule: "Sunday • 5:00 PM PKT",
      seats: "Limited to 30 Seats",
      desc: "Query letters, literary agents, book proposals, copyright registration, university presses, and navigating publisher contracts.",
      img: "{{ asset('index/images/custom/track_professional.jpg') }}"
    },
    {
      id: "WS-PD02",
      track: "professional",
      type: "Literary Theory Clinic",
      title: "Ecocriticism & Environmental Humanities",
      duration: "90-Min Live Masterclass",
      schedule: "Wednesday • 6:30 PM PKT",
      seats: "Limited to 25 Seats",
      desc: "Critical study of literature and the environment: Anthropocene narratives, eco-justice, climate fiction (Cli-Fi), and nature in prose.",
      img: "{{ asset('index/images/custom/track_professional.jpg') }}"
    },
    {
      id: "WS-PD03",
      track: "professional",
      type: "Scholarly Masterclass",
      title: "South Asian Literature: Themes & Canons",
      duration: "2-Hour Live Masterclass",
      schedule: "Thursday • 6:00 PM PKT",
      seats: "Limited to 30 Seats",
      desc: "Post-colonial identities, Partition literature, diaspora voices, and contemporary South Asian English prose and poetry.",
      img: "{{ asset('index/images/custom/track_professional.jpg') }}"
    }
  ];

  const streamMeta = {
    creative: {
      title: "Creative Writing & Poetics Directory",
      subtitle: "Showing all 5 specialized masterclasses in Creative Writing, Poetics, Scriptwriting & Calligraphy.",
      icon: '<i class="fa-solid fa-feather-pointed text-success"></i>'
    },
    academic: {
      title: "Academic & Research Writing Directory",
      subtitle: "Showing all 4 specialized masterclasses in Research Articles, Qualitative & Quantitative Methodology.",
      icon: '<i class="fa-solid fa-book-bookmark text-primary"></i>'
    },
    professional: {
      title: "Professional & Digital Writing Directory",
      subtitle: "Showing all 3 specialized masterclasses in Publishing, Ecocriticism & South Asian Literature.",
      icon: '<i class="fa-solid fa-pen-nib text-warning"></i>'
    },
    all: {
      title: "ICRW Live Workshops & Masterclasses Directory",
      subtitle: "Showing all 12 client-verified masterclasses across the 3 specialized academic streams.",
      icon: '<i class="fa-solid fa-book-open-reader text-warning"></i>'
    }
  };

  const workshopDetailsBaseUrl = "{{ route('workshop.details') }}";

  function populateFullCatalogModal(track = 'all') {
    const list = document.getElementById("catalogModalList");
    if (!list) return;
    list.innerHTML = "";

    const meta = streamMeta[track] || streamMeta.all;
    const titleEl = document.getElementById("catalogModalTitle");
    const subEl = document.getElementById("catalogModalSubtitle");
    const iconWrap = document.getElementById("catalogModalHeaderTitle");
    
    if (titleEl) titleEl.innerText = meta.title;
    if (subEl) subEl.innerText = meta.subtitle;
    if (iconWrap) {
      iconWrap.innerHTML = `${meta.icon} <h3 id="catalogModalTitle" style="margin:0; font-family:var(--font-serif); font-size:1.35rem; color:#fff;">${meta.title}</h3>`;
    }

    document.querySelectorAll('#catalogModalFilterTabs .catalog-tab-btn').forEach(btn => {
      btn.classList.remove('active');
      const onclickAttr = btn.getAttribute('onclick') || '';
      if (track === 'all' && onclickAttr.includes("'all'")) btn.classList.add('active');
      else if (track === 'creative' && onclickAttr.includes("'creative'")) btn.classList.add('active');
      else if (track === 'academic' && onclickAttr.includes("'academic'")) btn.classList.add('active');
      else if (track === 'professional' && onclickAttr.includes("'professional'")) btn.classList.add('active');
    });

    const filtered = track === 'all' ? allWorkshops : allWorkshops.filter(w => w.track === track);

    filtered.forEach((w) => {
      const col = document.createElement("div");
      col.className = "col-md-6";

      let badgeClass = "catalog-badge-creative";
      let typeIcon = "fa-feather-pointed";
      if (w.track === "academic") {
        badgeClass = "catalog-badge-academic";
        typeIcon = "fa-book-bookmark";
      } else if (w.track === "professional") {
        badgeClass = "catalog-badge-professional";
        typeIcon = "fa-pen-nib";
      }

      col.innerHTML = `
        <div class="catalog-card">
          <div>
            <div class="catalog-card-header">
              <span class="catalog-type-badge ${badgeClass}">
                <i class="fa-solid ${typeIcon}"></i> ${w.type}
              </span>
              <span class="catalog-seats-badge">
                <i class="fa-solid fa-users me-1 text-warning"></i> ${w.seats}
              </span>
            </div>
            <h4 class="catalog-card-title">
              <a href="${workshopDetailsBaseUrl}?id=${w.id}" class="catalog-card-title-link" title="Click to view full workshop details and syllabus">
                ${w.title}
              </a>
            </h4>
            <p class="catalog-card-desc">${w.desc}</p>
          </div>
          <div class="catalog-card-footer">
            <span class="catalog-schedule-text">
              <i class="fa-regular fa-calendar-check me-1 text-warning"></i> ${w.schedule}
            </span>
            <a href="${workshopDetailsBaseUrl}?id=${w.id}" 
               class="catalog-details-btn" 
               title="View complete curriculum and details for ${w.title}">
              <i class="fa-solid fa-arrow-up-right-from-square"></i> View Details
            </a>
          </div>
        </div>
      `;
      list.appendChild(col);
    });
  }

  // =========================================================
  // MODAL CONTROLLERS
  // =========================================================
  window.openFullCatalogModal = function(track = 'all') {
    populateFullCatalogModal(track);
    const m = document.getElementById("catalogModal");
    if (m) {
      m.style.display = "flex";
      document.body.style.overflow = "hidden";
    }
  };

  window.closeFullCatalogModal = function() {
    const m = document.getElementById("catalogModal");
    if (m) {
      m.style.display = "none";
      document.body.style.overflow = "";
    }
  };

  window.filterCatalogModal = function(track) {
    populateFullCatalogModal(track);
  };

  window.openAuthModal = function(tab = 'login') {
    const modal = document.getElementById("authModal");
    if (modal) {
      modal.style.display = "flex";
      document.body.style.overflow = "hidden";
    }
    switchAuthTab(tab);
  };

  window.closeAuthModal = function() {
    const modal = document.getElementById("authModal");
    if (modal) {
      modal.style.display = "none";
      document.body.style.overflow = "";
    }
  };

  window.switchAuthTab = function(tab) {
    const loginView = document.getElementById("authLoginView");
    const registerView = document.getElementById("authRegisterView");
    const tabLogin = document.getElementById("authTabLogin");
    const tabRegister = document.getElementById("authTabRegister");

    if (tab === 'register') {
      if (loginView) loginView.style.display = "none";
      if (registerView) registerView.style.display = "block";
      if (tabLogin) tabLogin.classList.remove("active");
      if (tabRegister) tabRegister.classList.add("active");
    } else {
      if (loginView) loginView.style.display = "block";
      if (registerView) registerView.style.display = "none";
      if (tabLogin) tabLogin.classList.add("active");
      if (tabRegister) tabRegister.classList.remove("active");
    }
  };

  window.toggleLoginPassword = function() {
    const p = document.getElementById("loginPassword");
    const eye = document.getElementById("toggleLoginEye");
    if (!p) return;
    if (p.type === "password") {
      p.type = "text";
      if (eye) {
        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");
      }
    } else {
      p.type = "password";
      if (eye) {
        eye.classList.remove("fa-eye-slash");
        eye.classList.add("fa-eye");
      }
    }
  };

  window.handleAuthLogin = function(e) {
    if (e) e.preventDefault();
    closeAuthModal();
    showToast("Sign in successful! Connecting to ICRW Student Portal...");
    setTimeout(function() {
      openStudentPortal();
    }, 500);
  };

  window.handleAuthRegister = function(e) {
    if (e) e.preventDefault();
    const nameEl = document.getElementById("regName");
    const name = nameEl && nameEl.value ? nameEl.value : "Scholar";
    closeAuthModal();
    showToast("Registration successful for " + name + "! Welcome to ICRW.");
    setTimeout(function() {
      openStudentPortal();
    }, 500);
  };

  window.openStudentPortal = function() {
    const modal = document.getElementById("portalModal");
    if (modal) {
      modal.style.display = "flex";
      document.body.style.overflow = "hidden";
    }
  };

  window.closeStudentPortal = function() {
    const modal = document.getElementById("portalModal");
    if (modal) {
      modal.style.display = "none";
      document.body.style.overflow = "";
    }
  };

  window.openDisclaimerModal = function() {
    const modal = document.getElementById("disclaimerModal");
    if (modal) {
      modal.style.display = "flex";
      document.body.style.overflow = "hidden";
    }
  };

  window.closeDisclaimerModal = function() {
    const modal = document.getElementById("disclaimerModal");
    if (modal) {
      modal.style.display = "none";
      document.body.style.overflow = "";
    }
  };

  const facultyDossiers = {
    syrrina: {
      name: "Dr. Syrrina Ahsan Ali Haque",
      role: "CEO &amp; Founder • Postdoc Fellow (USA)",
      subtitle: "Visiting Professor &amp; Former Head DELL, Univ. of Lahore",
      image: "{{ asset('index/assets/faculty_syrrina.jpg') }}",
      bio: "Dr. Syrrina completed her postdoctoral fellowship at SUNY Buffalo (USA) and serves on the SPS Board of Governors. Her book manuscript Dialogue on Partition (Bloomsbury) won the NeMLA Book Award in Boston, USA. She has published widely in Routledge and Cambridge Scholars.",
      link: "{{ route('faculty') }}#dr-syrrina"
    },
    amber: {
      name: "Ms. Amber Arif",
      role: "Head of ICT, STEM &amp; Assistive Tech • Canada",
      subtitle: "Master’s in Computer Science • Assistive Technology Coach (Canada)",
      image: "{{ asset('index/assets/faculty_amber.jpg') }}",
      bio: "Former Head of Department & ICT Teacher at Lahore Grammar School (LGS). Certified Examiner & Moderator for Pearson Edexcel and Cambridge Assessment (UCLES) for O/A-Levels, guiding students to top regional and world distinctions.",
      link: "{{ route('faculty') }}#ms-amber"
    }
  };

  window.openFacultyModal = function(id = 'syrrina') {
    const modal = document.getElementById("facultyModal");
    const body = document.getElementById("facultyModalBody");
    const d = facultyDossiers[id] || facultyDossiers.syrrina;
    if (body) {
      body.innerHTML = `
        <div class="d-flex align-items-center gap-3 mb-3">
          <img src="${d.image}" alt="${d.name}" style="width: 72px; height: 90px; object-fit: cover; border-radius: 10px; border: 2px solid var(--icrw-sage);">
          <div>
            <h4 style="margin: 0; font-family: var(--font-serif); font-size: 1.25rem; color: var(--icrw-navy);">${d.name}</h4>
            <span class="badge bg-success" style="font-size: 0.72rem; margin: 4px 0;">${d.role}</span>
            <p style="margin: 0; font-size: 0.8rem; color: #64748b;">${d.subtitle}</p>
          </div>
        </div>
        <p style="font-size: 0.88rem; color: #334155; line-height: 1.6; margin-bottom: 20px;">${d.bio}</p>
        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
          <a href="${d.link}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
            Read Full Faculty Profile &amp; Books &rarr;
          </a>
          <button class="btn btn-dark btn-sm rounded-pill px-4" onclick="closeFacultyModal()">Close</button>
        </div>
      `;
    }
    if (modal) {
      modal.style.display = "flex";
      document.body.style.overflow = "hidden";
    }
  };

  window.openFacultyDossier = window.openFacultyModal;

  window.closeFacultyModal = function() {
    const modal = document.getElementById("facultyModal");
    if (modal) {
      modal.style.display = "none";
      document.body.style.overflow = "";
    }
  };

  // Close modals on Escape key
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
      closeFullCatalogModal();
      closeAuthModal();
      closeStudentPortal();
      closeDisclaimerModal();
      closeFacultyModal();
      closeMobileMenu();
    }
  });

  // Universal smooth scroll with fixed header offset for hash anchors
  function smoothScrollToTarget(targetId) {
    try {
      var target = document.querySelector(targetId);
      if (!target) return;
      var header = document.querySelector('.main-header');
      var offset = (header ? header.offsetHeight : 88) + 16;
      var top = target.getBoundingClientRect().top + window.pageYOffset - offset;
      window.scrollTo({
        top: Math.max(0, top),
        behavior: 'smooth'
      });
    } catch (err) {
      // Ignore invalid selectors
    }
  }

  // Intercept in-page hash anchor clicks for smooth scroll without page reload
  document.addEventListener('click', function(e) {
    var link = e.target.closest('a');
    if (!link) return;
    var href = link.getAttribute('href');
    if (!href) return;

    var hashIndex = href.indexOf('#');
    if (hashIndex !== -1) {
      var hash = href.substring(hashIndex);
      if (hash.length > 1 && hash !== '#') {
        var path = href.substring(0, hashIndex);
        var currentPath = window.location.pathname;
        var currentHref = window.location.href.split('#')[0];

        if (!path || path === currentPath || path === currentPath.replace(/\/$/, '') || currentHref.endsWith(path)) {
          var target = document.querySelector(hash);
          if (target) {
            e.preventDefault();
            if (history.pushState) {
              history.pushState(null, null, hash);
            }
            smoothScrollToTarget(hash);
          }
        }
      }
    }
  });

  window.addEventListener('DOMContentLoaded', function() {
    if (window.location.hash) {
      setTimeout(function() {
        smoothScrollToTarget(window.location.hash);
      }, 350);
    }
  });
</script>

@stack('scripts')

