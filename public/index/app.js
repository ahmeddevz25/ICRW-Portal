/**
 * Institute of Creative and Research Writing (ICRW)
 * Clean, High-Engagement Interactive Controller
 */

// Full Database of All 21 Workshops
const allWorkshops = [
  {
    id: "ws-c1",
    title: "Drama and Screenplaywriting",
    track: "creative",
    trackLabel: "Creative Writing",
    isFeatured: true,
    pricePKR: 5000,
    priceUSD: 35,
    duration: "2-Hour Live Masterclass",
    schedule: "Tuesday | 7:00 PM - 9:00 PM PKT",
    mentor: "Hamza R., Screenwriter",
    summary: "Master scriptwriting craft: three-act dramatic structure, loglines, character arcs, scene beats, and cinematic dialogue formatting."
  },
  {
    id: "ws-c2",
    title: "Short Story Writing",
    track: "creative",
    trackLabel: "Creative Writing",
    isFeatured: true,
    pricePKR: 4500,
    priceUSD: 30,
    duration: "2-Hour Live Masterclass",
    schedule: "Saturday | 7:30 PM - 9:30 PM PKT",
    mentor: "Evelyn Croft (Published Novelist)",
    summary: "Developing compelling premise, narrative pacing, character economy, dynamic conflict, and ending resonance in modern short fiction."
  },
  {
    id: "ws-c3",
    title: "Poetry English",
    track: "creative",
    trackLabel: "Creative Writing",
    isFeatured: true,
    pricePKR: 4500,
    priceUSD: 30,
    duration: "90-Min Live Masterclass",
    schedule: "Sunday | 6:00 PM - 7:30 PM PKT",
    mentor: "Elena Rostova (Poet Laureate Fellow)",
    summary: "Sonnets, free verse cadence, striking metaphor construction, sonic imagery, and modern anglophone poetic movements."
  },
  {
    id: "ws-c4",
    title: "Poetry Urdu (اردو شاعری)",
    track: "creative",
    trackLabel: "Creative Writing",
    isFeatured: true,
    pricePKR: 4500,
    priceUSD: 30,
    duration: "2-Hour Live Masterclass",
    schedule: "Friday | 8:00 PM - 10:00 PM PKT",
    mentor: "Dr. Tahir Q., PEN Awardee",
    summary: "The classical and modern traditions of Urdu verse: bahr, radif, qafiya, ghazal architecture, and modern nazm aesthetics."
  },
  {
    id: "ws-c5",
    title: "Calligraphy & Traditional Lettering",
    track: "creative",
    trackLabel: "Creative Writing",
    isFeatured: true,
    pricePKR: 4000,
    priceUSD: 25,
    duration: "2-Hour Hands-On Masterclass",
    schedule: "Saturday | 3:00 PM - 5:00 PM PKT",
    mentor: "Ustad M. Farooq, Calligrapher",
    summary: "The tactile art of beautiful lettering: classical pen angles, stroke anatomy, manuscript aesthetics, and creative visual typography."
  },
  {
    id: "ws-a1",
    title: "How to Write a Research Article",
    track: "academic",
    trackLabel: "Academic & Research",
    isFeatured: true,
    pricePKR: 5500,
    priceUSD: 35,
    duration: "2-Hour Live Masterclass",
    schedule: "Saturday | 4:00 PM - 6:00 PM PKT",
    mentor: "Dr. A. Shah, Ph.D. (Oxford Fellow)",
    summary: "From thesis statement to conclusion: abstract drafting, IMRaD structure, peer-reviewed journal submission guidelines, and literature synthesis."
  },
  {
    id: "ws-a2",
    title: "Qualitative Research in Linguistics",
    track: "academic",
    trackLabel: "Academic & Research",
    isFeatured: true,
    pricePKR: 5000,
    priceUSD: 35,
    duration: "2-Hour Live Masterclass",
    schedule: "Tuesday | 6:00 PM - 8:00 PM PKT",
    mentor: "Dr. Shireen Bukhari (Assoc. Prof)",
    summary: "Discourse analysis (CDA), conversational transcripts, corpus-assisted qualitative analysis, and linguistic data coding frameworks."
  },
  {
    id: "ws-a3",
    title: "Qualitative Research in Literature",
    track: "academic",
    trackLabel: "Academic & Research",
    isFeatured: true,
    pricePKR: 5000,
    priceUSD: 35,
    duration: "2-Hour Live Masterclass",
    schedule: "Friday | 5:00 PM - 7:00 PM PKT",
    mentor: "Prof. Maria Vance, M.Phil, Ph.D.",
    summary: "Textual hermeneutics, thematic literary analysis, archival methodologies, and qualitative theoretical frameworks for humanities research."
  },
  {
    id: "ws-a4",
    title: "What is Quantitative Research",
    track: "academic",
    trackLabel: "Academic & Research",
    isFeatured: true,
    pricePKR: 5000,
    priceUSD: 35,
    duration: "2-Hour Live Masterclass",
    schedule: "Wednesday | 7:00 PM - 9:00 PM PKT",
    mentor: "Dr. Adeel Chaudhry, Quantitative Lead",
    summary: "Formulating hypotheses, survey research design, variables and measurement scales, statistical significance, and empirical data reporting."
  },
  {
    id: "ws-1",
    title: "Academic Writing",
    track: "academic",
    trackLabel: "Academic & Research",
    isFeatured: true,
    pricePKR: 5500,
    priceUSD: 35,
    duration: "4 Weeks (8 Live Sessions)",
    schedule: "Sat & Sun | 6:00 PM - 8:00 PM PKT",
    mentor: "Dr. A. Shah, Ph.D. (Oxford Fellow)",
    enrolledCount: 412,
    rating: 4.9,
    summary: "Master scholarly tone, thesis structuring, rigorous literature review, peer-reviewed argumentation, and citation styles (APA, MLA, Chicago).",
    modules: [
      { week: "Week 1", topic: "The Anatomy of Academic Prose: Voice, Tone & Formality" },
      { week: "Week 2", topic: "Constructing Irrefutable Research Questions & Claims" },
      { week: "Week 3", topic: "Critical Synthesis of Sources & Navigating Plagiarism" },
      { week: "Week 4", topic: "Submission Polish: Journal Formatting & Peer-Review Simulation" }
    ]
  },
  {
    id: "ws-2",
    title: "How to Write a Research Proposal",
    track: "academic",
    trackLabel: "Academic & Research",
    isFeatured: true,
    pricePKR: 6000,
    priceUSD: 40,
    duration: "3 Weeks (6 Live Sessions)",
    schedule: "Tue & Thu | 7:00 PM - 9:00 PM PKT",
    mentor: "Prof. Maria Vance, M.Phil, Ph.D.",
    enrolledCount: 389,
    rating: 4.95,
    summary: "Step-by-step guidance to draft university-admissions and grant-winning research proposals from conceptual framework to ethics approval.",
    modules: [
      { week: "Week 1", topic: "Problem Statement, Rationale & Research Objectives" },
      { week: "Week 2", topic: "Methodological Coherence & Theoretical Frameworks" },
      { week: "Week 3", topic: "Proposal Defense Preparation & Grant Pitching" }
    ]
  },
  {
    id: "ws-3",
    title: "Creative Writing (Fiction & Non-Fiction)",
    track: "creative",
    trackLabel: "Creative Writing",
    isFeatured: true,
    pricePKR: 5000,
    priceUSD: 30,
    duration: "5 Weeks (10 Live Sessions)",
    schedule: "Fri & Sun | 7:30 PM - 9:30 PM PKT",
    mentor: "Evelyn Croft (Published Novelist)",
    enrolledCount: 620,
    rating: 5.0,
    summary: "Where ideas become words. Learn character interiority, sensory narrative worldbuilding, pacing, dialogue, and personal essays.",
    modules: [
      { week: "Week 1", topic: "Sensory Imagination & Voice Archetypes" },
      { week: "Week 2", topic: "Plot Architecture: The 7 Narrative Arcs" },
      { week: "Week 3", topic: "Creative Non-Fiction: Memoir & Personal Lyricism" },
      { week: "Week 4", topic: "Subtext, Dialogue & Character Flaws" },
      { week: "Week 5", topic: "Live Manuscript Workshop & Literary Feedback" }
    ]
  },
  {
    id: "ws-4",
    title: "Digital Humanities",
    track: "academic",
    trackLabel: "Academic & Research",
    isFeatured: false,
    pricePKR: 6500,
    priceUSD: 45,
    duration: "4 Weeks (8 Sessions)",
    schedule: "Mon & Wed | 7:00 PM PKT",
    mentor: "Dr. K. Rahim, DH Lab Lead",
    summary: "Interrogate literature with digital tools: text mining, corpus linguistics, and computational narrative analysis.",
    modules: [
      { week: "Week 1", topic: "Computational Literary Studies & Distant Reading" },
      { week: "Week 2", topic: "Corpus Analysis & Concordance Mining" }
    ]
  },
  {
    id: "ws-5",
    title: "Ecocriticism & Climate Narratives",
    track: "academic",
    trackLabel: "Literary Studies",
    isFeatured: false,
    pricePKR: 4500,
    priceUSD: 30,
    duration: "3 Weeks (6 Sessions)",
    schedule: "Wed & Sat | 6:30 PM PKT",
    mentor: "Prof. S. Douglas",
    summary: "Explore the ecological turn in literature: Anthropocene narratives, environmental crisis, and more-than-human ethics.",
    modules: [
      { week: "Week 1", topic: "First & Second Wave Ecocriticism" },
      { week: "Week 2", topic: "Writing Eco-Centric Scholarly Essays" }
    ]
  },
  {
    id: "ws-6",
    title: "Assistive Writing for Special Students",
    track: "assistive",
    trackLabel: "Specialized Education",
    isFeatured: true,
    pricePKR: 3500,
    priceUSD: 25,
    duration: "4 Weeks (8 Interactive Sessions)",
    schedule: "Tue & Sat | 5:00 PM - 7:00 PM PKT",
    mentor: "Dr. Z. Tariq, Inclusive Specialist",
    enrolledCount: 180,
    rating: 5.0,
    summary: "Empowering neurodivergent learners, students with dyslexia, and mobility challenges with assistive speech-to-text tools and cognitive mapping.",
    modules: [
      { week: "Week 1", topic: "Cognitive Mapping & Multi-Sensory Writing Strategies" },
      { week: "Week 2", topic: "Harnessing Assistive Technologies (TTS, Mind-mapping)" },
      { week: "Week 3", topic: "Breaking Executive Dysfunction in Extended Essays" }
    ]
  },
  {
    id: "ws-7",
    title: "Essay Writing for IELTS",
    track: "testprep",
    trackLabel: "Test Preparation",
    isFeatured: true,
    pricePKR: 4500,
    priceUSD: 30,
    duration: "3 Weeks (6 Live Sessions + Essay Feedback)",
    schedule: "Mon & Fri | 8:00 PM - 9:30 PM PKT",
    mentor: "Sarah N. (Cambridge Certified Coach)",
    enrolledCount: 780,
    rating: 4.96,
    summary: "Breakdown IELTS Task 2 criteria: Task Response, Cohesion, Lexical Resource, and Grammatical Range with verified Band 8.5+ models.",
    modules: [
      { week: "Week 1", topic: "Task 2 Prompt Deconstruction & 5 Essay Types" },
      { week: "Week 2", topic: "Band 9 Vocabulary, Collocations & Cohesive Devices" },
      { week: "Week 3", topic: "Timed Mock Essays with 1-on-1 Band Score Rubric" }
    ]
  },
  {
    id: "ws-8",
    title: "English Proficiency Tests (TOEFL, SAT, GRE)",
    track: "testprep",
    trackLabel: "Test Preparation",
    isFeatured: true,
    pricePKR: 5500,
    priceUSD: 35,
    duration: "4 Weeks (8 Live Sessions)",
    schedule: "Tue & Thu | 8:00 PM - 9:45 PM PKT",
    mentor: "Prof. Farooq H., Testing Strategist",
    enrolledCount: 512,
    rating: 4.9,
    summary: "Comprehensive verbal masterclass targeting high percentiles on SAT Reading/Writing, TOEFL iBT sections, and GRE Analytical Writing.",
    modules: [
      { week: "Week 1", topic: "Advanced Reading Comprehension & Evidence-Based Logic" },
      { week: "Week 2", topic: "GRE Issue Task & Analytical Writing Tactics" }
    ]
  },
  {
    id: "ws-9",
    title: "Speaking Skills for Standardized Tests",
    track: "testprep",
    trackLabel: "Test Preparation",
    isFeatured: false,
    pricePKR: 4000,
    priceUSD: 28,
    duration: "3 Weeks (Live 1-on-1 Drills)",
    schedule: "Wed & Sat | 8:00 PM PKT",
    mentor: "Amina Malik, Cambridge Assessor",
    summary: "Overcome hesitation, master natural rhythm, idiom usage, and pronunciation clarity for IELTS & TOEFL speaking sections.",
    modules: [
      { week: "Week 1", topic: "Fluency & Spontaneous Elaboration Drills" },
      { week: "Week 2", topic: "Abstract Debates & Advanced Colloquial Fluency" }
    ]
  },
  {
    id: "ws-10",
    title: "Translation of Poetry",
    track: "creative",
    trackLabel: "Creative Writing",
    isFeatured: false,
    pricePKR: 4500,
    priceUSD: 30,
    duration: "3 Weeks (6 Sessions)",
    schedule: "Thu & Sun | 6:00 PM PKT",
    mentor: "Dr. Tahir Q., PEN Awardee",
    summary: "The art of poetic transposition. How to carry metaphor, meter, rhythm, and cultural nuances across Urdu and English verse.",
    modules: [
      { week: "Week 1", topic: "Linguistic Fidelity vs. Poetic Soul in Translation" }
    ]
  },
  {
    id: "ws-11",
    title: "Poetry Writing Masterclass",
    track: "creative",
    trackLabel: "Creative Writing",
    isFeatured: true,
    pricePKR: 4500,
    priceUSD: 30,
    duration: "4 Weeks (8 Live Sessions)",
    schedule: "Fri & Sun | 6:00 PM - 7:30 PM PKT",
    mentor: "Elena Rostova (Poet Laureate Fellow)",
    enrolledCount: 420,
    rating: 4.97,
    summary: "Write striking verse: metaphor craft, sonic textures, line breaks, white space, free verse cadence, and contemporary spoken word.",
    modules: [
      { week: "Week 1", topic: "Sensory Imagery & Finding the Unfamiliar Metaphor" },
      { week: "Week 2", topic: "The Music of Language: Assonance & Cadence" },
      { week: "Week 3", topic: "Free Verse Architecture & Stanza Forms" }
    ]
  },
  {
    id: "ws-12",
    title: "Drama & Scriptwriting",
    track: "creative",
    trackLabel: "Creative Writing",
    isFeatured: false,
    pricePKR: 5000,
    priceUSD: 35,
    duration: "4 Weeks (8 Sessions)",
    schedule: "Tue & Fri | 7:00 PM PKT",
    mentor: "Bilal Asad, Stage Dramaturge",
    summary: "Learn stagecraft and screen formatting: dramatic tension, monologue construction, subtext, and scene beats.",
    modules: [
      { week: "Week 1", topic: "Dramatic Incident & Protagonist Driving Need" }
    ]
  },
  {
    id: "ws-13",
    title: "Editing & Proofreading for Publication",
    track: "academic",
    trackLabel: "Academic & Research",
    isFeatured: false,
    pricePKR: 4500,
    priceUSD: 30,
    duration: "3 Weeks (6 Sessions)",
    schedule: "Mon & Wed | 6:00 PM PKT",
    mentor: "Claire Sterling, Chief Editor",
    summary: "Transform raw drafts into publishable manuscripts: developmental editing, line-editing for rhythm, and copyediting mechanics.",
    modules: [
      { week: "Week 1", topic: "Macro Editing: Structural Logic & Pacing" }
    ]
  },
  {
    id: "ws-14",
    title: "How to Get Published",
    track: "creative",
    trackLabel: "Publishing & Career",
    isFeatured: true,
    pricePKR: 4000,
    priceUSD: 25,
    duration: "2 Weeks (4 Intensive Masterclasses)",
    schedule: "Sat & Sun | 5:00 PM - 7:30 PM PKT",
    mentor: "Evelyn Croft & Literary Agent Guests",
    enrolledCount: 520,
    rating: 4.98,
    summary: "Demystifying the literary market: pitching agents, writing irresistible query letters, proposal synopses, and book contracts.",
    modules: [
      { week: "Week 1", topic: "Query Letters That Hook Agents & Submission Guidelines" },
      { week: "Week 2", topic: "Book Proposals, Advances & Author Contracts" }
    ]
  },
  {
    id: "ws-15",
    title: "All You Need to Know About Publishing",
    track: "creative",
    trackLabel: "Publishing & Career",
    isFeatured: false,
    pricePKR: 4500,
    priceUSD: 30,
    duration: "3 Weeks (6 Sessions)",
    schedule: "Wed & Sat | 7:00 PM PKT",
    mentor: "Tariq Mansoor, Acquisitions Lead",
    summary: "Comprehensive breakdown of Traditional vs. Indie vs. Academic publishing, ISBNs, copyright laws, and book marketing in 2026.",
    modules: [
      { week: "Week 1", topic: "Publishing Houses vs Self-Publishing" }
    ]
  },
  {
    id: "ws-16",
    title: "Poetry: Haikus and Sonnets",
    track: "creative",
    trackLabel: "Creative Writing",
    isFeatured: false,
    pricePKR: 3500,
    priceUSD: 25,
    duration: "2 Weeks (4 Sessions)",
    schedule: "Sat & Sun | 4:00 PM PKT",
    mentor: "Prof. Kenneth Rowe",
    summary: "Master poetic constraint. Contrast Japanese Haiku and Tanka with formal Shakespearean and Petrarchan Sonnets.",
    modules: [
      { week: "Week 1", topic: "The Zen of 17 Syllables: Kigo & Kireji" }
    ]
  },
  {
    id: "ws-17",
    title: "Scriptwriting & Screenplay Development",
    track: "creative",
    trackLabel: "Creative Writing",
    isFeatured: false,
    pricePKR: 5500,
    priceUSD: 35,
    duration: "4 Weeks (8 Sessions)",
    schedule: "Mon & Thu | 7:00 PM PKT",
    mentor: "Hamza R., Screenwriter",
    summary: "From logline to final draft: scene beats, cinematic dialogue, character bibles, and industry standard screenplay formatting.",
    modules: [
      { week: "Week 1", topic: "Logline, Hook & 3-Act Structure" }
    ]
  },
  {
    id: "ws-18",
    title: "Qualitative Research for Linguistics Students",
    track: "academic",
    trackLabel: "Academic & Research",
    isFeatured: true,
    pricePKR: 5000,
    priceUSD: 35,
    duration: "4 Weeks (8 Live Sessions)",
    schedule: "Tue & Fri | 6:00 PM - 8:00 PM PKT",
    mentor: "Dr. Shireen Bukhari (Assoc. Prof)",
    enrolledCount: 310,
    rating: 4.92,
    summary: "Master qualitative inquiry in applied linguistics: Discourse Analysis, Grounded Theory, Interview Transcripts, and Thematic Coding.",
    modules: [
      { week: "Week 1", topic: "Epistemological Foundations & CDA" },
      { week: "Week 2", topic: "Thematic Coding Frameworks & Qualitative Rigor" }
    ]
  },
  {
    id: "ws-19",
    title: "Quantitative Research Methodologies",
    track: "academic",
    trackLabel: "Academic & Research",
    isFeatured: false,
    pricePKR: 5500,
    priceUSD: 35,
    duration: "4 Weeks (8 Sessions)",
    schedule: "Wed & Sat | 7:00 PM PKT",
    mentor: "Dr. Adeel Chaudhry",
    summary: "Formulate hypotheses, survey instruments, sample size calculations, descriptive/inferential statistics, and SPSS data reporting.",
    modules: [
      { week: "Week 1", topic: "Variables, Sampling & Questionnaire Reliability" }
    ]
  },
  {
    id: "ws-20",
    title: "Visual Methodology & Multimodal Prose",
    track: "assistive",
    trackLabel: "Specialized Methods",
    isFeatured: true,
    pricePKR: 4500,
    priceUSD: 30,
    duration: "3 Weeks (6 Live Sessions)",
    schedule: "Mon & Thu | 6:00 PM - 8:00 PM PKT",
    mentor: "Prof. N. Haris, Visual Culture Chair",
    enrolledCount: 190,
    rating: 4.87,
    summary: "Researching visual materials: semiotics, film analysis, photo-voice methods, and multimodal academic writing for diverse learners.",
    modules: [
      { week: "Week 1", topic: "Semiotics and Visual Analysis Grammar" }
    ]
  },
  {
    id: "ws-21",
    title: "Transcultural Studies",
    track: "academic",
    trackLabel: "Literary Studies",
    isFeatured: false,
    pricePKR: 4500,
    priceUSD: 30,
    duration: "3 Weeks (6 Sessions)",
    schedule: "Fri & Sun | 8:00 PM PKT",
    mentor: "Dr. Farzana Mir",
    summary: "Explore diaspora, migration, hybridity, borderlands, and cross-cultural narratives that transcend national borders.",
    modules: [
      { week: "Week 1", topic: "Beyond the Nation-State: Defining Transcultural" }
    ]
  }
];

