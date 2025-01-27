<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Laporan Transaksi <?= $transaksi ?></h2>
<p>Dari Tanggal: <?= $startDate ?> - Sampai Tanggal: <?= $endDate ?></p>

<table>
    <thead>
        <tr>
            <th>ID Barang</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>User</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $item): ?>
            <tr>
                <td><?= $item['barang_id'] ?></td>
                <td><?= $transaksi == 'Barang Masuk' ? $item['jumlah_masuk'] : $item['jumlah_keluar'] ?></td>
                <td><?= $transaksi == 'Barang Masuk' ? $item['tanggal_masuk'] : $item['tanggal_keluar'] ?></td>
                <td><?= $item['user_name'] ?></td> <!-- Menampilkan nama user -->
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
