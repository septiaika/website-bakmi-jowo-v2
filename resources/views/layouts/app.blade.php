<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<title>Website UMKM Bakmi Jowo</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />

<style>
/* ================= RESET ================= */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

a {
  text-decoration: none !important;
  cursor: pointer;
}

/* ================= BODY ================= */
body {
  font-family: Arial, sans-serif;
  background: #000;
  overflow-x: hidden;
  position: relative;
}

/* ===== BACKGROUND ESTETIK ===== */
body::before {
  content: "";
  position: fixed;
  inset: 0;
  z-index: 0;
  pointer-events: none;
  background-image:
    radial-gradient(#c9a26d 1.5px, transparent 1.5px),
    radial-gradient(#b8935a 1px, transparent 1px),
    radial-gradient(#ffffff 1px, transparent 1px);
  background-size: 70px 70px, 110px 110px, 160px 160px;
  opacity: 0.5;
}

/* ================= NAVBAR ================= */
nav {
  background: #fff;
  padding: 15px 5%;
  position: relative;
  z-index: 10;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.nav-left {
  display: flex;
  align-items: center;
  gap: 20px;
}

nav img {
  height: 90px;
}

.nav-links {
  display: flex;
  gap: 25px;
  font-weight: bold;
}

.nav-links a {
  color: #000;
}

/* NAV RIGHT (Lokasi + WA) */
.nav-right {
  display: flex;
  align-items: center;
  gap: 15px;
}

.nav-right a img {
  height: 30px;
  display: block;
}

/* ================= MENU MOBILE ================= */
.nav-menu {
  display: none;
  flex-direction: column;
  background: #fff;
  position: absolute;
  top: 100px;
  left: 5%;
  width: 240px;
  border-radius: 12px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
  z-index: 20;
}

.nav-menu a {
  padding: 14px 18px;
  font-weight: bold;
  color: #000;
  border-bottom: 1px solid #eee;
}

.login-btn {
  background: #b8935a;
  color: #fff !important;
  text-align: center;
}

/* ================= KONTEN ================= */
.main-container {
  padding: 60px 5%;
  position: relative;
  z-index: 5;
}

/* ================= FOOTER ================= */
footer {
  background: #111;
  color: #ddd;
  position: relative;
  z-index: 5;
}

.footer-container {
  max-width: 1200px;
  margin: auto;
  padding: 60px 5%;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap: 30px;
}

.footer-box h4 {
  margin-bottom: 15px;
  font-size: 22px;
  font-weight: bold;
  color: #fff;
}

.footer-box p,
.footer-box a,
.footer-box li {
  color: #ddd;
  font-size: 14px;
}

.footer-box ul {
  list-style: none;
  padding: 0;
}

.footer-logo {
  width: 120px;
  margin-bottom: 15px;
}

.footer-tagline {
  color: #ccc;
}

.footer-sosmed {
  display: flex;
  gap: 15px;
  margin: 15px 0;
}

.footer-sosmed a {
  width: 38px;
  height: 38px;
  background: #222;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 50%;
  color: #fff;
}

.cta-wa {
  display: inline-block;
  margin-top: 12px;
  background: #25d366;
  color: #fff !important;
  padding: 12px 22px;
  border-radius: 30px;
  font-size: 16px;
  font-weight: bold;
}

.footer-bottom {
  border-top: 1px solid #333;
  padding: 15px;
  text-align: center;
  font-size: 13px;
  color: #aaa;
  background: #000;
}

@media (max-width: 900px) {
  .nav-links {
    display: none;
  }
}
</style>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2VKDYRWHPY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag() { dataLayer.push(arguments); }
  gtag("js", new Date());

  gtag("config", "G-2VKDYRWHPY");
</script>

</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav>
  <div class="nav-left">

    <a href="/"><img src="{{ asset('images/logo.png') }}" alt="Logo" /></a>

    <div class="nav-links">
      @guest
      <a href="/">Beranda</a>
      <a href="/profil">Profil</a>
      <a href="/menu">Menu</a>
      <a href="/galeri">Galeri</a>
      <a href="/kontak">Kontak</a>
      @endguest

      @auth
      <a href="/dashboard">Dashboard</a>
      <a href="/dashboard/menu">Kelola Menu</a>
      <a href="/dashboard/galeri">Kelola Galeri</a>
      <a href="/dashboard/ulasan">Kelola Ulasan</a>
      <a href="/logout">Logout</a>
      @endauth
    </div>
  </div>

  <div class="nav-right" style="display:flex; gap:12px; align-items:center;">
    
    <a href="https://maps.app.goo.gl/uG21c2jAjzSs6tMZ9" 
       target="_blank" 
       style="display:flex; align-items:center; gap:8px; text-decoration:none; color:#8b5e3c; font-weight:bold;">
        <img src="{{ asset('images/lokasi.jpg') }}" alt="Lokasi" style="width:35px;height:35px;">
        <span>Lihat Lokasi</span>
    </a>

    <a href="https://wa.me/6281901227343" 
       target="_blank"
       style="display:flex; align-items:center; gap:8px; text-decoration:none; color:#25D366; font-weight:bold;">
        <img src="{{ asset('images/wa.jpg') }}" alt="WA" style="width:35px;height:35px;">
        <span>Pesan via WA</span>
    </a>

</div>
</nav>

<!-- ================= KONTEN ================= -->
<div class="main-container">
  @yield('content')
</div>

<!-- ================= FOOTER ================= -->
<footer>
  <div class="footer-container">

    <div class="footer-box">
      <img src="{{ asset('images/logo.png') }}" class="footer-logo" />
      <p class="footer-tagline">Manisnya Rasa, Hangatnya Cinta di Setiap Suapan</p>
    </div>

    <div class="footer-box">
      <h4>Halaman</h4>
      <ul>
        <li><a href="/">Beranda</a></li>
        <li><a href="/profil">Profil</a></li>
        <li><a href="/menu">Menu</a></li>
        <li><a href="/galeri">Galeri</a></li>
        <li><a href="/kontak">Kontak</a></li>
      </ul>
    </div>

    <div class="footer-box">
      <h4>Informasi Kontak</h4>
      <p>📍 Simbang, Boja, Kendal</p>
      <p>📞 081901227343</p>
      <a href="https://maps.app.goo.gl/uG21c2jAjzSs6tMZ9" target="_blank">Lihat Lokasi di Google Maps</a>
    </div>

    <div class="footer-box">
  <h4>Ikuti Kami</h4>
  <div class="footer-sosmed">
    <a href="https://wa.me/6281901227343" target="_blank"><i class="fab fa-whatsapp"></i></a>
        <a href="https://www.instagram.com/bakmijowo_pakheri/" target="_blank">
    <i class="fab fa-instagram"></i>
</a>
        <a href="https://www.facebook.com/share/1CA5jLDTnJ/" target="_blank"><i class="fab fa-facebook-f"></i></a>
        <a href="https://www.tiktok.com/@bakmijowo_officia?_r=1&_t=ZS-958sF9VRTKG" target="_blank"><i class="fab fa-tiktok"></i></a>
  </div>

      <a href="https://wa.me/6281901227343" target="_blank" class="cta-wa">Pesan via WhatsApp</a>
    </div>

  </div>

<div class="footer-bottom">
  © {{ date('Y') }} UMKM Bakmi Jowo Pak Heri
  <br>
  <a href="/login" style="font-size:12px;color:#777;">Admin Login</a>
</div>
</footer>

</body>
</html>