<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Ruangan - <?= esc($room['name']) ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <style>
        /* Gaya Umum */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .container {
            display: flex;
            flex-direction: column;
            /* Menyusun elemen secara vertikal */
            gap: 20px;
            max-width: 1000px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Kolom Kiri: Detail Ruangan */
        .room-details {
            margin-bottom: 20px;
        }

        .room-details h2 {
            font-size: 22px;
            color: #333;
            margin-bottom: 10px;
        }

        .room-details p {
            font-size: 16px;
            color: #666;
        }

        /* Kolom Kiri: Daftar Komputer dengan scroll */
        .computer-list {
            flex: 2;
            max-height: 400px;
            overflow-y: auto;
            padding-right: 10px;
        }

        .computer-list::-webkit-scrollbar {
            width: 8px;
        }

        .computer-list::-webkit-scrollbar-thumb {
            background-color: #3498db;
            border-radius: 4px;
        }

        .computer-list::-webkit-scrollbar-track {
            background-color: #f4f4f9;
        }

        /* Kolom Kanan: Form Tambah Komputer */
        .computer-form {
            flex: 1;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
            margin-bottom: 10px;
        }

        h2 {
            color: #666;
            font-size: 20px;
            margin-bottom: 15px;
            text-align: center;
        }

        /* Gaya Tabel Daftar Komputer */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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
        }

        td {
            background-color: #f9f9f9;
        }

        /* Gaya Kotak Pencarian */
        .search-container {
            margin-bottom: 20px;
        }

        .search-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Gaya Form */
        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background-color: #2980b9;
        }

        /* Pesan Error */
        .error-messages {
            color: #e74c3c;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .back-link {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #3498db;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        /* Modal CSS */
        .modal {
            display: none;
            /* Hide modal by default */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            width: 100%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .edit-btn {
            padding: 5px 10px;
            background-color: #f39c12;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>

<body>


    <div class="container">
        <!-- Kolom Kiri: Detail Ruangan -->
        <div class="room-details">
            <h2>Informasi Ruangan</h2>
            <p><strong>Nama Ruangan:</strong> <?= esc($room['name']) ?></p>
            <p><strong>ID Ruangan:</strong> <?= esc($room['id']) ?></p>
        </div>

        <!-- Kolom Kiri: Daftar Komputer dengan scroll -->
        <div class="computer-list">
            <h2>Daftar Komputer</h2>

            <!-- Kotak Pencarian -->
            <div class="search-container">
                <input type="text" class="search-input" id="searchInput" onkeyup="filterTable()" placeholder="Cari komputer...">
            </div>

            <!-- Tabel Daftar Komputer -->
            <?php if (!empty($computers)): ?>
                <table id="computerTable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Komputer/LOKASI</th>
                            <th>IP Address</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($computers as $index => $computer): ?>
                            <tr>
                                <td><?= $index + 1 ?></td>
                                <td><?= esc($computer['computer_name']) ?></td>
                                <td><?= esc($computer['ip_address']) ?></td>
                                <td>
                                    <button class="edit-btn" onclick="openEditModal('<?= esc($computer['id']) ?>', '<?= esc($computer['computer_name']) ?>', '<?= esc($computer['ip_address']) ?>')">Edit</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="no-data">Tidak ada komputer di ruangan ini.</p>
            <?php endif; ?>
        </div>

        <!-- Kolom Kanan: Form Tambah Komputer -->
        <div class="computer-form">
            <h2>Tambah Komputer Baru</h2>

            <?php if (session()->get('errors')) : ?>
                <div class="error-messages">
                    <ul>
                        <?php foreach (session()->get('errors') as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>

            <form action="<?= base_url('room/add_computer') ?>" method="post">
                <input type="hidden" name="room_id" value="<?= esc($room['id']) ?>">

                <div class="form-group">
                    <label for="computer_name">Nama Komputer:</label>
                    <input type="text" name="computer_name" id="computer_name" required>
                </div>

                <div class="form-group">
                    <label for="ip_address">IP Address:</label>
                    <input type="text" name="ip_address" id="ip_address" required>
                </div>

                <button type="submit">Tambah Komputer</button>
            </form>

            <a href="/dashboard" class="back-link">Kembali ke Dashboard</a>
        </div>
    </div>

    <!-- Modal Form Edit -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeEditModal()">&times;</span>
            <h2>Edit Komputer</h2>
            <form action="<?= base_url('room/edit_computer') ?>" method="post">
                <input type="hidden" name="computer_id" id="editComputerId">

                <div class="form-group">
                    <label for="editComputerName">Nama Komputer:</label>
                    <input type="text" name="computer_name" id="editComputerName" required>
                </div>

                <div class="form-group">
                    <label for="editIpAddress">IP Address:</label>
                    <input type="text" name="ip_address" id="editIpAddress" required>
                </div>

                <button type="submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <!-- Script untuk Pencarian dan Modal -->
    <script>
        function filterTable() {
            let input = document.getElementById('searchInput');
            let filter = input.value.toUpperCase();
            let table = document.getElementById('computerTable');
            let tr = table.getElementsByTagName('tr');

            for (let i = 1; i < tr.length; i++) {
                let td = tr[i].getElementsByTagName('td')[1];
                if (td) {
                    let txtValue = td.textContent || td.innerText;
                    tr[i].style.display = txtValue.toUpperCase().indexOf(filter) > -1 ? '' : 'none';
                }
            }
        }

        function openEditModal(id, name, ip) {
            document.getElementById('editComputerId').value = id;
            document.getElementById('editComputerName').value = name;
            document.getElementById('editIpAddress').value = ip;
            document.getElementById('editModal').style.display = "flex";
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = "none";
        }

        window.onclick = function(event) {
            const modal = document.getElementById('editModal');
            if (event.target === modal) {
                closeEditModal();
            }
        }
    </script>
</body>

</html>