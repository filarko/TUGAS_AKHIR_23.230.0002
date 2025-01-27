<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GudangModel;
use App\Models\UserModel;
use App\Models\jenisModel;
use App\Models\satuanModel;
use App\Models\supplierModel;
use App\Models\barangModel;
use App\Models\barang_masukModel;
use App\Models\barang_KeluarModel;
use Dompdf\Dompdf;
use Dompdf\Options;



class KepalaGudang extends BaseController
{
    protected $gudangModel;
    protected $jenisModel;
    protected $satuanModel;
    protected $supplierModel;
    protected $barangModel;

    protected $barang_masukModel;

    protected $barang_KeluarModel;
    protected $userModel;

    public function __construct()
    {
        $this->gudangModel = new GudangModel();
        $this->userModel = new UserModel();
        $this->jenisModel = new jenisModel();
        $this->satuanModel = new satuanModel();
        $this->supplierModel = new supplierModel();
        $this->barangModel = new BarangModel();
        $this->barang_masukModel = new barang_masukModel();
        $this->barang_KeluarModel = new barang_KeluarModel();
    }
    public function index()
    {
        return view('KepalaGudang/dashboard');
    }

    public function Gudang()
    {
        $data['gudang'] = $this->gudangModel->findAll();
        return view('KepalaGudang/Gudang/index', $data);
    }

    public function create()
    {
        return view('KepalaGudang/gudang/create');
    }

    public function store()
    {
        $this->gudangModel->save([
            'nama_gudang' => $this->request->getPost('nama_gudang'),
            'user_id' => session('id_user'),
        ]);

        return redirect()->to('/KepalaGudang/gudang')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data['gudang'] = $this->gudangModel->find($id);
        return view('KepalaGudang/gudang/edit', $data);
    }

    public function update($id)
    {
        $this->gudangModel->update($id, [
            'nama_gudang' => $this->request->getPost('nama_gudang'),
            'user_id' => session('id_user'),
        ]);

        return redirect()->to('/KepalaGudang/gudang')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->gudangModel->delete($id);
        return redirect()->to('/KepalaGudang/gudang')->with('success', 'Data berhasil dihapus.');
    }

    // data jenis
    public function dataJenis()
    {
        $data['jenis'] = $this->jenisModel->findAll();
        return view('KepalaGudang/Jenis/index', $data);
    }

    public function createJenis()
    {
        return view('KepalaGudang/Jenis/create');
    }

    public function storeJenis()
    {
        $this->jenisModel->save([
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'user_id' => session('id_user'),
        ]);

        return redirect()->to('/KepalaGudang/jenis')->with('success', 'Data berhasil ditambahkan.');
    }

    public function editJenis($id)
    {
        $data['jenis'] = $this->jenisModel->find($id);
        return view('KepalaGudang/Jenis/edit', $data);
    }

    public function updateJenis($id)
    {
        $this->jenisModel->update($id, [
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'user_id' => session('id_user'),
        ]);

        return redirect()->to('/KepalaGudang/jenis')->with('success', 'Data berhasil diperbarui.');
    }

    public function deleteJenis($id)
    {
        $this->jenisModel->delete($id);
        return redirect()->to('/KepalaGudang/jenis')->with('success', 'Data berhasil dihapus.');
    }

    // data satuan
    public function dataSatuan()
    {
        $data['satuan'] = $this->satuanModel->findAll();
        return view('KepalaGudang/Satuan/index', $data);
    }

    public function createSatuan()
    {
        return view('KepalaGudang/Satuan/create');
    }

    public function storeSatuan()
    {
        $this->satuanModel->save([
            'nama_satuan' => $this->request->getPost('nama_satuan'),
            'user_id' => session('id_user'),
        ]);

        return redirect()->to('/KepalaGudang/satuan')->with('success', 'Data berhasil ditambahkan.');
    }

    public function editSatuan($id)
    {
        $data['satuan'] = $this->satuanModel->find($id);
        return view('KepalaGudang/Satuan/edit', $data);
    }

