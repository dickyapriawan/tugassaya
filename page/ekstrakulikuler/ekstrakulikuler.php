<?php
$guru = get_all_guru();
$ekskul = get_all_ekskul();
if (isset($_POST['btn_tambah_ekskul'])) {
  tambah_ekskul($_POST);

}
?>
<section class="content-header">
      <h1>
       <b>Data Ekstrakulikuler</b>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Data Ekstrakulikuler</li>
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
                  <th>Nama Ekskul</th>
                  <th>Nama Pembimbing</th>
                  <th>Aksi</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($ekskul as $data_ekskul) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data_ekskul['nama_ekskul'];?></td>
                  <td><?= $data_ekskul['nama_guru'];?></td>
                  <td style="text-align: center;">
                  <button class="btn btn-success btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_ekskul['id_ekskul'];?>"><i class="fa fa-edit"></i></button>
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
    <?php foreach ($ekskul as $data_ekskul): ?>

    <?php
    if (isset($_POST['btn_ubah_ekskul_'.$data_ekskul['id_ekskul']])) {
      ubah_ekskul($_POST);
    }
    ?>
       <!-- /.modal Edit -->
      <div class="modal fade" id="modal-default_<?= $data_ekskul['id_ekskul'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">UBAH DATA EKSTRAKULIKULER</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->
                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Ekskul</label>
                    <div class="col-sm-9">
                       <input type="hidden" name="txt_id_ekskul" value="<?= $data_ekskul['id_ekskul'];?>">
                      <input type="text" class="form-control" name="txt_nama_ekskul" value="<?= $data_ekskul['nama_ekskul'];?>" placeholder="nama ekskul" required="">
                    </div>
                  </div>

                 <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Pembimbing</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_nama_pembimbing" required="">
             
                        <?php foreach ($guru as $data_guru): ?>
                        <option value="<?= $data_guru['nip'];?>"><?= $data_guru['nama_guru'];?></option>
                        <?php endforeach ?>
   

                      </select>
                    </div>
                  </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_ubah_ekskul_<?= $data_ekskul['id_ekskul'];?>" class="btn btn-danger btn-sm">Simpan</button>
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
              <h4 class="modal-title">TAMBAH DATA EKSTRAKULIKULER</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->
                     <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Ekskul</label>
                    <div class="col-sm-9">
                      
                      <input type="text" class="form-control" name="txt_nama_ekskul" placeholder="nama ekskul" required="">
                    </div>
                  </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Pembimbing</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_nama_pembimbing" required="">
                        <option value="">Pilih Nama Pembimbing</option>
                        <?php foreach ($guru as $data_guru): ?>
                        <option value="<?= $data_guru['nip'];?>"><?= $data_guru['nama_guru'];?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                  </div>


            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_tambah_ekskul" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
  </div></div></div>
        <!-- /.modal-dialog -->
      <!-- /.modal -->

    </section>
    <!-- Main content -->

    