<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Ruangan</title>
    <link rel="stylesheet" href="/css/style2.css">
</head>
<body>
    <div class="header">
        Detail Ruangan
    </div>
    
    <div class="container">
        <a href="/dashboard" class="back-button">Kembali ke Dashboard</a>
        
        <div class="room-info">
            <p><strong>Nama Ruangan:</strong> <?= esc($room['name']) ?></p>
        </div>
        
        <div class="computers-box">
            <h2>Daftar Komputer</h2>
            <?php if (empty($computers)): ?>
                <p>Tidak ada komputer di ruangan ini.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($computers as $computer): ?>
                        <li>
                            <?= esc($computer['computer_name']) ?> - IP: <?= esc($computer['ip_address']) ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
    
    
</body>
</html>