// Lecture Series Database (11 items)
const allLectures = [
  { id: "lec-1", title: "South Asian Literature", speaker: "Dr. Tariq Rahman", track: "lecture", duration: "2-Part Masterclass", desc: "Post-colonial inheritance, Partition traumas, magical realism, and contemporary South Asian English prose." },
  { id: "lec-2", title: "Gender Studies & Feminist Criticism", speaker: "Prof. Nida Kirmani", track: "lecture", duration: "3-Part Masterclass", desc: "Gynocriticism, queer theory, intersectionality in Third World contexts, and subverting patriarchal canons." },
  { id: "lec-3", title: "Asian Studies: Canons & Counter-Canons", speaker: "Dr. Chen Wei & Dr. Farooq", track: "lecture", duration: "2-Part Masterclass", desc: "East-West literary dialogues, Orientalism revisited, and Silk Route literary heritage." },
  { id: "lec-4", title: "American Literature: Modernism to Postmodernism", speaker: "Prof. Arthur Vance", track: "lecture", duration: "2-Part Masterclass", desc: "The American Dream interrogated, the Harlem Renaissance, Beat Generation, and fragmented narratives." },
  { id: "lec-5", title: "Literary Theory & Critical Perspectives", speaker: "Prof. Evelyn Croft & Academic Panel", track: "lecture", duration: "4-Part Series", desc: "Structuralism, Deconstruction, Post-colonialism, Psychoanalytic criticism, and Marxist cultural analysis." },
  { id: "lec-6", title: "Cyberecology and Literature", speaker: "Dr. S. K. Douglas", track: "lecture", duration: "2-Part Masterclass", desc: "Digital nature, posthuman landscapes, climate simulation, and literature in the algorithmic age." },
  { id: "lec-7", title: "African Literature: Decolonizing the Mind", speaker: "Dr. Kwesi Mensah", track: "lecture", duration: "2-Part Masterclass", desc: "Achebe, Soyinka, Adichie; oral storytelling traditions, colonial resistance, and indigenous languages." },
  { id: "lec-8", title: "British Poetry: Romantics to Modernists", speaker: "Prof. Kenneth Rowe", track: "lecture", duration: "3-Part Masterclass", desc: "Keats, Wordsworth, Blake, Yeats, T.S. Eliot; lyrical sublimity and modern poetic despair." },
  { id: "lec-9", title: "Pakistani Literature in English", speaker: "Dr. Muneeza Shamsie", track: "lecture", duration: "2-Part Masterclass", desc: "From Ahmed Ali to Mohsin Hamid, Kamila Shamsie, and modern anglophone voices exploring homeland identity." },
  { id: "lec-10", title: "Cyber Theory and Literature", speaker: "Dr. K. Rahim", track: "lecture", duration: "2-Part Masterclass", desc: "Cyborg manifestos, hyperreality, artificial intelligence and authorship, and hypertextual literature." },
  { id: "lec-11", title: "Partition Literature: Memory, Scars & Silence", speaker: "Prof. Ayesha Jalal Colloquium", track: "lecture", duration: "3-Part Masterclass", desc: "Manto, Intizar Husain, Bhisham Sahni; border violence, displacement archives, and the poetics of mourning." }
];

