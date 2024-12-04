<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/style3.css">
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>

        <!-- Menampilkan pesan sukses atau error jika ada -->
        <?php if (session()->get('success')) : ?>
            <div class="success-message"><?= session()->get('success') ?></div>
        <?php endif; ?>

        <?php if (session()->get('error')) : ?>
            <div class="error-message"><?= session()->get('error') ?></div>
        <?php endif; ?>

        <form action="/authenticate" method="post">
            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>

        <!-- Tambahkan tombol Register di bawah form -->
    
    </div>
</body>

</html>