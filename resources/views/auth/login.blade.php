<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Combat Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --bg: #0a0f14;
      --bg-elevated: #111920;
      --fg: #f0f4f8;
      --muted: #6b7a8f;
      --accent: #00d9c4;
      --accent-dim: rgba(0, 217, 196, 0.15);
      --border: #1e2a36;
      --card: #141d26;
      --error: #ff6b6b;
      --success: #00d9c4;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'DM Sans', sans-serif;
      background-color: var(--bg);
      color: var(--fg);
      min-height: 100vh;
      overflow-x: hidden;
    }

    .font-display {
      font-family: 'Space Grotesk', sans-serif;
    }

    /* Background patterns and effects */
    .bg-grid {
      background-image: 
        linear-gradient(rgba(0, 217, 196, 0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0, 217, 196, 0.03) 1px, transparent 1px);
      background-size: 60px 60px;
    }

    .glow-orb {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      opacity: 0.4;
      pointer-events: none;
    }

    .glow-orb-1 {
      width: 400px;
      height: 400px;
      background: radial-gradient(circle, var(--accent) 0%, transparent 70%);
      top: -100px;
      left: -100px;
      animation: float 15s ease-in-out infinite;
    }

    .glow-orb-2 {
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, #0066ff 0%, transparent 70%);
      bottom: -50px;
      right: -50px;
      animation: float 12s ease-in-out infinite reverse;
    }

    @keyframes float {
      0%, 100% { transform: translate(0, 0) scale(1); }
      33% { transform: translate(30px, -30px) scale(1.05); }
      66% { transform: translate(-20px, 20px) scale(0.95); }
    }

    /* Entrance animations */
    .animate-in {
      opacity: 0;
      transform: translateY(20px);
      animation: slideIn 0.6s ease-out forwards;
    }

    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.2s; }
    .delay-3 { animation-delay: 0.3s; }
    .delay-4 { animation-delay: 0.4s; }
    .delay-5 { animation-delay: 0.5s; }
    .delay-6 { animation-delay: 0.6s; }

    @keyframes slideIn {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Form styling */
    .input-wrapper {
      position: relative;
    }

    .input-field {
      width: 100%;
      background: var(--bg);
      border: 1.5px solid var(--border);
      border-radius: 10px;
      padding: 14px 16px;
      padding-left: 48px;
      font-size: 15px;
      color: var(--fg);
      transition: all 0.25s ease;
      outline: none;
    }

    .input-field::placeholder {
      color: var(--muted);
    }

    .input-field:focus {
      border-color: var(--accent);
      box-shadow: 0 0 0 3px var(--accent-dim);
    }

    .input-field:focus + .input-icon {
      color: var(--accent);
    }

    .input-icon {
      position: absolute;
      left: 16px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--muted);
      transition: color 0.25s ease;
      pointer-events: none;
    }

    .password-toggle {
      position: absolute;
      right: 14px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      color: var(--muted);
      cursor: pointer;
      padding: 4px;
      transition: color 0.2s ease;
    }

    .password-toggle:hover {
      color: var(--fg);
    }

    /* Custom checkbox */
    .checkbox-wrapper {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
      user-select: none;
    }

    .checkbox-wrapper input {
      display: none;
    }

    .checkbox-custom {
      width: 20px;
      height: 20px;
      border: 2px solid var(--border);
      border-radius: 5px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.2s ease;
    }

    .checkbox-wrapper input:checked + .checkbox-custom {
      background: var(--accent);
      border-color: var(--accent);
    }

    .checkbox-custom svg {
      opacity: 0;
      transform: scale(0.5);
      transition: all 0.2s ease;
    }

    .checkbox-wrapper input:checked + .checkbox-custom svg {
      opacity: 1;
      transform: scale(1);
    }

    .checkbox-wrapper:hover .checkbox-custom {
      border-color: var(--accent);
    }

    /* Button */
    .btn-primary {
      width: 100%;
      background: var(--accent);
      color: var(--bg);
      border: none;
      border-radius: 10px;
      padding: 14px 24px;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition: all 0.3s ease;
    }

    .btn-primary::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(0, 217, 196, 0.3);
    }

    .btn-primary:hover::before {
      left: 100%;
    }

    .btn-primary:active {
      transform: translateY(0);
    }

    .btn-primary:disabled {
      opacity: 0.7;
      cursor: not-allowed;
      transform: none;
    }

    .btn-primary .spinner {
      display: none;
      width: 18px;
      height: 18px;
      border: 2px solid transparent;
      border-top-color: var(--bg);
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
    }

    .btn-primary.loading .btn-text {
      visibility: hidden;
    }

    .btn-primary.loading .spinner {
      display: block;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
    }

    @keyframes spin {
      to { transform: translate(-50%, -50%) rotate(360deg); }
    }

    /* Links */
    .link {
      color: var(--accent);
      text-decoration: none;
      font-weight: 500;
      position: relative;
      transition: color 0.2s ease;
    }

    .link::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 1px;
      background: var(--accent);
      transition: width 0.3s ease;
    }

    .link:hover::after {
      width: 100%;
    }

    /* Validation states */
    .input-field.error {
      border-color: var(--error);
    }

    .input-field.success {
      border-color: var(--success);
    }

    .error-message {
      color: var(--error);
      font-size: 13px;
      margin-top: 6px;
      display: none;
    }

    .error-message.show {
      display: block;
      animation: shake 0.4s ease;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20%, 60% { transform: translateX(-5px); }
      40%, 80% { transform: translateX(5px); }
    }

    /* Decorative elements */
    .inventory-visual {
      position: relative;
    }

    .float-card {
      position: absolute;
      background: var(--card);
      border: 1px solid var(--border);
      border-radius: 12px;
      padding: 16px;
      animation: floatCard 4s ease-in-out infinite;
    }

    .float-card-1 {
      top: 20%;
      left: 10%;
      animation-delay: 0s;
    }

    .float-card-2 {
      top: 50%;
      right: 5%;
      animation-delay: 1s;
    }

    .float-card-3 {
      bottom: 15%;
      left: 20%;
      animation-delay: 2s;
    }

    @keyframes floatCard {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-15px); }
    }

    /* Stats display */
    .stat-bar {
      height: 6px;
      background: var(--border);
      border-radius: 3px;
      overflow: hidden;
    }

    .stat-fill {
      height: 100%;
      background: var(--accent);
      border-radius: 3px;
      animation: fillBar 2s ease-out forwards;
      transform-origin: left;
    }

    @keyframes fillBar {
      from { transform: scaleX(0); }
      to { transform: scaleX(1); }
    }

    /* Reduced motion */
    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
    }

    /* Focus visible */
    .input-field:focus-visible,
    .btn-primary:focus-visible,
    .link:focus-visible,
    .password-toggle:focus-visible {
      outline: 2px solid var(--accent);
      outline-offset: 2px;
    }
  </style>
