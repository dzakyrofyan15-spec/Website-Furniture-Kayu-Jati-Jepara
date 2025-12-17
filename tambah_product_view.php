<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk | MEBELISA</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <style>
        .form-container { max-width: 700px; margin: 50px auto; padding: 40px; background: white; border-radius: 4px; box-shadow: var(--shadow-subtle); }
        .form-container h1 { font-family: 'Playfair Display', serif; font-size: 32px; margin-bottom: 30px; text-align: center; }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 500; }
        .form-group input[type="text"], .form-group select, .form-group textarea {
            width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px; font-family: inherit;
        }
        .form-group textarea { resize: vertical; min-height: 150px; }
        .btn-submit { background-color: var(--accent-color); color: white; padding: 12px 25px; border: none; border-radius: 4px; cursor: pointer; transition: background-color 0.3s; }
        .btn-submit:hover { background-color: #7E644E; }
        .current-image { display: block; max-width: 150px; margin-top: 10px; border: 1px solid #ddd; padding: 5px; border-radius: 4px; }
        .alert-error { background-color: #F8D7DA; color: #721C24; padding: 15px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #F5C6CB; }
    </style>
</head>
<body>

    <main class="form-container">
        <h1>Edit Produk: <?php echo $product['nama_produk']; ?></h1>

        <?php if (isset($error)): ?>
            <div class="alert-error"><?php echo $error['error']; ?></div>
        <?php endif; ?>

        <?php echo form_open_multipart('administrator/update/' . $product['id_produk']); ?>
            
            <div class="form-group">
                <label for="nama_produk">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" required value="<?php echo set_value('nama_produk', $product['nama_produk']); ?>">
            </div>

            <div class="form-group">
                <label for="id_kategori">Kategori:</label>
                <select id="id_kategori" name="id_kategori" required>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?php echo $cat['id_kategori']; ?>" 
                                <?php echo set_select('id_kategori', $cat['id_kategori'], $cat['id_kategori'] == $product['id_kategori']); ?>>
                            <?php echo $cat['nama_kategori']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Produk:</label>
                <textarea id="deskripsi" name="deskripsi" required><?php echo set_value('deskripsi', $product['deskripsi']); ?></textarea>
            </div>

            <div class="form-group">
                <label>Gambar Saat Ini:</label>
                <img src="<?php echo base_url('assets/img/' . $product['gambar_utama']); ?>" alt="Current Image" class="current-image">
            </div>

            <div class="form-group">
                <label for="gambar_utama">Ganti Gambar Utama (Opsional):</label>
                <input type="file" id="gambar_utama" name="gambar_utama">
                <small style="color: var(--secondary-color);">Kosongkan jika tidak ingin mengubah gambar.</small>
            </div>

            <button type="submit" class="btn-submit"><i class="fas fa-sync-alt"></i> Update Produk</button>
            <a href="<?php echo base_url('administrator'); ?>" style="color: var(--primary-color); margin-left: 20px;">Batal</a>

        <?php echo form_close(); ?>
    </main>
</body>
</html>