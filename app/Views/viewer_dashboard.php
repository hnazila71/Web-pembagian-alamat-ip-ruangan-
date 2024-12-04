<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Viewer</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <div class="dashboard-container">
        <header>
            <h1>Dashboard Viewer</h1>
            <a href="/logout" class="btn logout-btn">Logout</a>
        </header>
        <div class="dashboard-content">
            <h2>Daftar Lokasi</h2>

            <!-- Tabel Daftar Ruangan -->
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ruangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($rooms as $index => $room): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><a href="/room/<?= $room['id'] ?>" class="room-link"><?= $room['name'] ?></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
