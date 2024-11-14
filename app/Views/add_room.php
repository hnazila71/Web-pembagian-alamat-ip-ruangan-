<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ruangan</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="add-room-container">
        <h2>Tambah Ruangan Baru</h2>
        <form action="/store-room" method="post" class="add-room-form">
            <div class="input-group">
                <input type="text" name="name" placeholder="Nama Ruangan" required>
            </div>
            <button type="submit" class="btn add-room-btn">Tambah</button>
        </form>
        <a href="/dashboard" class="btn back-btn">Kembali ke Dashboard</a>
    </div>
</body>

</html>