<?php
$jurusan = get_all_jurusan();
$siswa = get_all_siswa();
if (isset($_POST['btn_tambah_siswa'])) {
  tambah_siswa($_POST);

}
?>
<style>
#detail
{
  text-align: left;
  padding-left: 75px;
  padding-top: 0px;
}

</style>
<section class="content-header">
      <h1>
       <b>Data Siswa</b>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Master Data</a></li>
        <li class="active">Data Siswa</li>
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
                  <th>NIS</th>
                  <th>Nama Siswa</th>
                  <th>Jurusan</th>
                  <th>Tempat Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>Agama</th>
                  <th>No HP</th>
                  <th>Tahun Masuk</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($siswa as $data_siswa) {
                ?>
                <tr>
                  <td><?= $no++;?></td>
                  <td><?= $data_siswa['nis'];?></td>
                  <td><?= $data_siswa['nama_siswa'];?></td>
                  <td><?= $data_siswa['nama_jurusan'];?></td>
                  <td><?= $data_siswa['tempat_lahir'];?>, <?= $data_siswa['tanggal_lahir'];?></td>
                  <td><?= $data_siswa['jenis_kelamin'];?></td>
                  <td><?= $data_siswa['agama'];?></td>
                  <td><?= $data_siswa['no_hp'];?></td>
                  <td><?= $data_siswa['tahun_masuk'];?></td>
                  <td style="text-align: center;">
                  <button class="btn btn-success btn-sm elevation-3" data-toggle="modal" data-target="#modal-default_<?= $data_siswa['nis'];?>"><i class="fa fa-edit"></i></button><button class="btn btn-warning btn-sm elevation-3" data-toggle="modal" data-target="#modal-detail_<?= $data_siswa['nis'];?>"><i class="fa fa-eye"></i></button></td>
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
   
      <!-- Ubah Data Siswa-->
    <?php foreach ($siswa as $data_siswa): ?>

    <?php
    if (isset($_POST['btn_ubah_siswa_'.$data_siswa['nis']])) {
      ubah_siswa($_POST);
    }
    ?>
       <!-- /.modal Edit -->
      <div class="modal fade" id="modal-default_<?= $data_siswa['nis'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">UBAH DATA SISWA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->
                  <div class="form-group row">
                    <label class="col-sm-3 control-label">NIS</label>
                    <div class="col-sm-9">
                       <input type="hidden" name="txt_nis_lama" value="<?= $data_siswa['nis'];?>">
                      <input type="text" class="form-control" name="txt_nis" value="<?= $data_siswa['nis'];?>" placeholder="nis" required="" readonly>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Siswa</label>
                    <div class="col-sm-9">
                       <input type="text" class="form-control" name="txt_nama_siswa" value="<?= $data_siswa['nama_siswa'];?>"  placeholder="Nama Siswa" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Jurusan</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_jurusan" required="">
                        <option value="">Pilih Jurusan</option>
                        <?php foreach ($jurusan as $data_jurusan): ?>
                        <option value="<?= $data_jurusan['id_jurusan'];?>" <?php if ($data_jurusan['id_jurusan'] == $data_siswa['id_jurusan']){ echo "selected";}?> ><?= $data_jurusan['nama_jurusan'];?></option>
                        <?php endforeach ?>

                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_tempat_lahir" value="<?= $data_siswa['tempat_lahir'];?>"  placeholder="Tempat Lahir" required="">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label " class="col-sm-3 control-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                       <input type="date" class="form-control" name="txt_tanggal_lahir" value="<?= $data_siswa['tanggal_lahir'];?>" id="tanggal_lahir" placeholder="Tanggal Lahir" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_jenis_kelamin" required="">
                        <option value="">Pilih Jenis Kelamin</option>
                       <option value="laki-laki" <?php if ( $data_siswa['jenis_kelamin'] == 'laki-laki'){ echo "selected";}?>>Laki-laki</option>
                        <option value="perempuan" <?php if ( $data_siswa['jenis_kelamin'] == 'perempuan'){ echo "selected";}?>>Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Agama</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_agama" required="">
                        <option value="">Pilih Agama</option>
                        <option value="islam" <?php if ( $data_siswa['agama'] == 'islam'){ echo "selected";}?>>Islam</option>
                        <option value="kristen" <?php if ( $data_siswa['agama'] == 'kristen'){ echo "selected";}?>>Kristen</option>
                        <option value="hindu" <?php if ( $data_siswa['agama'] == 'hindu'){ echo "selected";}?>>Hindu</option>
                        <option value="budha" <?php if ( $data_siswa['agama'] == 'budha'){ echo "selected";}?>>Budha</option>

                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_alamat" value="<?= $data_siswa['alamat'];?>" id="alamat" placeholder="Alamat" required="">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-3 control-label">No HP</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_no_hp" value="<?= $data_siswa['no_hp'];?>" id="no_hp" placeholder="No HP" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Asal Sekolah</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_asal_sekolah" value="<?= $data_siswa['asal_sekolah'];?>" id="asal_sekolah" placeholder="Asal Sekolah" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Tahun Masuk</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_tahun_masuk" value="<?= $data_siswa['tahun_masuk'];?>" id="tahun_masuk" placeholder="Tahun Masuk" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Foto</label>
                    <div class="col-sm-9">
                        <img src="img/foto_siswa/<?php echo $data_siswa['foto']; ?>" width="100" height="100" alt="">
                    </div>
                  </div>

                 <div class="form-group row">
                   <label class="col-sm-3 control-label">Ganti Foto</label>
                   <div class="col-sm-9">
                     <input type="file" name="txt_foto" class="form-control"/>
                    </div>
                  </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_ubah_siswa_<?= $data_siswa['nis'];?>" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php endforeach ?>



    <!--Detail Data Siswa -->
    <?php foreach ($siswa as $data_siswa): ?>


    <?php
    if (isset($_POST['btn_detail_siswa_'.$data_siswa['nis']])) {
      detail_siswa($_POST);
    }
    ?>
       <!-- /.modal detail -->
      <div class="modal fade" id="modal-detail_<?= $data_siswa['nis'];?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">DETAIL DATA SISWA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->
                  <div class="form-group row" style="text-align: left;">
                    <div class="col-sm-12">
                       <input type="hidden" name="txt_nis" value="<?= $data_siswa['nis'];?>">
                       <center>
                        <img src="img/foto_siswa/<?php echo $data_siswa['foto']; ?>" width="150" height="150" alt="">
                      </center>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-7 control-label" id="detail">1. Nama Siswa</label>
                     <div class="col-sm-5">
                      <?php
                        echo $data_siswa['nama_siswa'];
                       ?>
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-7 control-label" id="detail"> 2. Nomer Induk</label>
                    <div class="col-sm-5">
                      <div>
                      <?php
                        echo $data_siswa['nis'];
                       ?>
                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-7 control-label" id="detail">3. Tempat Tanggal Lahir</label>
                    <div class="col-sm-5">
                      <div>  
                      <?php
                        echo $data_siswa['tempat_lahir'];
                       ?>, <?php
                        echo $data_siswa['tanggal_lahir'];
                       ?>
                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-7 control-label" id="detail">4. Jenis Kelamin</label>
                    <div class="col-sm-5">
                      <div>  
                      <?php
                        echo $data_siswa['jenis_kelamin'];
                       ?>
                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-7 control-label" id="detail">5. Agama</label>
                    <div class="col-sm-5">
                      <div>  
                      <?php
                        echo $data_siswa['agama'];
                       ?>
                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-7 control-label" id="detail">6. Alamat</label>
                    <div class="col-sm-5">
                      <div>  
                      <?php
                        echo $data_siswa['jenis_kelamin'];
                       ?>

                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-7 control-label" id="detail">7. Asal Sekolah</label>
                    <div class="col-sm-5">
                      <div>  
                      <?php
                        echo $data_siswa['asal_sekolah'];
                       ?>

                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-7 control-label" id="detail">8. Tahun Masuk</label>
                    <div class="col-sm-5">
                      <div>  
                      <?php
                        echo $data_siswa['tahun_masuk'];
                       ?>

                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-7 control-label" id="detail">9. Jurusan</label>
                    <div class="col-sm-5">
                      <div>  
                      <?php
                        echo $data_siswa['nama_jurusan'];
                       ?>

                       </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-7 control-label" id="detail">10. No Hp.</label>
                    <div class="col-sm-5">
                      <div>  
                      <?php
                        echo $data_siswa['no_hp'];
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

   <!-- /TAMBAH Data Siswa -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">TAMBAH DATA SISWA</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="form-horizontal" method="post" enctype="multipart/form-data"> 
            <div class="modal-body">
              <!-- form start -->
                 <div class="form-group row">
                    <label class="col-sm-3 control-label">NIS</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_nis" placeholder="NIS" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Siswa</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_nama_siswa" id="nama_siswa" placeholder="Nama Siswa" required="">
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
                    <label class="col-sm-3 control-label">Tempat Lahir</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" required="">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Tanggal Lahir</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" name="txt_tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" required="">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="txt_jenis_kelamin" required="">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Agama</label>
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
                    <label class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_alamat" placeholder="Alamat" required="">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-3 control-label">No HP</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_no_hp" id="no_hp" placeholder="No HP" required="">
                    </div>
                  </div>

                   <div class="form-group row">
                    <label class="col-sm-3 control-label">Asal Sekolah</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_asal_sekolah" id="asal_sekolah" placeholder="Asal Sekolah" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Tahun Masuk</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="txt_tahun_masuk"  placeholder="Tahun Masuk" required="">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Foto</label>
                      <div class="col-sm-9">
                         <input type="file" name="txt_foto" class="form-control" required/>
                       </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Batal</button>
              <button type="submit" name="btn_tambah_siswa" class="btn btn-danger btn-sm">Simpan</button>
            </div>
            </form>
  </div></div></div>
        <!-- /.modal-dialog -->
      <!-- /.modal -->

    </section>
    <!-- Main content -->

    