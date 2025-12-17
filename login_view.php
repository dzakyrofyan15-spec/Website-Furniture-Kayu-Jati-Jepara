<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | MEBELISA Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #333; 
            --accent-color: #7E644E; 
            --bg-light: #F9F7F5;
            --font-heading: 'Playfair Display', serif;
            --font-body: 'Montserrat', sans-serif;
            --shadow-subtle: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        body { 
            background-color: var(--bg-light); 
            font-family: var(--font-body); 
            margin: 0; 
            color: var(--primary-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container { 
            max-width: 400px; padding: 40px; 
            background: white; border-radius: 8px; 
            box-shadow: var(--shadow-subtle);
            width: 90%;
        }
        .login-container h1 { 
            font-family: var(--font-heading); font-size: 30px; margin-bottom: 10px; 
            text-align: center; color: var(--accent-color); 
        }
        .login-container p.subtitle {
            text-align: center; 
            margin-bottom: 30px;
            color: #999;
            font-size: 14px;
        }
        .form-group { margin-bottom: 20px; }
        .form-group label { display: block; margin-bottom: 8px; font-weight: 500; font-size: 14px; }
        .form-group input[type="text"], .form-group input[type="password"] {
            width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 4px; font-family: inherit;
            background: #fcfcfc; box-sizing: border-box;
        }
        .btn-login { 
            width: 100%; padding: 12px; background-color: var(--primary-color); 
            color: white; border: none; border-radius: 4px; cursor: pointer; 
            font-weight: 600; font-size: 16px; transition: background-color 0.3s;
            text-transform: uppercase; letter-spacing: 1px;
        }
        .btn-login:hover { background-color: #555; }
        .alert-error { 
            background-color: #F8D7DA; color: #721C24; padding: 10px; border-radius: 4px; 
            margin-bottom: 20px; text-align: center; border: 1px solid #F5C6CB; 
        }
    </style>
</head>
<body>

    <main class="login-container">
        <h1>MEBELISA</h1>
        <p class="subtitle">Admin</p>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert-error"><?php echo $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <?php echo validation_errors('<div class="alert-error">', '</div>'); ?>

        <?php echo form_open('login'); ?> 
            
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="btn-login">Login</button>
            <p style="text-align: center; margin-top: 20px;">
                <a href="<?php echo base_url(); ?>" style="color: var(--accent-color); text-decoration: none; font-size: 14px;">&larr; Kembali ke Katalog</a>
            </p>
        <?php echo form_close(); ?>
    </main>

</body>
</html>