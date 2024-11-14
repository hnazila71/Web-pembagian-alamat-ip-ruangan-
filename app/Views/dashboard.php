<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<style>
    /* Gaya umum untuk body */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 100vh;
    }

    /* Container utama untuk dashboard */
    .dashboard-container {
        width: 90%;
        max-width: 800px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 20px;
    }

    /* Header styling */
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .lobi-title {
        font-size: 24px;
        color: #333;
        margin: 0;
        text-align: left;
    }

    /* Tombol Logout */
    .logout-btn {
        background-color: #e74c3c;
        color: #ffffff;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 14px;
        transition: background-color 0.3s;
    }

    .logout-btn:hover {
        background-color: #c0392b;
    }

    /* Konten utama dashboard */
    .dashboard-content {
        text-align: left;
    }

    .dashboard-content h2 {
        font-size: 20px;
        color: #555;
        margin-bottom: 20px;
    }

    /* Tombol Tambah Lokasi */
    .add-btn {
        display: inline-block;
        background-color: #3498db;
        color: #ffffff;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 5px;
        font-size: 14px;
        margin-bottom: 20px;
        transition: background-color 0.3s;
    }

    .add-btn:hover {
        background-color: #2980b9;
    }

    /* Tabel Daftar Lokasi */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
        padding: 10px;
    }

    th {
        background-color: #3498db;
        color: #fff;
        font-weight: bold;
        text-align: left;
    }

    td {
        background-color: #f8f9fa;
        font-size: 14px;
    }

    /* Ukuran font untuk nomor urut */
    td:first-child {
        font-size: 16px;
    }

    tr:hover {
        background-color: #e3f2fd;
    }

    .room-link {
        text-decoration: none;
        color: #3498db;
        font-size: 16px;
        font-weight: bold;
    }

    .room-link:hover {
        color: #1d78b5;
    }

    /* Media Query untuk perangkat lebih kecil */
    @media (max-width: 600px) {
        .dashboard-container {
            width: 95%;
            padding: 15px;
        }

        header h1 {
            font-size: 20px;
        }

        .logout-btn,
        .add-btn {
            font-size: 12px;
            padding: 8px 12px;
        }

        .room-link {
            font-size: 14px;
        }
    }
</style>

<body>
    <div class="dashboard-container">
        <header>
            <h1>Dashboard</h1>
            <a href="/logout" class="btn logout-btn">Logout</a>
        </header>
        <div class="dashboard-content">
            <h2>Daftar Lokasi</h2>
            <a href="/add-room" class="btn add-btn">Tambah Lokasi</a>

            <!-- Tabel Daftar Ruangan dengan ID Ruangan -->
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
                            <td><?= $index + 1 ?></td> <!-- Menampilkan nomor urut -->

                            <td><a href="/room/<?= $room['id'] ?>" class="room-link"><?= $room['name'] ?></a></td> <!-- Nama Ruangan -->
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>