<section class="content-header">
      <h1>
       <b> Mengelola Data User</b>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li class="active">Data User</li>
      </ol>
    </section>

    <!-- Main content -->
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
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Jabatan</th>
                  <th style="text-align: center">Aksi</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $no =1;
                $user = get_all_user();
                foreach ($user as $data_user) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data_user['nama_user'];?></td>
                  <td><?= $data_user['username'];?></td>
                  <td><?= $data_user['jabatan'];?></td>
                  <td style="text-align: center;"><button class="btn btn-warning btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_user['id_user'];?>"><i class="fa fa-edit"></i></button> <button class="btn btn-danger btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_"><i class="fa fa-times"></i></button></td>
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
        
      <?php
      if (isset($_POST['btn_tambah_user'])) {
        tambah_user($_POST);
      }
      ?>
      <!-- /.modal TAMBAH -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TAMBAH DATA USER</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST">
            <div class="modal-body">
              <!-- form start -->
                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama User</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_nama_user" placeholder="Nama User" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_username" placeholder="Username" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="txt_password" placeholder="Password"required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-3 control-label">Jabatan</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_jabatan" required="">
                        <option value="">Pilih Jabatan</option>
                         <option value="waka">Waka</option>
                        <option value="kepala sekolah">Kepala Sekolah</option>

                      </select>
                    </div>
                  </div>
                  
                </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_tambah_user" class="btn btn-success btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <!-- Ubah User -->
      <?php foreach ($user as $data_user): ?>
      <?php
      if (isset($_POST['btn_ubah_user_'.$data_user['id_user']])) {
        ubah_jurusan($_POST);
      }
      ?>
      <!-- /.modal ubah -->
      <div class="modal fade" id="modal-default_<?= $data_user['id_user'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">UBAH DATA UsSER</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="POST">
            <div class="modal-body">
              <!-- form start -->
                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama User</label>
                    <div class="col-sm-9">
                      <input type="hidden" name="txt_id_user" value="<?= $data_user['id_user'];?>">
                      <?php if ($data_user['jabatan']=='waka' || $data_user['jabatan']=='kepala sekolah') { ?>

                      <input type="text" class="form-control" name="txt_nama_user" value="<?= $data_user['nama_user'];?>" id="nama_user" placeholder="Nama User" required="">
                      <?php }else{
                        ?>
                        <input type="text" class="form-control" name="txt_nama_user" value="<?= $data_user['nama_user'];?>" id="nama_user" placeholder="Nama User" required="" disabled>
                        <?php
                      }
                      ?>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Username</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_username" value="<?= $data_user['username'];?>" placeholder="Username" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" name="txt_password" value="<?= $data_user['password'];?>" id="password " placeholder="Password"required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Jabatan</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_jabatan" required="">
                        <option value="">Pilih Jabatan</option>
                       <option value="waka" <?php if ( $data_user['jabatan'] == 'waka'){ echo "selected";}?>>Waka</option>
                        <option value="kepala sekolah" <?php if ( $data_user['jabatan'] == 'kepala sekolah'){ echo "selected";}?>>Kepala Sekolah</option>
                      </select>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_ubah_user<?= $data_user['id_user'];?>" class="btn btn-success btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal --> 
      <?php endforeach ?>
    