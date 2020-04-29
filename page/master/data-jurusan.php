<section class="content-header">
      <h1>
       <b>Data Jurusan</b>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li class="active">Data Jurusan</li>
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
                  <th>Nama Jurusan</th>
                  <th style="text-align: center">Aksi</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $no =1;
                $jurusan = get_all_jurusan();
                foreach ($jurusan as $data_jurusan) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data_jurusan['nama_jurusan'];?></td>
                  <td style="text-align: center;"><button class="btn btn-success btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_jurusan['id_jurusan'];?>"><i class="far fa-edit"></i></button></td>
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

    <!-- Main content -->

    <?php
    if (isset($_POST['btn_tambah_jurusan'])) {
      tambah_jurusan($_POST);
    }
    ?>
      <!-- /.modal TAMBAH -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TAMBAH DATA JURUSAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST">
            <div class="modal-body">
              <!-- form start -->

                  <div class="form-group row">
                    <label for="nama_jurusan" class="col-sm-3 control-label">Nama Jurusan</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_nama_jurusan" id="nama_jurusan" placeholder="Nama Jurusan" required="">
                    </div>
                  </div>

             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_tambah_jurusan" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <?php foreach ($jurusan as $data_jurusan): ?>
      <?php
      if (isset($_POST['btn_ubah_jurusan_'.$data_jurusan['id_jurusan']])) {
        ubah_jurusan($_POST);
      }
      ?>
      <!-- /.modal ubah -->
      <div class="modal fade" id="modal-default_<?= $data_jurusan['id_jurusan'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">UBAH DATA JURUSAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST">
            <div class="modal-body">
              <!-- form start -->

                  <div class="form-group row">
                    <label for="nama_jurusan" class="col-sm-3 control-label">Nama Jurusan</label>
                    <div class="col-sm-9">
                      <input type="hidden" name="txt_id_jurusan" value="<?= $data_jurusan['id_jurusan'];?>">
                      <input type="text" class="form-control" name="txt_nama_jurusan" value="<?= $data_jurusan['nama_jurusan'];?>" id="nama_jurusan" placeholder="Nama Jurusan" required="">
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_ubah_jurusan_<?= $data_jurusan['id_jurusan'];?>" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal --> 
      <?php endforeach ?>
    