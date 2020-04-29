<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$kelas_siswa = get_kelas_siswa();
$jurusan = get_all_jurusan();
$guru = get_all_guru();
$tahun_ajaran = get_all_tahun_ajaran();
$kelas = get_all_kelas();
if (isset($_POST['btn_tambah_kelas_siswa'])) {
  tambah_kelas_siswa($_POST);

}

?>

</style>
<section class="content-header">
      <h1>
       <b>Kelas Siswa</b>
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
            <button type="button" class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#modal-default">
              <i class="fa fa-plus"></i>
                  Tambah
                </button><br></br>
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kelas</th>
                  <th>Wali Kelas</th>
                  <th>Tahun Ajaran</th>
                  <th>Jurusan</th>
                  <th>Ruangan</th>
                  <th>Jumlah Siswa</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no =1;
                $kelas_siswa = get_kelas_siswa();
                foreach ($kelas_siswa as $data_kelas_siswa) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data_kelas_siswa['nama_kelas'];?></td>
                  <td><?= $data_kelas_siswa['nama_guru'];?></td>
                  <td><?= $data_kelas_siswa['tahun_ajaran'];?></td>
                  <td><?= $data_kelas_siswa['nama_jurusan'];?></td>
                  <td><?= $data_kelas_siswa['ruangan'];?></td>
                  <td><?= $data_kelas_siswa['jumlah_siswa'];?></td>
                  <td style="text-align: center;">
                  	<button class="btn btn-success btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_kelas_siswa['id_kls_siswa'];?>"><i class="fa fa-edit"></i></button> 
                  	<a href="./?page=kelompok-siswa&id=<?= $data_kelas_siswa['id_kls_siswa']; ?>" class="btn btn-primary btn-sm elevation-3"> <i  class="fa fa-user-plus"></i></a></td>
                </tr>
                <?php
                }
                ?>

              </tbody>
            </table>
            </div>
          </div>
       </div>
      </div>
      </section>
        <!-- right col -->
   

      <!-- Ubah Data Kelas Siswa-->
   <?php foreach ($kelas_siswa as $data_kelas_siswa): ?>

    <?php
    if (isset($_POST['btn_ubah_kelas_siswa_'.$data_kelas_siswa['id_kls_siswa']])) {
      ubah_kelas_siswa($_POST);
    }
    ?> 
       <!-- /.modal Edit -->
      <div class="modal fade" id="modal-default_<?= $data_kelas_siswa['id_kls_siswa'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">UBAH DATA KELAS SISWA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Kelas</label>
                    <div class="col-sm-9">
                    	<input type="hidden" name="txt_id_kelas_siswa" value="<?= $data_kelas_siswa['id_kls_siswa'];?>">
                      <select class="form-control" name="txt_nama_kelas" required="" id="pilih-kelas">
                        <option value="">Pilih Nama Kelas</option>

                        <?php foreach ($kelas as $data_kelas): ?>
                        <option value="<?= $data_kelas['id_kelas'];?>" <?php if ($data_kelas['id_kelas'] == $data_kelas['id_kelas']){ echo "selected";}?> ><?= $data_kelas['nama_kelas'];?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Wali Kelas</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_wali_kelas" required="">

                        <?php foreach ($guru as $data_guru): ?>
                        <option value="<?= $data_guru['nip'];?>" <?php if ($data_guru['nip'] == $data_kelas_siswa['nip']){ echo "selected";}?> ><?= $data_guru['nama_guru'];?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Tahun Ajaran</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_tahun_ajaran" required="">
                        <option value="">Pilih Tahun Ajaran</option>
   						<?php foreach ($tahun_ajaran as $data_tahun_ajaran): ?>
                        <option value="<?= $data_tahun_ajaran['id_thnajr'];?>" <?php if ($data_tahun_ajaran['id_thnajr'] == $data_kelas_siswa['id_thnajr']){ echo "selected";}?> ><?= $data_tahun_ajaran['tahun_ajaran'];?></option>
                        <?php endforeach ?>                     
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Ruangan</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_ruangan" id="ruangan" required="">
                       
                      </select>
                    </div>
                  </div>
                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Jurusan</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_jurusan" id="jurusan" required="" >

                       
                      </select>
                    </div>
                  </div>





            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_ubah_kelas_siswa_<?= $data_kelas_siswa['id_kls_siswa'];?>" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
  <?php endforeach ?>

   <!-- /TAMBAH Data Kelas Siswa -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TAMBAH DATA KELAS SISWA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Kelas</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_nama_kelas" required="" id="pilih-kelas">
                        <option value="">Pilih Nama Kelas</option>
                       <?php foreach ($kelas as $data_kelas): ?>
                        <option value="<?= $data_kelas['id_kelas'];?>"><?= $data_kelas['nama_kelas'];?> </option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Wali Kelas</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_wali_kelas" required="">
                        <option value="">Pilih Wali Kelas</option>
                         <?php foreach ($guru as $data_guru): ?>
                        <option value="<?= $data_guru['nip'];?>"><?= $data_guru['nama_guru'];?></option>
                        <?php endforeach ?>
   

                      </select>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Tahun Ajaran</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_tahun_ajaran" required="">
                        <option value="">Pilih Tahun Ajaran</option>
                         <?php foreach ($tahun_ajaran as $data_tahun_ajaran): ?>
                        <option value="<?= $data_tahun_ajaran['id_thnajr'];?>"><?= $data_tahun_ajaran['tahun_ajaran'];?></option>
                        <?php endforeach ?>
   						

                      </select>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label class="col-sm-3 control-label">Jurusan</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_jurusan" id="jurusan" required="" >

                       
                      </select>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Ruangan</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_ruangan" id="ruangan" required="" >

                      
                      </select>
                    </div>
                  </div>
              </div>
                 
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_tambah_kelas_siswa" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
  </div></div></div>
        <!-- /.modal-dialog -->
      <!-- /.modal -->

    </section>
    <!-- Main content -->

    