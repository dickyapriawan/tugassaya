<?php
	include 'config.php';

	function get_data($nama_tabel, $kondisi){
		global $koneksi;
		$query = $koneksi->query("select * from $nama_tabel where $kondisi");
		return $query->fetch_assoc(); 
	}

function get_all_user()
{
	global $koneksi;

	$result = mysqli_query($koneksi,"SELECT * FROM user order by jabatan");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}
function tambah_user(){
	global $koneksi;

	$nama_user = $_POST['txt_nama_user'];
	$username = $_POST['txt_username'];
	$password = $_POST['txt_password'];
	$jabatan	= $_POST['txt_jabatan'];

    $result = mysqli_query($koneksi,"INSERT INTO user (nama_user, username,password	,jabatan) VALUES('$nama_user','$username','$password','$jabatan')");
	if ($result > 0) {
		echo "<script>alert('Data user berhasil disimpan !');window.location.href=window.location.href;</script>";
	}else{
		echo "<script>alert('Gagal menyimpan data user !');</script>";
	}

}
function ubah_user(){
	global $koneksi;

	$id_user = $_POST['txt_id_user'];
	$nama_user = $_POST['txt_nama_user'];
	$username = $_POST['txt_username'];
	$password = $_POST['txt_password'];
	$jabatan	= $_POST['txt_jabatan'];

   $result = mysqli_query($koneksi,"UPDATE user SET nama_user='$nama_user', username='$username', password='$password', jabatan='$jabatan' WHERE id_user=$id_user");
	if ($result > 0) {
		echo "<script>alert('Data user berhasil diubah !');window.location.href=window.location.href;</script>";
	}else{
		echo "<script>alert('Gagal mengubah data user !');</script>";
	}

}


function get_all_siswa()
{
	global $koneksi;

	$result = mysqli_query($koneksi,"SELECT * FROM siswa JOIN jurusan ON siswa.id_jurusan=jurusan.id_jurusan where siswa.status = 1 ORDER BY  tahun_masuk DESC, nama_siswa ASC");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}

