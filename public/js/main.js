/**
 * PAWSY PET SHOP - JAVASCRIPT ENGINE
 * Handles Cart Management, Filtering, Modals, Easter Egg, Audio & Lucide Icons Integration
 */

// 1. PRODUCT CATALOG DATA WITH LUCIDE ICON NAMES
const PRODUCTS_DATA = [
  {
    id: 1,
    name: "Royal Canin Mini Adult 2kg",
    category: "food",
    categoryLabel: "Makanan & Snack",
    price: 185000,
    originalPrice: 220000,
    rating: 5,
    reviews: 142,
    badge: "Best Seller",
    badgeType: "best",
    iconName: "bone",
    desc: "Formula nutrisi presisi tinggi untuk anjing ras kecil usia 10 bulan ke atas. Menjaga kesehatan pencernaan, bulu berkilau, dan gigi sehat."
  },
  {
    id: 2,
    name: "Whiskas Tuna & Salmon Gourmet 1.2kg",
    category: "food",
    categoryLabel: "Makanan & Snack",
    price: 95000,
    originalPrice: 115000,
    rating: 5,
    reviews: 98,
    badge: "Diskon 18%",
    badgeType: "sale",
    iconName: "fish",
    desc: "Kaya akan Omega 3 & 6 dan Zinc untuk bulu sehat berkilau serta vitamin A dan Taurin untuk kesehatan mata kucing kesayangan."
  },
  {
    id: 3,
    name: "Chew Bone Rubber Toy with Squeaker",
    category: "toys",
    categoryLabel: "Mainan & Aktivitas",
    price: 45000,
    originalPrice: 60000,
    rating: 5,
    reviews: 76,
    badge: "Favorit",
    badgeType: "best",
    iconName: "bone",
    desc: "Mainan gigitan karet alami 100% non-toxic dengan suara mencicit yang seru. Membantu membersihkan karang gigi anabul saat bermain."
  },
  {
    id: 4,
    name: "Interactive Cat Feather Wand & Bell",
    category: "toys",
    categoryLabel: "Mainan & Aktivitas",
    price: 32000,
    originalPrice: 45000,
    rating: 5,
    reviews: 112,
    badge: "Cute Pick",
    badgeType: "new",
    iconName: "sparkles",
    desc: "Tongkat bulu elastis dengan lonceng kecil gemerincing. Merangsang naluri berburu kucing agar tetap aktif, lincah, dan gembira."
  },
  {
    id: 5,
    name: "Organic Fluffy Lavender Pet Shampoo 500ml",
    category: "grooming",
    categoryLabel: "Grooming & Mandi",
    price: 78000,
    originalPrice: 95000,
    rating: 5,
    reviews: 84,
    badge: "100% Organik",
    badgeType: "new",
    iconName: "bath",
    desc: "Formula lembut tanpa SLS & Paraben dengan ekstrak Lavender dan Aloe Vera. Mencegah jamur, kutu, dan wangi tahan hingga 7 hari."
  },
  {
    id: 6,
    name: "Pawsy Premium Deshedding Slicker Brush",
    category: "grooming",
    categoryLabel: "Grooming & Mandi",
    price: 55000,
    originalPrice: 70000,
    rating: 5,
    reviews: 65,
    badge: "Praktis",
    badgeType: "best",
    iconName: "brush",
    desc: "Sisir dengan ujung pelindung bulat lembut dan tombol self-cleaning sekali tekan untuk membuang bulu rontok tanpa melukai kulit."
  },
  {
    id: 7,
    name: "Fluffy Marshmallow Donut Pet Bed (Size M)",
    category: "accessories",
    categoryLabel: "Aksesoris & Kasur",
    price: 165000,
    originalPrice: 210000,
    rating: 5,
    reviews: 180,
    badge: "Super Empuk",
    badgeType: "best",
    iconName: "bed",
    desc: "Kasur anabul bentuk donat dengan bulu faux fur ultra-lembut. Memberikan kenyamanan pereda kecemasan dan tidur nyenyak maksimal."
  },
  {
    id: 8,
    name: "Multivitamin & Calcium Paste Gel 120g",
    category: "health",
    categoryLabel: "Kesehatan & Vitamin",
    price: 88000,
    originalPrice: 110000,
    rating: 5,
    reviews: 91,
    badge: "Rekomendasi Vet",
    badgeType: "new",
    iconName: "pill",
    desc: "Suplemen lengkap dengan rasa lezat yang disukai anabul. Meningkatkan nafsu makan, daya tahan tubuh, dan kepadatan tulang."
  }
];

