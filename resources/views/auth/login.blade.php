<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk - Pawsy Pet Shop</title>
  <meta name="description" content="Masuk ke akun Pawsy Pet Shop untuk kemudahan berbelanja kebutuhan anabul kesayanganmu.">
  
  <!-- Favicon -->
  <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22%2338BDF8%22 stroke=%22%230284C7%22 stroke-width=%222%22><path d=%22M12 2a3 3 0 0 0-3 3c0 1.66 1.34 3 3 3s3-1.34 3-3a3 3 0 0 0-3-3zM5.5 8.5a2.5 2.5 0 0 0-2.5 2.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5a2.5 2.5 0 0 0-2.5-2.5zm13 0a2.5 2.5 0 0 0-2.5 2.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5a2.5 2.5 0 0 0-2.5-2.5zM12 11c-2.5 0-4.5 1.5-4.5 4 0 2.5 2 4.5 4.5 4.5s4.5-2 4.5-4.5c0-2.5-2-4-4.5-4z%22/></svg>">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    :root {
      --bg-cream: #FFFDF7;
      --bg-cream-soft: #FDF7EA;
      --bg-card: #FFFFFF;
      --cream-border: #F3E7D3;
      --blue-soft: #F0F9FF;
      --blue-light: #E0F2FE;
      --blue-accent: #38BDF8;
      --blue-dark: #0284C7;
      --yellow-light: #FEF9C3;
      --yellow-accent: #FDE047;
      --yellow-vibrant: #F59E0B;
      --pink-light: #FFE4E6;
      --pink-accent: #FB7185;
      --mint-light: #DCFCE7;
      --mint-accent: #22C55E;
      --text-dark: #1E293B;
      --text-body: #475569;
      --text-muted: #94A3B8;
      --border-light: #E2E8F0;
      --radius-sm: 12px;
      --radius-md: 20px;
      --radius-lg: 28px;
      --radius-full: 9999px;
      --shadow-sm: 0 4px 12px rgba(148, 163, 184, 0.08);
      --shadow-md: 0 10px 30px rgba(148, 163, 184, 0.12);
      --shadow-lg: 0 20px 40px -10px rgba(148, 163, 184, 0.18);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Quicksand', sans-serif;
      background-color: var(--bg-cream);
      color: var(--text-body);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      background-image: 
        radial-gradient(circle at 10% 20%, rgba(224, 242, 254, 0.6) 0%, transparent 40%),
        radial-gradient(circle at 90% 80%, rgba(254, 249, 195, 0.6) 0%, transparent 40%),
        radial-gradient(circle at 50% 50%, rgba(255, 228, 230, 0.4) 0%, transparent 50%);
    }

    .auth-header {
      padding: 1.5rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1200px;
      margin: 0 auto;
      width: 100%;
    }

    .logo {
      display: inline-flex;
      align-items: center;
      gap: 0.75rem;
      text-decoration: none;
    }

    .logo-paw-icon {
      width: 44px;
      height: 44px;
      background: linear-gradient(135deg, var(--blue-accent), var(--blue-dark));
      border-radius: var(--radius-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      box-shadow: 0 6px 14px rgba(56, 189, 248, 0.35);
      transform: rotate(-6deg);
    }

    .logo-paw-icon svg {
      width: 24px;
      height: 24px;
      stroke-width: 2.2px;
    }

    .logo-text {
      font-family: 'Fredoka', cursive;
      font-size: 1.7rem;
      font-weight: 700;
      color: var(--text-dark);
      letter-spacing: -0.5px;
    }

    .logo-dot {
      color: var(--blue-accent);
    }

    .btn-back {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.6rem 1.2rem;
      background: white;
      border: 1.5px solid var(--cream-border);
      border-radius: var(--radius-full);
      font-weight: 600;
      color: var(--text-dark);
      text-decoration: none;
      font-size: 0.9rem;
      box-shadow: var(--shadow-sm);
      transition: all 0.2s ease;
    }

    .btn-back:hover {
      background: var(--blue-soft);
      border-color: var(--blue-accent);
      color: var(--blue-dark);
      transform: translateX(-3px);
    }

    .btn-back svg {
      width: 18px;
      height: 18px;
    }

    .auth-container {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
    }

    .auth-card {
      width: 100%;
      max-width: 960px;
      background: var(--bg-card);
      border-radius: var(--radius-lg);
      border: 1.5px solid var(--cream-border);
      box-shadow: var(--shadow-lg);
      overflow: hidden;
      display: grid;
      grid-template-columns: 1fr 1.15fr;
      position: relative;
    }

    /* Left Promo/Visual Column */
    .auth-sidebar {
      background: linear-gradient(145deg, #F0F9FF, #E0F2FE 60%, #FEF9C3);
      padding: 3rem 2.5rem;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      position: relative;
      border-right: 1.5px solid var(--cream-border);
    }

    .sidebar-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      background: white;
      padding: 0.45rem 1rem;
      border-radius: var(--radius-full);
      font-size: 0.85rem;
      font-weight: 700;
      color: var(--blue-dark);
      box-shadow: var(--shadow-sm);
      width: fit-content;
      margin-bottom: 1.5rem;
    }

    .sidebar-badge svg {
      width: 16px;
      height: 16px;
      color: var(--yellow-vibrant);
    }

    .sidebar-title {
      font-family: 'Fredoka', cursive;
      font-size: 2rem;
      font-weight: 700;
      color: var(--text-dark);
      line-height: 1.25;
      margin-bottom: 0.75rem;
    }

    .sidebar-title span {
      color: var(--blue-dark);
    }

    .sidebar-desc {
      font-size: 0.95rem;
      color: var(--text-body);
      line-height: 1.6;
    }

    .sidebar-mascot {
      text-align: center;
      margin: 2rem 0 1rem;
    }

    .sidebar-mascot svg {
      max-width: 220px;
      height: auto;
      filter: drop-shadow(0 10px 15px rgba(56, 189, 248, 0.2));
    }

    .sidebar-features {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
    }

    .sidebar-feature-item {
      display: flex;
      align-items: center;
      gap: 0.6rem;
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--text-dark);
    }

    .feature-icon-circle {
      width: 24px;
      height: 24px;
      border-radius: 50%;
      background: white;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--mint-accent);
      box-shadow: var(--shadow-sm);
      flex-shrink: 0;
    }

    .feature-icon-circle svg {
      width: 14px;
      height: 14px;
    }

    /* Right Form Column */
    .auth-main {
      padding: 3rem 2.8rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-header {
      margin-bottom: 2rem;
    }

    .form-title {
      font-family: 'Fredoka', cursive;
      font-size: 1.85rem;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 0.4rem;
    }

    .form-subtitle {
      font-size: 0.95rem;
      color: var(--text-muted);
    }

    .alert {
      padding: 0.9rem 1.1rem;
      border-radius: var(--radius-sm);
      margin-bottom: 1.5rem;
      display: flex;
      align-items: flex-start;
      gap: 0.75rem;
      font-size: 0.9rem;
      line-height: 1.5;
    }

    .alert-error {
      background: #FEF2F2;
      border: 1.5px solid #FECACA;
      color: #991B1B;
    }

    .alert-error svg {
      width: 20px;
      height: 20px;
      color: #EF4444;
      flex-shrink: 0;
      margin-top: 2px;
    }

    .alert-info {
      background: var(--blue-soft);
      border: 1.5px solid var(--blue-light);
      color: #0369A1;
    }

    .alert-info svg {
      width: 18px;
      height: 18px;
      color: var(--blue-dark);
      flex-shrink: 0;
    }

    .alert-success {
      background: #F0FDF4;
      border: 1.5px solid #BBF7D0;
      color: #166534;
    }

    .alert-success svg {
      width: 20px;
      height: 20px;
      color: #22C55E;
      flex-shrink: 0;
      margin-top: 2px;
    }

    .demo-creds {
      background: var(--bg-cream-soft);
      border: 1px dashed var(--cream-border);
      border-radius: var(--radius-sm);
      padding: 0.8rem 1rem;
      margin-bottom: 1.5rem;
      font-size: 0.82rem;
      color: var(--text-dark);
    }

    .demo-creds strong {
      color: #0284C7;
    }

    .demo-creds-row {
      display: flex;
      justify-content: space-between;
      gap: 0.5rem;
      margin-top: 0.3rem;
      flex-wrap: wrap;
    }

    .demo-pill {
      background: white;
      padding: 0.25rem 0.6rem;
      border-radius: var(--radius-sm);
      border: 1px solid var(--border-light);
      cursor: pointer;
      transition: all 0.15s ease;
      font-family: monospace;
      font-size: 0.8rem;
    }

    .demo-pill:hover {
      background: var(--yellow-light);
      border-color: var(--yellow-vibrant);
    }

    .form-group {
      margin-bottom: 1.3rem;
    }

    .form-label {
      display: block;
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 0.4rem;
    }

    .input-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }

    .input-icon {
      position: absolute;
      left: 1rem;
      color: var(--text-muted);
      pointer-events: none;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .input-icon svg {
      width: 19px;
      height: 19px;
    }

    .form-input {
      width: 100%;
      padding: 0.85rem 1rem 0.85rem 2.75rem;
      font-family: 'Quicksand', sans-serif;
      font-size: 0.95rem;
      border: 1.5px solid var(--border-light);
      border-radius: var(--radius-sm);
      background: white;
      color: var(--text-dark);
      transition: all 0.2s ease;
      outline: none;
    }

    .form-input:focus {
      border-color: var(--blue-accent);
      box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.15);
    }

    .input-toggle-btn {
      position: absolute;
      right: 0.85rem;
      background: none;
      border: none;
      color: var(--text-muted);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0.3rem;
      border-radius: 6px;
      transition: color 0.15s ease;
    }

    .input-toggle-btn:hover {
      color: var(--text-dark);
    }

    .input-toggle-btn svg {
      width: 19px;
      height: 19px;
    }

    .form-row-actions {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 1.5rem;
      font-size: 0.88rem;
    }

    .checkbox-label {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      cursor: pointer;
      color: var(--text-body);
      font-weight: 500;
    }

    .checkbox-label input[type="checkbox"] {
      width: 16px;
      height: 16px;
      accent-color: var(--blue-dark);
      cursor: pointer;
    }

    .btn-submit {
      width: 100%;
      padding: 0.95rem 1.5rem;
      background: linear-gradient(135deg, var(--blue-accent), var(--blue-dark));
      color: white;
      font-family: 'Fredoka', cursive;
      font-size: 1.15rem;
      font-weight: 600;
      border: none;
      border-radius: var(--radius-full);
      box-shadow: 0 8px 20px rgba(2, 132, 199, 0.28);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.6rem;
      transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 25px rgba(2, 132, 199, 0.38);
    }

    .btn-submit:active {
      transform: translateY(0);
    }

    .btn-submit svg {
      width: 20px;
      height: 20px;
    }

    .auth-footer-text {
      text-align: center;
      margin-top: 1.8rem;
      font-size: 0.92rem;
      color: var(--text-muted);
    }

    .auth-footer-text a {
      color: var(--blue-dark);
      font-weight: 700;
      text-decoration: none;
    }

    .auth-footer-text a:hover {
      text-decoration: underline;
    }

    @media (max-width: 860px) {
      .auth-card {
        grid-template-columns: 1fr;
      }
      .auth-sidebar {
        display: none;
      }
      .auth-main {
        padding: 2.2rem 1.8rem;
      }
    }
  </style>
