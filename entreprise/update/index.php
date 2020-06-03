<?php
require_once "../../api/Modele/Mconnexion.class.php";
require_once "../../api/Dao/VilleDao.class.php";
require_once "../../api/Dao/entrepriseDao.class.php";
require_once "../../api/Modele/Mentreprise.class.php";
// ini_set('display_errors', 'Off');
if(isset($_GET['id_entreprise'])){
    $id=$_GET['id_entreprise'];
    $ligne=entrepriseDao::getEntrepriseById($id);
    echo $ligne[2];
}
if(isset($_POST['btnmodifier']) && isset($_POST['txtville']) && isset($_POST['txtnomentreprise']) && isset($_POST['txtadressecomp'])){
    $entreprise=new entrepriseDao();
    $entreprise->ident=$id;
    $entreprise->nom=$_POST['txtnomentreprise'];
    $entreprise->villeid=$_POST['txtville'];
    $entreprise->adressecomp=$_POST['txtadressecomp'];
    entrepriseDao::updateEntreprise($entreprise);
    $sikse="Entrepriz la modifye avek sikse.";
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
      <h1>Modifye Entrepriz</h1>
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
      <input type="text" name="txtnomentreprise" class="form-control" value="<?php if($ligne){ echo $ligne[1];}?>"  required >
        <select  name="txtville" class="form-control">
          <?php foreach(VilleDao::GetVille() as $l):
            if($l[0] ==$ligne[2]){
              echo "<option selected='selected' value='$l[0]'>$l[2]</option>";
             }
             else{
                 echo "<option value='$l[0]'>$l[2]</option>";
             }
          endforeach;?>
        </select>
              <input type="text" name="txtadressecomp" class="form-control" value="<?php if($ligne){ echo $ligne[3];}?>"  required>
          <input type="submit" name="btnmodifier" value="Modifye" class="btn btn-success">

      </form>

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
