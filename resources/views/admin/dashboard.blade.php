@extends('layouts.admin')

@section('title', 'Dashboard & Kelola User')
@section('page_title', 'Dashboard & Manajemen User')

@section('styles')
<style>
  /* Stat Cards */
  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 1.25rem;
    margin-bottom: 2rem;
  }

  .stat-card {
    background: white;
    padding: 1.5rem;
    border-radius: var(--radius-md);
    border: 1.5px solid var(--border-light);
    box-shadow: var(--shadow-sm);
    display: flex;
    align-items: center;
    justify-content: space-between;
    transition: all 0.25s ease;
  }

  .stat-card:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-md);
  }

  .stat-card-blue { border-left: 5px solid var(--blue-dark); }
  .stat-card-yellow { border-left: 5px solid var(--yellow-vibrant); }
  .stat-card-mint { border-left: 5px solid var(--mint-accent); }
  .stat-card-pink { border-left: 5px solid var(--pink-dark); }

  .stat-info h3 {
    font-size: 0.85rem;
    color: var(--text-muted);
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.4rem;
  }

  .stat-num {
    font-family: 'Fredoka', cursive;
    font-size: 2.1rem;
    font-weight: 700;
    color: var(--text-dark);
    line-height: 1;
  }

  .stat-icon-wrapper {
    width: 52px;
    height: 52px;
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .stat-icon-wrapper svg {
    width: 26px;
    height: 26px;
  }

  .icon-blue { background: var(--blue-soft); color: var(--blue-dark); }
  .icon-yellow { background: var(--yellow-soft); color: var(--yellow-vibrant); }
  .icon-mint { background: var(--mint-soft); color: var(--mint-dark); }
  .icon-pink { background: var(--pink-soft); color: var(--pink-dark); }

  /* User Management Section */
  .content-card {
    background: white;
    border-radius: var(--radius-lg);
    border: 1.5px solid var(--cream-border);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
  }

  .content-card-head {
    padding: 1.6rem 2rem;
    border-bottom: 1.5px solid var(--border-light);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
    background: #FFFEFA;
  }

  .card-title-group h2 {
    font-family: 'Fredoka', cursive;
    font-size: 1.45rem;
    color: var(--text-dark);
    display: flex;
    align-items: center;
    gap: 0.6rem;
  }

  .card-title-group p {
    font-size: 0.88rem;
    color: var(--text-muted);
    margin-top: 0.2rem;
  }

  /* Filter & Search Bar */
  .table-toolbar {
    padding: 1.2rem 2rem;
    border-bottom: 1px solid var(--border-light);
    background: #FAFCFE;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
  }

  .search-form {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    flex-wrap: wrap;
    flex: 1;
  }

  .search-input-box {
    position: relative;
    min-width: 260px;
    flex: 1;
    max-width: 400px;
  }

  .search-input-box svg {
    position: absolute;
    left: 1rem;
    top: 50%;
    transform: translateY(-50%);
    width: 17px;
    height: 17px;
    color: var(--text-muted);
  }

  .toolbar-input {
    width: 100%;
    padding: 0.6rem 1rem 0.6rem 2.5rem;
    border: 1.5px solid var(--border-light);
    border-radius: var(--radius-full);
    font-family: 'Quicksand', sans-serif;
    font-size: 0.88rem;
    outline: none;
    transition: all 0.2s ease;
    background: white;
  }

  .toolbar-input:focus {
    border-color: var(--blue-accent);
    box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.15);
  }

  .toolbar-select {
    padding: 0.6rem 1.2rem;
    border: 1.5px solid var(--border-light);
    border-radius: var(--radius-full);
    font-family: 'Quicksand', sans-serif;
    font-size: 0.88rem;
    background: white;
    color: var(--text-dark);
    outline: none;
    cursor: pointer;
    font-weight: 600;
  }

  .toolbar-select:focus {
    border-color: var(--blue-accent);
  }

  /* Table Style */
  .table-responsive {
    width: 100%;
    overflow-x: auto;
  }

  .pawsy-table {
    width: 100%;
    border-collapse: collapse;
    text-align: left;
    font-size: 0.92rem;
  }

  .pawsy-table th {
    background: #F8FAFC;
    padding: 1rem 1.5rem;
    font-weight: 700;
    font-size: 0.82rem;
    text-transform: uppercase;
    letter-spacing: 0.6px;
    color: var(--text-muted);
    border-bottom: 1.5px solid var(--border-light);
  }

  .pawsy-table td {
    padding: 1.1rem 1.5rem;
    border-bottom: 1px solid var(--border-light);
    vertical-align: middle;
  }

  .pawsy-table tr:last-child td {
    border-bottom: none;
  }

  .pawsy-table tbody tr {
    transition: background-color 0.15s ease;
  }

  .pawsy-table tbody tr:hover {
    background-color: #F8FAFC;
  }

  .user-cell {
    display: flex;
    align-items: center;
    gap: 0.85rem;
  }

  .table-avatar {
    width: 38px;
    height: 38px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Fredoka', cursive;
    font-weight: 700;
    font-size: 1rem;
    flex-shrink: 0;
  }

  .avatar-admin {
    background: linear-gradient(135deg, #BAE6FD, #38BDF8);
    color: #0369A1;
  }

  .avatar-user {
    background: linear-gradient(135deg, #DCFCE7, #86EFAC);
    color: #15803D;
  }

  .user-info-text .user-name {
    font-weight: 700;
    color: var(--text-dark);
    display: flex;
    align-items: center;
    gap: 0.4rem;
  }

  .user-info-text .user-email {
    font-size: 0.82rem;
    color: var(--text-muted);
  }

  /* Badges */
  .badge {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.35rem 0.8rem;
    border-radius: var(--radius-full);
    font-size: 0.8rem;
    font-weight: 700;
    letter-spacing: 0.3px;
  }

  .badge-admin {
    background: var(--blue-soft);
    color: var(--blue-dark);
    border: 1px solid var(--blue-medium);
  }

  .badge-user {
    background: var(--mint-soft);
    color: var(--mint-dark);
    border: 1px solid var(--mint-light);
  }

  .badge svg {
    width: 13px;
    height: 13px;
  }

  .date-text {
    font-size: 0.85rem;
    color: var(--text-body);
  }

  /* Action Buttons */
  .actions-cell {
    display: flex;
    align-items: center;
    gap: 0.45rem;
  }

  .btn-icon-action {
    width: 34px;
    height: 34px;
    border-radius: var(--radius-xs);
    border: 1px solid var(--border-light);
    background: white;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    color: var(--text-body);
    transition: all 0.15s ease;
  }

  .btn-icon-action:hover {
    transform: scale(1.06);
  }

  .btn-icon-view:hover {
    background: var(--blue-soft);
    border-color: var(--blue-accent);
    color: var(--blue-dark);
  }

  .btn-icon-edit:hover {
    background: var(--yellow-soft);
    border-color: var(--yellow-accent);
    color: var(--yellow-vibrant);
  }

  .btn-icon-delete:hover {
    background: var(--pink-soft);
    border-color: var(--pink-accent);
    color: var(--pink-dark);
  }

  .btn-icon-action svg {
    width: 16px;
    height: 16px;
  }

  /* Pagination container */
  .table-pagination {
    padding: 1.2rem 2rem;
    border-top: 1.5px solid var(--border-light);
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 1rem;
    background: #FAFCFE;
  }

  /* Modal Form Controls */
  .form-group-modal {
    margin-bottom: 1.2rem;
  }

  .form-label-modal {
    display: block;
    font-size: 0.88rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.35rem;
  }

  .form-input-modal, .form-select-modal {
    width: 100%;
    padding: 0.75rem 1rem;
    border: 1.5px solid var(--border-light);
    border-radius: var(--radius-sm);
    font-family: 'Quicksand', sans-serif;
    font-size: 0.92rem;
    outline: none;
    transition: all 0.2s ease;
    background: white;
  }

  .form-input-modal:focus, .form-select-modal:focus {
    border-color: var(--blue-accent);
    box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.15);
  }

  .input-hint {
    font-size: 0.78rem;
    color: var(--text-muted);
    margin-top: 0.3rem;
  }

  /* Empty state */
  .empty-state {
    padding: 3.5rem 1.5rem;
    text-align: center;
  }

  .empty-icon-circle {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    background: var(--blue-soft);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    color: var(--blue-dark);
  }

  .empty-icon-circle svg {
    width: 32px;
    height: 32px;
  }

  .empty-title {
    font-family: 'Fredoka', cursive;
    font-size: 1.3rem;
    color: var(--text-dark);
    margin-bottom: 0.4rem;
  }

  .empty-desc {
    font-size: 0.9rem;
    color: var(--text-muted);
    max-width: 400px;
    margin: 0 auto;
  }
</style>
@endsection

@section('content')

<!-- ==================== STAT CARDS ==================== -->
<div class="stats-grid">
  <!-- Total Users -->
  <div class="stat-card stat-card-blue">
    <div class="stat-info">
      <h3>Total Pengguna</h3>
      <div class="stat-num">{{ number_format($totalUsers) }}</div>
    </div>
    <div class="stat-icon-wrapper icon-blue">
      <i data-lucide="users"></i>
    </div>
  </div>

  <!-- Total Admins -->
  <div class="stat-card stat-card-yellow">
    <div class="stat-info">
      <h3>Administrator</h3>
      <div class="stat-num">{{ number_format($totalAdmins) }}</div>
    </div>
    <div class="stat-icon-wrapper icon-yellow">
      <i data-lucide="shield-check"></i>
    </div>
  </div>

  <!-- Total Regular Users -->
  <div class="stat-card stat-card-mint">
    <div class="stat-info">
      <h3>Pelanggan (User)</h3>
      <div class="stat-num">{{ number_format($totalRegularUsers) }}</div>
    </div>
    <div class="stat-icon-wrapper icon-mint">
      <i data-lucide="paw-print"></i>
    </div>
  </div>

  <!-- New Users Today -->
  <div class="stat-card stat-card-pink">
    <div class="stat-info">
      <h3>Terdaftar Hari Ini</h3>
      <div class="stat-num">{{ number_format($newUsersToday) }}</div>
    </div>
    <div class="stat-icon-wrapper icon-pink">
      <i data-lucide="user-plus"></i>
    </div>
  </div>
</div>

<!-- ==================== USER MANAGEMENT CRUD SECTION ==================== -->
<div class="content-card" id="users-table-section">
  <!-- Card Header -->
  <div class="content-card-head">
    <div class="card-title-group">
      <h2><i data-lucide="users" style="color: var(--blue-dark); width: 22px; height: 22px;"></i> Kelola Data Pengguna</h2>
      <p>Daftar lengkap pengguna yang terdaftar pada sistem Pawsy Pet Shop (CRUD & Role Management).</p>
    </div>

    <button type="button" class="btn btn-primary" onclick="openAddUserModal()">
      <i data-lucide="plus"></i>
      <span>Tambah User Baru</span>
    </button>
  </div>

  <!-- Toolbar Search & Filters -->
  <div class="table-toolbar">
    <form action="{{ route('admin.dashboard') }}" method="GET" class="search-form">
      <div class="search-input-box">
        <i data-lucide="search"></i>
        <input type="text" name="search" class="toolbar-input" 
               placeholder="Cari berdasarkan nama, email, atau ID..." 
               value="{{ request('search') }}">
      </div>

      <select name="role" class="toolbar-select" onchange="this.form.submit()">
        <option value="">Semua Role (Semua Akses)</option>
        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>👑 Admin Saja</option>
        <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>🐾 User Biasa Saja</option>
      </select>

      <button type="submit" class="btn btn-outline" style="padding: 0.55rem 1rem;">
        <i data-lucide="filter"></i> Filter
      </button>

      @if(request('search') || request('role'))
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline" style="color: var(--pink-dark); border-color: #FECACA;">
          <i data-lucide="rotate-ccw"></i> Reset
        </a>
      @endif
    </form>
  </div>

  <!-- Table Component -->
  <div class="table-responsive">
    <table class="pawsy-table">
      <thead>
        <tr>
          <th style="width: 80px;">ID</th>
          <th>Pengguna</th>
          <th style="width: 140px;">Role / Hak Akses</th>
          <th style="width: 180px;">Tanggal Daftar</th>
          <th style="width: 140px; text-align: center;">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $user)
          <tr>
            <td>
              <strong style="color: var(--text-muted); font-family: monospace;">#{{ $user->id }}</strong>
            </td>
            <td>
              <div class="user-cell">
                <div class="table-avatar {{ $user->role === 'admin' ? 'avatar-admin' : 'avatar-user' }}">
                  {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div class="user-info-text">
                  <div class="user-name">
                    {{ $user->name }}
                    @if(Auth::id() === $user->id)
                      <span style="font-size: 0.7rem; background: #FEF9C3; color: #854D0E; padding: 2px 6px; border-radius: 4px; font-weight: 700;">(Anda)</span>
                    @endif
                  </div>
                  <div class="user-email">{{ $user->email }}</div>
                </div>
              </div>
            </td>
            <td>
              @if($user->role === 'admin')
                <span class="badge badge-admin">
                  <i data-lucide="shield-check"></i> Admin
                </span>
              @else
                <span class="badge badge-user">
                  <i data-lucide="paw-print"></i> User
                </span>
              @endif
            </td>
            <td>
              <span class="date-text" title="{{ $user->created_at }}">
                <i data-lucide="calendar" style="width: 13px; height: 13px; vertical-align: middle; margin-right: 2px; color: var(--text-muted);"></i>
                {{ $user->created_at->format('d M Y, H:i') }}
              </span>
            </td>
            <td>
              <div class="actions-cell" style="justify-content: center;">
                <!-- View Detail -->
                <button type="button" class="btn-icon-action btn-icon-view" 
                        title="Lihat Detail User"
                        onclick="openViewModal({{ json_encode($user) }})">
                  <i data-lucide="eye"></i>
                </button>

                <!-- Edit User -->
                <button type="button" class="btn-icon-action btn-icon-edit" 
                        title="Edit Data User"
                        onclick="openEditModal({{ json_encode($user) }})">
                  <i data-lucide="pencil"></i>
                </button>

                <!-- Delete User -->
                @if(Auth::id() !== $user->id)
                  <button type="button" class="btn-icon-action btn-icon-delete" 
                          title="Hapus User"
                          onclick="openDeleteModal({{ $user->id }}, '{{ addslashes($user->name) }}')">
                    <i data-lucide="trash-2"></i>
                  </button>
                @else
                  <button type="button" class="btn-icon-action" style="opacity: 0.4; cursor: not-allowed;" title="Tidak dapat menghapus akun Anda sendiri">
                    <i data-lucide="trash-2"></i>
                  </button>
                @endif
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5">
              <div class="empty-state">
                <div class="empty-icon-circle">
                  <i data-lucide="search-x"></i>
                </div>
                <h3 class="empty-title">Data Pengguna Tidak Ditemukan</h3>
                <p class="empty-desc">
                  Tidak ada data yang cocok dengan kriteria pencarian atau filter yang dipilih. Coba kata kunci lain atau reset filter.
                </p>
              </div>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Table Pagination -->
  @if($users->hasPages())
    <div class="table-pagination">
      <div style="font-size: 0.85rem; color: var(--text-muted);">
        Menampilkan <strong>{{ $users->firstItem() }}</strong> - <strong>{{ $users->lastItem() }}</strong> dari <strong>{{ $users->total() }}</strong> pengguna
      </div>
      <div>
        {{ $users->links() }}
      </div>
    </div>
  @endif
</div>

<!-- ==================== MODAL TAMBAH USER (CREATE) ==================== -->
<div class="modal-backdrop" id="addUserModal">
  <div class="modal-window">
    <div class="modal-head">
      <div class="modal-title">
        <i data-lucide="user-plus"></i> Tambah Pengguna Baru
      </div>
      <button class="modal-close-btn" onclick="closeAddUserModal()"><i data-lucide="x"></i></button>
    </div>

    <form action="{{ route('admin.users.store') }}" method="POST">
      @csrf
      <div class="modal-body">
        <div class="form-group-modal">
          <label class="form-label-modal" for="add_name">Nama Lengkap</label>
          <input type="text" name="name" id="add_name" class="form-input-modal" placeholder="contoh: Sarah Amanda" required>
        </div>

        <div class="form-group-modal">
          <label class="form-label-modal" for="add_email">Alamat Email</label>
          <input type="email" name="email" id="add_email" class="form-input-modal" placeholder="nama@email.com" required>
        </div>

        <div class="form-group-modal">
          <label class="form-label-modal" for="add_role">Hak Akses (Role)</label>
          <select name="role" id="add_role" class="form-select-modal" required>
            <option value="user">🐾 Pelanggan (User Biasa)</option>
            <option value="admin">👑 Administrator (Akses Penuh)</option>
          </select>
        </div>

        <div class="form-group-modal">
          <label class="form-label-modal" for="add_password">Kata Sandi</label>
          <input type="password" name="password" id="add_password" class="form-input-modal" placeholder="Minimal 6 karakter" required>
          <div class="input-hint">Kata sandi dapat digunakan pengguna untuk login ke akun mereka.</div>
        </div>
      </div>

      <div class="modal-foot">
        <button type="button" class="btn btn-outline" onclick="closeAddUserModal()">Batal</button>
        <button type="submit" class="btn btn-primary">
          <i data-lucide="plus-circle"></i> Simpan Pengguna
        </button>
      </div>
    </form>
  </div>
</div>

<!-- ==================== MODAL EDIT USER (UPDATE) ==================== -->
<div class="modal-backdrop" id="editUserModal">
  <div class="modal-window">
    <div class="modal-head">
      <div class="modal-title">
        <i data-lucide="user-cog"></i> Edit Data Pengguna
      </div>
      <button class="modal-close-btn" onclick="closeEditUserModal()"><i data-lucide="x"></i></button>
    </div>

    <form id="editUserForm" method="POST">
      @csrf
      @method('PUT')

      <div class="modal-body">
        <div class="form-group-modal">
          <label class="form-label-modal" for="edit_name">Nama Lengkap</label>
          <input type="text" name="name" id="edit_name" class="form-input-modal" required>
        </div>

        <div class="form-group-modal">
          <label class="form-label-modal" for="edit_email">Alamat Email</label>
          <input type="email" name="email" id="edit_email" class="form-input-modal" required>
        </div>

        <div class="form-group-modal">
          <label class="form-label-modal" for="edit_role">Hak Akses (Role)</label>
          <select name="role" id="edit_role" class="form-select-modal" required>
            <option value="user">🐾 Pelanggan (User Biasa)</option>
            <option value="admin">👑 Administrator (Akses Penuh)</option>
          </select>
        </div>

        <div class="form-group-modal">
          <label class="form-label-modal" for="edit_password">Ubah Kata Sandi (Opsional)</label>
          <input type="password" name="password" id="edit_password" class="form-input-modal" placeholder="Kosongkan jika tidak ingin mengubah sandi">
          <div class="input-hint">Hanya isi kolom ini jika ingin mereset/mengganti kata sandi user.</div>
        </div>
      </div>

      <div class="modal-foot">
        <button type="button" class="btn btn-outline" onclick="closeEditUserModal()">Batal</button>
        <button type="submit" class="btn btn-primary">
          <i data-lucide="check"></i> Simpan Perubahan
        </button>
      </div>
    </form>
  </div>
</div>

<!-- ==================== MODAL DETAIL USER (READ) ==================== -->
<div class="modal-backdrop" id="viewUserModal">
  <div class="modal-window">
    <div class="modal-head">
      <div class="modal-title">
        <i data-lucide="id-card"></i> Informasi Detail Pengguna
      </div>
      <button class="modal-close-btn" onclick="closeViewUserModal()"><i data-lucide="x"></i></button>
    </div>

    <div class="modal-body">
      <div style="text-align: center; margin-bottom: 1.5rem;">
        <div id="view_avatar" style="width: 64px; height: 64px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-family: 'Fredoka', cursive; font-size: 1.8rem; font-weight: 700; margin: 0 auto 0.6rem; color: white;">
        </div>
        <h3 id="view_name" style="font-family: 'Fredoka', cursive; font-size: 1.35rem; color: var(--text-dark);"></h3>
        <p id="view_email" style="color: var(--text-muted); font-size: 0.9rem;"></p>
      </div>

      <div style="background: var(--bg-admin); border-radius: var(--radius-sm); border: 1px solid var(--border-light); padding: 1rem 1.2rem; display: flex; flex-direction: column; gap: 0.75rem;">
        <div style="display: flex; justify-content: space-between; font-size: 0.9rem;">
          <span style="color: var(--text-muted);">User ID:</span>
          <strong id="view_id" style="font-family: monospace;"></strong>
        </div>
        <div style="display: flex; justify-content: space-between; font-size: 0.9rem; align-items: center;">
          <span style="color: var(--text-muted);">Role / Hak Akses:</span>
          <span id="view_role_badge"></span>
        </div>
        <div style="display: flex; justify-content: space-between; font-size: 0.9rem;">
          <span style="color: var(--text-muted);">Tanggal Terdaftar:</span>
          <strong id="view_created_at"></strong>
        </div>
        <div style="display: flex; justify-content: space-between; font-size: 0.9rem;">
          <span style="color: var(--text-muted);">Terakhir Diperbarui:</span>
          <strong id="view_updated_at"></strong>
        </div>
      </div>
    </div>

    <div class="modal-foot">
      <button type="button" class="btn btn-outline" onclick="closeViewUserModal()">Tutup</button>
    </div>
  </div>
</div>

<!-- ==================== MODAL HAPUS USER (DELETE) ==================== -->
<div class="modal-backdrop" id="deleteUserModal">
  <div class="modal-window">
    <div class="modal-head">
      <div class="modal-title">
        <i data-lucide="alert-triangle" style="color: var(--pink-dark);"></i> Hapus Data Pengguna
      </div>
      <button class="modal-close-btn" onclick="closeDeleteUserModal()"><i data-lucide="x"></i></button>
    </div>

    <form id="deleteUserForm" method="POST">
      @csrf
      @method('DELETE')

      <div class="modal-body">
        <p style="font-size: 0.95rem; line-height: 1.6; color: var(--text-body); margin-bottom: 1rem;">
          Apakah Anda yakin ingin menghapus akun pengguna <strong id="delete_user_name" style="color: var(--text-dark);"></strong>?
        </p>
        <div style="background: var(--pink-soft); border: 1.5px solid var(--pink-light); padding: 0.85rem 1rem; border-radius: var(--radius-sm); color: var(--pink-dark); font-size: 0.85rem; display: flex; gap: 0.5rem; align-items: flex-start;">
          <i data-lucide="alert-circle" style="width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px;"></i>
          <span>Tindakan ini permanen. Pengguna yang dihapus tidak akan dapat masuk kembali ke sistem Pawsy.</span>
        </div>
      </div>

      <div class="modal-foot">
        <button type="button" class="btn btn-outline" onclick="closeDeleteUserModal()">Batal</button>
        <button type="submit" class="btn" style="background: var(--pink-dark); color: white;">
          <i data-lucide="trash-2"></i> Ya, Hapus Pengguna
        </button>
      </div>
    </form>
  </div>
</div>

@endsection

@section('scripts')
<script>
  // Add User Modal
  function openAddUserModal() {
    document.getElementById('addUserModal').classList.add('show');
    lucide.createIcons();
  }

  function closeAddUserModal() {
    document.getElementById('addUserModal').classList.remove('show');
  }

  // Edit User Modal
  function openEditModal(user) {
    const form = document.getElementById('editUserForm');
    form.action = `/admin/users/${user.id}`;
    
    document.getElementById('edit_name').value = user.name;
    document.getElementById('edit_email').value = user.email;
    document.getElementById('edit_role').value = user.role;
    document.getElementById('edit_password').value = '';

    document.getElementById('editUserModal').classList.add('show');
    lucide.createIcons();
  }

  function closeEditUserModal() {
    document.getElementById('editUserModal').classList.remove('show');
  }

  // View User Modal
  function openViewModal(user) {
    document.getElementById('view_id').innerText = '#' + user.id;
    document.getElementById('view_name').innerText = user.name;
    document.getElementById('view_email').innerText = user.email;
    
    const avatar = document.getElementById('view_avatar');
    avatar.innerText = user.name.charAt(0).toUpperCase();
    if (user.role === 'admin') {
      avatar.style.background = 'linear-gradient(135deg, #38BDF8, #0284C7)';
    } else {
      avatar.style.background = 'linear-gradient(135deg, #22C55E, #15803D)';
    }

    const roleBadge = document.getElementById('view_role_badge');
    if (user.role === 'admin') {
      roleBadge.className = 'badge badge-admin';
      roleBadge.innerHTML = '<i data-lucide="shield-check" style="width:13px;height:13px;"></i> Administrator';
    } else {
      roleBadge.className = 'badge badge-user';
      roleBadge.innerHTML = '<i data-lucide="paw-print" style="width:13px;height:13px;"></i> Pelanggan (User)';
    }

    const created = new Date(user.created_at);
    document.getElementById('view_created_at').innerText = created.toLocaleString('id-ID', { dateStyle: 'medium', timeStyle: 'short' });
    
    const updated = new Date(user.updated_at);
    document.getElementById('view_updated_at').innerText = updated.toLocaleString('id-ID', { dateStyle: 'medium', timeStyle: 'short' });

    document.getElementById('viewUserModal').classList.add('show');
    lucide.createIcons();
  }

  function closeViewUserModal() {
    document.getElementById('viewUserModal').classList.remove('show');
  }

  // Delete User Modal
  function openDeleteModal(userId, userName) {
    const form = document.getElementById('deleteUserForm');
    form.action = `/admin/users/${userId}`;
    document.getElementById('delete_user_name').innerText = `"${userName}" (ID: #${userId})`;

    document.getElementById('deleteUserModal').classList.add('show');
    lucide.createIcons();
  }

  function closeDeleteUserModal() {
    document.getElementById('deleteUserModal').classList.remove('show');
  }
</script>
@endsection