</head>
<body>

  <!-- Top Header Navigation -->
  <header class="auth-header">
    <a href="{{ route('home') }}" class="logo">
      <div class="logo-paw-icon">
        <i data-lucide="paw-print"></i>
      </div>
      <span class="logo-text">Pawsy<span class="logo-dot">.</span></span>
    </a>

    <a href="{{ route('home') }}" class="btn-back">
      <i data-lucide="arrow-left"></i> Kembali ke Beranda
    </a>
  </header>

  <!-- Auth Content -->
  <main class="auth-container">
    <div class="auth-card">
      
      <!-- Left Visual Sidebar -->
      <div class="auth-sidebar">
        <div>
          <div class="sidebar-badge">
            <i data-lucide="sparkles"></i> Pawrents Area #1
          </div>
          <h2 class="sidebar-title">Senang Melihatmu <span>Kembali!</span> 🐾</h2>
          <p class="sidebar-desc">
            Akses ribuan pakan bergizi, aksesoris lucu, dan penawaran diskon spesial khusus pelanggan setia Pawsy.
          </p>
        </div>

        <!-- Mascot Illustration -->
        <div class="sidebar-mascot">
          <svg viewBox="0 0 240 180" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="120" cy="150" rx="90" ry="20" fill="#E2E8F0" opacity="0.6"/>
            <!-- Cute Dog Body -->
            <g transform="translate(45, 10)">
              <path d="M 35,90 Q 20,150 75,150 Q 130,150 115,90 Q 110,40 75,40 Q 40,40 35,90 Z" fill="#FBBF24" />
              <path d="M 55,80 Q 75,60 95,80 Q 100,120 75,130 Q 50,120 55,80 Z" fill="#FFFDF7" />
              <!-- Ears -->
              <path d="M 38,45 Q 15,60 22,100 Q 35,90 48,62 Z" fill="#D97706" />
              <path d="M 112,45 Q 135,60 128,100 Q 115,90 102,62 Z" fill="#D97706" />
              <!-- Eyes -->
              <circle cx="58" cy="70" r="6" fill="#1E293B" />
              <circle cx="60" cy="68" r="2" fill="#FFFFFF" />
              <circle cx="92" cy="70" r="6" fill="#1E293B" />
              <circle cx="94" cy="68" r="2" fill="#FFFFFF" />
              <!-- Cheeks -->
              <ellipse cx="48" cy="78" rx="6" ry="3.5" fill="#FDA4AF" opacity="0.8"/>
              <ellipse cx="102" cy="78" rx="6" ry="3.5" fill="#FDA4AF" opacity="0.8"/>
              <!-- Nose & Smile -->
              <ellipse cx="75" cy="80" rx="14" ry="9" fill="#FFFDF7" />
              <path d="M 70,76 Q 75,72 80,76 Q 75,82 70,76 Z" fill="#1E293B" />
              <path d="M 70,81 Q 75,88 80,81" stroke="#1E293B" stroke-width="2" fill="none" stroke-linecap="round"/>
              <!-- Collar -->
              <path d="M 46,110 Q 75,122 104,110" stroke="#38BDF8" stroke-width="6" fill="none" stroke-linecap="round"/>
              <circle cx="75" cy="120" r="5" fill="#FACC15"/>
            </g>
          </svg>
        </div>

        <ul class="sidebar-features">
          <li class="sidebar-feature-item">
            <div class="feature-icon-circle"><i data-lucide="check"></i></div>
            <span>100% Garansi Produk Original</span>
          </li>
          <li class="sidebar-feature-item">
            <div class="feature-icon-circle"><i data-lucide="check"></i></div>
            <span>Diskon Member & Promo Mingguan</span>
          </li>
          <li class="sidebar-feature-item">
            <div class="feature-icon-circle"><i data-lucide="check"></i></div>
            <span>Konsultasi Nutrisi Hewan Gratis</span>
          </li>
        </ul>
      </div>

      <!-- Right Form Main -->
      <div class="auth-main">
        <div class="form-header">
          <h1 class="form-title">Masuk ke Akun</h1>
          <p class="form-subtitle">Selamat datang kembali! Masukkan kredensial akunmu.</p>
        </div>

        <!-- Success Flash Message -->
        @if(session('success'))
          <div class="alert alert-success">
            <i data-lucide="check-circle"></i>
            <div>{{ session('success') }}</div>
          </div>
        @endif

        <!-- Error Flash Message -->
        @if(session('error'))
          <div class="alert alert-error">
            <i data-lucide="alert-circle"></i>
            <div>{{ session('error') }}</div>
          </div>
        @endif

        @if($errors->any())
          <div class="alert alert-error">
            <i data-lucide="alert-circle"></i>
            <div>
              @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
              @endforeach
            </div>
          </div>
        @endif

        <!-- Quick Demo Accounts Helper -->
        <div class="demo-creds">
          <div><i data-lucide="sparkles" style="width:14px;height:14px;color:#F59E0B;vertical-align:middle;"></i> <strong>Kredensial Demo Cepat (Klik untuk isi otomatis):</strong></div>
          <div class="demo-creds-row">
            <span class="demo-pill" onclick="fillCredentials('admin@pawsy.com', 'admin123')">
              👑 <strong>Admin:</strong> admin@pawsy.com
            </span>
            <span class="demo-pill" onclick="fillCredentials('user@pawsy.com', 'user123')">
              🐾 <strong>User:</strong> user@pawsy.com
            </span>
          </div>
        </div>

        <form action="{{ route('login.post') }}" method="POST">
          @csrf

          <div class="form-group">
            <label class="form-label" for="email">Alamat Email</label>
            <div class="input-wrapper">
              <span class="input-icon"><i data-lucide="mail"></i></span>
              <input type="email" name="email" id="email" class="form-input" 
                     placeholder="nama@email.com" value="{{ old('email') }}" required autofocus>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="password">Kata Sandi</label>
            <div class="input-wrapper">
              <span class="input-icon"><i data-lucide="lock"></i></span>
              <input type="password" name="password" id="password" class="form-input" 
                     placeholder="••••••••" required>
              <button type="button" class="input-toggle-btn" id="togglePasswordBtn" title="Lihat kata sandi">
                <i data-lucide="eye" id="togglePasswordIcon"></i>
              </button>
            </div>
          </div>

          <div class="form-row-actions">
            <label class="checkbox-label">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
              <span>Ingat saya</span>
            </label>
          </div>

          <button type="submit" class="btn-submit">
            <i data-lucide="log-in"></i> Masuk Sekarang
          </button>
        </form>

        <div class="auth-footer-text">
          Belum punya akun Pawsy? 
          <a href="{{ route('register') }}">Daftar Sekarang</a>
        </div>
      </div>

    </div>
  </main>

  <script>
    // Initialize Lucide Icons
    lucide.createIcons();

    // Password Visibility Toggle
    const togglePasswordBtn = document.getElementById('togglePasswordBtn');
    const passwordInput = document.getElementById('password');
    const togglePasswordIcon = document.getElementById('togglePasswordIcon');

    if (togglePasswordBtn) {
      togglePasswordBtn.addEventListener('click', () => {
        const isPassword = passwordInput.getAttribute('type') === 'password';
        passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
        togglePasswordIcon.setAttribute('data-lucide', isPassword ? 'eye-off' : 'eye');
        lucide.createIcons();
      });
    }

    // Quick Demo Credentials Auto-Fill
    function fillCredentials(email, password) {
      document.getElementById('email').value = email;
      document.getElementById('password').value = password;
      document.getElementById('password').focus();
    }
  </script>
</body>
</html>
