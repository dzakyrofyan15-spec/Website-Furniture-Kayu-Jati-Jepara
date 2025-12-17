<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail <?php echo $product['nama_produk']; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* CSS GLOBAL */
        :root {
            --primary-color: #333; 
            --accent-color: #7E644E; 
            --secondary-color: #666; 
            --bg-light: #F9F7F5;
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Montserrat', sans-serif;
            --shadow-subtle: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
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
        @media (max-width: 768px) {
            .nav { display: none; position: absolute; top: 70px; left: 0; right: 0; background: white; flex-direction: column; padding: 10px 0; box-shadow: var(--shadow-subtle); }
            .nav.active { display: flex; }
            .nav a { margin: 10px 0; text-align: center; }
            .menu-toggle { display: block; cursor: pointer; color: var(--primary-color); font-size: 24px; }
        }

        /* Style Khusus Detail */
        .detail-container { max-width: 1000px; margin: 40px auto; padding: 20px; }
        .product-content { 
            display: flex; 
            gap: 40px; 
            background: white; 
            padding: 30px; 
            border-radius: 4px; 
            box-shadow: var(--shadow-subtle); 
        }
        .product-gallery { flex: 1; }
        .product-gallery .main-image { 
            width: 100%; 
            height: 500px; 
            object-fit: cover; 
            border-radius: 4px; 
            border: 1px solid #eee;
        }
        .product-info { flex: 1; padding: 20px 0; }
        .product-info h1 { font-family: var(--font-heading); font-size: 48px; margin-top: 0; margin-bottom: 10px; }
        .product-info .category-detail { font-size: 14px; color: var(--secondary-color); text-transform: uppercase; margin-bottom: 15px; font-weight: 500;}
        
        /* Rating Stars */
        .product-rating { 
            display: flex; 
            align-items: center; 
            gap: 8px; 
            margin-bottom: 25px;
            padding: 12px 16px;
            background: linear-gradient(135deg, #FFFBEB 0%, #FEF3C7 100%);
            border-radius: 8px;
            border: 1px solid #FDE68A;
        }
        .product-rating .stars { color: #FFD700; font-size: 18px; }
        .product-rating .rating-value { 
            font-size: 16px; 
            color: var(--primary-color); 
            font-weight: 600;
        }
        .product-rating .rating-text { 
            font-size: 14px; 
            color: var(--secondary-color); 
        }
        .product-info h3 { 
            font-family: var(--font-heading); 
            font-size: 24px; 
            color: var(--accent-color); 
            border-bottom: 2px solid var(--bg-light); 
            padding-bottom: 10px; 
            margin-top: 30px; 
        }
        .product-info p { line-height: 1.8; color: var(--secondary-color); white-space: pre-wrap;}
        
        /* Price Display */
        .product-price {
            font-size: 32px;
            font-weight: 700;
            color: #E53E3E;
            margin: 20px 0;
        }
        .product-price .currency {
            font-size: 18px;
            font-weight: 600;
        }
        
        /* Button Container */
        .btn-container {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-top: 25px;
        }
        .btn-wa {
            display: inline-block;
            background-color: #25D366; /* WhatsApp Green */
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 30px;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        .btn-wa:hover {
            background-color: #1EBE57;
        }
        .btn-tokped {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: #42B549;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: 600;
            transition: background-color 0.3s;
        }
        .btn-tokped:hover {
            background-color: #38A73F;
        }
        .btn-tokped img {
            width: 20px;
            height: 20px;
        }

        @media (max-width: 900px) {
            .product-content { flex-direction: column; }
            .product-gallery .main-image { height: 400px; }
            .product-info h1 { font-size: 38px; }
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
                <a href="<?php echo base_url('login'); ?>" style="color: var(--accent-color); font-weight: 600;"><i class="fas fa-user-circle"></i> Login</a>
            <?php endif; ?>
        </nav>
    </header>

    <main class="catalog-container">
        <div class="detail-container">
            <a href="<?php echo base_url(); ?>" style="text-decoration: none; color: var(--primary-color); font-weight: 500; margin-bottom: 20px; display: inline-block; font-size: 14px;">
                &larr; Kembali ke Katalog
            </a>
            
            <div class="product-content">
                <div class="product-gallery">
                    <img src="<?php echo base_url('assets/img/' . $product['gambar_utama']); ?>" 
                         alt="<?php echo $product['nama_produk']; ?>" 
                         class="main-image">
                </div>
                
                <div class="product-info">
                    <h1><?php echo $product['nama_produk']; ?></h1>
                    <p class="category-detail">Kategori: <?php echo $product['nama_kategori']; ?></p>
                    
                    <?php 
                    // Generate consistent rating based on product ID
                    $rating = number_format((($product['id_produk'] % 10) / 10 + 4.0), 1);
                    $full_stars = floor($rating);
                    $half_star = ($rating - $full_stars) >= 0.5;
                    ?>
                    <div class="product-rating">
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
                        <span class="rating-text">| Rating Produk</span>
                    </div>
                    
                    <?php 
                    // Generate price based on product ID (simulated prices)
                    $base_prices = array(1500000, 2500000, 3500000, 4500000, 5500000, 6500000, 7500000, 8500000);
                    $price = $base_prices[$product['id_produk'] % count($base_prices)];
                    ?>
                    <div class="product-price">
                        <span class="currency">Rp</span> <?php echo number_format($price, 0, ',', '.'); ?>
                    </div>
                    
                    <h3>Deskripsi Produk</h3>
                    <p><?php echo $product['deskripsi']; ?></p>

                    <div class="btn-container">
                        <a href="https://wa.me/6285717829482?text=Halo%20Mebelisa%2C%20saya%20tertarik%20dengan%20produk%20%27<?php echo urlencode($product['nama_produk']); ?>%27%20(ID%3A%20<?php echo $product['id_produk']; ?>).%20Mohon%20info%20ketersediaan%20dan%20harga." 
                           target="_blank" 
                           class="btn-wa">
                            <i class="fab fa-whatsapp"></i> Pesan via WhatsApp
                        </a>
                        <a href="https://www.tokopedia.com/mebelisa" 
                           target="_blank" 
                           class="btn-tokped">
                            <i class="fas fa-shopping-bag"></i> Beli di Tokopedia
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

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