// Dedicated E-Library Repository (Aligned across all 21 Workshops & 11 Lectures)
const eLibraryData = [
  // Workshop Topics (21)
  { id: "lib-1", topicType: "Workshop Resource", relatedTo: "1. Academic Writing", category: "academic", title: "Academic Writing: Style, Citation & Argumentation Guidebook", pages: "148 Pages", format: "PDF & Annotated Notes", desc: "Complete guide on thesis construction, literature synthesis, avoiding plagiarism, and APA/MLA formatting." },
  { id: "lib-2", topicType: "Workshop Resource", relatedTo: "2. How to Write a Research Proposal", category: "academic", title: "The Research Proposal Defense Blueprint & 15 Approved Samples", pages: "120 Pages", format: "PDF + Editable Word Templates", desc: "Methodology matrices, theoretical frameworks, ethics review protocols, and defense presentation templates." },
  { id: "lib-3", topicType: "Workshop Resource", relatedTo: "3. Creative Writing", category: "creative", title: "The Architecture of Fiction & Creative Non-Fiction", pages: "165 Pages", format: "Digital Handbook", desc: "Character interiority, sensory narrative worldbuilding, pacing, 7 plot arcs, and personal lyricism." },
  { id: "lib-4", topicType: "Workshop Resource", relatedTo: "4. Digital Humanities", category: "academic", title: "Digital Humanities: Computational Text-Mining & Distant Reading", pages: "110 Pages", format: "Open-Access Research Pack", desc: "Corpus linguistics protocols, Voyant Tools walkthroughs, and humanities data visualization frameworks." },
  { id: "lib-5", topicType: "Workshop Resource", relatedTo: "5. Ecocriticism", category: "academic", title: "Ecocriticism & Planetary Literature: Critical Anthology", pages: "135 Pages", format: "Annotated Reader", desc: "First/Second wave ecocriticism, Anthropocene narratives, Climate Fiction (Cli-Fi), and postcolonial eco-justice." },
  { id: "lib-6", topicType: "Workshop Resource", relatedTo: "6. Assistive Writing for Special Students", category: "assistive", title: "Assistive Writing Technologies & Inclusive Pedagogy Toolkit", pages: "95 Pages", format: "Accessible PDF & Audio Notes", desc: "Mind-mapping, speech-to-text workflows, and cognitive structuring aids for neurodivergent learners." },
  { id: "lib-7", topicType: "Workshop Resource", relatedTo: "7. Essay Writing for IELTS", category: "testprep", title: "IELTS Band 8.5+ Task 2 Argumentative Essay Corpus", pages: "92 Pages", format: "Corpus with Examiner Rubric", desc: "40 Real high-scoring essays with examiner commentary, lexical substitutions, and grammar structures." },
  { id: "lib-8", topicType: "Workshop Resource", relatedTo: "8. English Proficiency Tests", category: "testprep", title: "Standardized Verbal Reasoning: SAT, TOEFL & GRE Strategies", pages: "140 Pages", format: "Handbook & Drills", desc: "Evidence-based reading comprehension, grammar mechanics, analytical issue task templates." },
  { id: "lib-9", topicType: "Workshop Resource", relatedTo: "9. Speaking Skills for Standardized Tests", category: "testprep", title: "Standardized Speaking Fluency & Phonetic Drills Compendium", pages: "75 Pages + Audio Clips", format: "Interactive Guide", desc: "IELTS Part 1/2/3 PREP frameworks, idiom mastery, rhythm, and spontaneous elaboration techniques." },
  { id: "lib-10", topicType: "Workshop Resource", relatedTo: "10. Translation of Poetry", category: "creative", title: "The Art of Poetic Transposition: Translating Eastern Verse", pages: "115 Pages", format: "Bilingual Critical Anthology", desc: "Preserving meter, ghazal radif/qafia, and cultural nuance between Urdu, Persian, and English." },
  { id: "lib-11", topicType: "Workshop Resource", relatedTo: "11. Poetry", category: "creative", title: "Contemporary Poetics: Meter, Cadence & Metaphor Craft", pages: "130 Pages", format: "Poetry Workshop Reader", desc: "Assonance, line breaks, white space poetics, sonic textures, and literary journal submission guides." },
  { id: "lib-12", topicType: "Workshop Resource", relatedTo: "12. Drama/Scriptwriting", category: "creative", title: "Dramatic Tension & Scene Craft: Playwriting Handbook", pages: "125 Pages", format: "Stagecraft Guide", desc: "Monologue construction, subtext, dramatic incidents, and 3-act theatrical staging rules." },
  { id: "lib-13", topicType: "Workshop Resource", relatedTo: "13. Editing", category: "academic", title: "The Manuscript Editor's Companion: Structural to Proofreading", pages: "105 Pages", format: "Style & Manual", desc: "Macro developmental editing checklists, rhythm line-editing, and standard proofreading markups." },
  { id: "lib-14", topicType: "Workshop Resource", relatedTo: "14. How to Get Published", category: "creative", title: "Literary Agent Query Letters & Book Proposal Dossier", pages: "88 Pages", format: "Industry Dossier", desc: "Real query letters that landed 6-figure book deals, author pitches, and pitch deck formulas." },
  { id: "lib-15", topicType: "Workshop Resource", relatedTo: "15. All You Need to Know About Publishing", category: "creative", title: "The 2026 Publishing Ecosystem: Traditional vs. Indie Publishing", pages: "110 Pages", format: "Industry Whitepaper", desc: "Copyright law, ISBN registration, distribution networks (Amazon, IngramSpark), and royalties." },
  { id: "lib-16", topicType: "Workshop Resource", relatedTo: "16. Poetry Haikus and Sonnets", category: "creative", title: "Prosodic Forms: The Zen of Haiku & The 14-Line Sonnet", pages: "80 Pages", format: "Verse Handbook", desc: "Kigo, Kireji, iambic pentameter, Shakespearean voltas, and modern formal variations." },
  { id: "lib-17", topicType: "Workshop Resource", relatedTo: "17. Scriptwriting", category: "creative", title: "Cinematic Screenwriting: Scene Beats, Character Bibles & Format", pages: "150 Pages", format: "Screenwriter's Bible", desc: "Hollywood industry standard Final Draft formatting, midpoint reversals, and film pitch bibles." },
  { id: "lib-18", topicType: "Workshop Resource", relatedTo: "18. Qualitative Research for Linguistics", category: "academic", title: "Qualitative Linguistics: Discourse Analysis & NVivo Coding Manual", pages: "160 Pages", format: "Methodology Guide", desc: "Critical Discourse Analysis (CDA), thematic coding frameworks, and qualitative interview analysis." },
  { id: "lib-19", topicType: "Workshop Resource", relatedTo: "19. Quantitative Research", category: "academic", title: "Quantitative Research Design, Statistics & SPSS Walkthroughs", pages: "175 Pages", format: "Statistical Manual", desc: "Sampling design, Cronbach's alpha, ANOVA, regression analysis, and reporting tables in APA 7th." },
  { id: "lib-20", topicType: "Workshop Resource", relatedTo: "20. Visual Methodology", category: "assistive", title: "Visual Methodology & Multimodal Semiotic Analysis", pages: "115 Pages", format: "Visual Research Reader", desc: "Photo-voice ethnography, film semiotics, iconography, and multimodal scholarly composition." },
  { id: "lib-21", topicType: "Workshop Resource", relatedTo: "21. Transcultural Studies", category: "academic", title: "Transculturality & Borderlands: Selected Critical Readings", pages: "140 Pages", format: "Critical Reader", desc: "Diaspora studies, hybridity, migration archives, and comparative transcultural frameworks." },

  // Lecture Topics (11)
  { id: "lib-22", topicType: "Lecture Series Archive", relatedTo: "1. South Asian Literature", category: "lecture", title: "South Asian English Prose: Post-Colonial Canons & Counter-Canons", pages: "190 Pages", format: "Colloquium Reader", desc: "Magical realism, partition memories, subcontinental anglophone prose, and diaspora identity." },
  { id: "lib-23", topicType: "Lecture Series Archive", relatedTo: "2. Gender Studies", category: "lecture", title: "Feminist Literary Criticism & Queer Theory: Selected Texts", pages: "185 Pages", format: "Seminar Pack", desc: "Gynocriticism, Third World intersectionality, subverting patriarchal canons, and body politics." },
  { id: "lib-24", topicType: "Lecture Series Archive", relatedTo: "3. Asian Studies", category: "lecture", title: "Asian Literary Heritage & The Re-Imagining of the Silk Route", pages: "155 Pages", format: "Comparative Reader", desc: "East-West literary dialogues, Orientalism interrogated, and indigenous Asian aesthetics." },
  { id: "lib-25", topicType: "Lecture Series Archive", relatedTo: "4. American Literature", category: "lecture", title: "The American Literary Canon: Modernist Ruptures & Postmodern Irony", pages: "170 Pages", format: "Lecture Archive", desc: "The Harlem Renaissance, Beat generation, post-war paranoia, and fragmented postmodern prose." },
  { id: "lib-26", topicType: "Lecture Series Archive", relatedTo: "5. Literary Theory", category: "lecture", title: "Seminal Texts in Critical Literary Theory (From Saussure to Spivak)", pages: "210 Pages", format: "Course Compendium", desc: "Structuralism, Deconstruction, Marxist cultural analysis, and post-colonial epistemology." },
  { id: "lib-27", topicType: "Lecture Series Archive", relatedTo: "6. Cyberecology and Literature", category: "lecture", title: "Cyberecology: Environmental Simulation & Posthuman Landscapes", pages: "130 Pages", format: "Special Issue Reader", desc: "Literature in algorithmic worlds, digital ecologies, Anthropocene simulations, and ecopoetics." },
  { id: "lib-28", topicType: "Lecture Series Archive", relatedTo: "7. African Literature", category: "lecture", title: "Decolonizing African Letters: Achebe, Soyinka & Contemporary Voices", pages: "165 Pages", format: "Colloquium Reader", desc: "Oral performance traditions, language debates, anti-colonial resistance, and afro-futurism." },
  { id: "lib-29", topicType: "Lecture Series Archive", relatedTo: "8. British Poetry", category: "lecture", title: "British Poetry Through Time: The Romantics to High Modernism", pages: "175 Pages", format: "Annotated Anthology", desc: "Keats, Blake, Wordsworth, Yeats, and T.S. Eliot with line-by-line critical glosses." },
  { id: "lib-30", topicType: "Lecture Series Archive", relatedTo: "9. Pakistani Literature", category: "lecture", title: "Pakistani Anglophone Literature Archive (1947 to Present)", pages: "180 Pages", format: "Historical Reader", desc: "From Ahmed Ali to Mohsin Hamid and modern diaspora writers exploring homeland identity." },
  { id: "lib-31", topicType: "Lecture Series Archive", relatedTo: "10. Cyber Theory and Literature", category: "lecture", title: "The Cyborg Condition & AI Authorship: Contemporary Critical Essays", pages: "145 Pages", format: "Critical Anthology", desc: "Haraway's cyborg manifesto, hyperreality, generative textuality, and the future of human authorship." },
  { id: "lib-32", topicType: "Lecture Series Archive", relatedTo: "11. Partition Literature", category: "lecture", title: "Partition Archives: Scars, Displacement & The Poetics of Mourning", pages: "200 Pages", format: "Commemorative Archive", desc: "Manto, Intizar Husain, Bhisham Sahni; border violence, memory studies, and testimonial literature." }
];

