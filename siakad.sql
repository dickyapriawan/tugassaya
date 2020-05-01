-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 09:47 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_kls_siswa` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `ijin` int(11) NOT NULL,
  `tanpa_keterangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `id_ekskul` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_ekskul` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`id_ekskul`, `nip`, `nama_ekskul`) VALUES
(1, '0094321', 'nama_ekskul'),
(2, '9012', 'Voly');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `nip` varchar(15) NOT NULL,
  `nama_guru` varchar(15) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`nip`, `nama_guru`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_hp`, `status`, `foto`) VALUES
('0094', 'dicky21', 'perempuan', 'dps', '0022-02-22', 'kristen', 'asdaldls', '34343', 'Wali Kelas', 'Herfst.jpg'),
('0094321', 'dicky2', 'laki-laki', 'dps', '3233-02-23', 'hindu', 'asdaldls', '2013910', 'Pengajar', '213.PNG'),
('9012', 'dicky211', 'laki-laki', 'dps', '1998-04-19', 'islam', 'asdaldls', '2013910', 'Pengajar', 'eror.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jdwl_pljr` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_kls_siswa` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jdwl_pljr`, `id_mapel`, `id_kls_siswa`, `nip`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(1, 1, 5, '0094', 'senin', '00:00:07', '00:00:08'),
(3, 2, 10, '9012', 'kamis', '22:22:00', '12:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(15) NOT NULL,
  `nama_jurusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'RPL'),
(2, 'MM'),
(3, 'TKJ'),
(4, 'masak ');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(15) NOT NULL,
  `id_jurusan` int(15) NOT NULL,
  `nama_kelas` varchar(20) NOT NULL,
  `ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_jurusan`, `nama_kelas`, `ruangan`) VALUES
(1, 2, 'X MM 1', 101),
(2, 2, 'X MM 2', 102),
(3, 1, 'X RPL 1', 103),
(4, 1, 'X RPL 2', 104),
(5, 3, 'X TKJ 1', 105),
(6, 3, 'X TKJ 2', 106);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id_kls_siswa` int(11) NOT NULL,
  `id_thnajr` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `nip` varchar(25) NOT NULL,
  `jumlah_siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id_kls_siswa`, `id_thnajr`, `id_kelas`, `nip`, `jumlah_siswa`) VALUES
(5, 107, 1, '0094', 0),
(6, 107, 2, '9012', 0),
(7, 107, 3, '0094', 0),
(8, 107, 4, '9012', 0),
(9, 107, 5, '0094', 0),
(10, 107, 6, '0094', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_siswa`
--

CREATE TABLE `kelompok_siswa` (
  `id_kls_siswa` int(11) NOT NULL,
  `nis` int(5) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok_siswa`
--

INSERT INTO `kelompok_siswa` (`id_kls_siswa`, `nis`) VALUES
(6, 00291),
(7, 00215),
(9, 00082),
(5, 00123),
(5, 12345);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(25) NOT NULL,
  `kelompok_mapel` varchar(25) NOT NULL,
  `kkm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `nama_mapel`, `kelompok_mapel`, `kkm`) VALUES
(1, 'Matematika', 'muatan nasional', 75),
(2, 'Bahasa Inggris', 'muatan nasional', 78);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` varchar(15) NOT NULL,
  `id_jurusan` varchar(15) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `asal_sekolah` varchar(25) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `id_jurusan`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `alamat`, `no_hp`, `asal_sekolah`, `tahun_masuk`, `status`, `foto`) VALUES
('00123', '2', 'budi', 'laki-laki', 'rumah', '1212-12-12', 'islam', 'ruah', '123912312', 'sekolah', 2013, 1, '32.PNG'),
('00291', '2', 'rudy', 'laki-laki', 'denpasar', '2005-12-12', 'hindu', 'denpasar', '08214535921', 'SMPN 1 Denpasar', 2015, 1, 'Capture.PNG'),
('0082', '3', 'yusi', 'perempuan', 'sda', '2002-12-12', 'budha', 'das', '434343', 'sdasd', 2012, 1, '32.PNG'),
('0215', '1', 'har', 'perempuan', 'rumah', '0223-03-31', 'islam', 'ruah', '33513', 'se', 2013, 1, '213.PNG'),
('12345', '2', 'krisna', 'laki-laki', 'denpasar', '1212-12-12', 'islam', 'denpasar', '08214535921', 'SMPN 2 Denpasar', 2013, 1, '32.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id_thnajr` int(11) NOT NULL,
  `tahun_ajaran` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_thnajr`, `tahun_ajaran`, `semester`) VALUES
(107, '2019/2020', 'genp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(15) NOT NULL,
  `nama_user` varchar(25) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username`, `password`, `jabatan`) VALUES
(3, '', 'admin', 'admin', 'admin'),
(5, 'dicky211', '9012', '19980419', 'wali_kelas'),
(6, 'AHMAD', '90212', '19980419', 'waka'),
(7, 'rudy', '00291', '20051212', 'siswa'),
(8, 'krisna', '00292', '12121212', 'siswa'),
(9, 'budi', '00123', '12121212', 'siswa'),
(10, 'har', '0215', '02230331', 'siswa'),
(11, 'yusi', '0082', '20021212', 'siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`id_ekskul`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jdwl_pljr`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `id_jurusan` (`id_jurusan`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id_kls_siswa`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id_thnajr`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `id_ekskul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jdwl_pljr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id_kls_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id_thnajr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
