<?php
$jurusan = get_all_jurusan();
$kelas = get_all_kelas();
if (isset($_POST['btn_tambah_kelas'])) {
  tambah_kelas($_POST);

}
?>
<section class="content-header">
      <h1>
       <b>Data Kelas</b>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li class="active">Data Kelas</li>
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
                  <th>Jurusan</th>
                  <th>Ruangan</th>
                  <th>Aksi</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($kelas as $data_kelas) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data_kelas['nama_kelas'];?></td>
                  <td><?= $data_kelas['nama_jurusan'];?></td>
                  <td><?= $data_kelas['ruangan'];?></td>
                  <td style="text-align: center;">
                  <button class="btn btn-success btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_kelas['id_kelas'];?>"><i class="fa fa-edit"></i></button><button class="btn btn-warning btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_kelas['id_kelas'];?>"><i class="fa fa-"></i></button></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
                
              </table>
            </div>
          </div>
       </div>
      </section>      
              <!-- /.row -->
<!-- Ubah Data Kelas-->
    <?php foreach ($kelas as $data_kelas): ?>

    <?php
    if (isset($_POST['btn_ubah_kelas_'.$data_kelas['id_kelas']])) {
      ubah_kelas($_POST);
    }
    ?>
       <!-- /.modal Edit -->
      <div class="modal fade" id="modal-default_<?= $data_kelas['id_kelas'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">UBAH DATA KELAS</h4>
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
                       <input type="hidden" name="txt_id_kelas" value="<?= $data_kelas['id_kelas'];?>">
                      <input type="text" class="form-control" name="txt_nama_kelas" value="<?= $data_kelas['nama_kelas'];?>" placeholder="nama kelas" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Jurusan</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_jurusan" required="">
         
                        <?php foreach ($jurusan as $data_jurusan): ?>
                        <option value="<?= $data_jurusan['id_jurusan'];?>" <?php if ($data_jurusan['id_jurusan'] == $data_kelas['id_jurusan']){ echo "selected";}?> ><?= $data_jurusan['nama_jurusan'];?></option>
                        <?php endforeach ?>

                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Ruangan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_ruangan" value="<?= $data_kelas['ruangan'];?>"  placeholder="Ruangan" required="">
                    </div>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_ubah_kelas_<?= $data_kelas['id_kelas'];?>" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php endforeach ?>


   <!-- /TAMBAH Data Kelas -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TAMBAH DATA KELAAS</h4>
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
                      <input type="text" class="form-control" name="txt_nama_kelas" placeholder="Nama Kelas" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Jurusan</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_jurusan" required="">
                        <option value="">Pilih Jurusan</option>
                        <?php foreach ($jurusan as $data_jurusan): ?>
                        <option value="<?= $data_jurusan['id_jurusan'];?>"><?= $data_jurusan['nama_jurusan'];?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Ruangan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_ruangan" placeholder="Ruangan" required="">
                    </div>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_tambah_kelas" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
  </div></div></div>
        <!-- /.modal-dialog -->
      <!-- /.modal -->

    </section>
    <!-- Main content -->

    