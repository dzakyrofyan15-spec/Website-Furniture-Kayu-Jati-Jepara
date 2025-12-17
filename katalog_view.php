<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEBELISA | Katalog Furnitur Kayu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* CSS GLOBAL */
        :root {
            --primary-color: #333; 
            --accent-color: #7E644E; /* Earthy Brown */
            --secondary-color: #666; 
            --bg-light: #F9F7F5; /* Off-White/Beige */
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Montserrat', sans-serif;
            --shadow-subtle: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        body { 
            background-color: var(--bg-light); 
            font-family: var(--font-body); 
            margin: 0; 
            padding-top: 80px; /* Jarak aman untuk fixed header */
            color: var(--primary-color); 
        }
        
        /* HEADER - FIXED & CLEAN */
        .header { 
            position: fixed; 
            top: 0; left: 0; 
            width: 100%; 
            background: white; 
            box-shadow: var(--shadow-subtle); 
            z-index: 1000; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 15px 5%;
            box-sizing: border-box; 
        }
        .logo { font-family: var(--font-heading); font-size: 28px; font-weight: 700; color: var(--accent-color); text-decoration: none; }
        .nav { 
            display: flex; 
            align-items: center; 
            gap: 20px; 
        }
        .nav a { color: var(--primary-color); text-decoration: none; font-size: 14px; font-weight: 500; transition: color 0.3s; }
        .nav a:hover { color: var(--accent-color); }
        .menu-toggle { display: none; }

        /* Style Khusus Katalog */
        .catalog-container { max-width: 1200px; margin: 40px auto; padding: 0 20px; }
        .hero-title {
            text-align: center; 
            font-family: var(--font-heading); 
            font-size: 48px; 
            margin-top: 40px; 
            margin-bottom: 10px;
            color: var(--primary-color);
        }
        .hero-subtitle {
            text-align: center; 
            color: var(--secondary-color); 
            max-width: 700px; 
            margin: 0 auto 50px;
            font-size: 16px;
        }
        .catalog-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        .product-card { display: block; text-decoration: none; background: white; box-shadow: var(--shadow-subtle); transition: transform 0.3s; border-radius: 4px; overflow: hidden; }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 8px 20px rgba(0,0,0,0.1); }
        .product-card img { width: 100%; height: 320px; object-fit: cover; display: block; }
        .card-info { padding: 15px; text-align: left; }
        .card-info h3 { font-family: var(--font-heading); font-size: 22px; color: var(--primary-color); margin: 0 0 5px 0; font-weight: 600; }
        .card-info .category { font-size: 12px; color: var(--accent-color); text-transform: uppercase; margin: 0; font-weight: 600; }
        
        /* Rating Stars */
        .card-rating { 
            display: flex; 
            align-items: center; 
            gap: 5px; 
            margin-top: 10px;
        }
        .card-rating .stars { color: #FFD700; font-size: 14px; }
        .card-rating .rating-value { 
            font-size: 13px; 
            color: var(--secondary-color); 
            font-weight: 500;
        }
        
        /* Card Price */
        .card-price {
            font-size: 18px;
            font-weight: 700;
            color: #E53E3E;
            margin-top: 10px;
        }
        .card-price .currency {
            font-size: 12px;
            font-weight: 600;
        }
        
        .filter-bar { 
            text-align: center; 
            margin-bottom: 40px; 
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
        .filter-bar button { 
            padding: 10px 20px; 
            border: 1px solid #ddd; 
            background-color: white; 
            cursor: pointer; 
            margin: 0 5px 10px 5px; 
            font-family: var(--font-body); 
            font-size: 14px;
            transition: all 0.3s;
            border-radius: 20px;
        }
        .filter-bar button.active { 
            background-color: var(--accent-color); 
            color: white; 
            border-color: var(--accent-color); 
        }
        .filter-bar button:hover { background-color: #f0f0f0; }

        /* WhatsApp Float Button */
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

        /* Media Query untuk Mobile */
        @media (max-width: 768px) {
            .hero-title { font-size: 36px; }
            .nav { display: none; position: absolute; top: 70px; left: 0; right: 0; background: white; flex-direction: column; padding: 10px 0; box-shadow: var(--shadow-subtle); }
            .nav.active { display: flex; }
            .nav a { margin: 10px 0; text-align: center; }
            .menu-toggle { display: block; cursor: pointer; color: var(--primary-color); font-size: 24px; }
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
            <a href="<?php echo base_url('tentang-kami'); ?>">Tentang Kami</a>
    
            <?php if ($this->session->userdata('status') == "login"): ?>
                <?php if ($this->session->userdata('level') == 'admin'): ?>
                    <a href="<?php echo base_url('administrator'); ?>" style="color: var(--accent-color); font-weight: 600;">
                        <i class="fas fa-tools"></i> Admin
                    </a>
                <?php endif; ?>
                <a href="<?php echo base_url('logout'); ?>" style="color: #D9534F;"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <?php else: ?>
                <a href="<?php echo base_url('login'); ?>" style="color: var(--accent-color); font-weight: 600;"><i class="fas fa-user-circle"></i> Account Admin</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="catalog-container">
        
        <h1 class="hero-title">Katalog Produk Kami</h1>
        <p class="hero-subtitle">
            Temukan koleksi furnitur kayu premium kami, dirancang dengan keindahan dan fungsionalitas untuk menyempurnakan setiap ruangan Anda.
        </p>

        <div class="filter-bar">
            <button class="active" data-filter="all">Semua Koleksi</button>
            <?php if(isset($categories)): ?>
                <?php foreach ($categories as $cat): ?>
                    <button data-filter="<?php echo $cat['nama_kategori']; ?>"><?php echo $cat['nama_kategori']; ?></button>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <div class="catalog-grid">
            
            <?php if (empty($products)): ?>
                <p style="text-align: center; grid-column: 1 / -1; color: var(--secondary-color);">Belum ada produk furnitur yang tersedia saat ini.</p>
            <?php else: ?>
                <?php foreach ($products as $product): 
                    // Gunakan gambar dari database
                    $image_name = !empty($product['gambar_utama']) ? $product['gambar_utama'] : 'placeholder.jpg';
                    $image_url = base_url('assets/img/' . $image_name);
                    
                    // Generate random rating between 4.0 and 5.0
                    $rating = number_format(rand(40, 50) / 10, 1);
                    $full_stars = floor($rating);
                    $half_star = ($rating - $full_stars) >= 0.5;
                    
                    // Generate price based on product ID
                    $base_prices = array(1500000, 2500000, 3500000, 4500000, 5500000, 6500000, 7500000, 8500000);
                    $price = $base_prices[$product['id_produk'] % count($base_prices)];
                ?>
                    <a href="<?php echo base_url('detail/' . $product['id_produk']); ?>" 
                        class="product-card" 
                        data-category="<?php echo $product['nama_kategori']; ?>">

                        <img src="<?php echo $image_url; ?>" 
                            alt="<?php echo $product['nama_produk']; ?>">
                        
                        <div class="card-info">
                            <p class="category"><?php echo $product['nama_kategori']; ?></p>
                            <h3><?php echo $product['nama_produk']; ?></h3>
                            <div class="card-rating">
                                <span class="stars">
                                    <?php 
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $full_stars) {
                                            echo '<i class="fas fa-star"></i>';
                                        } elseif ($i == $full_stars + 1 && $half_star) {
                                            echo '<i class="fas fa-star-half-alt"></i>';
                                        } else {
                                            echo '<i class="far fa-star"></i>';
                                        }
                                    }
                                    ?>
                                </span>
                                <span class="rating-value"><?php echo $rating; ?></span>
                            </div>
                            <div class="card-price">
                                <span class="currency">Rp</span> <?php echo number_format($price, 0, ',', '.'); ?>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </main>

    <script>
        // SCRIPT FILTER DAN MOBILE NAV
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-bar button');
            const productCards = document.querySelectorAll('.product-card');

            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');

                    const filterValue = this.getAttribute('data-filter');

                    productCards.forEach(card => {
                        const cardCategory = card.getAttribute('data-category');
                        if (filterValue === 'all' || cardCategory === filterValue) {
                            card.style.display = 'block';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });

            const menuToggle = document.getElementById('menuToggle');
            const mainNav = document.getElementById('mainNav');
            if (menuToggle && mainNav) {
                menuToggle.addEventListener('click', function() {
                    mainNav.classList.toggle('active');
                });
            }
        });
    </script>

    <!-- WhatsApp Float Button -->
    <a href="https://wa.me/6285717829482?text=Halo%20MEBELISA%2C%20saya%20ingin%20bertanya%20tentang%20produk%20furniture%20Anda" target="_blank" class="wa-float">
        <i class="fab fa-whatsapp"></i> Chat Kami Sekarang!
    </a>
</body>
</html>