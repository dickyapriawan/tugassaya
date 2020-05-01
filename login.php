<?php

    include 'config.php';

      if(isset($_SESSION['jabatan']) && isset($_SESSION['id'])){
        header("location:index.php");
    }else{

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>SIAKAD</b></a>
    <h4>SMK TI Bali Global Klungkung</h4>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><img src="img/logo.png" width="200px" height="150px"></p>

    <form action="login.php" method="POST">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="username" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <input type="submit" class="btn btn-primary btn-block btn-flat" name="login" value="masuk">
        </div>
      </div>
        <!-- /.col -->
      </div>
    </form>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>

<?php 
  // die($_POST['login']);
  if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = $koneksi->query("select * from user where username ='$username' and password='$password'");

    $ketemu = $sql->num_rows;

    $data =  $sql->fetch_assoc();

    
    if ($ketemu >=1) {

      $_SESSION['nip'] = $data['username'];
        
      $_SESSION['id'] = $data['id_user'];
      if ($data['jabatan'] == "admin") {
        $_SESSION['jabatan'] = 'admin';


  header("location: index.php");
     

      

      }else if ($data['jabatan'] == 'waka') {
        $_SESSION['jabatan'] = 'waka';
       
        header("location: index.php");
      }else if ($data['jabatan'] == "siswa"){
        $_SESSION['jabatan'] = 'siswa';
        header("location: index.php");

       }else if ($data['jabatan'] == "guru_pengajar"){
        $_SESSION['jabatan'] = 'wali_kelas';
        header("location: index.php");

        }else if ($data['jabatan'] == "wali_kelas"){
        $_SESSION['jabatan'] = 'wali_kelas';
        header("location: index.php");

       }else if ($data['jabatan'] == "kepsek"){
        $_SESSION['jabatan'] = 'kepsek';
        header("location: index.php");
	   }

    }else{
    
    ?>
    <script type="text/javascript">
      alert("Login Gagal Username dan Password salah.. Silahkan ulangi lagi");
    </script>
  <?php 
}
  }
        
?>
 <?php  
 }
 ?>
