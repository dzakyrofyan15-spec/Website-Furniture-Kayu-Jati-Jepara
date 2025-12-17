<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | MEBELISA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
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
            color: var(--primary-color);
        }
        .admin-container { max-width: 1200px; margin: 50px auto; padding: 20px; }
        .admin-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 2px solid #ddd; padding-bottom: 15px;}
        .admin-header h1 { font-family: var(--font-heading); font-size: 36px; margin: 0; }
        .admin-header .actions { display: flex; gap: 15px; align-items: center; }
        .btn-primary { 
            background-color: var(--accent-color); color: white; padding: 10px 20px; 
            text-decoration: none; border-radius: 4px; transition: background-color 0.3s;
            font-size: 14px; font-weight: 600;
        }
        .btn-primary:hover { background-color: #554438; }
        .btn-logout { background: #D9534F; }
        .btn-logout:hover { background: #C9302C; }
        .alert-success { background-color: #D4EDDA; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 20px; text-align: center; border: 1px solid #C3E6CB; }


        table { width: 100%; border-collapse: collapse; background: white; box-shadow: var(--shadow-subtle); border-radius: 4px; overflow: hidden; }
        th, td { 
            padding: 15px; text-align: left; border-bottom: 1px solid #eee; 
            font-size: 14px; 
        }
        th { background-color: #f5f5f5; font-weight: 600; text-transform: uppercase; }
        tr:hover { background-color: #fafafa; }
        .product-thumb { width: 60px; height: 60px; object-fit: cover; border-radius: 4px; }
        
        .action-link { text-decoration: none; color: var(--accent-color); margin-right: 15px; font-weight: 500; }
        .action-link:hover { text-decoration: underline; }
        .action-delete { color: #D9534F; }

        @media (max-width: 768px) {
            .admin-header { flex-direction: column; align-items: flex-start; }
            .admin-header h1 { margin-bottom: 10px; }
            .admin-header .actions { margin-top: 15px; width: 100%; justify-content: space-between; }
            table, thead, tbody, th, td, tr { display: block; }
            thead { display: none; }
            tr { border: 1px solid #ccc; margin-bottom: 10px; }
            td { border: none; border-bottom: 1px solid #eee; position: relative; padding-left: 50%; }
            td:before { 
                position: absolute; top: 6px; left: 6px; width: 45%; padding-right: 10px; white-space: nowrap; 
                content: attr(data-label); font-weight: 600; color: var(--accent-color);
            }
        }
    </style>
</head>
<body>

    <main class="admin-container">
        <div class="admin-header">
            <h1><i class="fas fa-tools"></i> Panel Admin Mebelisa</h1>
            <div class="actions">
                <a href="<?php echo base_url('administrator/add'); ?>" class="btn-primary"><i class="fas fa-plus"></i> Tambah Produk</a>
                <a href="<?php echo base_url('logout'); ?>" class="btn-primary btn-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert-success"><?php echo $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        
        <?php if ($this->session->flashdata('message')): ?>
            <?php echo $this->session->flashdata('message'); ?>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Deskripsi (Singkat)</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td data-label="ID"><?php echo $product['id_produk']; ?></td>
                            <td data-label="Gambar">
                                <img src="<?php echo base_url('assets/img/' . $product['gambar_utama']); ?>" alt="Img" class="product-thumb">
                            </td>
                            <td data-label="Nama Produk"><?php echo $product['nama_produk']; ?></td>
                            <td data-label="Kategori"><?php echo $product['nama_kategori']; ?></td>
                            <td data-label="Deskripsi Singkat"><?php echo substr($product['deskripsi'], 0, 80) . '...'; ?></td>
                            <td data-label="Aksi">
                                <a href="<?php echo base_url('administrator/edit/' . $product['id_produk']); ?>" class="action-link">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a href="<?php echo base_url('administrator/delete/' . $product['id_produk']); ?>" class="action-link action-delete" onclick="return confirm('Yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.');">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" style="text-align: center; color: var(--secondary-color);">Belum ada produk yang ditambahkan.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>

</body>
</html>