</head>
<body class="bg-grid">
  <!-- Background effects -->
  <div class="glow-orb glow-orb-1"></div>
  <div class="glow-orb glow-orb-2"></div>

  <main class="min-h-screen flex items-center justify-center">
    <!-- Left side - Branding -->
    <div class="hidden">
      <div class="inventory-visual w-full max-w-lg">
        <!-- Floating dashboard cards -->
        <div class="float-card float-card-1 animate-in delay-2" style="width: 180px;">
          <div class="flex items-center gap-2 mb-2">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: var(--accent-dim);">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--accent);">
                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
              </svg>
            </div>
            <span class="text-sm font-medium">Active Users</span>
          </div>
          <div class="font-display text-2xl font-bold">2,847</div>
        </div>

        <div class="float-card float-card-2 animate-in delay-3" style="width: 200px;">
          <div class="flex items-center gap-2 mb-2">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: var(--accent-dim);">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--accent);">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
              </svg>
            </div>
            <span class="text-sm font-medium">Stock Level</span>
          </div>
          <div class="stat-bar mb-1">
            <div class="stat-fill" style="width: 78%;"></div>
          </div>
          <div class="text-sm" style="color: var(--muted);">78% capacity</div>
        </div>

        <div class="float-card float-card-3 animate-in delay-4" style="width: 160px;">
          <div class="flex items-center gap-2 mb-2">
            <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: rgba(0, 217, 196, 0.15);">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="color: var(--accent);">
                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                <polyline points="17 6 23 6 23 12"/>
              </svg>
            </div>
            <span class="text-sm font-medium">Today</span>
          </div>
          <div class="font-display text-2xl font-bold">+12.5%</div>
        </div>
      </div>
    </div>

    <!-- Right side - Login Form -->
    <div class="w-full flex items-center justify-center p-6 md:p-12">
      <div class="w-full max-w-md">
        <!-- Form header -->
        <div class="mb-8 animate-in delay-1">
          <h2 class="font-display text-3xl font-bold mb-2">Welcome back</h2>
          <p style="color: var(--muted);">Enter your credentials to access your inventory dashboard</p>
        </div>

        <!-- Login form -->
        <form id="loginForm" class="space-y-5" method="POST" action="{{ route('login.store') }}" novalidate>
          @csrf
          @if ($errors->has('email'))
            <div class="rounded-2xl border px-4 py-3 text-sm" style="border-color: rgba(248, 113, 113, 0.35); background: rgba(127, 29, 29, 0.18); color: #fecaca;">
              {{ $errors->first('email') }}
            </div>
          @endif
          <!-- Email field -->
          <div class="animate-in delay-2">
            <label class="block text-sm font-medium mb-2" for="email">Email address</label>
            <div class="input-wrapper">
              <input
                type="email"
                id="email"
                name="email"
                class="input-field"
                placeholder="Enter your email address"
                autocomplete="email"
                value="{{ old('email') }}"
                aria-invalid="false"
                aria-describedby="emailError"
              >
              <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="16" x="2" y="4" rx="2"/>
                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
              </svg>
            </div>
            <p class="error-message" id="emailError">Please enter a valid email address</p>
          </div>

          <!-- Password field -->
          <div class="animate-in delay-3">
            <label class="block text-sm font-medium mb-2" for="password">Password</label>
            <div class="input-wrapper">
              <input
                type="password"
                id="password"
                name="password"
                class="input-field"
                placeholder="Enter your password"
                autocomplete="current-password"
                aria-invalid="false"
                aria-describedby="passwordError"
                minlength="6"
              >
              <svg class="input-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
              </svg>
              <button type="button" class="password-toggle" id="togglePassword" aria-label="Toggle password visibility">
                <svg class="eye-open" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/>
                  <circle cx="12" cy="12" r="3"/>
                </svg>
                <svg class="eye-closed" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display: none;">
                  <path d="M9.88 9.88a3 3 0 1 0 4.24 4.24"/>
                  <path d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"/>
                  <path d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"/>
                  <line x1="2" x2="22" y1="2" y2="22"/>
                </svg>
              </button>
            </div>
            <p class="error-message" id="passwordError">Password must be at least 6 characters</p>
          </div>

          <!-- Remember & Forgot -->
          <div class="flex items-center justify-between animate-in delay-4">
            <label class="checkbox-wrapper">
              <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
              <span class="checkbox-custom">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" style="color: var(--bg);">
                  <polyline points="20 6 9 17 4 12"/>
                </svg>
              </span>
              <span class="text-sm" style="color: var(--muted);">Remember me</span>
            </label>
            <a href="#" class="link text-sm">Forgot password?</a>
          </div>

          <!-- Submit button -->
          <div class="animate-in delay-5 pt-2">
            <button type="submit" class="btn-primary">
              <span class="btn-text">Login</span>
              <span class="spinner"></span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script>
    // Initialize elements
    const form = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');
    const submitBtn = form.querySelector('.btn-primary');

    // Password visibility toggle
    togglePassword.addEventListener('click', function() {
      const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordInput.setAttribute('type', type);
      
      const eyeOpen = this.querySelector('.eye-open');
      const eyeClosed = this.querySelector('.eye-closed');
      
      if (type === 'text') {
        eyeOpen.style.display = 'none';
        eyeClosed.style.display = 'block';
      } else {
        eyeOpen.style.display = 'block';
        eyeClosed.style.display = 'none';
      }
    });

    // Email validation
    function validateEmail(email) {
      const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return re.test(email);
    }

    // Real-time validation
    emailInput.addEventListener('blur', function() {
      if (this.value && !validateEmail(this.value)) {
        this.classList.add('error');
        this.classList.remove('success');
        emailError.classList.add('show');
      } else if (this.value) {
        this.classList.remove('error');
        this.classList.add('success');
        emailError.classList.remove('show');
      }
    });

    emailInput.addEventListener('input', function() {
      if (this.classList.contains('error') && validateEmail(this.value)) {
        this.classList.remove('error');
        this.classList.add('success');
        emailError.classList.remove('show');
      }
    });

    passwordInput.addEventListener('blur', function() {
      if (this.value && this.value.length < 6) {
        this.classList.add('error');
        this.classList.remove('success');
        passwordError.classList.add('show');
      } else if (this.value) {
        this.classList.remove('error');
        this.classList.add('success');
        passwordError.classList.remove('show');
      }
    });

    passwordInput.addEventListener('input', function() {
      if (this.classList.contains('error') && this.value.length >= 6) {
        this.classList.remove('error');
        this.classList.add('success');
        passwordError.classList.remove('show');
      }
    });

    // Form submission
    form.addEventListener('submit', function(e) {
      let isValid = true;
      const email = emailInput.value.trim();
      const password = passwordInput.value;

      // Allow empty fields so the backend can use the default admin credentials.
      if (email && !validateEmail(email)) {
        emailInput.classList.add('error');
        emailError.classList.add('show');
        isValid = false;
      }

      // Validate password
      if (password && password.length < 6) {
        passwordInput.classList.add('error');
        passwordError.classList.add('show');
        isValid = false;
      }

      if (!isValid) {
        e.preventDefault();
        return;
      }

      submitBtn.classList.add('loading');
      submitBtn.disabled = true;
    });

    // Add hover effect to social buttons
    document.querySelectorAll('.grid button').forEach(btn => {
      btn.addEventListener('mouseenter', function() {
        this.style.borderColor = 'var(--accent)';
      });
      btn.addEventListener('mouseleave', function() {
        this.style.borderColor = 'var(--border)';
      });
    });
  </script>
</body>
</html>
