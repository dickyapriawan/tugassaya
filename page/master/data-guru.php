<?php
$guru = get_all_guru();
if (isset($_POST['btn_tambah_guru'])) {
  tambah_guru($_POST);

}
?>

<section class="content-header">
      <h1>
       <b>Data Guru</b>
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li class="active">Data Guru</li>
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
                  <th>NIP</th>
                  <th>Nama Guru</th>
                  <th>Tempat Tanggal lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>No Telepone</th>
                  <th>Status</th>
                  <th>Aksi</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($guru as $data_guru) {
                ?>
                <tr>
                	<td><?= $no++;?></td>
                  <td><?= $data_guru['nip'];?></td>
                  <td><?= $data_guru['nama_guru'];?></td>
                  <td><?= $data_guru['tempat_lahir'];?>, <?= $data_guru['tanggal_lahir'];?></td>
                  <td><?= $data_guru['jenis_kelamin'];?></td>
                  <td><?= $data_guru['agama'];?></td>
                  <td><?= $data_guru['no_hp'];?></td>
                  <td><?= $data_guru['status'];?></td>
                  <td style="text-align: center;"><button class="btn btn-success btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_guru['nip'];?>"><i class="fa fa-edit"></i></button><button class="btn btn-warning btn-sm elevation-3" data-toggle="modal" data-target="#modal-detail_<?= $data_guru['nip'];?>"><i class="fa fa-eye"></i></button>
                  </td>
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
     
      <!-- /.row (main row) -->

    </section>
    <!-- Main content -->
    <?php foreach ($guru as $data_guru): ?>


    <?php
    if (isset($_POST['btn_ubah_guru_'.$data_guru['nip']])) {
      ubah_guru($_POST);
    }
    ?>
       <!-- /.modal Edit -->
      <div class="modal fade" id="modal-default_<?= $data_guru['nip'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">UBAH DATA GURU</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->
                  <div class="form-group row">
                    <label for="nip" class="col-sm-3 control-label">NIP</label>
                    <div class="col-sm-9">
                       <input type="hidden" name="txt_nip_lama" value="<?= $data_guru['nip'];?>">
                      <input type="text" class="form-control" name="txt_nip" id="nip" value="<?= $data_guru['nip'];?>" placeholder="nip" required="" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nama_guru" class="col-sm-3 control-label">Nama Guru</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" name="txt_nama_guru" value="<?= $data_guru['nama_guru'];?>" id="nama_guru" placeholder="Nama Guru" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-3 control-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_tempat_lahir" value="<?= $data_guru['tempat_lahir'];?>"  id="tempat_lahir" placeholder="Tempat Lahir" required="">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="tanggal_lahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                       <input type="date" class="form-control" name="txt_tanggal_lahir" value="<?= $data_guru['tanggal_lahir'];?>" id="tanggal_lahir" placeholder="Tanggal Lahir" required="">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_jenis_kelamin" required="">
                        <option value="">Pilih Jenis Kelamin</option>
                       <option value="laki-laki" <?php if ( $data_guru['jenis_kelamin'] == 'laki-laki'){ echo "selected";}?>>Laki-laki</option>
                        <option value="perempuan" <?php if ( $data_guru['jenis_kelamin'] == 'perempuan'){ echo "selected";}?>>Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="agama" class="col-sm-3 control-label">Agama</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_agama" required="">
                        <option value="">Pilih Agama</option>
                        <option value="islam" <?php if ( $data_guru['agama'] == 'islam'){ echo "selected";}?>>Islam</option>
                        <option value="kristen" <?php if ( $data_guru['agama'] == 'kristen'){ echo "selected";}?>>Kristen</option>
                        <option value="hindu" <?php if ( $data_guru['agama'] == 'hindu'){ echo "selected";}?>>Hindu</option>
                        <option value="budha" <?php if ( $data_guru['agama'] == 'budha'){ echo "selected";}?>>Budha</option>

                      </select>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_alamat" value="<?= $data_guru['alamat'];?>" id="alamat" placeholder="Alamat" required="">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="no_hp" class="col-sm-3 control-label">No HP</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_no_hp" value="<?= $data_guru['no_hp'];?>" id="no_hp" placeholder="No HP" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="agama" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_status" required="">
                        <option value="Pengajar" <?php if ( $data_guru['status'] == 'pengajar'){ echo "selected";}?>>Pengajar</option>
                        <option value="Wali Kelas" <?php if ( $data_guru['status'] == 'wali kelas'){ echo "selected";}?>>Wali Kelas</option>

                      </select>
                    </div>
                  </div>
                  x 
                  <div class="form-group row">
                    <label for="status" class="col-sm-3 control-label">Foto</label>
                      <div class="col-sm-9">
                                     <img src="img/foto_guru/<?php echo $data_guru['foto']; ?>" width="100" height="100" alt="">
                                </div>
                              </div>
                     <div class="form-group row">
                    <label for="status" class="col-sm-3 control-label">Ganti Foto</label>
                      <div class="col-sm-9">
                                     <input type="file" name="foto" class="form-control"/>
                                </div>
                              </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_ubah_guru_<?= $data_guru['nip'];?>" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
        <?php endforeach ?>

        <!--Modal Detail Siswa  -->

    <?php foreach ($guru as $data_guru): ?>


    <?php
    if (isset($_POST['btn_detail_guru_'.$data_guru['nip']])) {
      detail_guru($_POST);
    }
    ?>
       <!-- /.modal Edit -->
      <div class="modal fade" id="modal-detail_<?= $data_guru['nip'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">DETAIL DATA GURU</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->
                  <div class="form-group row">
                    <div class="col-sm-12">
                       <input type="hidden" name="nip" value="<?= $data_guru['nip'];?>">
                       <center>
                        <img src="img/foto_guru/<?php echo $data_guru['foto']; ?>" width="150" height="150" alt="">
                      </center>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nama_siswa" class="col-sm-3 control-label">1. Nama Guru</label>
                    <div class="col-sm-9">
                      
                      <?php
                        echo $data_guru['nama_guru'];
                       ?>
                       
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="nama_siswa" class="col-sm-3 control-label"> 2. Nomer Induk</label>
                    <div class="col-sm-9">
                      <div>
                      <?php
                        echo $data_guru['nip'];
                       ?>
                       </div>
                       
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="ttl" class="col-sm-3 control-label">3. Tempat Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <div>  
                      <?php
                        echo $data_guru['tempat_lahir'];
                       ?>, <?php
                        echo $data_guru['tanggal_lahir'];
                       ?>

                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="ttl" class="col-sm-3 control-label">4. Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <div>  
                      <?php
                        echo $data_guru['jenis_kelamin'];
                       ?>

                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="ttl" class="col-sm-3 control-label">5. Agama</label>
                    <div class="col-sm-9">
                      <div>  
                      <?php
                        echo $data_guru['agama'];
                       ?>

                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="ttl" class="col-sm-3 control-label">6. Alamat</label>
                    <div class="col-sm-9">
                      <div>  
                      <?php
                        echo $data_guru['jenis_kelamin'];
                       ?>

                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="ttl" class="col-sm-3 control-label">7. No Hp.</label>
                    <div class="col-sm-9">
                      <div>  
                      <?php
                        echo $data_guru['no_hp'];
                       ?>

                       </div>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="ttl" class="col-sm-3 control-label">8. Status Guru.</label>
                    <div class="col-sm-9">
                      <div>  
                      <?php
                        echo $data_guru['status'];
                       ?>

                       </div>
                    </div>
                  </div>
            </div>
            
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
        <?php endforeach ?>

   <!-- /.modal TAMBAH -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TAMBAH DATA GURU</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->

                  <div class="form-group row">
                    <label for="nip" class="col-sm-3 control-label">NIP</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_nip" id="nis" placeholder="NIP" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="nama_guru" class="col-sm-3 control-label">Nama Guru</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_nama_guru" id="nama_guru" placeholder="Nama Guru" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="tempat_lahir" class="col-sm-3 control-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required="">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="tanggal_lahir" class="col-sm-3 control-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="txt_tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" required="">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_jenis_kelamin" required="">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="agama" class="col-sm-3 control-label">Agama</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_agama" required="">
                        <option value="">Pilih Agama</option>
                         <option value="hindu">Hindu</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="budha">Budha</option>

                      </select>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_alamat" id="alamat" placeholder="Alamat" required="">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="no_hp" class="col-sm-3 control-label">No HP</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_no_hp" id="no_hp" placeholder="No HP" required="">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label for="agama" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_status" required="">
                        <option value="">Pilih Status Guru</option>
                         <option value="Pengajar">Pengajar</option>
                        <option value="Wali Kelas">Wali Kelas</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="status" class="col-sm-3 control-label">Foto</label>
                      <div class="col-sm-9">
                                     <input type="file" name="foto" class="form-control" required/>
                                </div>
                              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_tambah_guru" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
  </div></div></div>
        <!-- /.modal-dialog -->
      <!-- /.modal -->

    </section>
    <!-- Main content -->

    