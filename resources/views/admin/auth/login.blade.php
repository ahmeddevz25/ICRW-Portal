<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Executive Sign In — ICRW Admin Portal</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('index/welcome/logo.png') }}" type="image/png">

  <style>
    :root {
      --bg-dark: #080c14;
      --card-bg: #0f1626;
      --border: rgba(255, 255, 255, 0.08);
      --accent-indigo: #6366f1;
      --accent-gold: #c5a869;
      --text-main: #f8fafc;
      --text-muted: #94a3b8;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      background: radial-gradient(circle at 50% 20%, #151e33 0%, #080c14 70%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Plus Jakarta Sans', -apple-system, sans-serif;
      color: var(--text-main);
      padding: 24px;
    }

    .login-container {
      width: 100%;
      max-width: 440px;
    }

    .login-card {
      background: var(--card-bg);
      border: 1px solid var(--border);
      border-radius: 18px;
      padding: 38px 32px;
      box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.7), 0 0 40px -10px rgba(99, 102, 241, 0.15);
      position: relative;
      overflow: hidden;
    }

    .login-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 3px;
      background: linear-gradient(90deg, var(--accent-gold), var(--accent-indigo), var(--accent-gold));
    }

    .brand-header {
      text-align: center;
      margin-bottom: 30px;
    }

    .brand-header img {
      height: 58px;
      width: 58px;
      object-fit: contain;
      margin-bottom: 14px;
      filter: drop-shadow(0 4px 14px rgba(197, 168, 105, 0.35));
    }

    .brand-header h1 {
      font-size: 20px;
      font-weight: 800;
      letter-spacing: -0.02em;
      color: #ffffff;
      margin-bottom: 4px;
    }

    .brand-header p {
      font-size: 12.5px;
      color: var(--text-muted);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-label {
      display: block;
      font-size: 12.5px;
      font-weight: 600;
      color: #cbd5e1;
      margin-bottom: 8px;
    }

    .input-wrap {
      position: relative;
    }

    .input-icon {
      position: absolute;
      left: 14px;
      top: 50%;
      transform: translateY(-50%);
      color: #64748b;
      font-size: 14px;
    }

    .form-control {
      width: 100%;
      background: #192237;
      border: 1px solid var(--border);
      border-radius: 10px;
      padding: 12px 14px 12px 42px;
      color: #ffffff;
      font-size: 13.5px;
      font-family: inherit;
      outline: none;
      transition: all 0.2s;
    }

    .form-control:focus {
      border-color: var(--accent-indigo);
      box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.25);
      background: #1c263d;
    }

    .toggle-pass-btn {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: #64748b;
      cursor: pointer;
      font-size: 14px;
    }

    .toggle-pass-btn:hover {
      color: #cbd5e1;
    }

    .form-options {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 24px;
      font-size: 12.5px;
    }

    .remember-label {
      display: flex;
      align-items: center;
      gap: 8px;
      color: var(--text-muted);
      cursor: pointer;
    }

    .remember-label input[type="checkbox"] {
      accent-color: var(--accent-indigo);
      width: 15px;
      height: 15px;
      cursor: pointer;
    }

    .submit-btn {
      width: 100%;
      background: linear-gradient(135deg, var(--accent-indigo), #4f46e5);
      color: #ffffff;
      border: none;
      border-radius: 10px;
      padding: 13px;
      font-size: 14px;
      font-weight: 700;
      letter-spacing: 0.01em;
      cursor: pointer;
      transition: all 0.2s;
      box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
    }

    .submit-btn:hover {
      transform: translateY(-1px);
      box-shadow: 0 6px 20px rgba(99, 102, 241, 0.5);
    }

    .submit-btn:active {
      transform: translateY(0);
    }

    .alert-box {
      background: rgba(244, 63, 94, 0.12);
      border: 1px solid rgba(244, 63, 94, 0.3);
      color: #fb7185;
      padding: 12px 14px;
      border-radius: 10px;
      font-size: 13px;
      margin-bottom: 20px;
      display: flex;
      align-items: flex-start;
      gap: 10px;
    }

    .footer-link {
      text-align: center;
      margin-top: 24px;
      font-size: 12.5px;
    }

    .footer-link a {
      color: var(--text-muted);
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: color 0.2s;
    }

    .footer-link a:hover {
      color: var(--accent-gold);
    }
  </style>
</head>
<body>
  <div class="login-container">
    <div class="login-card">
      <div class="brand-header">
        <img src="{{ asset('index/welcome/logo.png') }}" alt="ICRW Emblem">
        <h1>Executive Portal</h1>
        <p>Institute of Creative & Research Writing</p>
      </div>

      @if(session('info'))
        <div style="background: rgba(14, 165, 233, 0.12); border: 1px solid rgba(14, 165, 233, 0.3); color: #38bdf8; padding: 12px 14px; border-radius: 10px; font-size: 13px; margin-bottom: 20px;">
          <i class="fa-solid fa-circle-info" style="margin-right: 6px;"></i> {{ session('info') }}
        </div>
      @endif

      @if($errors->any())
        <div class="alert-box">
          <i class="fa-solid fa-triangle-exclamation" style="margin-top: 2px;"></i>
          <div>
            @foreach($errors->all() as $error)
              <div>{{ $error }}</div>
            @endforeach
          </div>
        </div>
      @endif

      <form action="{{ admin_route('login.submit') }}" method="POST">
        @csrf

        <div class="form-group">
          <label class="form-label" for="email">Administrative Email</label>
          <div class="input-wrap">
            <i class="fa-solid fa-envelope input-icon"></i>
            <input 
              type="email" 
              name="email" 
              id="email" 
              class="form-control" 
              placeholder="admin@icrw.net"
              value="{{ old('email') }}" 
              required 
              autofocus
            >
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="password">Password</label>
          <div class="input-wrap">
            <i class="fa-solid fa-lock input-icon"></i>
            <input 
              type="password" 
              name="password" 
              id="password" 
              class="form-control" 
              placeholder="••••••••••••"
              required
            >
            <button type="button" class="toggle-pass-btn" onclick="togglePasswordVisibility()">
              <i class="fa-regular fa-eye" id="toggleIcon"></i>
            </button>
          </div>
        </div>

        <div class="form-options">
          <label class="remember-label">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <span>Remember authentication</span>
          </label>
        </div>

        <button type="submit" class="submit-btn">
          <span>Authorize & Sign In</span>
          <i class="fa-solid fa-arrow-right"></i>
        </button>
      </form>
    </div>

    <div class="footer-link">
      <a href="{{ route('home') }}">
        <i class="fa-solid fa-arrow-left"></i>
        <span>Return to Public Portal</span>
      </a>
    </div>
  </div>

  <script>
    function togglePasswordVisibility() {
      const passwordInput = document.getElementById('password');
      const toggleIcon = document.getElementById('toggleIcon');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        toggleIcon.classList.remove('fa-eye');
        toggleIcon.classList.add('fa-eye-slash');
      } else {
        passwordInput.type = 'password';
        toggleIcon.classList.remove('fa-eye-slash');
        toggleIcon.classList.add('fa-eye');
      }
    }
  </script>
</body>
</html>