// 2. STATE MANAGEMENT
let cart = JSON.parse(localStorage.getItem('pawsy_cart')) || [
  {
    id: 1,
    name: "Royal Canin Mini Adult 2kg",
    price: 185000,
    iconName: "bone",
    qty: 1
  },
  {
    id: 3,
    name: "Chew Bone Rubber Toy",
    price: 45000,
    iconName: "bone",
    qty: 1
  }
];

let wishlist = JSON.parse(localStorage.getItem('pawsy_wishlist')) || [1];

// 3. INITIALIZATION
document.addEventListener('DOMContentLoaded', () => {
  initNavbar();
  renderProducts('all');
  initCategoryTabs();
  initCartUI();
  initFAQ();
  initCountdown();
  initEasterEgg();
  initForms();
  refreshLucideIcons();
});

function refreshLucideIcons() {
  if (typeof lucide !== 'undefined' && lucide.createIcons) {
    lucide.createIcons();
  }
}

// 4. NAVBAR & SCROLL BEHAVIOR
function initNavbar() {
  const navbar = document.getElementById('navbar');
  const mobileToggle = document.getElementById('mobileToggle');
  const navMenu = document.getElementById('navMenu');

  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', () => {
      navMenu.classList.toggle('open');
      const isOpen = navMenu.classList.contains('open');
      mobileToggle.innerHTML = isOpen 
        ? '<i data-lucide="x"></i>' 
        : '<i data-lucide="menu"></i>';
      refreshLucideIcons();
    });

    // Close menu when clicking nav link
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        navMenu.classList.remove('open');
        mobileToggle.innerHTML = '<i data-lucide="menu"></i>';
        refreshLucideIcons();
      });
    });
  }
}

// Helper to render star SVGs
function renderStarRating(count = 5) {
  let stars = '';
  for (let i = 0; i < 5; i++) {
    if (i < count) {
      stars += '<i data-lucide="star" class="star-filled"></i>';
    } else {
      stars += '<i data-lucide="star" class="star-outline"></i>';
    }
  }
  return stars;
}

// 5. RENDER PRODUCTS
function renderProducts(category = 'all') {
  const grid = document.getElementById('productsGrid');
  if (!grid) return;

  const filtered = category === 'all' 
    ? PRODUCTS_DATA 
    : PRODUCTS_DATA.filter(p => p.category === category);

  grid.innerHTML = filtered.map(product => {
    const isWishlisted = wishlist.includes(product.id);
    return `
      <div class="product-card" data-category="${product.category}">
        <div class="product-image-box">
          <span class="product-badge badge-${product.badgeType}">${product.badge}</span>
          <button class="btn-wishlist ${isWishlisted ? 'active' : ''}" onclick="toggleWishlist(${product.id}, this)" title="Tambah ke Wishlist">
            <i data-lucide="heart" style="${isWishlisted ? 'fill:#FB7185;stroke:#FB7185;' : ''}"></i>
          </button>
          <div class="product-icon-container">
            <i data-lucide="${product.iconName}"></i>
          </div>
        </div>
        <div class="product-content">
          <span class="product-category">${product.categoryLabel}</span>
          <h3 class="product-title">${product.name}</h3>
          <div class="product-rating">
            <div class="rating-stars">
              ${renderStarRating(product.rating)}
            </div>
            <span class="rating-count">(${product.reviews})</span>
          </div>
          <div class="product-footer">
            <div class="product-price">
              <span class="price-current">Rp ${product.price.toLocaleString('id-ID')}</span>
              <span class="price-original">Rp ${product.originalPrice.toLocaleString('id-ID')}</span>
            </div>
            <div style="display: flex; gap: 0.4rem;">
              <button class="btn btn-outline btn-sm" onclick="openQuickView(${product.id})" title="Lihat Detail">
                <i data-lucide="eye"></i> Detail
              </button>
              <button class="btn-add-cart" onclick="addToCart(${product.id})" title="Tambah ke Keranjang">
                <i data-lucide="plus"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    `;
  }).join('');

  refreshLucideIcons();
}