// App State
let currentCurrency = "PKR";
let activeTrack = "academic";
let activeLibraryCategory = "all";
let librarySearchQuery = "";
let selectedCourse = null;

// Initialization
document.addEventListener("DOMContentLoaded", () => {
  renderCuratedTrackWorkshops();
  renderELibrarySection();
  setupEventListeners();
  setupPortalSimulatorTabs();
  renderModalCatalog();
  initScrollProgressAndHeaderEffect();
  initMobileDrawer();
  init3DTiltEffect();
  initAnimatedCounters();
});

function setupEventListeners() {
  // Currency buttons
  document.querySelectorAll(".currency-btn").forEach(btn => {
    btn.addEventListener("click", (e) => {
      document.querySelectorAll(".currency-btn").forEach(b => b.classList.remove("active"));
      const curr = e.target.getAttribute("data-currency");
      document.querySelectorAll(`.currency-btn[data-currency="${curr}"]`).forEach(b => b.classList.add("active"));
      currentCurrency = curr;
      renderCuratedTrackWorkshops();
      renderModalCatalog();
    });
  });

  // Curated Track Tabs
  document.querySelectorAll(".track-tab-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      document.querySelectorAll(".track-tab-btn").forEach(b => b.classList.remove("active"));
      btn.classList.add("active");
      activeTrack = btn.getAttribute("data-track");
      renderCuratedTrackWorkshops();
    });
  });

  // E-Library Category Filter Tabs
  document.querySelectorAll(".lib-tab-btn").forEach(btn => {
    btn.addEventListener("click", () => {
      document.querySelectorAll(".lib-tab-btn").forEach(b => b.classList.remove("active"));
      btn.classList.add("active");
      activeLibraryCategory = btn.getAttribute("data-lib-cat");
      renderELibrarySection();
    });
  });

  // E-Library Live Search Input
  const libSearchInput = document.getElementById("eLibrarySearchInput");
  if (libSearchInput) {
    libSearchInput.addEventListener("input", (e) => {
      librarySearchQuery = e.target.value.toLowerCase().trim();
      renderELibrarySection();
    });
  }

  // Modal Catalog Search
  const searchInput = document.getElementById("fullCatalogSearch");
  if (searchInput) {
    searchInput.addEventListener("input", (e) => {
      renderModalCatalog(e.target.value.toLowerCase().trim());
    });
  }

  // Enrollment Form
  const enrollForm = document.getElementById("enrollmentForm");
  if (enrollForm) {
    enrollForm.addEventListener("submit", handleEnrollmentSubmit);
  }

  // Payment Pill selection
  document.querySelectorAll(".payment-pill").forEach(pill => {
    pill.addEventListener("click", () => {
      document.querySelectorAll(".payment-pill").forEach(p => p.classList.remove("selected"));
      pill.classList.add("selected");
    });
  });
}

