<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun | MEBELISA</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"> 
    <style>
        .register-container { 
            max-width: 450px; margin: 50px auto; padding: 40px; 
            background: white; border-radius: 8px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .register-container h1 { font-size: 30px; margin-bottom: 30px; text-align: center; color: #333; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: 500; font-size: 14px; }
        .form-group input[type="text"], .form-group input[type="password"] {
            width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-family: inherit;
        }
        .btn-register { 
            width: 100%; background-color: #9D846B; color: white; padding: 12px; 
            border: none; border-radius: 4px; cursor: pointer; font-weight: 600; margin-top: 20px;
        }
        .alert-error { background-color: #F8D7DA; color: #721C24; padding: 10px; border-radius: 4px; margin-bottom: 15px; }
    </style>
</head>
<body>

    <main class="register-container">
        <h1>Buat Akun Baru</h1>

        <?php echo validation_errors('<div class="alert-error">', '</div>'); ?>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert-error"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <?php echo form_open('auth/proses_register'); ?>
            
            <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap:</label>
                <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?php echo set_value('nama_lengkap'); ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password (Min. 5 Karakter):</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirm">Konfirmasi Password:</label>
                <input type="password" id="password_confirm" name="password_confirm" required>
            </div>

            <button type="submit" class="btn-register">Daftar Sekarang</button>
            
            <p style="text-align: center; margin-top: 20px; font-size: 14px;">
                Sudah punya akun? <a href="<?php echo base_url('login'); ?>" style="color: #9D846B; font-weight: 500;">Masuk di sini.</a>
            </p>
            <p style="text-align: center; margin-top: 10px; font-size: 14px;">
                <a href="<?php echo base_url(); ?>" style="color: #666;">← Kembali ke Katalog</a>
            </p>

        <?php echo form_close(); ?>
    </main>
</body>
</html>