// 6. CATEGORY FILTER TABS
function initCategoryTabs() {
  const tabs = document.querySelectorAll('.cat-tab');
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');
      const cat = tab.getAttribute('data-cat');
      renderProducts(cat);
    });
  });
}

// 7. CART SYSTEM
function initCartUI() {
  const cartBtn = document.getElementById('cartBtn');
  const cartDrawer = document.getElementById('cartDrawer');
  const cartOverlay = document.getElementById('cartOverlay');
  const closeDrawer = document.getElementById('closeCartDrawer');

  if (cartBtn) {
    cartBtn.addEventListener('click', () => openCart());
  }

  if (closeDrawer) {
    closeDrawer.addEventListener('click', () => closeCart());
  }

  if (cartOverlay) {
    cartOverlay.addEventListener('click', () => closeCart());
  }

  updateCartDisplay();
}

function openCart() {
  document.getElementById('cartDrawer')?.classList.add('open');
  document.getElementById('cartOverlay')?.classList.add('open');
  refreshLucideIcons();
}

function closeCart() {
  document.getElementById('cartDrawer')?.classList.remove('open');
  document.getElementById('cartOverlay')?.classList.remove('open');
}

function addToCart(productId) {
  const product = PRODUCTS_DATA.find(p => p.id === productId);
  if (!product) return;

  const existing = cart.find(item => item.id === productId);
  if (existing) {
    existing.qty += 1;
  } else {
    cart.push({
      id: product.id,
      name: product.name,
      price: product.price,
      iconName: product.iconName,
      qty: 1
    });
  }

  saveCart();
  updateCartDisplay();
  showToast(`"${product.name}" berhasil ditambahkan ke keranjang!`);
  createPawSparkle(window.innerWidth / 2, window.innerHeight / 2, 4);
}

function changeQty(productId, delta) {
  const item = cart.find(i => i.id === productId);
  if (!item) return;

  item.qty += delta;
  if (item.qty <= 0) {
    cart = cart.filter(i => i.id !== productId);
  }

  saveCart();
  updateCartDisplay();
}

function removeFromCart(productId) {
  cart = cart.filter(i => i.id !== productId);
  saveCart();
  updateCartDisplay();
  showToast("Item telah dihapus dari keranjang.");
}

function saveCart() {
  localStorage.setItem('pawsy_cart', JSON.stringify(cart));
}

