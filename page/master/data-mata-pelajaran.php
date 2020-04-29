<section class="content-header">
      <h1>
       <b>Data Mata Pelajaran</b>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li class="active">Data Mata Pelajaran</li>
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
                <th>No</th>
                  <th>Mata Pelajaran</th>
                  <th>KKM</th>
                  <th>Kelompok Mapel</th>
                  <th style="text-align: center">Aksi</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $no =1;
                $mata_pelajaran = get_all_mata_pelajaran();
                foreach ($mata_pelajaran as $data_mata_pelajaran) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data_mata_pelajaran['nama_mapel'];?></td>
                  <td><?= $data_mata_pelajaran['kkm'];?></td>
                  <td><?= $data_mata_pelajaran['kelompok_mapel'];?></td>
                  <td style="text-align: center;"><button class="btn btn-success btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_mata_pelajaran['id_mapel'];?>"><i class="fa fa-edit"></i></button></td>
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
      </section>      
              <!-- /.row -->

    <?php
    if (isset($_POST['btn_tambah_mata_pelajaran'])) {
      tambah_mata_pelajaran($_POST);
    }
    ?>
   <!-- /.modal TAMBAH -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TAMBAH DATA MATA PELAJARAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->


                  <div class="form-group row">
                    <label for="nama_mata_pelajaran" class="col-sm-3 control-label">Nama Mapel</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_nama_mapel" id="nama_mata_pelajaran" placeholder="Nama Mapel" required="">
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="kkm" class="col-sm-3 control-label">KKM</label>
                    <div class="col-sm-9">
                      <input type="number" min="1" max="99" class="form-control" name="txt_kkm" id="kkm" placeholder="KKM" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="kelompok_mapel" class="col-sm-3 control-label">Kelompok Mapel</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_kelompok_mapel" required="">
                        <option value="">Pilih Kelompok</option>
                        <option value="muatan nasional">Muatan Nasional</option>
                        <option value="muatan kewilayahan">Muatan Kewilayahan</option>
                        <option value="muatan permintaan kejuruan">Muatan Permintaan Kejuruan</option>
                      </select>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_tambah_mata_pelajaran" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
  </div></div></div>
        <!-- /.modal-dialog -->
      <!-- /.modal -->


      <!-- Ubah Data mata_pelajaran-->
    <?php foreach ($mata_pelajaran as $data_mata_pelajaran): ?>


    <?php
    if (isset($_POST['btn_ubah_mata_pelajaran_'.$data_mata_pelajaran['id_mapel']])) {
      ubah_mata_pelajaran($_POST);
    }
    ?>
       <!-- /.modal Edit -->
      <div class="modal fade" id="modal-default_<?= $data_mata_pelajaran['id_mapel'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">UBAH DATA MATA PELAJARAN</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->
                 
                  <div class="form-group row">
                    <label for="nama_mata_pelajaran" class="col-sm-3 control-label">Nama Mapel</label>
                    <div class="col-sm-9">
                      <input type="hidden" name="txt_id_mapel" value="<?= $data_mata_pelajaran['id_mapel'];?>">
                       <input type="text" class="form-control" name="txt_nama_mapel" value="<?= $data_mata_pelajaran['nama_mapel'];?>" id="nama_mata_pelajaran" placeholder="Nama Mapel" required="">
                    </div>
                  </div>

                 <div class="form-group row">
                    <label for="kkm" class="col-sm-3 control-label">KKM</label>
                    <div class="col-sm-9">
                      <input type="number" min="1" max="99" class="form-control" name="txt_kkm" id="kkm" value="<?= $data_mata_pelajaran['kkm'];?>"  required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="kelompok_mapel" class="col-sm-3 control-label">Kelompok</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_kelompok_mapel" required="">
             
                        <option value="muatan nasional" <?php if ($data_mata_pelajaran['kelompok_mapel']=='muatan nasional'){echo 'selected';}?>>Muatan Nasional</option>
                        <option value="muatan kewilayahan" <?php if ($data_mata_pelajaran['kelompok_mapel']=='muatan kewilayahan'){echo 'selected';}?>>Muatan Kewilayahan</option>
                        <option value="muatan permintaan kejuruan" <?php if ($data_mata_pelajaran['kelompok_mapel']=='muatan permintaan kejuruan'){echo 'selected';}?>>Muatan Permintaan Kejuruan</option>
                      </select>
                    </div>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_ubah_mata_pelajaran_<?= $data_mata_pelajaran['id_mapel'];?>" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
        <?php endforeach ?>


    </section>
    <!-- Main content -->

 

    
