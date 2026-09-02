<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Akun Baru - Pawsy Pet Shop</title>
  <meta name="description" content="Daftarkan akun Pawsy Pet Shop untuk menikmati promo eksklusif, voucher diskon belanja anabul, dan kemudahan transaksi.">
  
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
      max-width: 1000px;
      background: var(--bg-card);
      border-radius: var(--radius-lg);
      border: 1.5px solid var(--cream-border);
      box-shadow: var(--shadow-lg);
      overflow: hidden;
      display: grid;
      grid-template-columns: 1fr 1.25fr;
      position: relative;
    }

    /* Left Sidebar */
    .auth-sidebar {
      background: linear-gradient(145deg, #FEF9C3, #FFE4E6 60%, #E0F2FE);
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
      color: #B45309;
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
      color: #E11D48;
    }

    .sidebar-desc {
      font-size: 0.95rem;
      color: var(--text-body);
      line-height: 1.6;
    }

    .sidebar-mascot {
      text-align: center;
      margin: 1.5rem 0 1rem;
    }

    .sidebar-mascot svg {
      max-width: 220px;
      height: auto;
      filter: drop-shadow(0 10px 15px rgba(251, 113, 133, 0.25));
    }

    .perks-list {
      list-style: none;
      display: flex;
      flex-direction: column;
      gap: 0.8rem;
    }

    .perk-item {
      display: flex;
      align-items: flex-start;
      gap: 0.65rem;
      font-size: 0.88rem;
      color: var(--text-dark);
    }

    .perk-icon {
      width: 26px;
      height: 26px;
      border-radius: 50%;
      background: white;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #E11D48;
      box-shadow: var(--shadow-sm);
      flex-shrink: 0;
      margin-top: 1px;
    }

    .perk-icon svg {
      width: 15px;
      height: 15px;
    }

    /* Right Form Column */
    .auth-main {
      padding: 2.8rem 2.8rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .form-header {
      margin-bottom: 1.6rem;
    }

    .form-title {
      font-family: 'Fredoka', cursive;
      font-size: 1.85rem;
      font-weight: 700;
      color: var(--text-dark);
      margin-bottom: 0.3rem;
    }

    .form-subtitle {
      font-size: 0.95rem;
      color: var(--text-muted);
    }

    .alert {
      padding: 0.9rem 1.1rem;
      border-radius: var(--radius-sm);
      margin-bottom: 1.3rem;
      display: flex;
      align-items: flex-start;
      gap: 0.75rem;
      font-size: 0.88rem;
      line-height: 1.5;
    }

    .alert-error {
      background: #FEF2F2;
      border: 1.5px solid #FECACA;
      color: #991B1B;
    }

    .alert-error svg {
      width: 18px;
      height: 18px;
      color: #EF4444;
      flex-shrink: 0;
      margin-top: 2px;
    }

    .form-group {
      margin-bottom: 1.15rem;
    }

    .form-label {
      display: block;
      font-size: 0.88rem;
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 0.35rem;
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
      width: 18px;
      height: 18px;
    }

    .form-input {
      width: 100%;
      padding: 0.8rem 1rem 0.8rem 2.65rem;
      font-family: 'Quicksand', sans-serif;
      font-size: 0.93rem;
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
      width: 18px;
      height: 18px;
    }

    .form-grid-2 {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 0.8rem;
    }

    .checkbox-label {
      display: flex;
      align-items: flex-start;
      gap: 0.55rem;
      cursor: pointer;
      color: var(--text-body);
      font-size: 0.85rem;
      line-height: 1.4;
      margin-bottom: 1.4rem;
    }

    .checkbox-label input[type="checkbox"] {
      width: 16px;
      height: 16px;
      margin-top: 2px;
      accent-color: var(--blue-dark);
      cursor: pointer;
      flex-shrink: 0;
    }

    .checkbox-label a {
      color: var(--blue-dark);
      font-weight: 600;
      text-decoration: underline;
    }

    .btn-submit {
      width: 100%;
      padding: 0.95rem 1.5rem;
      background: linear-gradient(135deg, #FB7185, #E11D48);
      color: white;
      font-family: 'Fredoka', cursive;
      font-size: 1.15rem;
      font-weight: 600;
      border: none;
      border-radius: var(--radius-full);
      box-shadow: 0 8px 20px rgba(225, 29, 72, 0.28);
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 0.6rem;
      transition: all 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    .btn-submit:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 25px rgba(225, 29, 72, 0.38);
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
      margin-top: 1.5rem;
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

    @media (max-width: 880px) {
      .auth-card {
        grid-template-columns: 1fr;
      }
      .auth-sidebar {
        display: none;
      }
      .auth-main {
        padding: 2.2rem 1.8rem;
      }
      .form-grid-2 {
        grid-template-columns: 1fr;
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
            <i data-lucide="gift"></i> Bonus Welcome Voucher
          </div>
          <h2 class="sidebar-title">Gabung Keluarga <span>Pawsy!</span> 🐱</h2>
          <p class="sidebar-desc">
            Dapatkan diskon 20% untuk pesanan pertamamu dan nikmati akses eksklusif promo bulanan untuk anabul.
          </p>
        </div>

        <!-- Mascot Cute Cat Illustration -->
        <div class="sidebar-mascot">
          <svg viewBox="0 0 240 180" xmlns="http://www.w3.org/2000/svg">
            <ellipse cx="120" cy="150" rx="90" ry="20" fill="#CBD5E1" opacity="0.5"/>
            <!-- Cute Cat Companion -->
            <g transform="translate(60, 20)">
              <!-- Body -->
              <path d="M 30,70 Q 20,130 65,130 Q 110,130 100,70 Q 95,30 65,30 Q 35,30 30,70 Z" fill="#E2E8F0" />
              <!-- Ears -->
              <polygon points="38,38 25,6 60,26" fill="#CBD5E1" />
              <polygon points="40,34 32,14 55,26" fill="#FDA4AF" />
              <polygon points="92,38 105,6 70,26" fill="#CBD5E1" />
              <polygon points="90,34 98,14 75,26" fill="#FDA4AF" />
              <!-- Eyes (Happy Sparkle Eyes) -->
              <circle cx="50" cy="56" r="6" fill="#1E293B" />
              <circle cx="52" cy="54" r="2" fill="#FFFFFF" />
              <circle cx="80" cy="56" r="6" fill="#1E293B" />
              <circle cx="82" cy="54" r="2" fill="#FFFFFF" />
              <!-- Blush -->
              <ellipse cx="40" cy="64" rx="5" ry="3" fill="#FDA4AF" opacity="0.8"/>
              <ellipse cx="90" cy="64" rx="5" ry="3" fill="#FDA4AF" opacity="0.8"/>
              <!-- Nose & Whiskers -->
              <polygon points="63,62 67,62 65,65" fill="#FB7185" />
              <line x1="38" y1="63" x2="22" y2="60" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round"/>
              <line x1="38" y1="67" x2="22" y2="69" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round"/>
              <line x1="92" y1="63" x2="108" y2="60" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round"/>
              <line x1="92" y1="67" x2="108" y2="69" stroke="#94A3B8" stroke-width="1.5" stroke-linecap="round"/>
              <!-- Cute Bow -->
              <circle cx="65" cy="80" r="4" fill="#FB7185"/>
              <polygon points="61,80 53,75 53,85" fill="#FDA4AF"/>
              <polygon points="69,80 77,75 77,85" fill="#FDA4AF"/>
            </g>
          </svg>
        </div>

        <ul class="perks-list">
          <li class="perk-item">
            <div class="perk-icon"><i data-lucide="tag"></i></div>
            <div><strong>Voucher Diskon 20%:</strong> Otomatis aktif untuk belanja pertamamu.</div>
          </li>
          <li class="perk-item">
            <div class="perk-icon"><i data-lucide="heart"></i></div>
            <div><strong>Simpan Wishlist:</strong> Kumpulkan barang impian anabul favoritmu.</div>
          </li>
          <li class="perk-item">
            <div class="perk-icon"><i data-lucide="truck"></i></div>
            <div><strong>Lacak Pengiriman:</strong> Pantau pesanan realtime hingga sampai ke rumah.</div>
          </li>
        </ul>
      </div>

      <!-- Right Form Main -->
      <div class="auth-main">
        <div class="form-header">
          <h1 class="form-title">Daftar Akun Baru</h1>
          <p class="form-subtitle">Lengkapi formulir di bawah untuk memulai akun Pawsy-mu.</p>
        </div>

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

        <form action="{{ route('register.post') }}" method="POST">
          @csrf

          <div class="form-group">
            <label class="form-label" for="name">Nama Lengkap</label>
            <div class="input-wrapper">
              <span class="input-icon"><i data-lucide="user"></i></span>
              <input type="text" name="name" id="name" class="form-input" 
                     placeholder="contoh: Jessica Putri" value="{{ old('name') }}" required autofocus>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="email">Alamat Email</label>
            <div class="input-wrapper">
              <span class="input-icon"><i data-lucide="mail"></i></span>
              <input type="email" name="email" id="email" class="form-input" 
                     placeholder="nama@email.com" value="{{ old('email') }}" required>
            </div>
          </div>

          <div class="form-grid-2">
            <div class="form-group">
              <label class="form-label" for="password">Kata Sandi</label>
              <div class="input-wrapper">
                <span class="input-icon"><i data-lucide="lock"></i></span>
                <input type="password" name="password" id="password" class="form-input" 
                       placeholder="Minimal 6 karakter" required>
                <button type="button" class="input-toggle-btn" id="togglePasswordBtn" title="Lihat kata sandi">
                  <i data-lucide="eye" id="togglePasswordIcon"></i>
                </button>
              </div>
            </div>

            <div class="form-group">
              <label class="form-label" for="password_confirmation">Konfirmasi Sandi</label>
              <div class="input-wrapper">
                <span class="input-icon"><i data-lucide="shield-check"></i></span>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" 
                       placeholder="Ulangi kata sandi" required>
                <button type="button" class="input-toggle-btn" id="togglePasswordConfirmBtn" title="Lihat konfirmasi sandi">
                  <i data-lucide="eye" id="togglePasswordConfirmIcon"></i>
                </button>
              </div>
            </div>
          </div>

          <label class="checkbox-label">
            <input type="checkbox" name="terms" id="terms" {{ old('terms') ? 'checked' : '' }} required>
            <span>
              Saya menyetujui <a href="#!">Syarat & Ketentuan Layanan</a> serta <a href="#!">Kebijakan Privasi</a> Pawsy Pet Shop.
            </span>
          </label>

          <button type="submit" class="btn-submit">
            <i data-lucide="user-plus"></i> Buat Akun Pawsy Sekarang
          </button>
        </form>

        <div class="auth-footer-text">
          Sudah memiliki akun? 
          <a href="{{ route('login') }}">Masuk di Sini</a>
        </div>
      </div>

    </div>
  </main>

  <script>
    // Initialize Lucide Icons
    lucide.createIcons();

    // Password Visibility Toggles
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

    const togglePasswordConfirmBtn = document.getElementById('togglePasswordConfirmBtn');
    const passwordConfirmInput = document.getElementById('password_confirmation');
    const togglePasswordConfirmIcon = document.getElementById('togglePasswordConfirmIcon');

    if (togglePasswordConfirmBtn) {
      togglePasswordConfirmBtn.addEventListener('click', () => {
        const isPassword = passwordConfirmInput.getAttribute('type') === 'password';
        passwordConfirmInput.setAttribute('type', isPassword ? 'text' : 'password');
        togglePasswordConfirmIcon.setAttribute('data-lucide', isPassword ? 'eye-off' : 'eye');
        lucide.createIcons();
      });
    }
  </script>
</body>
</html>
