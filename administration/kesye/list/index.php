<?php
session_start();
require_once "../../../api/Modele/Mconnexion.class.php";
require_once "../../../api/Dao/postDao.class.php";
require_once "../../../api/Dao/administrationDao.class.php";
ini_set('display_errors', 'Off');
if(isset($_GET['id_admin']) && isset($_GET['etat']) && isset($_GET['id_post'])){
  $id=$_GET['id_admin'];
  $idpost=$_GET['id_post'];
  $etat=$_GET['etat'];
  if($etat==1){
    administrationDao::bloke($id);
    postDao::inactif($idpost);
  }else if($etat==0){
    administrationDao::debloke($id);
    postDao::actif($idpost);
  }
}

?>
<!doctype html>
<html lang="en">
<head>
	<title>Profile | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="../../../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../../assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../../../assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="../../../assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="../../../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../../../assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">

	<?php
	require_once '../../../file/header.inc';
	require_once '../../../file/menu.inc';?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
      <h1>Tout kesye</h1>
      <?php
      if(isset($sikse)){
        echo $sikse;
      }else if(isset($mesaj)){
          echo $mesaj;
      }else{
        $mesaj="";
        $sikse="";
      }


      ?>
        </br>  </br>
      <form action="" method="post" class="form-inline">
        <input type="text" name="txtnom" class="form-control"  value="<?php if($mesaj){ echo $_POST['txtnom'];}?>"  placeholder="Ex:Fleurine Kenley">
        <input type="submit" name="btnrechercher" value="Rechercher" class="btn btn-success">

      </form>
            <table id="user_adr" class="table table-striped table-bordered">
                <tr>
                  <th>K&ograve;d p&ograve;s</th>
                  <th>Non konpl&egrave;</th>
                      <th>imel</th>
                      <th>Telef&ograve;n</th>
                      <th>Adres konpl&egrave;</th>
                      <th>Vil sikisal</th>
                        <th>Adr&egrave;s Konpl&egrave; sikisal</th>
                </tr>

                <?php
               if(!isset($_POST['txtnom'])){
                  //$nomcom="Fleurine Kenley";
                  $ident="198122317601";
                  foreach(postDao::GetAllkesye($ident) as $row):
                    ?>
                    <tr>
                      <td><?= $row[0] ?></td>
                      <td><?= $row[1] ?></td>
                      <td><?= $row[6] ?></td>
                      <td><?= $row[7] ?></td>
                      <td><?= $row[8] ?></td>
                      <td><?= $row[2] ?></td>
                      <td><?= ucwords($row[3])?></td>

                      <td>
                        <a href="?etat=<?=$row[4]?>&&id_admin=<?=$row[5]?>&&id_post=<?=$row[0]?>"><input type="submit" value="<?php
                        if($row[4]==1){
                            echo"bloquer";
                          }else if($row[4]==0){
                              echo"Debloquer";
                            }
                        ?>" name="btnblock" class="btn btn-secondary  btn-sm" data-toggle="modal"/></a>
                      </td>
                  </tr>

                    <?php
                  endforeach;
                ?>


                  <?php
                }
              else{
                $nomcom=$_POST['txtnom'];
                $liy=postDao::Getkesye($nomcom);
                if(isset($_POST['btnrechercher']) && $liy){
                  ?>
                  <tr>
                    <td><?= $liy[0] ?></td>
                    <td><?= $liy[1] ?></td>
                    <td><?= $liy[2] ?></td>
                    <td><?=ucwords($liy[3])?></td>
                    <td>
                      <a href="?etat=<?=$liy[4]?>&&id_admin=<?=$liy[5]?>&&id_post=<?=$liy[0]?>"><input type="submit" value="<?php
                      if($liy[4]==1){
                          echo"bloquer";
                        }else if($liy[4]==0){
                            echo"Debloquer";
                          }
                      ?>" name="btnblock" class="btn btn-secondary  btn-sm" data-toggle="modal"/></a>
                    </td>

                  </tr>
                  <?php
                }else{
                  echo $mesaj="Nou pa arive jwenn kesye sa.";
                }
                }
                ?>

            </table>


			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	<?php require_once '../../../file/footer.inc';?>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="../../../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../../../assets/scripts/klorofil-common.js"></script>
</body>

</html>