// Render E-Library Section (Covering All 21 Workshops & 11 Lectures)
function renderELibrarySection() {
  const container = document.getElementById("eLibraryGrid");
  const countBadge = document.getElementById("eLibraryCountBadge");
  if (!container) return;

  const filtered = eLibraryData.filter(item => {
    const matchesCategory = activeLibraryCategory === "all" || item.category === activeLibraryCategory;
    const matchesSearch = !librarySearchQuery ||
      item.title.toLowerCase().includes(librarySearchQuery) ||
      item.desc.toLowerCase().includes(librarySearchQuery) ||
      item.relatedTo.toLowerCase().includes(librarySearchQuery);
    return matchesCategory && matchesSearch;
  });

  if (countBadge) {
    countBadge.textContent = `${filtered.length} of ${eLibraryData.length} Research Packs`;
  }

  if (filtered.length === 0) {
    container.innerHTML = `
      <div style="grid-column: 1 / -1; text-align: center; padding: 36px 20px; background: #fff; border-radius: 12px; border: 1px solid var(--border-subtle);">
        <p style="color: var(--text-muted); margin-bottom: 10px;">No library resources found matching "${librarySearchQuery}"</p>
        <button class="btn btn-secondary" onclick="resetLibraryFilters()">Reset Search</button>
      </div>
    `;
    return;
  }

  container.innerHTML = filtered.map(item => `
    <div class="library-resource-card card-3d-interactive">
      <div class="library-card-top">
        <div class="lib-tag-row">
          <span class="lib-topic-badge">${item.relatedTo}</span>
          <span class="lib-format-badge">${item.format}</span>
        </div>
        <h4>${item.title}</h4>
        <p class="lib-desc">${item.desc}</p>
      </div>
      <div class="library-card-footer">
        <span class="lib-page-spec"><svg class="academic-icon-svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="margin-right: 4px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg> ${item.pages}</span>
        <div style="display: flex; gap: 6px;">
          <button class="btn-lib-preview" onclick="openLibraryPreviewModal('${item.id}')">Abstract</button>
          <button class="btn-lib-access" onclick="showToast('Access Granted to Enrolled Scholars: ${item.title.substring(0, 24)}...')">Access</button>
        </div>
      </div>
    </div>
  `).join("");

  init3DTiltEffect();
}

