<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami | MEBELISA - Furniture Kayu Jati Asli</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* CSS GLOBAL */
        :root {
            --primary-color: #333; 
            --accent-color: #7E644E; 
            --secondary-color: #666; 
            --bg-light: #F9F7F5;
            --gold-color: #D4A84B;
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Montserrat', sans-serif;
            --shadow-subtle: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        * { box-sizing: border-box; }
        body { 
            background-color: var(--bg-light); 
            font-family: var(--font-body); 
            margin: 0; 
            padding-top: 80px; 
            color: var(--primary-color); 
        }
        .header { 
            position: fixed; top: 0; left: 0; width: 100%; background: white; 
            box-shadow: var(--shadow-subtle); z-index: 1000; display: flex; 
            justify-content: space-between; align-items: center; padding: 15px 5%; box-sizing: border-box;
        }
        .logo { font-family: var(--font-heading); font-size: 28px; font-weight: 700; color: var(--accent-color); text-decoration: none; }
        .nav { display: flex; align-items: center; gap: 20px; }
        .nav a { color: var(--primary-color); text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.3s; }
        .nav a:hover { color: var(--accent-color); }
        .menu-toggle { display: none; }

        /* Hero Section */
        .hero-about {
            background: linear-gradient(135deg, #2C1810 0%, #4A3728 50%, #2C1810 100%);
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 60px 20px;
            position: relative;
            overflow: hidden;
        }
        .hero-about::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(212,168,75,0.1)"/></svg>') repeat;
            background-size: 30px 30px;
        }
        .hero-content { position: relative; z-index: 1; max-width: 800px; }
        .hero-content h1 {
            font-family: var(--font-heading);
            font-size: 56px;
            color: #fff;
            margin-bottom: 15px;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.3);
        }
        .hero-content .tagline {
            font-size: 20px;
            color: var(--gold-color);
            font-weight: 500;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .hero-content .year-badge {
            display: inline-block;
            background: var(--gold-color);
            color: #2C1810;
            padding: 8px 25px;
            border-radius: 50px;
            font-weight: 700;
            margin-top: 20px;
            font-size: 14px;
        }

        /* About Content */
        .about-container { max-width: 1200px; margin: 0 auto; padding: 60px 20px; }
        
        .about-intro {
            text-align: center;
            max-width: 900px;
            margin: 0 auto 60px;
        }
        .about-intro h2 {
            font-family: var(--font-heading);
            font-size: 42px;
            color: var(--accent-color);
            margin-bottom: 25px;
        }
        .about-intro p {
            font-size: 16px;
            line-height: 1.9;
            color: var(--secondary-color);
        }

        /* Features Grid - Top Row */
        .features-section {
            background: linear-gradient(180deg, #FFFDF5 0%, #F9F7F5 100%);
            padding: 60px 20px;
        }
        .features-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .feature-card {
            text-align: center;
            padding: 30px 20px;
        }
        .feature-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .feature-icon i {
            font-size: 40px;
            color: var(--gold-color);
        }
        .feature-card h3 {
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--primary-color);
            margin-bottom: 10px;
        }
        .feature-card p {
            font-size: 13px;
            color: var(--secondary-color);
            line-height: 1.6;
        }

        /* Keunggulan Section */
        .keunggulan-section {
            background: #F5F5DC;
            padding: 60px 20px;
        }
        .keunggulan-title {
            text-align: center;
            font-family: var(--font-heading);
            font-size: 36px;
            color: var(--primary-color);
            margin-bottom: 50px;
        }
        .keunggulan-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .keunggulan-card {
            display: flex;
            gap: 15px;
        }
        .keunggulan-icon {
            flex-shrink: 0;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 5px;
        }
        .keunggulan-icon i {
            font-size: 28px;
            color: var(--gold-color);
        }
        .keunggulan-content h4 {
            font-size: 15px;
            font-weight: 700;
            text-transform: uppercase;
            color: var(--gold-color);
            margin: 0 0 10px 0;
        }
        .keunggulan-content p {
            font-size: 13px;
            color: var(--secondary-color);
            line-height: 1.7;
            margin: 0;
        }


        /* Vision Mission */
        .vm-section {
            background: linear-gradient(135deg, #2C1810 0%, #4A3728 100%);
            padding: 80px 20px;
        }
        .vm-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .vm-card {
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(212,168,75,0.3);
            border-radius: 15px;
            padding: 40px;
        }
        .vm-card h3 {
            font-family: var(--font-heading);
            font-size: 28px;
            color: var(--gold-color);
            margin-bottom: 20px;
        }
        .vm-card p, .vm-card li {
            color: rgba(255,255,255,0.85);
            line-height: 1.8;
            font-size: 14px;
        }
        .vm-card ul {
            padding-left: 20px;
        }
        .vm-card li {
            margin-bottom: 12px;
        }

        /* CTA Section */
        .cta-section {
            background: var(--gold-color);
            padding: 50px 20px;
            text-align: center;
        }
        .cta-section h3 {
            font-family: var(--font-heading);
            font-size: 28px;
            color: #2C1810;
            margin-bottom: 15px;
        }
        .cta-section p {
            color: rgba(44, 24, 16, 0.8);
            font-size: 15px;
        }
        .cta-section .contact-info {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
        }
        .cta-section .contact-info span {
            color: #2C1810;
            font-weight: 600;
        }
        .cta-section .contact-info i {
            margin-right: 8px;
        }

        /* WhatsApp Button */
        .wa-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: #25D366;
            color: white;
            padding: 15px 25px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            display: flex;
            align-items: center;
            gap: 10px;
            z-index: 999;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .wa-float:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(37, 211, 102, 0.5);
        }
        .wa-float i { font-size: 20px; }

        /* Responsive */
        @media (max-width: 992px) {
            .features-grid, .keunggulan-grid { grid-template-columns: repeat(2, 1fr); }
            .story-grid, .vm-grid { grid-template-columns: 1fr; }
            .story-image { order: -1; }
        }
        @media (max-width: 768px) {
            .nav { display: none; position: absolute; top: 70px; left: 0; right: 0; background: white; flex-direction: column; padding: 10px 0; box-shadow: var(--shadow-subtle); }
            .nav.active { display: flex; }
            .nav a { margin: 10px 0; text-align: center; }
            .menu-toggle { display: block; cursor: pointer; color: var(--primary-color); font-size: 24px; }
            .hero-content h1 { font-size: 36px; }
            .features-grid, .keunggulan-grid { grid-template-columns: 1fr; }
            .cta-section .contact-info { flex-direction: column; gap: 15px; }
        }
    </style>
</head>
<body>

    <header class="header">
        <a href="<?php echo base_url(); ?>" class="logo">MEBELISA</a>
        
        <div class="menu-toggle" id="menuToggle">
            <i class="fas fa-bars"></i>
        </div>

       <nav class="nav" id="mainNav">
            <a href="<?php echo base_url(); ?>">Katalog</a>
            <a href="<?php echo base_url('tentang-kami'); ?>" style="color: var(--accent-color); font-weight: 600;">Tentang Kami</a>
            
            <?php if ($this->session->userdata('status') == "login"): ?>
                <?php if ($this->session->userdata('level') == 'admin'): ?>
                    <a href="<?php echo base_url('administrator'); ?>">
                        <i class="fas fa-tools"></i> Admin
                    </a>
                <?php endif; ?>
                <a href="<?php echo base_url('logout'); ?>" style="color: #D9534F;"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <?php else: ?>
                <a href="<?php echo base_url('login'); ?>" style="color: var(--accent-color); font-weight: 600;"><i class="fas fa-user-circle"></i> Account Admin</a>
            <?php endif; ?>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-about">
        <div class="hero-content">
            <p class="tagline">Furniture Kayu Jati Asli Jepara</p>
            <h1>MEBELISA</h1>
            <span class="year-badge"><i class="fas fa-award"></i> Berdiri Sejak 2025</span>
        </div>
    </section>

    <!-- About Intro -->
    <div class="about-container">
        <div class="about-intro">
            <h2>Selamat Datang di MEBELISA</h2>
            <p>
                MEBELISA adalah perusahaan furniture yang didirikan pada tahun <strong>2025</strong> di Jepara, kota yang terkenal sebagai pusat kerajinan kayu terbaik di Indonesia. Kami hadir dengan komitmen kuat untuk menyediakan furnitur <strong>kayu jati asli</strong> berkualitas premium dengan desain yang elegan dan modern. Setiap produk kami dibuat oleh pengrajin berpengalaman menggunakan teknik tradisional yang diwariskan turun-temurun, dikombinasikan dengan sentuhan desain kontemporer.
            </p>
        </div>
    </div>

    <!-- Features Section (4 Icons) -->
    <section class="features-section">
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h3>Produk Asli Jepara</h3>
                <p>100% Produk Berkualitas dari pengrajin kayu terbaik Jepara</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-truck"></i>
                </div>
                <h3>Pengiriman</h3>
                <p>Menggunakan Jasa Expedisi / Cargo ke seluruh Indonesia</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3>Transaksi Aman & Terpercaya</h3>
                <p>Guarantee 100%, Uang Kembali jika tidak sesuai</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3>Respon Cepat</h3>
                <p>Update Pesanan Berkala Ke Konsumen</p>
            </div>
        </div>
    </section>

    <!-- Keunggulan Kami Section -->
    <section class="keunggulan-section">
        <h2 class="keunggulan-title">Keunggulan Kami</h2>
        <div class="keunggulan-grid">
            <div class="keunggulan-card">
                <div class="keunggulan-icon">
                    <i class="far fa-clock"></i>
                </div>
                <div class="keunggulan-content">
                    <h4>Tepat Waktu</h4>
                    <p>Sudah menjadi SOP kami dalam memberikan layanan tepat waktu kepada customer, dengan pengerjaan sesuai dengan waktu yang telah disepakati.</p>
                </div>
            </div>
            <div class="keunggulan-card">
                <div class="keunggulan-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <div class="keunggulan-content">
                    <h4>Berkualitas</h4>
                    <p>Kami sangat menjaga kualitas produk yang kami jual. Karena hanya dengan produk yang berkualitas, kami bisa bertahan & berkembang sampai saat ini.</p>
                </div>
            </div>
            <div class="keunggulan-card">
                <div class="keunggulan-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="keunggulan-content">
                    <h4>Team Work</h4>
                    <p>Teamwork merupakan unsur yang paling penting diperusahaan kami. Mereka bekerja dengan cara saling support dan berdedikasi tinggi.</p>
                </div>
            </div>
            <div class="keunggulan-card">
                <div class="keunggulan-icon">
                    <i class="fas fa-leaf"></i>
                </div>
                <div class="keunggulan-content">
                    <h4>Legal Material Kayu</h4>
                    <p>Kami sadar bahwa kerusakan hutan di Indonesia sangat memperihatinkan. Untuk itu kami hanya menggunakan Bahan kayu yang dikeluarkan oleh pihak PERHUTANI.</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Vision Mission -->
    <section class="vm-section">
        <div class="vm-grid">
            <div class="vm-card">
                <h3><i class="fas fa-eye"></i> Visi</h3>
                <p>Menjadi perusahaan furniture kayu jati terdepan di Indonesia yang mengutamakan kualitas, keaslian material, dan kepuasan pelanggan, serta turut melestarikan warisan budaya ukir Jepara untuk generasi mendatang.</p>
            </div>
            <div class="vm-card">
                <h3><i class="fas fa-bullseye"></i> Misi</h3>
                <ul>
                    <li>Menyediakan produk furniture kayu jati asli dengan kualitas terbaik</li>
                    <li>Mendukung dan memberdayakan pengrajin lokal Jepara</li>
                    <li>Menggunakan material kayu legal dari sumber yang bertanggung jawab</li>
                    <li>Memberikan pelayanan terbaik dari konsultasi hingga after-sales</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <h3>Tertarik dengan Produk Kami?</h3>
        <p>Hubungi kami untuk konsultasi gratis dan penawaran terbaik!</p>
        <div class="contact-info">
            <span><i class="fas fa-phone"></i> (021) 1234-5678</span>
            <span><i class="fas fa-envelope"></i> info@mebelisa.co.id</span>
            <span><i class="fas fa-map-marker-alt"></i> Jepara, Jawa Tengah</span>
        </div>
    </section>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/6285717829482?text=Halo%20MEBELISA%2C%20saya%20tertarik%20dengan%20produk%20furniture%20Anda" target="_blank" class="wa-float">
        <i class="fab fa-whatsapp"></i> Chat Kami Sekarang!
    </a>

    <script>
        // Mobile Nav Toggle
        const menuToggle = document.getElementById('menuToggle');
        const mainNav = document.getElementById('mainNav');
        if (menuToggle && mainNav) {
            menuToggle.addEventListener('click', function() {
                mainNav.classList.toggle('active');
            });
        }
    </script>
</body>
</html>