function updateCartDisplay() {
  const badge = document.getElementById('cartCount');
  const itemsContainer = document.getElementById('cartItemsList');
  const subtotalEl = document.getElementById('cartSubtotal');
  const totalEl = document.getElementById('cartTotal');

  const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
  if (badge) {
    badge.textContent = totalItems;
    badge.style.display = totalItems > 0 ? 'flex' : 'none';
  }

  if (!itemsContainer) return;

  if (cart.length === 0) {
    itemsContainer.innerHTML = `
      <div class="cart-empty">
        <div class="cart-empty-icon">
          <i data-lucide="shopping-bag"></i>
        </div>
        <h4>Keranjangmu masih kosong</h4>
        <p style="font-size: 0.9rem; margin-top: 0.4rem;">Yuk pilih kebutuhan anabul kesayanganmu sekarang!</p>
        <button class="btn btn-primary btn-sm" style="margin-top: 1rem;" onclick="closeCart(); scrollToSection('products');">
          <i data-lucide="shopping-bag"></i> Belanja Sekarang
        </button>
      </div>
    `;
    if (subtotalEl) subtotalEl.textContent = "Rp 0";
    if (totalEl) totalEl.textContent = "Rp 0";
    refreshLucideIcons();
    return;
  }

  let subtotal = 0;
  itemsContainer.innerHTML = cart.map(item => {
    const itemTotal = item.price * item.qty;
    subtotal += itemTotal;
    return `
      <div class="cart-item">
        <div class="cart-item-img">
          <i data-lucide="${item.iconName || 'bone'}"></i>
        </div>
        <div class="cart-item-info">
          <div class="cart-item-title">${item.name}</div>
          <div class="cart-item-price">Rp ${item.price.toLocaleString('id-ID')}</div>
          <div class="cart-qty-ctrl">
            <button class="qty-btn" onclick="changeQty(${item.id}, -1)" title="Kurangi">
              <i data-lucide="minus"></i>
            </button>
            <span class="qty-num">${item.qty}</span>
            <button class="qty-btn" onclick="changeQty(${item.id}, 1)" title="Tambah">
              <i data-lucide="plus"></i>
            </button>
          </div>
        </div>
        <button class="btn-remove-item" onclick="removeFromCart(${item.id})" title="Hapus Item">
          <i data-lucide="trash-2"></i>
        </button>
      </div>
    `;
  }).join('');

  if (subtotalEl) subtotalEl.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
  if (totalEl) totalEl.textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
  refreshLucideIcons();
}

// 8. QUICK VIEW MODAL
function openQuickView(productId) {
  const product = PRODUCTS_DATA.find(p => p.id === productId);
  if (!product) return;

  const modal = document.getElementById('quickViewModal');
  const modalContent = document.getElementById('quickViewContent');
  if (!modal || !modalContent) return;

  modalContent.innerHTML = `
    <div style="text-align: center; margin-bottom: 1.5rem;">
      <div class="modal-icon-header">
        <i data-lucide="${product.iconName}"></i>
      </div>
      <span class="product-badge badge-${product.badgeType}" style="position: static; display: inline-block; margin-top: 1rem;">${product.badge}</span>
      <h3 style="font-size: 1.5rem; margin-top: 0.5rem;">${product.name}</h3>
      <p style="color: var(--blue-dark); font-weight: 700; font-size: 0.9rem;">${product.categoryLabel}</p>
    </div>
    
    <p style="color: var(--text-body); font-size: 0.95rem; margin-bottom: 1.5rem; line-height: 1.6; background: var(--bg-cream); padding: 1rem; border-radius: var(--radius-sm);">
      ${product.desc}
    </p>

    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1.5rem;">
      <div>
        <div style="font-size: 1.4rem; font-weight: 700; font-family: 'Fredoka', cursive; color: #0284C7;">
          Rp ${product.price.toLocaleString('id-ID')}
        </div>
        <div style="font-size: 0.85rem; color: var(--text-muted); text-decoration: line-through;">
          Rp ${product.originalPrice.toLocaleString('id-ID')}
        </div>
      </div>
      <div style="display: flex; align-items: center; gap: 0.35rem; color: #F59E0B; font-weight: 700; font-size: 0.95rem;">
        <i data-lucide="star" class="star-filled"></i> ${product.rating}.0 (${product.reviews} ulasan)
      </div>
    </div>

    <button class="btn btn-primary" style="width: 100%;" onclick="addToCart(${product.id}); closeQuickView();">
      <i data-lucide="shopping-cart"></i> Masukkan ke Keranjang Belanja
    </button>
  `;

  modal.classList.add('open');
  refreshLucideIcons();
}

