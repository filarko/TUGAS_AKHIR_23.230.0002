<?= $this->extend('AdminGudang/layout/main') ?>
<?= $this->section('content') ?>
<div class="container">
    <h2>Print Transaksi</h2>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Print Transaksi Barang</div>
        </div>
        <div class="card-body border-bottom-primary">
            <h5>Laporan Transaksi</h5>
            <!-- Pilihan Jenis Transaksi -->
            <input type="radio" name="transaksi" id="barangMasuk" value="Barang Masuk" required>
            <label for="barangMasuk">Barang Masuk</label>
            <br>
            <input type="radio" name="transaksi" id="barangKeluar" value="Barang Keluar" required>
            <label for="barangKeluar">Barang Keluar</label>
            <h5>Tanggal</h5>
            <!-- Pilihan Tanggal -->
            <label for="startDate">Dari Tanggal</label>
            <input type="date" class="form-control" name="startDate" id="startDate">
            <label for="endDate">Sampai Tanggal</label>
            <input type="date" class="form-control" name="endDate" id="endDate">
            <br>
            <!-- Tombol Print -->
            <a class="bg bg-primary p-2 text-white rounded" id="printButton" href="#" onclick="submitForm()"><i class="fa fa-print"></i> Print</a>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk mengecek apakah transaksi dipilih dan mengirim data ke controller
    function submitForm() {
        const transaksi = document.querySelector('input[name="transaksi"]:checked');
        const startDate = document.getElementById('startDate').value;
        const endDate = document.getElementById('endDate').value;

        if (!transaksi) {
            alert('Pilih jenis transaksi terlebih dahulu!');
            return;
        }

        if (!startDate || !endDate) {
            alert('Tentukan rentang tanggal!');
            return;
        }

        // Kirim data ke controller untuk cetak PDF
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/AdminGudang/PrintTransaksi/cetak';

        // Tambahkan input data
        const inputTransaksi = document.createElement('input');
        inputTransaksi.type = 'hidden';
        inputTransaksi.name = 'transaksi';
        inputTransaksi.value = transaksi.value;
        form.appendChild(inputTransaksi);

        const inputStartDate = document.createElement('input');
        inputStartDate.type = 'hidden';
        inputStartDate.name = 'startDate';
        inputStartDate.value = startDate;
        form.appendChild(inputStartDate);

        const inputEndDate = document.createElement('input');
        inputEndDate.type = 'hidden';
        inputEndDate.name = 'endDate';
        inputEndDate.value = endDate;
        form.appendChild(inputEndDate);

        document.body.appendChild(form);
        form.submit();
    }
</script>
<?= $this->endSection() ?>