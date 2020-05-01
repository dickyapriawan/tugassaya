<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
$jadwal_pelajaran = get_jadwal_pelajaran();
$kelas_siswa = get_kelas_siswa();
$kelas_siswaxx = get_kelas_siswaxx();
$guru = get_all_guru();
$kelas = get_all_kelas();

$mata_pelajaran = get_all_mata_pelajaran();
if (isset($_POST['btn_tambah_jadwal_pelajaran'])) {
  tambah_jadwal_pelajaran($_POST);

}

?>
</style>
<section class="content-header">
      <h1>
       <b>Jadwal Pelajaran</b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Jadwal Pelajaran</li>
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
              <i class="fa fa-user-plus"></i>
                  Tambah
                </button><br></br>
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Mapel</th>
                  <th>Nama Guru Pengajar</th>
                  <th>Kelas</th>
                  <th>Ruangan</th>
                  <th>Hari</th>
                  <th>Jam Mulai</th>
                  <th>Jam Selesai</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
           			<?php
                $no =1;
                foreach ($jadwal_pelajaran as $data_jadwal_pelajaran) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data_jadwal_pelajaran['nama_mapel'];?></td>
                  <td><?= $data_jadwal_pelajaran['nama_guru'];?></td>
                  <td><?= $data_jadwal_pelajaran['nama_kelas'];?></td>
                  <td><?= $data_jadwal_pelajaran['ruangan'];?></td>
                  <td><?= $data_jadwal_pelajaran['hari'];?></td>
                  <td><?= $data_jadwal_pelajaran['jam_mulai'];?></td>
                  <td><?= $data_jadwal_pelajaran['jam_selesai'];?></td>
                  <td style="text-align: center;">
                    <button class="btn btn-success btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_jadwal_pelajaran['id_jdwl_pljr'];?>"><i class="fa fa-edit"></i></button> 
                </tr>
                <?php
                }
                ?>


              </tbody>
            </table>
            </div>

        <!-- right col -->
   
      <!-- Ubah Data Jadwal Pelajaran-->
       <?php foreach ($jadwal_pelajaran as $data_jadwal_pelajaran): ?>

    <?php
    if (isset($_POST['btn_ubah_jadwal_pelajaran_'.$data_jadwal_pelajaran['id_jdwl_pljr']])) {
      ubah_jadwal_pelajaran($_POST);
    }
    ?> 
    
       <!-- /.modal Edit -->
      <div class="modal fade" id="modal-default_<?= $data_jadwal_pelajaran['id_jdwl_pljr'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">UBAH DATA JADWAL PELAJARAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Mapel</label>
                    <div class="col-sm-9">

                      <input type="hidden" name="txt_id_jdwl_pljr" value="<?= $data_jadwal_pelajaran['id_jdwl_pljr'];?>">
                      <select class="form-control" name="txt_nama_mapel" required="">

                        <?php foreach ($mata_pelajaran as $data_mata_pelajaran): ?>
                        <option value="<?= $data_mata_pelajaran['id_mapel'];?>" <?php if ($data_mata_pelajaran['id_mapel'] == $data_jadwal_pelajaran['id_mapel']){ echo "selected";}?> ><?= $data_mata_pelajaran['nama_mapel'];?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Guru</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_nama_guru" required="">

                        <?php foreach ($guru as $data_guru): ?>
                        <option value="<?= $data_guru['nip'];?>" <?php if ($data_guru['nip'] == $data_jadwal_pelajaran['nip']){ echo "selected";}?> ><?= $data_guru['nama_guru'];?></option>
                        <?php endforeach ?>
   

                      </select>
                    </div>
                  </div>

                   
                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Kelas</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_nama_kelas" required="">
                        <option value="">Pilih Nama Kelas</option>
                        <?php foreach ($kelas_siswaxx as $data_kelas): ?>
                        <option value="<?= $data_kelas['id_kls_siswa'];?>" <?php if ($data_kelas['id_kls_siswa'] == $data_jadwal_pelajaran['id_kls_siswa']){ echo "selected";}?> ><?= $data_kelas['nama_kelas'] .'/'. $data_kelas['ruangan'];?> </option>
                        <?php endforeach ?>
   

                      </select>
                    </div>
                  </div>


                    <div class="form-group row">
                    <label class="col-sm-3 control-label">Hari</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_hari" required="">
     
                      <option value="senin" <?php if ( $data_jadwal_pelajaran['hari'] == 'senin'){ echo "selected";}?>>Senin</option>
                      
                        <option value="selasa" <?php if ( $data_jadwal_pelajaran['hari'] == 'selasa'){ echo "selected";}?>>Selasa</option>
                         <option value="rabu" <?php if ( $data_jadwal_pelajaran['hari'] == 'rabu'){ echo "selected";}?>>Rabu</option>
                          <option value="kamis" <?php if ( $data_jadwal_pelajaran['hari'] == 'kamis'){ echo "selected";}?>>Kamis</option>
                           <option value="jumat" <?php if ( $data_jadwal_pelajaran['hari'] == 'jumat'){ echo "selected";}?>>Jumat</option>
                           <option value="sabtu" <?php if ( $data_jadwal_pelajaran['hari'] == 'sabtu'){ echo "selected";}?>>Sabtu</option>

                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="kkm" class="col-sm-3 control-label">Jam Mulai</label>
                    <div class="col-sm-9">
                      <input type="time" name="txt_jam_mulai" value="<?= $data_jadwal_pelajaran['jam_mulai'];?>" required="">

                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="kkm" class="col-sm-3 control-label">Jam Selesai</label>
                    <div class="col-sm-9">
                      <input type="time" name="txt_jam_selesai" value="<?= $data_jadwal_pelajaran['jam_selesai'];?>" required="">
                    </div>
                  </div>





            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_ubah_jadwal_pelajaran_<?= $data_jadwal_pelajaran['id_jdwl_pljr'];?>" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <?php endforeach ?>

   <!-- /TAMBAH Data Jadwal Pelajarna -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TAMBAH DATA JADWAL PELAJARAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
            
              <!-- form start -->

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Mapel</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_nama_mapel" required="">
                        <option value="">Pilih Nama Mapel</option>
                        <?php foreach ($mata_pelajaran as $data_mata_pelajaran): ?>
                        <option value="<?= $data_mata_pelajaran['id_mapel'];?>"><?= $data_mata_pelajaran['nama_mapel'];?> </option>
                        <?php endforeach ?>
   

                      </select>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Guru</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_nama_guru" required="">
                        <option value="">Pilih Nama Guru</option>
                          <?php foreach ($guru as $data_guru): ?>
                        <option value="<?= $data_guru['nip'];?>"><?= $data_guru['nama_guru'];?></option>
                        <?php endforeach ?>
   

                      </select>
                    </div>
                  </div>


                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Kelas</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_nama_kelas" required="" id="pilih-kelas">
                        <option value="">Pilih Nama Kelas</option>
                        <?php foreach ($kelas_siswaxx as $data_kelas): ?>
                        <option value="<?= $data_kelas['id_kls_siswa'];?>"><?= $data_kelas['nama_kelas'] .'/'. $data_kelas['ruangan'];?> </option>
                        <?php endforeach ?>
   

                      </select>
                    </div>
                  </div>

                   
                    <div class="form-group row">
                    <label class="col-sm-3 control-label">Hari</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_hari" required="">
                        <option value="">Pilih Hari</option>
                        <option value="senin">Senin</option>
                        <option value="selasa">Selasa</option>
                        <option value="rabu">Rabu</option>
                        <option value="rabu">Kamis</option>
                        <option value="rabu">Jumat</option>
                        <option value="rabu">Sabtu</option>
                          

                      </select>
                    </div>
                  </div>

                    <div class="form-group row">
                    <label for="kkm" class="col-sm-3 control-label">Jam Mulai</label>
                    <div class="col-sm-9">
                      <input type="time" name="txt_jam_mulai" required="">

                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="kkm" class="col-sm-3 control-label">Jam Selesai</label>
                    <div class="col-sm-9">
                      <input type="time" name="txt_jam_selesai" required="">
                    </div>
                  </div>




                 
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_tambah_jadwal_pelajaran" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
  </div></div></div>
        <!-- /.modal-dialog -->
      <!-- /.modal -->

    </section>
    <!-- Main content -->

    