function openLibraryPreviewModal(id) {
  const item = eLibraryData.find(lib => lib.id === id);
  if (!item) return;

  const modal = document.getElementById("libraryPreviewModal");
  const titleEl = document.getElementById("libModalTitle");
  const bodyEl = document.getElementById("libModalBody");

  titleEl.textContent = item.title;
  bodyEl.innerHTML = `
    <div style="background: var(--bg-card-subtle); padding: 16px; border-radius: 10px; margin-bottom: 16px; border: 1px solid var(--border-subtle);">
      <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
        <span class="track-chip">${item.relatedTo}</span>
        <strong style="color: var(--icrw-navy); font-size: 0.85rem;"><svg class="academic-icon-svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="margin-right: 4px;"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg> ${item.pages}</strong>
      </div>
      <p style="font-size: 0.88rem; color: var(--text-body); margin-top: 8px;">${item.desc}</p>
      <div style="margin-top: 8px; font-size: 0.78rem; color: var(--text-muted);">
        <strong>Format:</strong> ${item.format} • <strong>Access:</strong> Digital Reader &amp; Annotated PDF
      </div>
    </div>
    <h5 style="font-family: var(--font-serif); font-size: 1.05rem; color: var(--icrw-navy); margin-bottom: 8px;">Table of Contents &amp; Included Materials:</h5>
    <ul style="font-size: 0.82rem; color: var(--text-muted); line-height: 1.7; padding-left: 20px;">
      <li>Chapter 1: Conceptual Foundations &amp; Theoretical Frameworks</li>
      <li>Chapter 2: Step-by-Step Writing / Research Blueprints</li>
      <li>Chapter 3: Peer-Reviewed Case Studies &amp; Model Corpora</li>
      <li>Chapter 4: Submission Formatting Checklists &amp; Style Rubrics</li>
    </ul>
  `;

  modal.classList.add("open");
}

function closeLibraryPreviewModal() {
  const modal = document.getElementById("libraryPreviewModal");
  if (modal) modal.classList.remove("open");
}

function resetLibraryFilters() {
  activeLibraryCategory = "all";
  librarySearchQuery = "";
  const input = document.getElementById("eLibrarySearchInput");
  if (input) input.value = "";
  document.querySelectorAll(".lib-tab-btn").forEach(b => {
    b.classList.toggle("active", b.getAttribute("data-lib-cat") === "all");
  });
  renderELibrarySection();
}

// Render the 3 Focused Spotlight Cards for the selected track
function renderCuratedTrackWorkshops() {
  const container = document.getElementById("curatedWorkshopsGrid");
  if (!container) return;

  // If track is 'lecture', render the top 3 lectures
  if (activeTrack === "lecture") {
    const featuredLecs = allLectures.slice(0, 3);
    container.innerHTML = featuredLecs.map(lec => `
      <div class="featured-card">
        <div>
          <div class="card-badge-row">
            <span class="track-chip">Scholarly Lecture Series</span>
            <span class="live-badge"><span class="pulse"></span> Live Interactive</span>
          </div>
          <h3>${lec.title}</h3>
          <p class="summary">${lec.desc}</p>
        </div>
        <div>
          <div class="card-specs-list">
            <div class="spec-item">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              <span>${lec.duration}</span>
            </div>
            <div class="spec-item">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
              <span>${lec.speaker}</span>
            </div>
          </div>
          <div class="card-action-footer">
            <div class="fee-col">
              <span class="fee-label">Format</span>
              <span class="fee-amount" style="font-size: 1.05rem;">Colloquium</span>
            </div>
            <div class="card-btns">
              <button class="btn-card-syllabus" onclick="openLectureModal('${lec.id}')">Synopsis</button>
              <button class="btn-card-enroll" onclick="openEnrollModal('${lec.id}', true)">Register</button>
            </div>
          </div>
        </div>
      </div>
    `).join("");
    return;
  }

  // Otherwise, filter workshops by the active track and take top 3
  const trackCourses = allWorkshops.filter(w => w.track === activeTrack);
  const spotlightCourses = trackCourses.length > 3 ? trackCourses.slice(0, 3) : trackCourses;

  container.innerHTML = spotlightCourses.map(ws => {
    const price = currentCurrency === "PKR" ? `Rs. ${ws.pricePKR.toLocaleString()}` : `$${ws.priceUSD}`;

    return `
      <div class="featured-card">
        <div>
          <div class="card-badge-row">
            <span class="track-chip">${ws.trackLabel}</span>
            <span class="live-badge"><span class="pulse"></span> Live Online</span>
          </div>
          <h3>${ws.title}</h3>
          <p class="summary">${ws.summary}</p>
        </div>
        <div>
          <div class="card-specs-list">
            <div class="spec-item">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              <span>${ws.duration}</span>
            </div>
            <div class="spec-item">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
              <span>${ws.mentor.split('(')[0].trim()}</span>
            </div>
          </div>
          <div class="card-action-footer">
            <div class="fee-col">
              <span class="fee-label">Enrollment Status</span>
              <span class="fee-amount text-success"><i class="fa-solid fa-circle-check me-1"></i> Admissions Open</span>
            </div>
            <div class="card-btns">
              <button class="btn-card-syllabus" onclick="openWorkshopDetails('${ws.id}')">Syllabus</button>
              <button class="btn-card-enroll" onclick="openEnrollModal('${ws.id}')">Enroll Now</button>
            </div>
          </div>
        </div>
      </div>
    `;
  }).join("");

  // Re-initialize 3D tilt tracking for newly rendered spotlight cards
  init3DTiltEffect();
}

