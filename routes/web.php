<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.user.login');
});

// Register
Route::get('register', 'RegisterController@index')->name('register');
Route::post('postregister', 'RegisterController@postRegister')->name('postregister');
// Login
Route::get('login', 'LoginController@index')->name('login');
Route::post('postlogin', 'LoginController@postLogin')->name('postlogin');
Route::get('logout', 'LoginController@logout')->name('logout');
// Auth
Route::group(['middleware' => ['auth', 'CekLevel:admin,mahasiswa,perusahaan']], function() {
	// Dashboard
	Route::get('dashboard', 'FrontController@index')->name('dashboard');
	// Pengaturan Akun
	Route::get('pengaturan', 'PengaturanController@index')->name('pengaturan');
	Route::post('ubahnama', 'PengaturanController@ubahNama')->name('ubahnama');
	Route::post('ubahpassword', 'PengaturanController@ubahPassword')->name('ubahpassword');
	Route::post('ubahgambar', 'PengaturanController@ubahGambar')->name('ubahgambar');
	// Download Permohonan
	Route::get('/download/{id}', 'PendaftarbaruController@download')->name('download');
	// Download Laporan Magang
	Route::get('/download2/{id}', 'LaporanmagangController@download')->name('download2');
	// Download Penilaian Magang
	Route::get('/download3/{id}', 'PenilaianmagangController@download')->name('download3');
	// Download Sertifikat Magang
	Route::get('/download4/{id}', 'SertifikatmagangController@download')->name('download4');
	// Export Presensi 2
	Route::get('exportpresensi2/{id}', 'PresensiperusahaanController@exportPresensi')->name('exportpresensi2');
	// Export Logbook 2
	Route::get('exportlogbook2/{id}', 'LogbookperusahaanController@exportLogbook')->name('exportlogbook2');
});

Route::group(['middleware' => ['auth', 'CekLevel:admin']], function() {
	// Profile admin
	Route::resource('profileadmin', 'ProfileadminController');
	// Manajemen akun
	Route::resource('manajemenadmin', 'ManajemenadminController');
	Route::resource('manajemenperusahaan', 'ManajemenPerusahaanController');
	Route::resource('manajemenmahasiswa', 'ManajemenmahasiswaController');
	// Manajemen lowongan 
	Route::resource('lowonganbaru', 'LowonganbaruController');
	Route::resource('lowonganditerima', 'LowonganditerimaController');
	Route::resource('lowonganditolak', 'LowonganditolakController');
	Route::resource('lowonganselesai', 'LowonganselesaiController');
	// Lihat Presensi
	Route::resource('presensiadmin', 'PresensiadminController');
	Route::get('lihatpresensi2/{id}', 'PresensiadminController@lihatPresensi')->name('lihatpresensi2');
	// Lihat Logbook
	Route::resource('logbookadmin', 'LogbookadminController');
	Route::get('lihatlogbook2/{id}', 'LogbookadminController@lihatLogbook')->name('lihatlogbook2');
	Route::get('detaillogbook2/{id}', 'LogbookadminController@detailLogbook')->name('detaillogbook2');
	// Lihat Laporan Magang
	Route::resource('laporanadmin', 'LaporanadminController');
	Route::get('lihatlaporan/{id}', 'LaporanadminController@lihatLaporan')->name('lihatlaporan');
	Route::get('detaillaporan/{id}', 'LaporanadminController@detailLaporan')->name('detaillaporan');
	// Lihat Laporan Magang
	Route::resource('penilaiandmin', 'PenilaianadminController');
	// Route::get('lihatpenilaian/{id}', 'PenilaianadminController@lihatPenilaian')->name('lihatpenilaian');
	Route::get('detailpenilaian/{id}', 'PenilaianadminController@detailPenilaian')->name('detailpenilaian');
	// Lihat Sertifikat Magang
	Route::resource('sertifikatadmin', 'SertifikatadminController');
	Route::get('detailsertifikat/{id}', 'SertifikatadminController@detailSertifikat')->name('detailsertifikat');
	// Histori Daftar Magang
	Route::resource('historiaplikan', 'HistoriaplikanController');
});

Route::group(['middleware' => ['auth', 'CekLevel:perusahaan']], function() {
	// Profile Perusahaan
	Route::resource('profileperusahaan', 'ProfileperusahaanController');
	// Pasang Lowongan
	Route::resource('pasanglowongan', 'PasangController');
	Route::post('/selesai/{id}', 'PasangController@lowonganSelesai')->name('selesai');
	// Pendaftar
	Route::resource('pendaftarbaru', 'PendaftarbaruController');
	Route::resource('pendaftarditerima', 'PendaftarditerimaController');
	Route::resource('pendaftarditolak', 'PendaftarditolakController');
	// Lihat Logbook
	Route::resource('logbookperusahaan', 'LogbookperusahaanController');
	Route::get('lihatlogbook/{id}', 'LogbookperusahaanController@lihatLogbook')->name('lihatlogbook');
	Route::get('detaillogbook/{id}', 'LogbookperusahaanController@detailLogbook')->name('detaillogbook');
	// Lihat Presensi
	Route::resource('presensiperusahaan', 'PresensiperusahaanController');
	Route::get('lihatpresensi/{id}', 'PresensiperusahaanController@lihatPresensi')->name('lihatpresensi');
	// Kode Presensi
	Route::post('buatkode/{id}', 'PresensiperusahaanController@buatKode')->name('buatkode');
	Route::post('hapuskode/{id}', 'PresensiperusahaanController@hapusKode')->name('hapuskode');
	// Lihat Laporan Magang
	Route::resource('laporanperusahaan', 'LaporanperusahaanController');
	// Pemilaian Magang
	Route::resource('penilaianmagang', 'PenilaianmagangController');
	Route::get('buatpenilaian/{id}', 'PenilaianmagangController@buatPenilaian')->name('buatpenilaian');
	Route::post('simpanpenilaian/{id}', 'PenilaianmagangController@simpanPenilaian')->name('simpanpenilaian');
	// Sertifikat Magang
	Route::resource('sertifikatmagang', 'SertifikatmagangController');
	Route::get('buatsertifikat/{id}', 'SertifikatmagangController@buatSertifikat')->name('buatsertifikat');
	Route::post('simpansertifikat/{id}', 'SertifikatmagangController@simpanSertifikat')->name('simpansertifikat');
});

Route::group(['middleware' => ['auth', 'CekLevel:mahasiswa']], function() {
	// Profile Mahasiswa
	Route::resource('profilemahasiswa', 'ProfilemahasiswaController');
	// Cari Lowongan
	Route::resource('carilowongan', 'CarilowonganController');
	// apply lowongan
	Route::post('daftarlowongan/{id}', 'CarilowonganController@daftarLowongan')->name('daftarlowongan');
	// Surat Permohonan
	Route::resource('suratpermohonan', 'SuratpermohonanController');
	// Histori pendaftaran magang
	Route::resource('histori', 'HistoridaftarController');
	// Presensi
	Route::resource('presensi', 'PresensiController');
	// Buat Logbook
	Route::resource('logbook', 'LogbookController');
	// Buat Laporan Magang
	Route::resource('laporanmagang', 'LaporanmagangController');
	// Lihat Penilaian
	Route::resource('lihatpenilaian', 'LihatpenilaianController');
	// Lihat Penilaian
	Route::resource('lihatsertifikat', 'LihatsertifikatController');
	// Export Presensi
	Route::get('exportpresensi', 'PresensiController@exportPresensi')->name('exportpresensi');
	// Export Logbook
	Route::get('exportlogbook', 'LogbookController@exportLogbook')->name('exportlogbook');
});