<?php
include('koneksi.php');

if(isset($_SESSION['login_user'])){
header("location: about.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sistem Pakar</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" href="img/2.png">
</head>
<body>

<div class="menu">
    <a href="index.php">
      <h3> <font color="#4E931C">Exsyt </font>Phone</h3>
    </a>

<!--   untuk menu pada bagian header -->
  <ul>
      <p>
        <button type="button" class="btn btn-primary   btn-block" id="myBtn">LOGIN</button>
      </p>
  </ul>
<ul>
  <p><a href="kerusakan.php"><button type="button" class="btn btn-primary btn-block">DAFTAR KERUSAKAN</button></a></p>
</ul>

  <ul>
   <p>
    <a href="diagnosa.php">
      <button type="button" class="btn btn-primary btn-block">DIAGNOSA KERUSAKAN</button>
    </a>
  </p>
 </ul>

  <ul>
    <p>
      <a href="about.php">
        <button type="button" class="btn btn-primary btn-block">ABOUT</button>
      </a>
    </p>
  </ul>

  <ul>
   <p>
    <a href="index.php">
      <button type="button" class="btn btn-primary btn-block">HOME</button>
    </a>
  </p>
 </ul>
  </div>

<!--   Akhir bagian Menu pada Header -->


<div class="container-fluid">







    <div class="col-sm-8 text-left">
      <h2 class="text-center"> Detail kerusakan</h2>
      <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">ID :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kerusakan where idkerusakan='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='idkerusakan' readonly value='".$data['idkerusakan']."'><br>";
                    }
                ?>
     		 </div>
        </div>
        <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">NAMA :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kerusakan where idkerusakan='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='namakerusakan' readonly value='".$data['namakerusakan']."'><br>";
                    }
                ?>
     		 </div>
        </div>
        <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">JENIS :</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kerusakan where idkerusakan='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='jenishp' readonly value='".$data['jenishp']."'><br>";
                    }
                ?>
     		 </div>
        </div>

        <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">Ciri Kerusakan:</label>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM kerusakan p, basispengetahuan b where p.idkerusakan='".$_GET['id']."' and p.namakerusakan=b.namakerusakan";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<input type='text'  class='form-control' id='jenishp' readonly value='".$data['gejala']."'><br>";
                    }
                echo "<input type='text'  class='form-control' id='jenishp' readonly value=''><br>";
                ?>
     		 </div>



        </div>
        <div class="form-group"  method="POST">
      			<br><label class="control-label col-sm-2">Cara Mengatasi :</label><br>
      		<div class="col-sm-10">
                <?php
                       $tampil = "SELECT * FROM Kerusakan where idkerusakan='".$_GET['id']."'";
                       $sql = mysqli_query ($konek_db,$tampil);
                       while($data = mysqli_fetch_array ($sql))
                    {
                       echo "<textarea  rows='8' class='form-control' id='penanganan'  readonly>".$data['caramengatasi']."</textarea><br>";
                    }
                ?>
     		 </div>
        </div>

    </div>
  </div>
</div>
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
         <form role="form" method="post" action="ceklogin.php">
            <div class="form-group" method="post">
              <label for="username"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" name="username" id="password" placeholder="Enter username">
            </div>
            <div class="form-group" method="post">
              <label for="password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
              <button type="submit" id="submit" nama="submit" class="btn btn-primary btn-block" method="post"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>