// Student Portal On-Page Simulator Tabs
function setupPortalSimulatorTabs() {
  document.querySelectorAll(".portal-dev-tab").forEach(tab => {
    tab.addEventListener("click", () => {
      document.querySelectorAll(".portal-dev-tab").forEach(t => t.classList.remove("active"));
      tab.classList.add("active");

      const viewId = tab.getAttribute("data-view");
      document.querySelectorAll(".portal-view-panel").forEach(p => p.classList.remove("active"));
      const targetPanel = document.getElementById(`panel-${viewId}`);
      if (targetPanel) targetPanel.classList.add("active");
    });
  });
}

// Render Full 21 Workshops + 11 Lectures in Modal
function renderModalCatalog(query = "") {
  const container = document.getElementById("modalCatalogRows");
  if (!container) return;

  const combined = [
    ...allWorkshops.map(w => ({ ...w, type: "Workshop" })),
    ...allLectures.map(l => ({ ...l, type: "Lecture", pricePKR: 3500, priceUSD: 25, summary: l.desc, mentor: l.speaker, trackLabel: "Scholarly Lecture" }))
  ];

  const filtered = combined.filter(item => {
    if (!query) return true;
    return item.title.toLowerCase().includes(query) ||
           item.summary.toLowerCase().includes(query) ||
           item.mentor.toLowerCase().includes(query);
  });

  const countBadge = document.getElementById("modalCatalogCount");
  if (countBadge) countBadge.textContent = `${filtered.length} Programs Available`;

  container.innerHTML = filtered.map(item => {
    const price = currentCurrency === "PKR" ? `Rs. ${item.pricePKR.toLocaleString()}` : `$${item.priceUSD}`;
    return `
      <div class="catalog-list-row">
        <div class="catalog-list-info">
          <div style="display: flex; gap: 8px; align-items: center; margin-bottom: 2px;">
            <span style="font-size: 0.7rem; font-weight: 700; text-transform: uppercase; color: var(--icrw-sage-dark);">${item.trackLabel}</span>
            <span style="font-size: 0.7rem; color: #64748b;">• ${item.duration}</span>
          </div>
          <h5>${item.title}</h5>
          <p>${item.mentor} • <span class="text-success"><i class="fa-solid fa-circle-check me-1"></i> Admissions Open</span></p>
        </div>
        <div>
          <button class="btn-card-enroll" onclick="closeFullCatalogModal(); openEnrollModal('${item.id}', ${item.type === 'Lecture'})">Enroll</button>
        </div>
      </div>
    `;
  }).join("");
}

// Modal Handlers
function openWorkshopDetails(id) {
  const ws = allWorkshops.find(w => w.id === id);
  if (!ws) return;
  selectedCourse = ws;

  const modal = document.getElementById("workshopDetailModal");
  const titleEl = document.getElementById("modalCourseTitle");
  const bodyEl = document.getElementById("modalCourseBody");
  const price = currentCurrency === "PKR" ? `Rs. ${ws.pricePKR.toLocaleString()}` : `$${ws.priceUSD}`;

  titleEl.textContent = ws.title;
  bodyEl.innerHTML = `
    <div style="background: var(--bg-card-subtle); padding: 16px; border-radius: 10px; margin-bottom: 18px; border: 1px solid var(--border-subtle);">
      <div style="display: flex; justify-content: space-between; margin-bottom: 8px;">
        <span class="track-chip">${ws.trackLabel}</span>
        <span class="badge bg-success" style="font-size: 0.8rem; padding: 5px 12px;">Admissions Open</span>
      </div>
      <p style="font-size: 0.88rem; color: var(--text-body); margin-bottom: 8px;">${ws.summary}</p>
      <div style="font-size: 0.8rem; color: var(--text-muted); display: grid; grid-template-columns: 1fr 1fr; gap: 6px;">
        <div><strong>Duration:</strong> ${ws.duration}</div>
        <div><strong>Schedule:</strong> ${ws.schedule}</div>
        <div><strong>Lead Mentor:</strong> ${ws.mentor}</div>
        <div><strong>Certificate:</strong> Included</div>
      </div>
    </div>

    <h4 style="font-family: var(--font-serif); font-size: 1.1rem; color: var(--icrw-navy); margin-bottom: 10px;">Curriculum Outline</h4>
    <div style="display: flex; flex-direction: column; gap: 8px;">
      ${ws.modules.map(m => `
        <div style="background: #fff; border: 1px solid var(--border-subtle); padding: 10px 14px; border-radius: 8px;">
          <strong style="color: var(--icrw-navy); font-size: 0.88rem;">${m.week}: ${m.topic}</strong>
          <p style="font-size: 0.78rem; color: var(--text-muted); margin-top: 2px;">Interactive seminar with real-time exercises &amp; peer feedback.</p>
        </div>
      `).join("")}
    </div>
  `;

  modal.classList.add("open");
}

function closeDetailModal() {
  const modal = document.getElementById("workshopDetailModal");
  if (modal) modal.classList.remove("open");
}

function openLectureModal(id) {
  const lec = allLectures.find(l => l.id === id);
  if (!lec) return;
  selectedCourse = { ...lec, pricePKR: 3500, priceUSD: 25 };

  const modal = document.getElementById("workshopDetailModal");
  const titleEl = document.getElementById("modalCourseTitle");
  const bodyEl = document.getElementById("modalCourseBody");

  titleEl.textContent = lec.title;
  bodyEl.innerHTML = `
    <div style="background: var(--bg-card-subtle); padding: 16px; border-radius: 10px; margin-bottom: 18px; border: 1px solid var(--border-subtle);">
      <span class="track-chip">Scholarly Lecture Series</span>
      <h4 style="font-family: var(--font-serif); font-size: 1.15rem; color: var(--icrw-navy); margin-top: 8px;">${lec.title}</h4>
      <p style="font-size: 0.88rem; color: var(--text-body); margin: 8px 0;">${lec.desc}</p>
      <div style="font-size: 0.8rem; color: var(--text-muted);">
        <div><strong>Speaker:</strong> ${lec.speaker}</div>
        <div><strong>Format:</strong> ${lec.duration}</div>
      </div>
    </div>
  `;

  modal.classList.add("open");
}