    public function updateSatuan($id)
    {
        $this->satuanModel->update($id, [
            'nama_satuan' => $this->request->getPost('nama_satuan'),
            'user_id' => session('id_user'),
        ]);

        return redirect()->to('/KepalaGudang/satuan')->with('success', 'Data berhasil diperbarui.');
    }

    public function deleteSatuan($id)
    {
        // Ambil semua barang yang berelasi dengan satuan
        $barangTerkait = $this->barangModel->where('satuan_id', $id)->findAll();

        // Periksa apakah ada barang yang terkait
        if (!empty($barangTerkait)) {
            // Ambil nama-nama barang terkait
            $namaBarang = array_map(function ($barang) {
                return $barang['nama_barang'];
            }, $barangTerkait);

            // Gabungkan nama barang menjadi string
            $listNamaBarang = implode(', ', $namaBarang);

            // Redirect dengan pesan warning
            return redirect()->to('/KepalaGudang/satuan')
                ->with('error', "Data satuan tidak dapat dihapus karena terkait dengan barang berikut: $listNamaBarang. Harap hapus atau ubah barang terkait terlebih dahulu.");
        }

        // Jika tidak ada relasi, hapus satuan
        $this->satuanModel->delete($id);
        return redirect()->to('/KepalaGudang/satuan')->with('success', 'Data berhasil dihapus.');
    }

    //Barang
    public function dataBarang()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('barang');
        $builder->select('barang.*, jenis.nama_jenis, satuan.nama_satuan, gudang.nama_gudang');
        $builder->join('jenis', 'barang.jenis_id = jenis.id_jenis', 'left');
        $builder->join('satuan', 'barang.satuan_id = satuan.id_satuan', 'left');
        $builder->join('gudang', 'barang.gudang_id = gudang.id_gudang', 'left');
        $data['barang'] = $builder->get()->getResultArray();

