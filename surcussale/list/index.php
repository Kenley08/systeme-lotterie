<?php
session_start();
    require_once "../../api/Modele/Mconnexion.class.php";
    require_once "../../api/Dao/surcussaleDao.class.php";
    require_once "../../api/Dao/postDao.class.php";

    if(isset($_GET['id_surcussale']) && isset($_GET['etat'])){
      $id=$_GET['id_surcussale'];
      $etat=$_GET['etat'];
      if($etat==1){

        surcussaleDao::inactif($id);
        postDao::inactifAllPost($id);
      }else if($etat==0){
        surcussaleDao::actif($id);
        postDao::actifAllPost($id);
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
	<link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="../../assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="../../assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">

	<?php
	require_once '../../file/header.inc';
	require_once '../../file/menu.inc';?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
      <h1>Tout Sikisal</h1>
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

        <table id="user_adr" class="table table-striped table-bordered">
            <tr>
              <th>ID SURCUSSALE</th>
                  <th>Ville</th>
                    <th>ADRESSE COMPLETE</th>
            </tr>

            <?php
            $ident="198122317601";



            foreach(surcussaleDao::getAllSurcussale2($ident) as $row):?>
              <tr>
                  <td><?=$row[0]?></td>
                  <td><?= ucwords($row[1])?></td>
                  <td><?= ucwords($row[3])?></td>
                    <td>
                      <a href="?id_surcussale=<?=$row[0]?>&&etat=<?=$row[4]?>"><input type="submit" value="<?php
                      if($row[4]==1){
                          echo"inactif";
                        }else if($row[4]==0){
                            echo"actif";
                          }
                      ?>" name="btnupdateetat" class="btn btn-secondary btn-sm" data-toggle="modal"/></a>
                    </td>
              </tr>
            <?php endforeach;?>
        </table>

			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	<?php require_once '../../file/footer.inc';?>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="../../assets/vendor/jquery/jquery.min.js"></script>
	<script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="../../assets/scripts/klorofil-common.js"></script>
</body>

</html>