function tambah_siswa()
{
	global $koneksi;

	$nis = $_POST['txt_nis'];
	$jurusan = $_POST['txt_jurusan'];
	$nama_siswa = $_POST['txt_nama_siswa'];
	$tempat_lahir = $_POST['txt_tempat_lahir'];
	$tanggal_lahir = $_POST['txt_tanggal_lahir'];
	$jenis_kelamin = $_POST['txt_jenis_kelamin'];
	$agama = $_POST['txt_agama'];
	$alamat =$_POST['txt_alamat'];	
	$no_hp = $_POST['txt_no_hp'];
	$asal_sekolah = $_POST['txt_asal_sekolah'];
	$tahun_masuk = $_POST['txt_tahun_masuk'];
	$status = '1';
	$foto = $_FILES['txt_foto']['name'];
    $lokasi = $_FILES['txt_foto']['tmp_name'];
    $upload = move_uploaded_file($lokasi, "img/foto_siswa/".$foto);
    $jabatan = 'siswa';
    $password = preg_replace("/[^0-9]/", "", $tanggal_lahir);

if($upload){
	$result = mysqli_query($koneksi,"INSERT INTO siswa (nis, nama_siswa, tanggal_lahir,tempat_lahir,jenis_kelamin,id_jurusan,agama,no_hp,asal_sekolah,tahun_masuk,status,foto, alamat)
VALUES ('$nis','$nama_siswa','$tanggal_lahir','$tempat_lahir','$jenis_kelamin','$jurusan','$agama', '$no_hp', '$asal_sekolah', '$tahun_masuk', '$status', '$foto', '$alamat')");

	 $user = mysqli_query($koneksi,"INSERT INTO user (username, password, jabatan, nama_user) VALUES ('$nis','$password','$jabatan', '$nama_siswa')");


	if ($result > 0) {
		echo "<script>alert('Data siswa berhasil disimpan !');window.location.href=window.location.href;</script>";
	}else{
		echo "<script>alert('Gagal menyimpan data siswa !');</script>";
	}

}
}

function ubah_siswa()
{
	global $koneksi;

	$nis_lama = $_POST['txt_nis_lama'];
	$nis = $_POST['txt_nis'];
	$jurusan = $_POST['txt_jurusan'];
	$nama_siswa = $_POST['txt_nama_siswa'];
	$tempat_lahir = $_POST['txt_tempat_lahir'];
	$tanggal_lahir = $_POST['txt_tanggal_lahir'];
	$jenis_kelamin = $_POST['txt_jenis_kelamin'];
	$agama = $_POST['txt_agama'];
	$alamat =$_POST['txt_alamat'];	
	$no_hp = $_POST['txt_no_hp'];
	$asal_sekolah = $_POST['asal_sekolah'];
	$tahun_masuk = $_POST['tahun_masuk'];
	$foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($lokasi, "img/foto_siswa/".$foto);
    
    if(empty($foto)){
    	$result = mysqli_query($koneksi,"UPDATE siswa SET nis='$nis', nama_siswa='$nama_siswa', tanggal_lahir='$tanggal_lahir',tempat_lahir='$tempat_lahir',jenis_kelamin='$jenis_kelamin',id_jurusan='$jurusan', agama='$agama',no_hp='$no_hp',asal_sekolah='$asal_sekolah',tahun_masuk='$tahun_masuk',alamat='$alamat' WHERE nis='$nis_lama'");
    	$user = mysqli_query($koneksi, "UPDATE user SET nama_user='$nama_siswa' WHERE username='$nis'");
    }else{
	$result = mysqli_query($koneksi,"UPDATE siswa SET nis='$nis', nama_siswa='$nama_siswa', tanggal_lahir='$tanggal_lahir',tempat_lahir='$tempat_lahir',jenis_kelamin='$jenis_kelamin',id_jurusan='$jurusan', agama='$agama',no_hp='$no_hp',asal_sekolah='$asal_sekolah',tahun_masuk='$tahun_masuk',alamat='$alamat',foto='$foto' WHERE nis='$nis_lama'");
	$user = mysqli_query($koneksi, "UPDATE user SET nama_user='$nama_siswa' WHERE username='$nis'");
	}
	if ($result > 0) {
		echo "<script>alert('Data siswa berhasil disimpan !');window.location.href=window.location.href;</script>";
	}else{
		echo "<script>alert('Gagal menyimpan data siswa !');</script>";
	}

}

function detail_siswa()
{
	global $koneksi;
	$nis = $_POST['nis'];
	$result = mysqli_query($koneksi,"SELECT * FROM siswa JOIN jurusan ON siswa.id_jurusan=jurusan.id_jurusan where siswa.status = 1 AND nis='$nis'");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}

function get_all_guru()
{
	global $koneksi;

	$result = mysqli_query($koneksi,"SELECT * FROM guru ORDER BY nama_guru ASC");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}

function get_all_guruxx()
{
	global $koneksi;

	$result = mysqli_query($koneksi,"SELECT * FROM guru ORDER BY nama_guru ASC");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}

function tambah_guru()
{
	global $koneksi;

	$nip = $_POST['txt_nip'];
	$nama_guru = $_POST['txt_nama_guru'];
	$tempat_lahir = $_POST['txt_tempat_lahir'];
	$tanggal_lahir = $_POST['txt_tanggal_lahir'];
	$jenis_kelamin = $_POST['txt_jenis_kelamin'];
	$agama = $_POST['txt_agama'];
	$alamat =$_POST['txt_alamat'];	
	$no_hp = $_POST['txt_no_hp'];
	$status = $_POST['txt_status'];
	$foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($lokasi, "img/foto_guru/".$foto);
    $password = preg_replace("/[^0-9]/", "", $tanggal_lahir);


if($upload){
	$result = mysqli_query($koneksi,"INSERT INTO guru (nip, nama_guru, tanggal_lahir,tempat_lahir,jenis_kelamin, agama,no_hp,status,foto, alamat)
VALUES ('$nip','$nama_guru','$tanggal_lahir','$tempat_lahir','$jenis_kelamin','$agama', '$no_hp', '$status', '$foto', '$alamat')");

	$user = mysqli_query($koneksi,"INSERT INTO user (username, password, jabatan) VALUES ('$nip','$password','$status')");

	if ($result > 0) {
		echo "<script>alert('Data guru berhasil disimpan !');window.location.href=window.location.href;</script>";
	}else{
		echo "<script>alert('Gagal menyimpan data guru !');</script>";
	}

}
}

function ubah_guru()
{
	global $koneksi;

	$nip = $_POST['txt_nip'];
	$nama_guru = $_POST['txt_nama_guru'];
	$tempat_lahir = $_POST['txt_tempat_lahir'];
	$tanggal_lahir = $_POST['txt_tanggal_lahir'];
	$jenis_kelamin = $_POST['txt_jenis_kelamin'];
	$agama = $_POST['txt_agama'];
	$alamat =$_POST['txt_alamat'];	
	$no_hp = $_POST['txt_no_hp'];
	$status = $_POST['txt_status'];
	$foto = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $upload = move_uploaded_file($lokasi, "img/foto_guru/".$foto);
    
    if(empty($foto)){
    	$result = mysqli_query($koneksi,"UPDATE guru SET nip='$nip', nama_guru='$nama_guru', tanggal_lahir='$tanggal_lahir',tempat_lahir='$tempat_lahir',jenis_kelamin='$jenis_kelamin', agama='$agama',no_hp='$no_hp',alamat='$alamat', status='$status' WHERE nip='$nip'");
    	$user = mysqli_query($koneksi, "UPDATE user SET nama_user='$nama_guru' WHERE username='$nip'");
    }else{
	$result = mysqli_query($koneksi,"UPDATE guru SET nip='$nip', nama_guru='$nama_guru', tanggal_lahir='$tanggal_lahir',tempat_lahir='$tempat_lahir',jenis_kelamin='$jenis_kelamin', agama='$agama',no_hp='$no_hp',alamat='$alamat', status='$status', foto='$foto' WHERE nip='$nip'");
	$user = mysqli_query($koneksi, "UPDATE user SET nama_user='$nama_guru' WHERE username='$nip'");

	}
	if ($result > 0) {
		echo "<script>alert('Data guru berhasil disimpan !');window.location.href=window.location.href;</script>";
	}else{
		echo "<script>alert('Gagal menyimpan data guru !');</script>";
	}

}

function detail_guru()
{
	global $koneksi;
	$nip = $_POST['nip'];
	$result = mysqli_query($koneksi,"SELECT * FROM guru  where nip='$nip'");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}


function get_all_tahun_ajaran()
{
	global $koneksi;

	$result = mysqli_query($koneksi,"SELECT * FROM tahun_ajaran ORDER BY tahun_ajaran DESC");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}

function get_all_mata_pelajaran()
{
	global $koneksi;

	$result = mysqli_query($koneksi,"SELECT * FROM mata_pelajaran ORDER BY kelompok_mapel, nama_mapel ASC");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}
function tambah_mata_pelajaran()
{
	global $koneksi;
	$nama_mapel = $_POST['txt_nama_mapel'];
	$kelompok_mapel = $_POST['txt_kelompok_mapel'];
	$kkm = $_POST['txt_kkm'];

	$cek_query = mysqli_query($koneksi,"SELECT * FROM mata_pelajaran WHERE nama_mapel='$nama_mapel'");
	if (mysqli_num_rows($cek_query) < 1) {
		$result = mysqli_query($koneksi,"INSERT INTO mata_pelajaran (nama_mapel,kkm,kelompok_mapel) VALUES ('$nama_mapel',$kkm,'$kelompok_mapel')");
		if ($result > 0) {
			echo "<script>alert('Data mata pelajaran berhasil disimpan !');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal menyimpan data mata pelajaran !');</script>";
		}
	}else{
		echo "<script>alert('Error, Data sudah ada!');</script>";
	}
}

function ubah_mata_pelajaran()
{
	global $koneksi;

	$kode_mapel = $_POST['txt_id_mapel'];
	$nama_mapel = $_POST['txt_nama_mapel'];
	$kelompok_mapel = $_POST['txt_kelompok_mapel'];
	$kkm = $_POST['txt_kkm'];

	$result = mysqli_query($koneksi,"UPDATE mata_pelajaran SET nama_mapel='$nama_mapel', kkm=$kkm,kelompok_mapel='$kelompok_mapel' WHERE id_mapel=$kode_mapel");
	if ($result > 0) {
		echo "<script>alert('Data mata pelajaran berhasil diubah !');window.location.href=window.location.href;</script>";
	}else{
		echo "<script>alert('Gagal mengubah data mata pelajaran !');</script>";
	}
}
function get_all_jurusan()
{
	global $koneksi;

	$result = mysqli_query($koneksi,"SELECT * FROM jurusan ORDER BY nama_jurusan ASC");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}


function tambah_jurusan()
{
	global $koneksi;
	$nama_jurusan = $_POST['txt_nama_jurusan'];

	$result = mysqli_query($koneksi,"INSERT INTO jurusan SET nama_jurusan='$nama_jurusan'");
	if ($result > 0) {
		echo "<script>window.location.assign('http://localhost/siakad/?page=data-jurusan&add=success&tipe_data=jurusan')</script>";
	}else{
		echo "<script>window.location.assign('http://localhost/siakad/?page=data-jurusan&add=failed&tipe_data=jurusan')</script>";
	}
}

function ubah_jurusan()
{
	global $koneksi;

	$id_jurusan = $_POST['txt_id_jurusan'];
	$nama_jurusan = $_POST['txt_nama_jurusan'];

	$result = mysqli_query($koneksi,"UPDATE jurusan SET nama_jurusan='$nama_jurusan' WHERE id_jurusan=$id_jurusan");
	if ($result > 0) {
		echo "<script>alert('Data jurusan berhasil diubah !');window.location.href=window.location.href;</script>";
	}else{
		echo "<script>alert('Gagal mengubah data jurusan !');</script>";
	}
}


function tambah_tahun_ajaran()
{
	global $koneksi;
	$tahun_ajaran = $_POST['txt_tahun_ajaran'];
	$semester = $_POST['txt_semester'];

	$cek_query = mysqli_query($koneksi,"SELECT * FROM tahun_ajaran WHERE tahun_ajaran='$tahun_ajaran'");

	if (mysqli_num_rows($cek_query) < 1 ) {

		$result = mysqli_query($koneksi,"INSERT INTO tahun_ajaran SET tahun_ajaran='$tahun_ajaran', semester='$semester'");
		if ($result > 0) {
			echo "<script>alert('Data tahun ajaran berhasil disimpan !');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal menyimpan data tahun ajaran !');</script>";
		}
	}else{
		echo "<script>alert('Error, Data sudah ada !');</script>";
	}
}

function ubah_tahun_ajaran()
{
	global $koneksi;

	$id_tahun_ajaran = $_POST['txt_id_tahun_ajaran'];
	$tahun_ajaran = $_POST['txt_tahun_ajaran'];
	$semester = $_POST['txt_semester'];

	$cek_query = mysqli_query($koneksi,"SELECT * FROM tahun_ajaran WHERE tahun_ajaran='$tahun_ajaran' && semester='$semester'");
	if (mysqli_num_rows($cek_query) < 1 ) {

		$result = mysqli_query($koneksi,"UPDATE tahun_ajaran SET tahun_ajaran='$tahun_ajaran', semester='$semester' WHERE id_thnajr='$id_tahun_ajaran'");
		if ($result > 0) {
			echo "<script>alert('Data tahun ajaran berhasil diubah !');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal mengubah data tahun ajaran !');</script>";
		}
	}else{
		echo "<script>alert('Error, Data sudah ada !');</script>";
	}
	
}


function get_all_kelas()
{
	global $koneksi;

	$result = mysqli_query($koneksi,"SELECT * FROM kelas JOIN jurusan ON kelas.id_jurusan=jurusan.id_jurusan ORDER BY nama_kelas");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}

function tambah_kelas()
{
	global $koneksi;

	$nama_kelas = $_POST['txt_nama_kelas'];
	$jurusan = $_POST['txt_jurusan'];
	$ruangan = $_POST['txt_ruangan'];

	$cek_query = mysqli_query($koneksi,"SELECT * FROM kelas WHERE nama_kelas='$nama_kelas'");

	if (mysqli_num_rows($cek_query) < 1 ) {

		$result = mysqli_query($koneksi,"INSERT INTO kelas SET nama_kelas='$nama_kelas', id_jurusan='$jurusan', ruangan='$ruangan'");
		if ($result > 0) {
			echo "<script>alert('Data kelas berhasil disimpan !');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal menyimpan data kelas !');</script>";
		}
	}else{
		echo "<script>alert('Error, Data sudah ada !');</script>";
	}
}

function ubah_kelas()
{
	global $koneksi;

	$id_kelas = $_POST['txt_id_kelas'];
	$nama_kelas = $_POST['txt_nama_kelas'];
	$jurusan = $_POST['txt_jurusan'];
	$ruangan = $_POST['txt_ruangan'];

	$cek_query = mysqli_query($koneksi,"SELECT * FROM kelas WHERE nama_kelas='$nama_kelas' && id_jurusan='$jurusan' && ruangan='$ruangan'");
	if (mysqli_num_rows($cek_query) < 1 ) {

		$result = mysqli_query($koneksi,"UPDATE kelas SET nama_kelas='$nama_kelas', id_jurusan='$jurusan', ruangan ='$ruangan' WHERE id_kelas='$id_kelas'");
		if ($result > 0) {
			echo "<script>alert('Data kelas berhasil diubah !');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal mengubah data kelas !');</script>";
		}
	}else{
		echo "<script>alert('Error, Data sudah ada !');</script>";
	}
	
}


function get_kelas_siswa()
{
	global $koneksi;

	$result = mysqli_query($koneksi,
		"SELECT kelas.nama_kelas, guru.nama_guru, tahun_ajaran.tahun_ajaran, jurusan.nama_jurusan, kelas.ruangan, kelas_siswa.jumlah_siswa, kelas_siswa.id_kls_siswa,kelas.id_kelas, kelas.id_jurusan, kelas_siswa.nip, kelas_siswa.id_thnajr, count(kelompok_siswa.id_kls_siswa) as jumlah_siswa from kelas_siswa 
		JOIN guru ON kelas_siswa.nip=guru.nip
		JOIN tahun_ajaran ON kelas_siswa.id_thnajr=tahun_ajaran.id_thnajr
		JOIN kelas on kelas_siswa.id_kelas = kelas.id_kelas
		join jurusan on kelas.id_jurusan = jurusan.id_jurusan
		left join kelompok_siswa on kelompok_siswa.id_kls_siswa = kelas_siswa.id_kls_siswa
group by kelas.nama_kelas, guru.nama_guru, tahun_ajaran.tahun_ajaran, jurusan.nama_jurusan, kelas.ruangan, kelas_siswa.jumlah_siswa, kelas_siswa.id_kls_siswa, kelas_siswa.nip, kelas_siswa.id_thnajr");


	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}

function get_kelas_siswaxx()
{
	global $koneksi;

	$result = mysqli_query($koneksi,"SELECT  kelas.nama_kelas, kelas_siswa.id_kls_siswa, kelas.ruangan from kelas_siswa
	join kelas on kelas_siswa.id_kelas = kelas.id_kelas
	 ");


	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}

function tambah_kelas_siswa()
{
	global $koneksi;

	$nama_kelas = $_POST['txt_nama_kelas'];
	$guru = $_POST['txt_wali_kelas'];
	$tahun_ajaran = $_POST['txt_tahun_ajaran'];
	$jurusan = $_POST['txt_jurusan'];
	$ruangan = $_POST['txt_ruangan'];
	$jumlah_siswa = 0;


	$cek_query = mysqli_query($koneksi,"SELECT * FROM kelas_siswa WHERE id_kelas='$nama_kelas'");

	if (mysqli_num_rows($cek_query) < 1 ) {

		$result = mysqli_query($koneksi,"INSERT INTO kelas_siswa SET id_thnajr='$tahun_ajaran', nip='$guru', id_kelas='$nama_kelas', jumlah_siswa='$jumlah_siswa'");
		if ($result > 0) {
			echo "<script>alert('Data kelas siswa berhasil disimpan !');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal menyimpan data kelas siswa !');</script>";
		}
	}else{
		echo "<script>alert('Error, Data sudah ada !');</script>";
	}
}

function ubah_kelas_siswa()
{
	global $koneksi;

	$id_kelas_siswa = $_POST['txt_id_kelas_siswa'];
	$nama_kelas = $_POST['txt_nama_kelas'];
	$guru = $_POST['txt_wali_kelas'];
	$tahun_ajaran = $_POST['txt_tahun_ajaran'];
	$jurusan = $_POST['txt_jurusan'];
	$ruangan = $_POST['txt_ruangan'];

	$cek_query = mysqli_query($koneksi,"SELECT * FROM kelas_siswa WHERE id_kelas='$nama_kelas' && nip='$guru' && tahun_ajaran='$tahun_ajaran'");
	if (mysqli_num_rows($cek_query) < 1 ) {

		$result = mysqli_query($koneksi,"UPDATE kelas_siswa SET id_thnajr='$tahun_ajaran', nip='$guru', id_kelas='$nama_kelas', jumlah_siswa='$jumlah_siswa' where id_kls_siswa='$id_kelas_siswa'");
		if ($result > 0) {
			echo "<script>alert('Data kelas siswa berhasil diubah !');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal mengubah data kelas siswa !');</script>";
		}
	}else{
		echo "<script>alert('Error, Data sudah ada !');</script>";
	}
	
}
/*
function kelompok_siswa(){
	global $koneksi;

	$result = mysqli_query($koneksi,
		"SELECT * from siswa 
		join kelompok_siswa on kelompok_siswa.nis = siswa.nis
		join jurusan on siswa.id_jurusan = jurusan.id_jurusan");
		

	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;

}*/

function kelompok_siswa($id_kelas_siswa = null){

	global $koneksi;

		$result = mysqli_query($koneksi,"SELECT * from siswa 
		join kelompok_siswa on kelompok_siswa.nis = siswa.nis where kelompok_siswa.id_kls_siswa = $id_kelas_siswa");
		
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}

function kelas_siswa_by_id()
{	
	global $koneksi;
	$id_kelas_siswa = $_GET['id'];

	$return = mysqli_query($koneksi,
		"SELECT * FROM kelas_siswa 
		join kelas on kelas_siswa.id_kelas = kelas.id_kelas
		JOIN guru ON kelas_siswa.nip=guru.nip
		JOIN tahun_ajaran ON kelas_siswa.id_thnajr=tahun_ajaran.id_thnajr 
		WHERE id_kls_siswa=$id_kelas_siswa");
	$rows = [];
	while ($data = mysqli_fetch_array($return)) {
		$rows= [
			"id_kls_siswa" => $data['id_kls_siswa'],
			"nama_kelas" => $data['nama_kelas'],
			"nama_guru" => $data['nama_guru'],
			"tahun_ajaran" => $data['tahun_ajaran'],
			"id_jurusan" => $data['id_jurusan']
		];
	}
	return $rows;
}
function get_all_siswa_by_jurusan($id_jurusan = null, $id_kelas_siswa = null)
{
	global $koneksi;

	$result = mysqli_query($koneksi,"SELECT * FROM siswa JOIN jurusan ON siswa.id_jurusan=jurusan.id_jurusan WHERE siswa.id_jurusan=$id_jurusan ORDER BY tahun_masuk DESC, nama_siswa ASC");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$nis = $data['nis'];
		$cek_siswa = mysqli_query($koneksi,"SELECT * FROM kelompok_siswa WHERE id_kls_siswa=$id_kelas_siswa AND nis=$nis");
		if (mysqli_num_rows($cek_siswa) < 1) {
			$rows[] = $data;
		}
		
	}
	return $rows;
}

function get_all_siswa_by_id($id_jurusan = null){

	global $koneksi;
	$cek_siswa = mysqli_query($koneksi,"SELECT * FROM siswa 
							  JOIN jurusan ON siswa.id_jurusan=jurusan.id_jurusan 
							  WHERE siswa.id_jurusan=$id_jurusan
							  AND not EXISTS (select nis from kelompok_siswa where kelompok_siswa.nis=siswa.nis)");
	$rows = [];
	while ($data = mysqli_fetch_array($cek_siswa)) {
		$rows[] = $data;
	}
	return $rows;
}

function tambah_kelompok_siswa($data)
{
	global $koneksi;

	$id_kelas_siswa = $_GET['id'];

	$nis = $data['nis'];
	$jumlah_siswa = count($nis);

	$kelas_siswa = mysqli_query($koneksi,"SELECT * FROM kelas_siswa WHERE id_kls_siswa=$id_kelas_siswa");
	$rows= mysqli_fetch_assoc($kelas_siswa);
	$id_tahun_ajaran = $rows['id_thnajr'];

	for ($i=0; $i<$jumlah_siswa; $i++) { 
		$cek_nisn = mysqli_query($koneksi,"SELECT * FROM kelompok_siswa 
											JOIN kelas_siswa ON kelompok_siswa.id_kls_siswa=kelas_siswa.id_kls_siswa 
											WHERE nis=$nis[$i] AND id_thnajr=$id_tahun_ajaran");
		if (mysqli_num_rows($cek_nisn) < 1) {
			$result = mysqli_query($koneksi,"INSERT INTO kelompok_siswa (id_kls_siswa,nis) VALUES ($id_kelas_siswa,$nis[$i])");
			// echo "INSERT INTO kelompok_siswa (id_kls_siswa,nis) VALUES ($id_kelas_siswa,$nis[$i])";
		}
	}
	if (!empty($result) AND $result > 0) {

	echo "<script>alert('Berhasil tambah data ! ');window.location.href=window.location.href;</script>";
	}else{
		echo "<script>alert('Gagal tambah data ! ');</script>";
	}

}

function hapus_kelompok_siswa($data)
{
	global $koneksi;

	$id_kelas_siswa = $_GET['id'];
	$nis = $data['nis'];
	$result = mysqli_query($koneksi,"DELETE  FROM kelompok_siswa WHERE id_kls_siswa=$id_kelas_siswa AND nis=$nis");
	if ($result > 0) {
		echo "<script>alert('Berhasil hapus data !');window.location.href=window.location.href;</script>";
	}else{
		echo "<script>alert('Gagal hapus data !');</script>";
	}

}

function get_jadwal_pelajaran()
{
	global $koneksi;

	$result = mysqli_query($koneksi,
		"SELECT jadwal_pelajaran.id_jdwl_pljr, mata_pelajaran.id_mapel, mata_pelajaran.nama_mapel, kelas_siswa.id_kls_siswa,guru.nama_guru, jadwal_pelajaran.nip, kelas_siswa.id_kelas, jadwal_pelajaran.hari, jadwal_pelajaran.jam_mulai, kelas.nama_kelas, kelas.ruangan, jadwal_pelajaran.jam_selesai  from jadwal_pelajaran 
		JOIN mata_pelajaran ON jadwal_pelajaran.id_mapel=mata_pelajaran.id_mapel
		join guru on jadwal_pelajaran.nip = guru.nip
		JOIN kelas_siswa ON jadwal_pelajaran.id_kls_siswa=kelas_siswa.id_kls_siswa
		join kelas on kelas_siswa.id_kelas	=kelas.id_kelas	");


	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}




function tambah_jadwal_pelajaran()
{
	global $koneksi;
	$nama_mapel = $_POST['txt_nama_mapel'];
	$nama_kelas = $_POST['txt_nama_kelas'];
	$guru = $_POST['txt_nama_guru'];
	$ruangan = $_POST['txt_ruangan'];
	$hari = $_POST['txt_hari'];
	$jam_mulai = $_POST['txt_jam_mulai'];
	$jam_selesai = $_POST['txt_jam_selesai'];


	$cek_query = mysqli_query($koneksi,"SELECT * FROM jadwal_pelajaran WHERE id_kls_siswa='$nama_kelas'");

	if (mysqli_num_rows($cek_query) < 1 ) {

		$result = mysqli_query($koneksi,"INSERT INTO jadwal_pelajaran SET id_mapel='$nama_mapel', nip='$guru', id_kls_siswa='$nama_kelas',hari='$hari', jam_mulai='$jam_mulai',jam_selesai='$jam_selesai'");
		if ($result > 0) {
			echo "<script>alert('Data kelas siswa berhasil disimpan !');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal menyimpan data kelas siswa !');</script>";
		}
	}else{
		echo "<script>alert('Error, Data sudah ada !');</script>";
	}
}

function ubah_jadwal_pelajaran()
{

	global $koneksi;
	
	$id_jdwl_pljr = $_POST['txt_id_jdwl_pljr'];
	$nama_mapel = $_POST['txt_nama_mapel'];
	$nama_kelas = $_POST['txt_nama_kelas'];
	$guru = $_POST['txt_nama_guru'];
	$ruangan = $_POST['txt_ruangan'];
	$hari = $_POST['txt_hari'];
	$jam_mulai = $_POST['txt_jam_mulai'];
	$jam_selesai = $_POST['txt_jam_selesai'];



		$result = mysqli_query($koneksi,"UPDATE jadwal_pelajaran SET id_mapel='$nama_mapel', nip='$guru', id_kls_siswa='$nama_kelas', hari='$hari', jam_mulai='$jam_mulai', jam_selesai='$jam_selesai' where id_jdwl_pljr='$id_jdwl_pljr'");
		if ($result > 0) {
			echo "<script>alert('Data kelas siswa berhasil diubah !');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal mengubah data kelas siswa !');</script>";
		}
		
	
}




function get_all_ekskul()
{
	global $koneksi;

	$result = mysqli_query($koneksi,"SELECT * FROM ekstrakulikuler JOIN guru ON ekstrakulikuler.nip=guru.nip");
	$rows = [];
	while ($data = mysqli_fetch_array($result)) {
		$rows[] = $data;
	}
	return $rows;
}

function tambah_ekskul()
{
	global $koneksi;

	$nama_ekskul = $_POST['txt_nama_ekskul'];
	$nama_pembimbing = $_POST['txt_nama_pembimbing'];


	$cek_query = mysqli_query($koneksi,"SELECT * FROM ekstrakulikuler WHERE nama_ekskul='$nama_ekskul'");

	if (mysqli_num_rows($cek_query) < 1 ) {

		$result = mysqli_query($koneksi,"INSERT INTO ekstrakulikuler SET nama_ekskul='$nama_ekskul', nip='$nama_pembimbing'");
		if ($result > 0) {
			echo "<script>alert('Data ekskul berhasil disimpan !');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal menyimpan data ekskul !');</script>";
		}
	}else{
		echo "<script>alert('Error, Data sudah ada !');</script>";
	}
}

function ubah_ekskul()
{
	global $koneksi;

	$id_ekskul = $_POST['txt_id_ekskul'];
	$nama_ekskul = $_POST['txt_nama_ekskul'];
	$nama_pembimbing = $_POST['txt_nama_pembimbing'];


	$cek_query = mysqli_query($koneksi,"SELECT * FROM ekstrakulikuler WHERE nama_ekskul='$nama_ekskul' && nip='$nama_pembimbing'");
	if (mysqli_num_rows($cek_query) < 1 ) {

		$result = mysqli_query($koneksi,"UPDATE ekstrakulikuler SET nama_ekskul='$nama_ekskul', nip='$nama_pembimbing' WHERE id_ekskul='$id_ekskul'");
		if ($result > 0) {
			echo "<script>alert('Data ekstrakulikuler berhasil diubah !');window.location.href=window.location.href;</script>";
		}else{
			echo "<script>alert('Gagal mengubah data ekstrakulikuler !');</script>";
		}
	}else{
		echo "<script>alert('Error, Data sudah ada !');</script>";
	}
	
}




