<section class="content-header">
      <h1>
       <b>Data Tahun Ajaran</b>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li class="active">Data Tahun Ajaran</li>
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
                  <th>Tahun Ajaran</th>
                  <th>Semester</th>
                  <th style="text-align: center;">Aksi</th>
                  
                </tr>
                </thead>
                <tbody>
                	<?php
                $no =1;
                $tahun_ajaran = get_all_tahun_ajaran();
                foreach ($tahun_ajaran as $data_tahun_ajaran) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data_tahun_ajaran['tahun_ajaran'];?></td>
                  <td><?= $data_tahun_ajaran['semester'];?></td>
                  <td style="text-align: center;"><button class="btn btn-success btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_tahun_ajaran['id_thnajr'];?>"><i class="fa fa-edit"></i></button><button class="btn btn-danger btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_tahun_ajaran['id_thnajr'];?>"><i class="fa fa-edit"></button></td>
                </tr>
                <?php
                }
                ?>
                </tr>
            </tbody>
                
                   </table>
            </div>
          </div>
       </div>

      </div>
      </section>
        <!-- right col -->

 <?php
    if (isset($_POST['btn_tambah_tahun_ajaran'])) {
      tambah_tahun_ajaran($_POST);
    }
    ?>
      <!-- /.modal TAMBAH -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TAMBAH DATA TAHUN AJARAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST">
            <div class="modal-body">
              <!-- form start -->

                  <div class="form-group row">
                    <label for="tahun_ajaran" class="col-sm-3 control-label">Tahun Ajaran</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_tahun_ajaran" id="tahun_ajaran" placeholder="YYYY/YYYY" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="agama" class="col-sm-3 control-label">Semester</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_semester" required="">
                        <option value="">Pilih Semester</option>
                         <option value="ganjil">Ganjil</option>
                        <option value="genap">Genap</option>

                      </select>
                    </div>
                  </div>
                  
                </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_tambah_tahun_ajaran" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <?php foreach ($tahun_ajaran as $data_tahun_ajaran): ?>
      <?php
      if (isset($_POST['btn_ubah_tahun_ajaran_'.$data_tahun_ajaran['id_thnajr']])) {
        ubah_tahun_ajaran($_POST);
      }
      ?>
      <!-- /.modal TAMBAH -->
      <div class="modal fade" id="modal-default_<?= $data_tahun_ajaran['id_thnajr'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">UBAH DATA TAHUN AJARAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST">
            <div class="modal-body">
              <!-- form start -->
                <div class="card-body">

                  <div class="form-group row">

                    <label for="tahun_ajaran" class="col-sm-3 control-label">Tahun Ajaran</label>
                    <div class="col-sm-9">
                      <input type="hidden" name="txt_id_tahun_ajaran" value="<?= $data_tahun_ajaran['id_thnajr'];?>">
                      <input type="text" class="form-control" name="txt_tahun_ajaran" value="<?= $data_tahun_ajaran['tahun_ajaran'];?>" id="tahun_ajaran" placeholder="YYYY/YYYY" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="agama" class="col-sm-3 control-label">Semester</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_semester" required="">

                        <option value="ganjil" <?php if ( $data_tahun_ajaran['semester'] == 'ganjil'){ echo "selected";}?>>Ganjil</option>
                        <option value="genap" <?php if ( $data_tahun_ajaran['semester'] == 'genap'){ echo "selected";}?>>Genap</option>

                      </select>
                    </div>
                  </div>


                  
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_ubah_tahun_ajaran_<?= $data_tahun_ajaran['id_thnajr'];?>" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php endforeach ?>
    