function openEnrollModal(id, isLecture = false) {
  const item = isLecture ? allLectures.find(l => l.id === id) : allWorkshops.find(w => w.id === id);
  if (!item) return;
  selectedCourse = item;

  const modal = document.getElementById("enrollModal");
  const titleEl = document.getElementById("enrollModalCourseTitle");
  const feeEl = document.getElementById("enrollModalFee");

  const pricePKR = item.pricePKR || 3500;
  const priceUSD = item.priceUSD || 25;
  const price = currentCurrency === "PKR" ? `Rs. ${pricePKR.toLocaleString()}` : `$${priceUSD}`;

  titleEl.textContent = item.title;
  feeEl.textContent = `${item.duration} • Live Zoom Interactive`;

  modal.classList.add("open");
}

function closeEnrollModal() {
  const modal = document.getElementById("enrollModal");
  if (modal) modal.classList.remove("open");
}

function openFullCatalogModal() {
  const modal = document.getElementById("fullCatalogModal");
  if (modal) modal.classList.add("open");
}

function closeFullCatalogModal() {
  const modal = document.getElementById("fullCatalogModal");
  if (modal) modal.classList.remove("open");
}

function openDisclaimerModal() {
  const modal = document.getElementById("disclaimerModal");
  if (modal) {
    modal.classList.add("open");
    modal.setAttribute("aria-hidden", "false");
  }
}

function closeDisclaimerModal() {
  const modal = document.getElementById("disclaimerModal");
  if (modal) {
    modal.classList.remove("open");
    modal.setAttribute("aria-hidden", "true");
  }
}

function handleEnrollmentSubmit(e) {
  e.preventDefault();
  const name = document.getElementById("studentName").value;
  closeEnrollModal();
  showToast(`Congratulations ${name}! You are registered. Portal credentials sent to your email.`);

  // Scroll smoothly to the on-page portal simulator
  const portalSection = document.getElementById("portal-simulator");
  if (portalSection) {
    portalSection.scrollIntoView({ behavior: "smooth" });
  }
}

function showToast(message) {
  const container = document.getElementById("toastContainer");
  if (!container) return;

  const toast = document.createElement("div");
  toast.className = "toast";
  toast.innerHTML = `
    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
    <span>${message}</span>
  `;
  container.appendChild(toast);

  setTimeout(() => {
    toast.style.opacity = "0";
    toast.style.transform = "translateX(100%)";
    toast.style.transition = "all 0.3s ease";
    setTimeout(() => toast.remove(), 300);
  }, 4000);
}

/* ==========================================================================
   INTERACTIVE 3D MOUSE TILT & GLOSS REFLECTION
   ========================================================================== */
function init3DTiltEffect() {
  const cards = document.querySelectorAll('.card-3d-interactive, .featured-card, .workflow-card, #heroVisualCard, #portalDeviceFrame, .cert-mockup-wrap');

  cards.forEach(card => {
    if (card.dataset.tiltInitialized) return;
    card.dataset.tiltInitialized = "true";

    card.addEventListener('mousemove', (e) => {
      const rect = card.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const y = e.clientY - rect.top;

      const centerX = rect.width / 2;
      const centerY = rect.height / 2;

      // Calculate tilt angles (subtle max 8-10 degrees)
      const rotateX = ((y - centerY) / centerY) * -7;
      const rotateY = ((x - centerX) / centerX) * 7;

      card.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) scale3d(1.02, 1.02, 1.02)`;
    });

    card.addEventListener('mouseleave', () => {
      card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
      card.style.transition = 'transform 0.5s cubic-bezier(0.16, 1, 0.3, 1)';
    });

    card.addEventListener('mouseenter', () => {
      card.style.transition = 'transform 0.1s ease-out';
    });
  });
}

/* ==========================================================================
   DYNAMIC SCROLL PROGRESS BAR & HEADER BLUR
   ========================================================================== */
function initScrollProgressAndHeaderEffect() {
  const progressBar = document.getElementById('scrollProgressBar');
  const header = document.getElementById('siteHeader');

  window.addEventListener('scroll', () => {
    // Scroll Progress
    const scrollTop = window.scrollY || document.documentElement.scrollTop;
    const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    if (scrollHeight > 0 && progressBar) {
      const progress = (scrollTop / scrollHeight) * 100;
      progressBar.style.width = `${progress}%`;
    }

    // Header Dynamic Depth
    if (header) {
      if (window.scrollY > 30) {
        header.classList.add('scrolled');
      } else {
        header.classList.remove('scrolled');
      }
    }
  });
}

/* ==========================================================================
   OFF-CANVAS MOBILE NAVIGATION DRAWER
   ========================================================================== */
function initMobileDrawer() {
  const menuBtn = document.getElementById('mobileMenuBtn');
  const closeBtn = document.getElementById('closeMobileDrawerBtn');
  const drawer = document.getElementById('mobileNavDrawer');
  const overlay = document.getElementById('mobileDrawerOverlay');

  if (menuBtn) {
    menuBtn.addEventListener('click', toggleMobileDrawer);
  }

  if (closeBtn) {
    closeBtn.addEventListener('click', closeMobileDrawer);
  }

  if (overlay) {
    overlay.addEventListener('click', closeMobileDrawer);
  }

  // Close on Escape key for modals & drawer
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      if (drawer && drawer.classList.contains('open')) {
        closeMobileDrawer();
      }
      document.querySelectorAll('.modal-backdrop.open').forEach(m => {
        m.classList.remove('open');
        m.setAttribute('aria-hidden', 'true');
      });
    }
  });

  // Close modals on clicking backdrop background
  document.querySelectorAll('.modal-backdrop').forEach(backdrop => {
    backdrop.addEventListener('click', (e) => {
      if (e.target === backdrop) {
        backdrop.classList.remove('open');
        backdrop.setAttribute('aria-hidden', 'true');
      }
    });
  });
}

function toggleMobileDrawer() {
  const drawer = document.getElementById('mobileNavDrawer');
  const overlay = document.getElementById('mobileDrawerOverlay');
  const menuBtn = document.getElementById('mobileMenuBtn');

  if (!drawer) return;
  const isOpen = drawer.classList.contains('open');

  if (isOpen) {
    closeMobileDrawer();
  } else {
    drawer.classList.add('open');
    if (overlay) overlay.classList.add('open');
    if (menuBtn) {
      menuBtn.classList.add('open');
      menuBtn.setAttribute('aria-expanded', 'true');
    }
    document.body.style.overflow = 'hidden'; // Lock background scroll
  }
}

function closeMobileDrawer() {
  const drawer = document.getElementById('mobileNavDrawer');
  const overlay = document.getElementById('mobileDrawerOverlay');
  const menuBtn = document.getElementById('mobileMenuBtn');

  if (drawer) drawer.classList.remove('open');
  if (overlay) overlay.classList.remove('open');
  if (menuBtn) {
    menuBtn.classList.remove('open');
    menuBtn.setAttribute('aria-expanded', 'false');
  }
  document.body.style.overflow = ''; // Unlock scroll
}

/* ==========================================================================
   ANIMATED METRICS COUNTERS
   ========================================================================== */
function initAnimatedCounters() {
  const counters = document.querySelectorAll('.proof-number[data-target]');
  if (!counters.length) return;

  const observer = new IntersectionObserver((entries, obs) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const target = parseInt(el.getAttribute('data-target'), 10);
        let start = 0;
        const duration = 1200; // ms
        const stepTime = 20;
        const totalSteps = duration / stepTime;
        const increment = target / totalSteps;

        const timer = setInterval(() => {
          start += increment;
          if (start >= target) {
            el.textContent = target >= 1000 ? `${target.toLocaleString()}+` : `${target}+`;
            clearInterval(timer);
          } else {
            el.textContent = Math.floor(start).toLocaleString();
          }
        }, stepTime);

        obs.unobserve(el);
      }
    });
  }, { threshold: 0.5 });

  counters.forEach(c => observer.observe(c));
}

