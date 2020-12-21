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

    <div class="col-sm-2 text-left">
      <h2 class="text-center">DAFTAR KERUSAKAN</h2>
      <form id="form1" name="form1" method="post" action="kerusakan.php">
				<label for="sel1">Jenis HP</label>
				<select class="form-control" name="hp" onChange='this.form.submit();'>
				<option>Pilih</option>
                <option>Android</option>
  		</select>
  </form>
</div>
    	<br>
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID kerusakan</th>
							<th>Nama kerusakan</th>
                            <th>Jenis kerusakan</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                     <?php
if(isset($_POST['hp']))
                    if($_POST['hp']!="jenishp"){
$queri="Select * From kerusakan where jenishp = \"".$_POST['hp']."\"";
$hasil=mysqli_query ($konek_db,$queri);
$id = 0;
while ($data = mysqli_fetch_array ($hasil)){
 			$id++;
 			echo "
        			<tr>
        			<td>".$id."</td>
					<td>".$data[0]."</td>
        			<td>".$data[1]."</td>
        			<td>".$data[2]."</td>
                    <td><a href=\"detailkerusakan1.php?id=".$data[0]."\"><i class='glyphicon glyphicon-search'></i></a></td>
        		</tr>
        	";
			}
                    }
 ?>
</table><br><br><br><br><br>
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