function closeQuickView() {
  document.getElementById('quickViewModal')?.classList.remove('open');
}

// 9. CHECKOUT SIMULATION
function processCheckout() {
  if (cart.length === 0) {
    showToast("Keranjang Anda masih kosong!");
    return;
  }

  closeCart();
  const modal = document.getElementById('checkoutSuccessModal');
  const resiEl = document.getElementById('orderResi');
  if (resiEl) {
    resiEl.textContent = "PAWSY-" + Math.floor(100000 + Math.random() * 900000);
  }

  if (modal) {
    modal.classList.add('open');
  }

  // Play celebratory sound & confetti
  playCuteTone([523.25, 659.25, 783.99, 1046.50]);
  createPawSparkle(window.innerWidth / 2, window.innerHeight / 2, 20);

  // Clear cart
  cart = [];
  saveCart();
  updateCartDisplay();
  refreshLucideIcons();
}

function closeCheckoutModal() {
  document.getElementById('checkoutSuccessModal')?.classList.remove('open');
}

// 10. WISHLIST TOGGLE
function toggleWishlist(productId, btn) {
  const index = wishlist.indexOf(productId);
  if (index > -1) {
    wishlist.splice(index, 1);
    btn.classList.remove('active');
    btn.innerHTML = '<i data-lucide="heart"></i>';
    showToast("Dihapus dari daftar favorit.");
  } else {
    wishlist.push(productId);
    btn.classList.add('active');
    btn.innerHTML = '<i data-lucide="heart" style="fill:#FB7185;stroke:#FB7185;"></i>';
    showToast("Ditambahkan ke daftar favorit!");
    playCuteTone([659.25, 880]);
  }
  localStorage.setItem('pawsy_wishlist', JSON.stringify(wishlist));
  refreshLucideIcons();
}

// 11. FAQ ACCORDION
function initFAQ() {
  const questions = document.querySelectorAll('.faq-question');
  questions.forEach(q => {
    q.addEventListener('click', () => {
      const item = q.parentElement;
      const isActive = item.classList.contains('active');
      
      document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('active'));
      
      if (!isActive) {
        item.classList.add('active');
      }
    });
  });
}

// 12. COUNTDOWN TIMER
function initCountdown() {
  const hoursEl = document.getElementById('timerHours');
  const minsEl = document.getElementById('timerMins');
  const secsEl = document.getElementById('timerSecs');

  if (!hoursEl || !minsEl || !secsEl) return;

  let totalSeconds = 14 * 3600 + 42 * 60 + 18; // 14 hours 42 mins

  setInterval(() => {
    if (totalSeconds <= 0) {
      totalSeconds = 24 * 3600;
    }
    totalSeconds--;

    const h = Math.floor(totalSeconds / 3600);
    const m = Math.floor((totalSeconds % 3600) / 60);
    const s = totalSeconds % 60;

    hoursEl.textContent = String(h).padStart(2, '0');
    minsEl.textContent = String(m).padStart(2, '0');
    secsEl.textContent = String(s).padStart(2, '0');
  }, 1000);
}

// 13. EASTER EGG & AUDIO SYNTHESIS
function initEasterEgg() {
  const eggBtn = document.getElementById('easterEggBtn');
  if (eggBtn) {
    eggBtn.addEventListener('click', (e) => {
      const rect = eggBtn.getBoundingClientRect();
      createPawSparkle(rect.left + rect.width / 2, rect.top, 12);
      playCuteTone([440, 554.37, 659.25, 880]);
      showToast("Si Anabul mengirim cinta & kebahagiaan untukmu!");
    });
  }
}

