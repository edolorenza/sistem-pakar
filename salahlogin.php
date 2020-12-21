
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
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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


<div class="galery">


<div class="judul">
  Selamat datang di <B>EXSYSTPHONE</b>
(Diagnosa Kerusakan Smartphone Android
berbasis Web)
 <img src="img/g1.png" height="410">

</div>

<div class="isi">



ExsystPhone merupakan Sistem Pakar kerusakan pada smartphone
Pada Android.Memudahkan orang awam dalam mengetahuikerusakan-kerusakan pada smartphone android.Serta
Memberikan solusi kepada user mengenai tindakan apa yang harus dilakukan
<br>
<br>
<br>

<a href="#" class="btn btn-info" role="button">READ MORE</a>

</div>


</div>


  <!-- Modal -->
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

<footer class="container-fluid text-center">
  <p>Copyright 2018 &copy;</p>
</footer>

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
</script>

</body>
</html>
