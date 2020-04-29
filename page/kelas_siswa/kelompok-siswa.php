<?php
$data_kelas_siswa=kelas_siswa_by_id();
if (empty($data_kelas_siswa)) {
  echo "<script>window.location.href='./';</script>";
}

if (isset($_POST['btn_hapus_kelompok_siswa'])) {
  hapus_kelompok_siswa($_POST);
}
?>


<section class="content-header">
      <h1>
       <b>Kelompok Siswa</b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Kelas Siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="box">
          <div class="box-body">

            <div class="form-group row">
                    <label for="nama_mapel" class="col-sm-2 control-label">Nama Kelas</label>
            <div class="col-sm-9">
                      <label for="nama_mapel" class="col-sm-3 control-label">: <?= $data_kelas_siswa['nama_kelas'];?></label>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="nama_mapel" class="col-sm-2 control-label">Wali Kelas</label>
                    <div class="col-sm-9">
                      <label for="nama_mapel" class="col-sm-3 control-label">: <?= $data_kelas_siswa['nama_guru'];?></label>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nama_mapel" class="col-sm-2 control-label">Tahun Ajaran</label>
                    <div class="col-sm-9">
                      <label for="nama_mapel" class="col-sm-3 control-label">: <?= $data_kelas_siswa['tahun_ajaran'];?></label>
                    </div>
                  </div>

                </div><!-- /.card-body -->
              </div>
            </div>
          </div>

        <div class="box">
         <div class="box-body">
            <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modal-default">
              <i class="fa fa-plus"></i>
                  Tambah
                </button><br></br>
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th style="text-align: center;">Aksi</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $no =1;
                // $kelompok_siswa = kelompok_indihomo($data_kelas_siswa['id_kls_siswa']);
                foreach ($kelompok_siswa = kelompok_siswa($data_kelas_siswa['id_kls_siswa']) as $data_kelompok_siswa) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data_kelompok_siswa['nis'];?></td>
                  <td><?= $data_kelompok_siswa['nama_siswa'];?></td>
                  <td style="text-align: center;">
                    <form method="post">
                      <input type="hidden" name="nis" value="<?= $data_kelompok_siswa['nis'];?>">
                    <button class="btn btn-danger btn-sm elevation-3" type="submit" name="btn_hapus_kelompok_siswa" onclick="return confirm('Apakah yakin hapus data ?');"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
            </div>
     </div>

       <?php
    if (isset($_POST['btn_tambah_kelompok_siswa'])) {
      tambah_kelompok_siswa($_POST);
    }
    ?>
      <!-- /.modal TAMBAH -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TAMBAH KELOMPOK SISWA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST">
            <div class="modal-body">
            <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Aksi</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $no =1;
                foreach ($siswa = get_all_siswa_by_id($data_kelas_siswa['id_jurusan']) as $data_siswa) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data_siswa['nis'];?></td>
                  <td><?= $data_siswa['nama_siswa'];?></td>
                  <td style="text-align: center;"><input type="checkbox" value="<?= $data_siswa['nis'];?>" name="nis[]"></td>
                </tr>
                <?php
                }
                ?>

                </tbody>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_tambah_kelompok_siswa" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>