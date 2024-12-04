<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Ruangan</title>
    <link rel="stylesheet" href="/css/style3.css">
</head>
<body>
    <div class="container">
        <h1>Kelola Ruangan</h1>
        <p><strong>Nama Ruangan:</strong> <?= esc($room['name']) ?></p>

        <h2>Daftar Komputer</h2>
        <?php if (empty($computers)): ?>
            <p>Tidak ada komputer di ruangan ini.</p>
        <?php else: ?>
            <div class="computer-list-container">
                <ul>
                    <?php foreach ($computers as $computer): ?>
                        <li>
                            <?= esc($computer['computer_name']) ?> - IP: <?= esc($computer['ip_address']) ?>
                            <form action="/room/editComputer" method="post" style="display:inline;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="computer_id" value="<?= $computer['id'] ?>">
                                <button type="button" onclick="openEditForm(<?= $computer['id'] ?>, '<?= esc($computer['computer_name']) ?>', '<?= esc($computer['ip_address']) ?>')">Edit</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div id="editFormContainer" style="display:none;">
            <h2>Edit Komputer</h2>
            <form action="/room/updateComputer" method="post">
                <?= csrf_field() ?>
                <input type="hidden" name="computer_id" id="edit_computer_id">
                <label for="edit_computer_name">Nama Komputer:</label>
                <input type="text" name="computer_name" id="edit_computer_name" required>
                <br>
                <label for="edit_ip_address">IP Address:</label>
                <input type="text" name="ip_address" id="edit_ip_address" required>
                <br>
                <button type="submit">Simpan Perubahan</button>
                <button type="button" onclick="closeEditForm()">Batal</button>
            </form>
        </div>

        <h2>Tambah Komputer</h2>
        <form action="/room/add_computer" method="post">

            <?= csrf_field() ?>
            <input type="hidden" name="room_id" value="<?= $room['id'] ?>">
            <label for="computer_name">Nama Komputer:</label>
            <input type="text" name="computer_name" id="computer_name" required>
            <br>
            <label for="ip_address">IP Address:</label>
            <input type="text" name="ip_address" id="ip_address" required>
            <br>
            <button type="submit">Tambah Komputer</button>
        </form>
    </div>

    <script>
        // Fungsi untuk membuka form edit dengan data yang sudah terisi
        function openEditForm(computerId, computerName, ipAddress) {
            document.getElementById('editFormContainer').style.display = 'block';
            document.getElementById('edit_computer_id').value = computerId;
            document.getElementById('edit_computer_name').value = computerName;
            document.getElementById('edit_ip_address').value = ipAddress;
        }

        // Fungsi untuk menutup form edit
        function closeEditForm() {
            document.getElementById('editFormContainer').style.display = 'none';
        }
    </script>
</body>
</html>
