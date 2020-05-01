<?php
if (isset($_POST['value_kelas'])) {
  
include '../../config.php';
$value_kelas = $_POST['value_kelas'];
$result = mysqli_query($koneksi, "SELECT *
FROM kelas
LEFT JOIN jurusan
ON kelas.id_jurusan = jurusan.id_jurusan
WHERE id_kelas='$value_kelas'");
	

  $data_kelas = array();
  $jumlah_row = mysqli_num_rows($result);

  if ($jumlah_row>0) {
      while ($row = mysqli_fetch_array($result)) {
            $data_kelas[] = $row;
      }

      echo json_encode($data_kelas);
  }
  





}
?>
<?php
if (isset($_POST['value_kelas_edit'])) {
  
include '../../config.php';
$value_kelas_edit = $_POST['value_kelas_edit'];
$result = mysqli_query($koneksi, "SELECT *
FROM kelas
LEFT JOIN jurusan
ON kelas.id_jurusan = jurusan.id_jurusan
WHERE id_kelas='$value_kelas_edit'");
	

  $data_kelas = array();
  $jumlah_row = mysqli_num_rows($result);

  if ($jumlah_row>0) {
      while ($row = mysqli_fetch_array($result)) {
            $data_kelas[] = $row;
      }

      echo json_encode($data_kelas);
  }
  





}
?>