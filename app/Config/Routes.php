<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Auth::index');
$routes->post('/autentikasi', 'Auth::autentikasi');
$routes->get('/logout', 'Auth::logout');

$routes->group('AdminGudang', ['filter' => 'role:1'], function ($routes) {
    $routes->get('dashboard', 'AdminGudang::index');

    $routes->get('gudang', 'AdminGudang::Gudang');
    $routes->get('create', 'AdminGudang::create');
    $routes->post('store', 'AdminGudang::store');
    $routes->get('edit/(:num)', 'AdminGudang::edit/$1');
    $routes->post('update/(:num)', 'AdminGudang::update/$1');
    $routes->get('delete/(:num)', 'AdminGudang::delete/$1');

    $routes->get('jenis', 'AdminGudang::dataJenis');
    $routes->get('createJenis', 'AdminGudang::createJenis');
    $routes->post('storeJenis', 'AdminGudang::storeJenis');
    $routes->get('editJenis/(:num)', 'AdminGudang::editJenis/$1');
    $routes->post('updateJenis/(:num)', 'AdminGudang::updateJenis/$1');
    $routes->get('deleteJenis/(:num)', 'AdminGudang::deleteJenis/$1');

    $routes->get('satuan', 'AdminGudang::dataSatuan');
    $routes->get('createSatuan', 'AdminGudang::createSatuan');
    $routes->post('storeSatuan', 'AdminGudang::storeSatuan');
    $routes->get('editSatuan/(:num)', 'AdminGudang::editSatuan/$1');
    $routes->post('updateSatuan/(:num)', 'AdminGudang::updateSatuan/$1');
    $routes->get('deleteSatuan/(:num)', 'AdminGudang::deleteSatuan/$1');

    $routes->get('supplier', 'AdminGudang::dataSupplier');
    $routes->get('createSupplier', 'AdminGudang::createSupplier');
    $routes->post('storeSupplier', 'AdminGudang::storeSupplier');
    $routes->get('editSupplier/(:num)', 'AdminGudang::editSupplier/$1');
    $routes->post('updateSupplier/(:num)', 'AdminGudang::updateSupplier/$1');
    $routes->get('deleteSupplier/(:num)', 'AdminGudang::deleteSupplier/$1');

    $routes->get('stokBarang', 'AdminGudang::dataBarang');
    $routes->get('createBarang', 'AdminGudang::createBarang');
    $routes->post('storeBarang', 'AdminGudang::storeBarang');
    $routes->get('editBarang/(:num)', 'AdminGudang::editBarang/$1');
    $routes->post('updateBarang/(:num)', 'AdminGudang::updateBarang/$1');
    $routes->get('deleteBarang/(:num)', 'AdminGudang::deleteBarang/$1');

    $routes->get('BarangMasuk', 'AdminGudang::dataBarangMasuk');
    $routes->get('createBarangMasuk', 'AdminGudang::createBarangMasuk');
    $routes->post('storeBarangMasuk', 'AdminGudang::storeBarangMasuk');
    $routes->get('editBarangMasuk/(:num)', 'AdminGudang::editBarangMasuk/$1');
    $routes->post('updateBarangMasuk/(:num)', 'AdminGudang::updateBarangMasuk/$1');
    $routes->get('deleteBarangMasuk/(:num)', 'AdminGudang::deleteBarangMasuk/$1');

    $routes->get('BarangKeluar', 'AdminGudang::dataBarangKeluar');
    $routes->get('createBarangKeluar', 'AdminGudang::createBarangKeluar');
    $routes->post('storeBarangKeluar', 'AdminGudang::storeBarangKeluar');
    $routes->get('editBarangKeluar/(:num)', 'AdminGudang::editBarangKeluar/$1');
    $routes->post('updateBarangKeluar/(:num)', 'AdminGudang::updateBarangKeluar/$1');
    $routes->get('deleteBarangKeluar/(:num)', 'AdminGudang::deleteBarangKeluar/$1');

    $routes->get('print', 'AdminGudang::print');
    $routes->post('PrintTransaksi/cetak', 'AdminGudang::cetak');
});

