<?php
  if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
      case 'dashboard':
        include_once'page/dashboard/dashboard.php';
        break;

      case 'data-user':
        include_once'page/master/data-user.php';
        break;

      case 'data-siswa':
        include_once'page/master/data-siswa.php';
        break;
      case 'detail-siswa':
        include_once'page/master/detail-siswa.php';
        break;

      case 'data-guru':
        include_once'page/master/data-guru.php';
        break;
      case 'detail-guru':
        include_once'page/master/detail-guru.php';
        break;

      case 'data-tahun-ajaran':
        include_once'page/master/data-tahun-ajaran.php';
        break;

      case 'data-mata-pelajaran':
        include_once'page/master/data-mata-pelajaran.php';
        break;

      case 'data-jurusan':
        include_once'page/master/data-jurusan.php';
        break;

      case 'data-kelas':
        include_once'page/master/data-kelas.php';
        break;

      case 'kelas-siswa':
        include_once 'page/kelas_siswa/kelas-siswa.php';
        break;
       case 'kelompok-siswa':
        include_once 'page/kelas_siswa/kelompok-siswa.php';
        break;


      case 'jadwal-pelajaran':
        include_once 'page/jadwal_pelajaran/jadwal-pelajaran.php';
        break;

        case 'ekstrakulikuler':
        include_once 'page/ekstrakulikuler/ekstrakulikuler.php';
        break;

        case 'absensi':
        include_once 'page/absensi/absensi.php';
        break;

        case 'setup':
        include_once 'page/setup/setup.php';
        break;


        case 'nilai':
        include_once 'page/nilai/nilai-siswa.php';
        break;
      }
    }
?>