        return view('KepalaGudang/Barang/index', $data);
    }

    public function createBarang()
    {
        // Inisialisasi model
        $jenisModel = new \App\Models\jenisModel();
        $satuanModel = new \App\Models\satuanModel();
        $gudangModel = new \App\Models\gudangmodel();

        // Ambil user_id dari session
        $session = session();
        $user_id = $session->get('user_id');

        // Ambil data berdasarkan user_id
        $data['jenis'] = $jenisModel->findAll();
        $data['satuan'] = $satuanModel->findAll();
        $data['gudang'] = $gudangModel->findAll();

        // Load view create dan kirim data
        return view('KepalaGudang/Barang/create', $data);
    }

    public function storeBarang()
    {
        $this->barangModel->save([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'jenis_id' => $this->request->getPost('jenis_id'),
            'satuan_id' => $this->request->getPost('satuan_id'),
            'gudang_id' => $this->request->getPost('gudang_id'),
            'stok' => $this->request->getPost('stok'),
            'user_id' => session('id_user'),
            'harga_barang' => $this->request->getPost('harga_barang'),
            'image' => $this->request->getFile('image')->getName(),
        ]);

        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $image->move('uploads');
        }

        return redirect()->to('/KepalaGudang/stokBarang')->with('success', 'Data berhasil ditambahkan.');
    }

    public function editBarang($id)
    {
        // Inisialisasi model
        $jenisModel = new \App\Models\jenisModel();
        $satuanModel = new \App\Models\satuanModel();
        $gudangModel = new \App\Models\gudangModel();

        // Ambil data barang berdasarkan ID
        $data['barang'] = $this->barangModel->find($id);

        // Ambil data dropdown
        $data['jenis'] = $jenisModel->findAll();
        $data['satuan'] = $satuanModel->findAll();
        $data['gudang'] = $gudangModel->findAll();

        // Tampilkan view edit
        return view('KepalaGudang/Barang/edit', $data);
    }

    public function updateBarang($id)
    {
        $dataUpdate = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'jenis_id' => $this->request->getPost('jenis_id'),
            'satuan_id' => $this->request->getPost('satuan_id'),
            'gudang_id' => $this->request->getPost('gudang_id'),
            'stok' => $this->request->getPost('stok'),
            'user_id' => session('id_user'),
            'harga_barang' => $this->request->getPost('harga_barang'),
        ];

        $image = $this->request->getFile('image');
        if ($image->isValid() && !$image->hasMoved()) {
            $image->move('uploads');
            $dataUpdate['image'] = $image->getName();
        }

        $this->barangModel->update($id, $dataUpdate);

        return redirect()->to('/KepalaGudang/stokBarang')->with('success', 'Data berhasil diperbarui.');
    }

    public function deleteBarang($id)
    {
        // Cek apakah barang memiliki relasi dengan barang_keluar
        $barangKeluarTerkait = $this->barang_KeluarModel->where('barang_id', $id)->findAll();

        // Jika ada relasi, beri peringatan
        if (!empty($barangKeluarTerkait)) {
            // Ambil detail transaksi barang keluar yang berelasi
            $transaksiTerkait = array_map(function ($transaksi) {
                return "ID: {$transaksi['id_barang_keluar']}, Jumlah Keluar: {$transaksi['jumlah_keluar']}, Lokasi: {$transaksi['lokasi']}, Tanggal: {$transaksi['tanggal_keluar']}";
            }, $barangKeluarTerkait);

            // Gabungkan semua transaksi menjadi string
            $listTransaksi = implode('<br>', $transaksiTerkait);

            // Redirect dengan pesan warning
            return redirect()->to('/KepalaGudang/stokBarang')
                ->with('error', "Barang ini tidak dapat dihapus karena memiliki data transaksi pada tabel barang keluar:<br>$listTransaksi. Harap hapus atau ubah data barang keluar terkait terlebih dahulu.");
        }

        // Jika tidak ada relasi, hapus barang dan file gambar
        $barang = $this->barangModel->find($id);

        if ($barang['image'] && file_exists('uploads/' . $barang['image'])) {
            unlink('uploads/' . $barang['image']);
        }

        $this->barangModel->delete($id);
        return redirect()->to('/KepalaGudang/stokBarang')->with('success', 'Data berhasil dihapus.');
    }

    // data supplier
    public function datasupplier()
    {
        $data['suppliers'] = $this->supplierModel->findAll();
        return view('KepalaGudang/Supplier/index', $data);


    }

    public function createSupplier()
    {
        return view('KepalaGudang/Supplier/create');
    }

    public function storeSupplier()
    {
        $foto = $this->request->getFile('foto'); // Mengambil file dari input
        if ($foto->isValid() && !$foto->hasMoved()) {
            // Generate nama unik untuk file
            $newName = $foto->getRandomName();
            // Simpan file ke folder uploads
            $foto->move(FCPATH . 'uploads/', $newName);
        } else {
            return redirect()->back()->with('error', 'Gagal mengupload foto.');
        }

        // Simpan data ke database
        $this->supplierModel->save([
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'alamat' => $this->request->getPost('alamat'),
            'foto' => $newName, // Simpan nama file yang diupload
            'no_telp' => $this->request->getPost('no_telp'),
            'user_id' => session('id_user'),
        ]);

        return redirect()->to('/KepalaGudang/supplier')->with('success', 'Data berhasil ditambahkan.');
    }


    public function editSupplier($id)
    {
        $supplier = $this->supplierModel->find($id);

        if (!$supplier) {
            return redirect()->to('/KepalaGudang/supplier')->with('error', 'Data supplier tidak ditemukan.');
        }

        return view('KepalaGudang/Supplier/edit', ['supplier' => $supplier]);
    }

    public function updateSupplier($id)
    {
        $supplier = $this->supplierModel->find($id);

        if (!$supplier) {
            return redirect()->to('/KepalaGudang/supplier')->with('error', 'Data supplier tidak ditemukan.');
        }

        $foto = $this->request->getFile('foto');
        $newName = $supplier['foto']; // Default nama file lama

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            // Hapus file lama jika ada
            if ($supplier['foto'] && file_exists(WRITEPATH . 'uploads/' . $supplier['foto'])) {
                unlink(FCPATH . 'uploads/' . $supplier['foto']);
            }
            // Simpan file baru
            $newName = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads', $newName);
        }

        $this->supplierModel->update($id, [
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'alamat' => $this->request->getPost('alamat'),
            'foto' => $newName,
            'no_telp' => $this->request->getPost('no_telp'),
        ]);

        return redirect()->to('/KepalaGudang/supplier')->with('success', 'Data berhasil diperbarui.');
    }

    public function deleteSupplier($id)
    {
        $this->supplierModel->delete($id);
        return redirect()->to('/KepalaGudang/supplier')->with('success', 'Data berhasil dihapus.');

    }

    //barang masuk
    // Menampilkan form create barang masuk
    public function dataBarangMasuk()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('barang_masuk');
        $builder->select('barang_masuk.*, barang.nama_barang'); // Pilih data barang_masuk dan nama_barang
        $builder->join('barang', 'barang_masuk.barang_id = barang.id_barang', 'left'); // Join tabel barang
        $data['barangMasuk'] = $builder->get()->getResultArray(); // Ambil hasil query sebagai array

        return view('KepalaGudang/BarangMasuk/index', $data);
    }

    public function createBarangMasuk()
    {
        $barang = new \App\Models\barangModel;
        $data['barang'] = $barang->findAll();
        return view('KepalaGudang/BarangMasuk/create', $data);
    }

    // Menyimpan data barang masuk baru
    public function storeBarangMasuk()
    {
        $barangMasukModel = new \App\Models\barang_masukModel();
        $barangModel = new \App\Models\barangModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'barang_id' => 'required|integer',
            'jumlah_masuk' => 'required|integer',
            'tanggal_masuk' => 'required|valid_date[Y-m-d]',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        // Ambil data dari input
        $data = [
            'barang_id' => $this->request->getPost('barang_id'),
            'jumlah_masuk' => $this->request->getPost('jumlah_masuk'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'user_id' => session('id_user'),
        ];

        // Simpan data ke tabel barang_masuk
        $barangMasukModel->insert($data);

        // Update stok di tabel barang
        $barang = $barangModel->find($data['barang_id']);
        if ($barang) {
            $barangModel->update($data['barang_id'], [
                'stok' => $barang['stok'] + $data['jumlah_masuk'],
            ]);
        }

        return redirect()->to('/KepalaGudang/BarangMasuk')->with('success', 'Data barang masuk berhasil disimpan.');
    }

    // Menampilkan form edit barang masuk

    public function editBarangMasuk($id)
    {
        $barangMasukModel = new barang_masukModel();
        $barangModel = new BarangModel();

        // Ambil data barang masuk berdasarkan ID
        $data['barangMasuk'] = $barangMasukModel->find($id);

        if (!$data['barangMasuk']) {
            return redirect()->to('/KepalaGudang/BarangMasuk')->with('error', 'Data tidak ditemukan.');
        }

        // Ambil data barang untuk dropdown
        $data['barang'] = $barangModel->findAll();

        // Load view edit
        return view('KepalaGudang/BarangMasuk/edit', $data);
    }

    // Mengupdate data barang masuk
    public function updateBarangMasuk($id)
    {
        $barangMasukModel = new barang_masukModel();
        $barangModel = new BarangModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'barang_id' => 'required|integer',
            'jumlah_masuk' => 'required|integer',
            'tanggal_masuk' => 'required|valid_date[Y-m-d]',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        // Ambil data dari form
        $data = [
            'barang_id' => $this->request->getPost('barang_id'),
            'jumlah_masuk' => $this->request->getPost('jumlah_masuk'),
            'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
            'user_id' => session('id_user'),
        ];

        // Update data di tabel barang_masuk
        $barangMasukModel->update($id, $data);

        // Update stok di tabel barang (jika diperlukan)
        $barang = $barangModel->find($data['barang_id']);
        if ($barang) {
            $barangModel->update($data['barang_id'], [
                'stok' => $barang['stok'] + $data['jumlah_masuk'],
            ]);
        }

        return redirect()->to('/KepalaGudang/BarangMasuk')->with('success', 'Data barang masuk berhasil diupdate.');
    }

    // Menghapus data barang masuk
    public function deleteBarangMasuk($id)
    {
        $barangMasukModel = new barang_masukModel();
        $barangMasukModel->delete($id);

        return redirect()->to('/KepalaGudang/BarangMasuk')->with('success', 'Data barang masuk berhasil dihapus.');
    }

    // data barang keluar
    public function dataBarangKeluar()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('barang_Keluar');
        $builder->select(select: 'barang_Keluar.*, barang.nama_barang'); // Pilih data barang_Keluar dan nama_barang
        $builder->join('barang', 'barang_Keluar.barang_id = barang.id_barang', 'left'); // Join tabel barang
        $data['barangKeluar'] = $builder->get()->getResultArray(); // Ambil hasil query sebagai array

        return view('KepalaGudang/BarangKeluar/index', $data);
    }

    public function createBarangKeluar()
    {
        $barang = new \App\Models\barangModel;
        $data['barang'] = $barang->findAll();
        return view('KepalaGudang/BarangKeluar/create', $data);
    }

    public function storeBarangKeluar()
    {
        $barangKeluarModel = new \App\Models\barang_KeluarModel();
        $barangModel = new \App\Models\barangModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'barang_id' => 'required|integer',
            'jumlah_keluar' => 'required|integer',
            'tanggal_keluar' => 'required|valid_date[Y-m-d]',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        // Ambil data dari input
        $data = [
            'barang_id' => $this->request->getPost('barang_id'),
            'jumlah_keluar' => $this->request->getPost('jumlah_keluar'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'user_id' => session('id_user'),
        ];

        // Simpan data ke tabel barang_Keluar
        $barangKeluarModel->insert($data);

        // Update stok di tabel barang
        $barang = $barangModel->find($data['barang_id']);
        if ($barang) {
            $barangModel->update($data['barang_id'], [
                'stok' => $barang['stok'] - $data['jumlah_keluar'],
            ]);
        }

        return redirect()->to('/KepalaGudang/BarangKeluar')->with('success', 'Data barang Keluar berhasil disimpan.');
    }

    public function editBarangKeluar($id)
    {
        $barangKeluarModel = new barang_keluarModel();
        $barangModel = new BarangModel();

        // Ambil data barang Keluar berdasarkan ID
        $data['barangkeluar'] = $barangKeluarModel->find($id);

        if (!$data['barangkeluar']) {
            return redirect()->to('/KepalaGudang/BarangKeluar')->with('error', 'Data tidak ditemukan.');
        }

        // Ambil data barang untuk dropdown
        $data['barang'] = $barangModel->findAll();

        // Load view edit
        return view('KepalaGudang/BarangKeluar/edit', $data);
    }


    public function updateBarangKeluar($id)
    {
        $barangKeluarModel = new barang_keluarModel();
        $barangModel = new BarangModel();

        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'barang_id' => 'required|integer',
            'jumlah_keluar' => 'required|integer',
            'tanggal_keluar' => 'required|valid_date[Y-m-d]',
        ]);

        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        // Ambil data dari form
        $data = [
            'barang_id' => $this->request->getPost('barang_id'),
            'jumlah_keluar' => $this->request->getPost('jumlah_keluar'),
            'tanggal_keluar' => $this->request->getPost('tanggal_keluar'),
            'user_id' => session('id_user'),
        ];

        // Update data di tabel barang_Keluar
        $barangKeluarModel->update($id, $data);

        // Update stok di tabel barang (jika diperlukan)
        $barang = $barangModel->find($data['barang_id']);
        if ($barang) {
            $barangModel->update($data['barang_id'], [
                'stok' => $barang['stok'] - $data['jumlah_keluar'],
            ]);
        }

        return redirect()->to('/KepalaGudang/BarangKeluar')->with('success', 'Data barang Keluar berhasil diupdate.');
    }

    // Menghapus data barang Keluar
    public function deleteBarangKeluar($id)
    {
        $barangKeluarModel = new barang_keluarModel();
        $barangKeluarModel->delete($id);

        return redirect()->to('/KepalaGudang/BarangKeluar')->with('success', 'Data barang Keluar berhasil dihapus.');
    }

    public function print()
    {
        return view('KepalaGudang/PrintTransaksi/index');
    }

    public function cetak()
    {
        // Ambil data dari form
        $transaksi = $this->request->getPost('transaksi');  // Barang Masuk atau Barang Keluar
        $startDate = $this->request->getPost('startDate');
        $endDate = $this->request->getPost('endDate');

        $model = null;
        $data = [];

        $userModel = new UserModel(); // Instansiasi UserModel

        // Pilih model berdasarkan jenis transaksi
        if ($transaksi === 'Barang Masuk') {
            $model = new barang_masukModel();
            $data = $model->select('barang_masuk.*, user.name as user_name')
                ->join('user', 'user.id_user = barang_masuk.user_id')
                ->where('tanggal_masuk >=', $startDate)
                ->where('tanggal_masuk <=', $endDate)
                ->findAll();
        } elseif ($transaksi === 'Barang Keluar') {
            $model = new barang_keluarModel();
            $data = $model->select('barang_keluar.*, user.name as user_name')
                ->join('user', 'user.id_user = barang_keluar.user_id')
                ->where('tanggal_keluar >=', $startDate)
                ->where('tanggal_keluar <=', $endDate)
                ->findAll();
        }

        // Load Dompdf
        $dompdf = new Dompdf();

        // Siapkan data untuk ditampilkan pada PDF
        $html = view('KepalaGudang/PrintTransaksi/cetak', [
            'data' => $data,
            'transaksi' => $transaksi,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);

        // Memuat HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Atur ukuran kertas dan orientasi
        $dompdf->setPaper('A4', 'landscape');

        // Render PDF (render ke string)
        $dompdf->render();

        // Output PDF
        $dompdf->stream("transaksi_{$transaksi}_{$startDate}_{$endDate}.pdf", array("Attachment" => 0));
    }

    // user managment
    // Halaman index menampilkan daftar user
    public function user()
    {
        $data['users'] = $this->userModel->findAll();
        return view('KepalaGudang/UserManagement/index', $data);
    }

    // Menampilkan form untuk menambah user baru
    public function createUser()
    {
        return view('KepalaGudang/UserManagement/create');
    }

    // Menyimpan data user baru
    public function storeUser()
    {
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'name' => $this->request->getPost('name'),
            'role' => $this->request->getPost('role'),
            'no_telp' => $this->request->getPost('no_telp'),
            'username' => $this->request->getPost('username'),
            'is_active' => 1,
        ];

        $this->userModel->save($data);
        return redirect()->to('/KepalaGudang/user-management')->with('success', 'Berhasil di tambah');
    }

    // Menampilkan form untuk mengedit user
    public function editUser($id)
    {
        $data['user'] = $this->userModel->find($id);
        return view('KepalaGudang/UserManagement/edit', $data);
    }

    // Mengupdate data user yang ada
    public function updateUser($id)
    {
        $data = [
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'name' => $this->request->getPost('name'),
            'role' => $this->request->getPost('role'),
            'no_telp' => $this->request->getPost('no_telp'),
            'username' => $this->request->getPost('username'),
            'is_active' => $this->request->getPost('is_active'),
        ];

        $this->userModel->update($id, $data);
        return redirect()->to('/KepalaGudang/user-management')->with('success', 'Berhasil di ubah');
    }

    // Menghapus user
    public function deleteUser($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/KepalaGudang/user-management')->with('success', 'Berhasil di hapus');
    }
}









