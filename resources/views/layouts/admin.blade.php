<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin Dashboard') - Pawsy Pet Shop</title>
  
  <!-- Favicon -->
  <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22%2338BDF8%22 stroke=%22%230284C7%22 stroke-width=%222%22><path d=%22M12 2a3 3 0 0 0-3 3c0 1.66 1.34 3 3 3s3-1.34 3-3a3 3 0 0 0-3-3zM5.5 8.5a2.5 2.5 0 0 0-2.5 2.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5a2.5 2.5 0 0 0-2.5-2.5zm13 0a2.5 2.5 0 0 0-2.5 2.5c0 1.38 1.12 2.5 2.5 2.5s2.5-1.12 2.5-2.5a2.5 2.5 0 0 0-2.5-2.5zM12 11c-2.5 0-4.5 1.5-4.5 4 0 2.5 2 4.5 4.5 4.5s4.5-2 4.5-4.5c0-2.5-2-4-4.5-4z%22/></svg>">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Quicksand:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- Lucide Icons Library (Official CDN) -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <style>
    :root {
      /* Pastel Palette Pawsy */
      --bg-admin: #F8FAFC;
      --bg-sidebar: #FFFDF7;
      --bg-card: #FFFFFF;
      --cream-border: #F1E5D1;
      --border-light: #E2E8F0;
      
      --blue-soft: #F0F9FF;
      --blue-light: #E0F2FE;
      --blue-medium: #BAE6FD;
      --blue-accent: #38BDF8;
      --blue-dark: #0284C7;
      
      --yellow-soft: #FEFCE8;
      --yellow-light: #FEF9C3;
      --yellow-accent: #FDE047;
      --yellow-vibrant: #F59E0B;
      
      --pink-soft: #FFF1F2;
      --pink-light: #FFE4E6;
      --pink-accent: #FB7185;
      --pink-dark: #E11D48;
      
      --mint-soft: #F0FDF4;
      --mint-light: #DCFCE7;
      --mint-accent: #22C55E;
      --mint-dark: #16A34A;
      
      --lavender-light: #F3E8FF;
      --lavender-accent: #C084FC;
      
      --text-dark: #1E293B;
      --text-body: #475569;
      --text-muted: #94A3B8;
      
      --radius-xs: 8px;
      --radius-sm: 14px;
      --radius-md: 20px;
      --radius-lg: 26px;
      --radius-full: 9999px;
      
      --shadow-sm: 0 2px 8px rgba(148, 163, 184, 0.08);
      --shadow-md: 0 8px 24px rgba(148, 163, 184, 0.12);
      --shadow-lg: 0 16px 36px rgba(148, 163, 184, 0.16);
      
      --sidebar-width: 270px;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Quicksand', sans-serif;
      background-color: var(--bg-admin);
      color: var(--text-body);
      min-height: 100vh;
      display: flex;
    }

    /* ==================== SIDEBAR ==================== */
    .admin-sidebar {
      width: var(--sidebar-width);
      background: var(--bg-sidebar);
      border-right: 1.5px solid var(--cream-border);
      display: flex;
      flex-direction: column;
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      z-index: 100;
      transition: all 0.3s ease;
    }

    .sidebar-header {
      padding: 1.6rem 1.8rem;
      border-bottom: 1.5px solid var(--cream-border);
    }

    .logo {
      display: inline-flex;
      align-items: center;
      gap: 0.75rem;
      text-decoration: none;
    }

    .logo-paw-icon {
      width: 40px;
      height: 40px;
      background: linear-gradient(135deg, var(--blue-accent), var(--blue-dark));
      border-radius: var(--radius-sm);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      box-shadow: 0 4px 12px rgba(56, 189, 248, 0.35);
      transform: rotate(-6deg);
    }

    .logo-paw-icon svg {
      width: 22px;
      height: 22px;
    }

    .logo-text {
      font-family: 'Fredoka', cursive;
      font-size: 1.55rem;
      font-weight: 700;
      color: var(--text-dark);
      letter-spacing: -0.5px;
    }

    .logo-dot {
      color: var(--blue-accent);
    }

    .admin-badge-pill {
      display: inline-flex;
      align-items: center;
      gap: 0.35rem;
      background: var(--yellow-light);
      color: #92400E;
      font-size: 0.72rem;
      font-weight: 700;
      padding: 0.2rem 0.6rem;
      border-radius: var(--radius-full);
      border: 1px solid rgba(245, 158, 11, 0.3);
      margin-top: 0.5rem;
    }

    .admin-badge-pill svg {
      width: 12px;
      height: 12px;
      color: var(--yellow-vibrant);
    }

    .sidebar-nav {
      flex: 1;
      padding: 1.5rem 1.2rem;
      display: flex;
      flex-direction: column;
      gap: 0.4rem;
      overflow-y: auto;
    }

    .nav-category {
      font-size: 0.75rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      color: var(--text-muted);
      padding: 0.7rem 0.8rem 0.3rem;
    }

    .nav-item {
      display: flex;
      align-items: center;
      gap: 0.85rem;
      padding: 0.8rem 1rem;
      border-radius: var(--radius-sm);
      color: var(--text-body);
      font-weight: 600;
      font-size: 0.93rem;
      text-decoration: none;
      transition: all 0.2s ease;
    }

    .nav-item svg {
      width: 20px;
      height: 20px;
      color: var(--text-muted);
      transition: color 0.2s ease;
    }

    .nav-item:hover {
      background: var(--blue-soft);
      color: var(--blue-dark);
    }

    .nav-item:hover svg {
      color: var(--blue-dark);
    }

    .nav-item.active {
      background: linear-gradient(135deg, var(--blue-accent), var(--blue-dark));
      color: white;
      box-shadow: 0 6px 16px rgba(2, 132, 199, 0.28);
    }

    .nav-item.active svg {
      color: white;
    }

    .sidebar-footer {
      padding: 1.2rem;
      border-top: 1.5px solid var(--cream-border);
      background: #FAF5E8;
    }

    .user-chip {
      display: flex;
      align-items: center;
      gap: 0.75rem;
      padding: 0.6rem 0.8rem;
      background: white;
      border: 1px solid var(--cream-border);
      border-radius: var(--radius-sm);
      box-shadow: var(--shadow-sm);
    }

    .user-avatar-circle {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: linear-gradient(135deg, #FEF08A, #F59E0B);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #78350F;
      font-weight: 700;
      font-family: 'Fredoka', cursive;
      font-size: 1.1rem;
      flex-shrink: 0;
    }

    .user-chip-info {
      flex: 1;
      min-width: 0;
    }

    .user-chip-name {
      font-weight: 700;
      font-size: 0.88rem;
      color: var(--text-dark);
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .user-chip-role {
      font-size: 0.75rem;
      color: var(--blue-dark);
      font-weight: 600;
    }

    /* ==================== MAIN CONTENT ==================== */
    .admin-main {
      flex: 1;
      margin-left: var(--sidebar-width);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Topbar */
    .admin-topbar {
      height: 72px;
      background: white;
      border-bottom: 1.5px solid var(--border-light);
      padding: 0 2rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: sticky;
      top: 0;
      z-index: 90;
      box-shadow: 0 2px 8px rgba(148, 163, 184, 0.04);
    }

    .topbar-left {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      cursor: pointer;
      color: var(--text-dark);
      padding: 0.4rem;
      border-radius: var(--radius-xs);
    }

    .topbar-title {
      font-family: 'Fredoka', cursive;
      font-size: 1.35rem;
      color: var(--text-dark);
      font-weight: 600;
    }

    .topbar-right {
      display: flex;
      align-items: center;
      gap: 0.85rem;
    }

    .btn {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.55rem 1.2rem;
      border-radius: var(--radius-full);
      font-family: 'Quicksand', sans-serif;
      font-size: 0.9rem;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      border: none;
      transition: all 0.2s ease;
    }

    .btn svg {
      width: 17px;
      height: 17px;
    }

    .btn-outline {
      background: white;
      border: 1.5px solid var(--border-light);
      color: var(--text-dark);
    }

    .btn-outline:hover {
      background: var(--blue-soft);
      border-color: var(--blue-accent);
      color: var(--blue-dark);
      transform: translateY(-1px);
    }

    .btn-danger-outline {
      background: white;
      border: 1.5px solid #FECACA;
      color: var(--pink-dark);
    }

    .btn-danger-outline:hover {
      background: var(--pink-soft);
      border-color: var(--pink-accent);
      transform: translateY(-1px);
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--blue-accent), var(--blue-dark));
      color: white;
      box-shadow: 0 4px 14px rgba(2, 132, 199, 0.25);
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 18px rgba(2, 132, 199, 0.35);
    }

    .admin-body {
      flex: 1;
      padding: 2rem;
    }

    /* Flash Alerts */
    .alert-toast {
      padding: 1rem 1.4rem;
      border-radius: var(--radius-sm);
      margin-bottom: 1.8rem;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 1rem;
      font-size: 0.93rem;
      box-shadow: var(--shadow-sm);
      animation: slideDown 0.3s ease;
    }

    @keyframes slideDown {
      from { transform: translateY(-15px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }

    .alert-toast-success {
      background: var(--mint-soft);
      border: 1.5px solid var(--mint-light);
      color: var(--mint-dark);
    }

    .alert-toast-error {
      background: var(--pink-soft);
      border: 1.5px solid var(--pink-light);
      color: var(--pink-dark);
    }

    .alert-toast-info {
      background: var(--blue-soft);
      border: 1.5px solid var(--blue-light);
      color: var(--blue-dark);
    }

    .alert-content {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .alert-content svg {
      width: 20px;
      height: 20px;
      flex-shrink: 0;
    }

    .alert-close {
      background: none;
      border: none;
      cursor: pointer;
      color: inherit;
      opacity: 0.7;
      display: flex;
      padding: 0.2rem;
    }

    .alert-close:hover {
      opacity: 1;
    }

    /* Modal Framework */
    .modal-backdrop {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(15, 23, 42, 0.45);
      backdrop-filter: blur(4px);
      display: none;
      align-items: center;
      justify-content: center;
      z-index: 1000;
      padding: 1.5rem;
      animation: fadeIn 0.2s ease;
    }

    .modal-backdrop.show {
      display: flex;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    .modal-window {
      background: white;
      border-radius: var(--radius-lg);
      border: 1.5px solid var(--cream-border);
      width: 100%;
      max-width: 520px;
      box-shadow: var(--shadow-lg);
      overflow: hidden;
      animation: scaleUp 0.25s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes scaleUp {
      from { transform: scale(0.92); opacity: 0; }
      to { transform: scale(1); opacity: 1; }
    }

    .modal-head {
      padding: 1.4rem 1.8rem;
      border-bottom: 1.5px solid var(--border-light);
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: var(--bg-sidebar);
    }

    .modal-title {
      font-family: 'Fredoka', cursive;
      font-size: 1.35rem;
      color: var(--text-dark);
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .modal-title svg {
      color: var(--blue-dark);
    }

    .modal-close-btn {
      background: none;
      border: none;
      cursor: pointer;
      color: var(--text-muted);
      display: flex;
      padding: 0.3rem;
      border-radius: var(--radius-xs);
      transition: all 0.15s ease;
    }

    .modal-close-btn:hover {
      background: var(--pink-soft);
      color: var(--pink-dark);
    }

    .modal-body {
      padding: 1.8rem;
    }

    .modal-foot {
      padding: 1.2rem 1.8rem;
      border-top: 1.5px solid var(--border-light);
      background: #F8FAFC;
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 0.75rem;
    }

    /* Responsive */
    @media (max-width: 900px) {
      .admin-sidebar {
        transform: translateX(-100%);
      }
      .admin-sidebar.open {
        transform: translateX(0);
      }
      .admin-main {
        margin-left: 0;
      }
      .mobile-menu-btn {
        display: block;
      }
      .admin-topbar {
        padding: 0 1.2rem;
      }
      .admin-body {
        padding: 1.2rem;
      }
    }
  </style>
  @yield('styles')
</head>
<body>

  <!-- ==================== SIDEBAR ==================== -->
  <aside class="admin-sidebar" id="adminSidebar">
    <div class="sidebar-header">
      <a href="{{ route('admin.dashboard') }}" class="logo">
        <div class="logo-paw-icon">
          <i data-lucide="paw-print"></i>
        </div>
        <span class="logo-text">Pawsy<span class="logo-dot">.</span></span>
      </a>
      <div class="admin-badge-pill">
        <i data-lucide="shield-check"></i> Admin Control Panel
      </div>
    </div>

    <nav class="sidebar-nav">
      <div class="nav-category">Menu Utama</div>
      
      <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <i data-lucide="layout-dashboard"></i>
        <span>Dashboard Overview</span>
      </a>

      <a href="{{ route('admin.dashboard') }}#users-table-section" class="nav-item">
        <i data-lucide="users"></i>
        <span>Kelola Data User</span>
      </a>

      <div class="nav-category">Toko & Landing Page</div>

      <a href="{{ route('home') }}#products" class="nav-item" target="_blank">
        <i data-lucide="shopping-bag"></i>
        <span>Katalog Produk</span>
      </a>

      <a href="{{ route('home') }}" class="nav-item" target="_blank">
        <i data-lucide="external-link"></i>
        <span>Lihat Website Toko</span>
      </a>
    </nav>

    <div class="sidebar-footer">
      <div class="user-chip">
        <div class="user-avatar-circle">
          {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
        </div>
        <div class="user-chip-info">
          <div class="user-chip-name" title="{{ Auth::user()->name ?? 'Admin' }}">{{ Auth::user()->name ?? 'Admin' }}</div>
          <div class="user-chip-role">👑 Super Admin</div>
        </div>
      </div>
    </div>
  </aside>

  <!-- ==================== MAIN CONTENT AREA ==================== -->
  <div class="admin-main">
    
    <!-- Topbar -->
    <header class="admin-topbar">
      <div class="topbar-left">
        <button class="mobile-menu-btn" id="sidebarToggle" aria-label="Toggle Navigation">
          <i data-lucide="menu"></i>
        </button>
        <h1 class="topbar-title">@yield('page_title', 'Admin Dashboard')</h1>
      </div>

      <div class="topbar-right">
        <a href="{{ route('home') }}" class="btn btn-outline" target="_blank" title="Buka Landing Page di Tab Baru">
          <i data-lucide="store"></i>
          <span>Lihat Toko</span>
        </a>

        <button type="button" class="btn btn-danger-outline" onclick="openLogoutModal()">
          <i data-lucide="log-out"></i>
          <span>Keluar</span>
        </button>
      </div>
    </header>

    <!-- Content Body -->
    <main class="admin-body">
      
      <!-- Toast Notifications -->
      @if(session('success'))
        <div class="alert-toast alert-toast-success" id="toastAlert">
          <div class="alert-content">
            <i data-lucide="check-circle"></i>
            <span>{{ session('success') }}</span>
          </div>
          <button class="alert-close" onclick="dismissToast()"><i data-lucide="x"></i></button>
        </div>
      @endif

      @if(session('error'))
        <div class="alert-toast alert-toast-error" id="toastAlert">
          <div class="alert-content">
            <i data-lucide="alert-circle"></i>
            <span>{{ session('error') }}</span>
          </div>
          <button class="alert-close" onclick="dismissToast()"><i data-lucide="x"></i></button>
        </div>
      @endif

      @if(session('info'))
        <div class="alert-toast alert-toast-info" id="toastAlert">
          <div class="alert-content">
            <i data-lucide="info"></i>
            <span>{{ session('info') }}</span>
          </div>
          <button class="alert-close" onclick="dismissToast()"><i data-lucide="x"></i></button>
        </div>
      @endif

      @yield('content')
    </main>
  </div>

  <!-- Logout Confirmation Modal -->
  <div class="modal-backdrop" id="logoutModal">
    <div class="modal-window">
      <div class="modal-head">
        <div class="modal-title">
          <i data-lucide="log-out" style="color: var(--pink-dark);"></i> Konfirmasi Keluar
        </div>
        <button class="modal-close-btn" onclick="closeLogoutModal()"><i data-lucide="x"></i></button>
      </div>
      <div class="modal-body">
        <p style="font-size: 0.98rem; line-height: 1.6; color: var(--text-body);">
          Apakah Anda yakin ingin keluar dari sesi Admin Pawsy Pet Shop?
        </p>
      </div>
      <div class="modal-foot">
        <button type="button" class="btn btn-outline" onclick="closeLogoutModal()">Batal</button>
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
          @csrf
          <button type="submit" class="btn" style="background: var(--pink-dark); color: white;">
            <i data-lucide="log-out"></i> Ya, Keluar Sekarang
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    lucide.createIcons();

    // Sidebar Mobile Toggle
    const sidebarToggle = document.getElementById('sidebarToggle');
    const adminSidebar = document.getElementById('adminSidebar');
    if (sidebarToggle && adminSidebar) {
      sidebarToggle.addEventListener('click', () => {
        adminSidebar.classList.toggle('open');
      });
    }

    // Dismiss Alert Toast
    function dismissToast() {
      const toast = document.getElementById('toastAlert');
      if (toast) {
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(-10px)';
        setTimeout(() => toast.remove(), 250);
      }
    }

    // Auto-dismiss toast after 6 seconds
    setTimeout(dismissToast, 6000);

    // Logout Modal
    function openLogoutModal() {
      document.getElementById('logoutModal').classList.add('show');
      lucide.createIcons();
    }

    function closeLogoutModal() {
      document.getElementById('logoutModal').classList.remove('show');
    }
  </script>
  @yield('scripts')
</body>
</html>
