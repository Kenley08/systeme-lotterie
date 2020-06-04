<?php
    require_once "../../api/Modele/Mconnexion.class.php";
    require_once "../../api/Dao/ficheDao.class.php";
    require_once "../../api/Dao/surcussaleDao.class.php";
    require_once "../../api/Dao/villeDao.class.php";
    $ident='198122317601';
    
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
      <h1>Tout fich</h1>
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

<form action="" method="post" class="form-inline">
<select id="txtsurcussale" name="txtsurcussale" class="form-control">
<option selected='selected' value='tout'>Tout</option>
                    <?php foreach(surcussaleDao::getAllSurcussale($ident)as $l):
                          echo "<option value='$l[0]'>$l[1],".$l[3]."</option>";
                         
                       endforeach;

                       ?>



									</select>
</form>
<!-- <form action="?" method="post">
              <table>
                <tbody>
                  <tr>
                    <td><label for="txtdebut">Debut</label></td>
                    <td>
                        <input id="datepicker" name="txtdebut" width="276" />
                    <td/>
                    <td>
                      <script>
                      $('#datepicker').datepicker({
                          uiLibrary: 'bootstrap4'
                      });
                      </script>
                    </td>
                  </tr>

                  <tr>
                    <td><label for="txtfin">Fin</label></td>
                    <td>
                        <input id="datepicke"  name="txtfin" width="276" />
                    <td/>
                    <td>
                      <script>
                      $('#datepicke').datepicker({
                          uiLibrary: 'bootstrap4'
                      });
                      </script>
                    </td>
                    <td>
                         <input type="submit" name="btnrechecher" value="Rechercher" class="btn btn-success">
                    </td>
                  </tr>
                </tbody>

              </table>
            </form>
 -->

            <table id="user_adr" class="table table-striped table-bordered">
                <tr>
                  <th>ID Fich</th>
                    <th>Pri total</th>
                      <th>Eta</th>
                        <th>Peye</th>
                          <th>Dat anrejistre</th>
                            <th>kesye</th>
                </tr>
                <tbody>
                  <?php
                  if(!isset($_POST['txtsurcussale'])){
                  // $idsur='348902310239';
                    foreach (ficheDao::GetAllFiche($ident) as $row):
                    //echo $row[0]."</br>";
                  ?>
                  <tr>
                      <td><?php echo $row[0];?></td>
                      <td><?php echo $row[1];?></td>
                      <td><?php if($row[2]==1){
                         echo  "Actif";
                      }else{
                         echo  "ACtif";
                      }?></td>
                      <td><?php if($row[3]==0){
                         echo  "Non";
                      }else{
                         echo  "oui";
                      }?></td>
                      <td><?php echo $row[4];?></td>
                      <td><?php echo $row[5];?></td>
                  </tr>
                  <?php
                endforeach;
          }
          /* else{
            foreach (ficheDao::GetAllFiche($ident) as $row):
          } */
                  ?>
                </tbody>
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