function playCuteTone(notes = [523.25, 659.25, 783.99]) {
  try {
    const AudioContext = window.AudioContext || window.webkitAudioContext;
    if (!AudioContext) return;
    const ctx = new AudioContext();

    notes.forEach((freq, i) => {
      const osc = ctx.createOscillator();
      const gain = ctx.createGain();
      
      osc.type = 'sine';
      osc.frequency.setValueAtTime(freq, ctx.currentTime + i * 0.08);

      gain.gain.setValueAtTime(0.15, ctx.currentTime + i * 0.08);
      gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + i * 0.08 + 0.3);

      osc.connect(gain);
      gain.connect(ctx.destination);

      osc.start(ctx.currentTime + i * 0.08);
      osc.stop(ctx.currentTime + i * 0.08 + 0.3);
    });
  } catch (e) {
    // AudioContext fallback
  }
}

function createPawSparkle(originX, originY, count = 8) {
  let container = document.querySelector('.particle-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'particle-container';
    document.body.appendChild(container);
  }

  const colors = ['#38BDF8', '#FB7185', '#FACC15', '#22C55E', '#C084FC'];

  for (let i = 0; i < count; i++) {
    const el = document.createElement('div');
    el.className = 'paw-particle';
    const chosenColor = colors[Math.floor(Math.random() * colors.length)];
    
    el.innerHTML = `
      <svg width="22" height="22" viewBox="0 0 24 24" fill="${chosenColor}" stroke="${chosenColor}" stroke-width="2">
        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
      </svg>
    `;
    
    el.style.left = `${originX}px`;
    el.style.top = `${originY}px`;

    const tx = (Math.random() - 0.5) * 260;
    const ty = - (Math.random() * 200 + 80);
    const rot = (Math.random() - 0.5) * 180;

    el.style.setProperty('--tx', `${tx}px`);
    el.style.setProperty('--ty', `${ty}px`);
    el.style.setProperty('--rot', `${rot}deg`);

    container.appendChild(el);

    setTimeout(() => {
      el.remove();
    }, 1500);
  }
}

// 14. TOAST NOTIFICATIONS
function showToast(message) {
  let container = document.querySelector('.toast-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'toast-container';
    document.body.appendChild(container);
  }

  const toast = document.createElement('div');
  toast.className = 'toast toast-success';
  toast.innerHTML = `
    <i data-lucide="check-circle" style="width:18px;height:18px;stroke:#22C55E;"></i>
    <span>${message}</span>
  `;

  container.appendChild(toast);
  refreshLucideIcons();

  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateY(10px) scale(0.9)';
    toast.style.transition = 'all 0.3s ease';
    setTimeout(() => toast.remove(), 300);
  }, 3200);
}

// 15. FORMS & COUPON CLIPBOARD
function initForms() {
  // Coupon Copy
  const copyBtn = document.getElementById('copyCouponBtn');
  if (copyBtn) {
    copyBtn.addEventListener('click', () => {
      navigator.clipboard.writeText('PAWSYLOVE20').then(() => {
        showToast("Kode voucher 'PAWSYLOVE20' berhasil disalin!");
        playCuteTone([587.33, 880]);
      });
    });
  }

  // Contact Form
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      showToast("Pesanmu telah terkirim! Tim Pawsy akan segera menghubungimu.");
      contactForm.reset();
      createPawSparkle(window.innerWidth / 2, window.innerHeight / 2, 10);
    });
  }

  // Newsletter Form
  const newsletterForm = document.getElementById('newsletterForm');
  if (newsletterForm) {
    newsletterForm.addEventListener('submit', (e) => {
      e.preventDefault();
      showToast("Terima kasih! Voucher diskon 15% telah dikirim ke email kamu.");
      newsletterForm.reset();
      createPawSparkle(window.innerWidth / 2, window.innerHeight - 100, 8);
    });
  }
}

// 16. SMOOTH SCROLL HELPER
function scrollToSection(id) {
  const el = document.getElementById(id);
  if (el) {
    const offset = 80;
    const pos = el.getBoundingClientRect().top + window.pageYOffset - offset;
    window.scrollTo({
      top: pos,
      behavior: 'smooth'
    });
  }
}
