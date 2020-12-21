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

    <div class="col-sm-8 text-left">
      <center><h2>DIAGNOSA KERUSAKAN</h2></center>
        <form id="form1" name="form1" method="post" action="diagnosa.php">
				<label for="sel1">Jenis Hp</label>
				<select class="form-control" name="hp" onChange='this.form.submit();'>
				<option>Pilih</option>
                <option>ANDROID</option>
  		</select>
              </form>
       <br>
        <form id="form2" name="form2" method="post" action="diagnosa.php">
 			<?php
            if(isset($_POST['hp']))
                  if($_POST['hp']!="jenishp"){
                echo  "<br><label>Ciri Kerusakan</label><br>";
 			$tampil="select * from gejala where  jenishp= \"".$_POST['hp']."\"";
			$query= mysqli_query($konek_db,$tampil);
                while($hasil=mysqli_fetch_array($query)){
					echo "<input type='checkbox' value='".$hasil['gejala']."' name='gejala[]' /> ".$hasil['gejala']."<br>";
			}
                  }
					?>


        <br>
        <button type="submit" name ="submit" onclick="return checkDiagnosa()" class="btn btn-primary">CEK Kerusakan</button><br><br>
            <div class="panel panel-info">
                <div class="panel-heading">HASIL DIAGNOSA</div>
                <div class="panel-body">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>ID Kerusakan</th>
							<th>Nama Kerusakan</th>
                            <th>Jenis hp</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
         <?php
        if(isset($_POST['submit'])){
            $gejala = $_POST['gejala'];
            $jumlah_dipilih = count($gejala);
           for($x=0;$x<$jumlah_dipilih;$x++){
                       $tampil ="select DISTINCT p.idkerusakan, p.namakerusakan, p.jenishp from basispengetahuan b, kerusakan p where b.gejala='$gejala[$x]' and p.namakerusakan=b.namakerusakan group by namakerusakan";
                       $result = mysqli_query($konek_db, $tampil);
                       $hasil  = mysqli_fetch_array($result);

                    }
               echo "
                           <tr>
        			             <td>".$x."</td>
                                 <td>".$hasil['idkerusakan']."</td>
					             <td>".$hasil['namakerusakan']."</td>
                                 <td>".$hasil['jenishp']."</td>
                                 <td><a href=\"hasildiagnosa.php?id=".$hasil['idkerusakan']."\"><i class='glyphicon glyphicon-search'></i></a></td>
        		          </tr>

                               ";
        }

                ?>
                    </table>
            </div>
                    </div>
                </div>
        </form>

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

<script language="JavaScript" type="text/javascript">
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});
function checkDiagnosa(){
    return confirm('Apakah sudah benar gejalanya?');
}
</script>
</body>
</html>