$routes->group('KepalaGudang', ['filter' => 'role:2'], function ($routes) {
    $routes->get('dashboard', 'KepalaGudang::index');

    $routes->get('gudang', 'KepalaGudang::Gudang');
    $routes->get('create', 'KepalaGudang::create');
    $routes->post('store', 'KepalaGudang::store');
    $routes->get('edit/(:num)', 'KepalaGudang::edit/$1');
    $routes->post('update/(:num)', 'KepalaGudang::update/$1');
    $routes->get('delete/(:num)', 'KepalaGudang::delete/$1');

    $routes->get('jenis', 'KepalaGudang::dataJenis');
    $routes->get('createJenis', 'KepalaGudang::createJenis');
    $routes->post('storeJenis', 'KepalaGudang::storeJenis');
    $routes->get('editJenis/(:num)', 'KepalaGudang::editJenis/$1');
    $routes->post('updateJenis/(:num)', 'KepalaGudang::updateJenis/$1');
    $routes->get('deleteJenis/(:num)', 'KepalaGudang::deleteJenis/$1');

    $routes->get('satuan', 'KepalaGudang::dataSatuan');
    $routes->get('createSatuan', 'KepalaGudang::createSatuan');
    $routes->post('storeSatuan', 'KepalaGudang::storeSatuan');
    $routes->get('editSatuan/(:num)', 'KepalaGudang::editSatuan/$1');
    $routes->post('updateSatuan/(:num)', 'KepalaGudang::updateSatuan/$1');
    $routes->get('deleteSatuan/(:num)', 'KepalaGudang::deleteSatuan/$1');

    $routes->get('supplier', 'KepalaGudang::dataSupplier');
    $routes->get('createSupplier', 'KepalaGudang::createSupplier');
    $routes->post('storeSupplier', 'KepalaGudang::storeSupplier');
    $routes->get('editSupplier/(:num)', 'KepalaGudang::editSupplier/$1');
    $routes->post('updateSupplier/(:num)', 'KepalaGudang::updateSupplier/$1');
    $routes->get('deleteSupplier/(:num)', 'KepalaGudang::deleteSupplier/$1');

    $routes->get('stokBarang', 'KepalaGudang::dataBarang');
    $routes->get('createBarang', 'KepalaGudang::createBarang');
    $routes->post('storeBarang', 'KepalaGudang::storeBarang');
    $routes->get('editBarang/(:num)', 'KepalaGudang::editBarang/$1');
    $routes->post('updateBarang/(:num)', 'KepalaGudang::updateBarang/$1');
    $routes->get('deleteBarang/(:num)', 'KepalaGudang::deleteBarang/$1');

    $routes->get('BarangMasuk', 'KepalaGudang::dataBarangMasuk');
    $routes->get('createBarangMasuk', 'KepalaGudang::createBarangMasuk');
    $routes->post('storeBarangMasuk', 'KepalaGudang::storeBarangMasuk');
    $routes->get('editBarangMasuk/(:num)', 'KepalaGudang::editBarangMasuk/$1');
    $routes->post('updateBarangMasuk/(:num)', 'KepalaGudang::updateBarangMasuk/$1');
    $routes->get('deleteBarangMasuk/(:num)', 'KepalaGudang::deleteBarangMasuk/$1');

    $routes->get('BarangKeluar', 'KepalaGudang::dataBarangKeluar');
    $routes->get('createBarangKeluar', 'KepalaGudang::createBarangKeluar');
    $routes->post('storeBarangKeluar', 'KepalaGudang::storeBarangKeluar');
    $routes->get('editBarangKeluar/(:num)', 'KepalaGudang::editBarangKeluar/$1');
    $routes->post('updateBarangKeluar/(:num)', 'KepalaGudang::updateBarangKeluar/$1');
    $routes->get('deleteBarangKeluar/(:num)', 'KepalaGudang::deleteBarangKeluar/$1');

    $routes->get('print', 'KepalaGudang::print');
    $routes->post('PrintTransaksi/cetak', 'KepalaGudang::cetak');

    $routes->get('user-management', 'KepalaGudang::user');
    // Route untuk halaman create
    $routes->get('createUser', 'KepalaGudang::createUser');

    // Route untuk menyimpan data user baru
    $routes->post('storeUser', 'KepalaGudang::storeUser');

    // Route untuk halaman edit user
    $routes->get('editUser/(:num)', 'KepalaGudang::editUser/$1');

    // Route untuk mengupdate data user
    $routes->post('updateUser/(:num)', 'KepalaGudang::updateUser/$1');

    // Route untuk menghapus data user
    $routes->get('deleteUser/(:num)', 'KepalaGudang::deleteUser/$1');
});

$routes->get('unauthorized', function () {
    echo "Anda tidak memiliki akses ke halaman ini.";

});