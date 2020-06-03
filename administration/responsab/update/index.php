<?php
require_once "../../../api/Modele/Mconnexion.class.php";
require_once "../../../api/Modele/Madministration.class.php";
require_once "../../../api/Dao/administrationDao.class.php";
require_once "../../../api/Dao/typeadminDao.class.php";
require_once "../../../api/Dao/villeDao.class.php";
 ini_set('display_errors', 'Off');

  if(isset($_GET['id_admin'])){
    $idadmin=$_GET['id_admin'];
    $ligne=administrationDao::getadminbyid($idadmin);
    //echo $ligne[2];
  //  $sikse="Voici les donnees:"."<br/>";
  }

  if(isset($_POST['btnmodifier'])){

    //typeadminDao::UpdateTypeAdmin($_POST['txttypeadmin'],$idtypeadmin);
     $admin=new administrationDao();
    $admin->idadmin=$_POST['txtidadmin'];
    $admin->nomcomplet=$_POST['txtnom'];
    $admin->pin=$_POST['txtpin'];
    $admin->email=$_POST['txtemail'];
    $admin->telephone=$_POST['txttelephone'];
    $admin->adressecomplete=$_POST['txtadressecomp'];
    $admin->villeid=$_POST['txtville'];
    //
    // $type=new typeadminDao();
    // $type->typeadmin=$_POST['txttypeadmin'];
    // $type->idtypeadmin=$_POST['txtidtypeadmin'];
      if(isset($admin->idadmin) && isset($admin->nomcomplet) && isset($admin->pin)
     && isset($admin->email) && isset($admin->telephone) && isset($admin->adressecomplete) && isset($admin->villeid)){
       $nc=$_POST['txtnom'];
       $tel=$_POST['txttelephone'];
       $email=$_POST['txtemail'];

       //nou teste si itilizate a mete chif nan non konple a
       if(preg_match ("/^[a-zA-Z\s]+$/",$nc)) {
         //nou teste  si itilizate a mete byen mete yon foma tel
         if(preg_match('/^[0-9]*$/',$tel)){
           //Coversion des chiffres de telephone en string
           $t=strval($tel);
           //on teste maintenant la longeur du chaine
           if(strlen($t)>=8){
                   //nou ajoute admin la nan base la ak tout type li le tout bagay byen pase
                  administrationDao::updateadmin($admin);
                //  typeadminDao::UpdateTypeAdmin($type);
                  $sikse="Modifikasyon a fet.";

           }else{
             $mesaj="Nimewo telefon dwe genyen piti 8 chif.";
           }

         }else{
           $mesaj="Nimewo telephone la dwe gen chif selman";
         }

       }else{
         $mesaj="Non konple a sipoze ge let selman";
       }


     }else{
       $mesaj="Modifikasyon a pa arive fet.";
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
      <h1>Modifye Yon Kesye</h1>
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
        <input type="hidden" name="txtidadmin" class="form-control"  value="<?php if($ligne){  echo $ligne[0];}else{echo $_POST['txtidadmin'];}?>"   placeholder="Ex:003432411">
        <input type="text" name="txtnom" class="form-control" value="<?php if($ligne){  echo $ligne[1];}else{echo $_POST['txtnom'];}?>"   placeholder="Ex:Fleurine Kenley">
        <input type="text" name="txtpin" class="form-control"  value="<?php if($ligne){ echo $ligne[2];}else{echo $_POST['txtpin'];}?>"  placeholder="Ex:0089">
        <input type="email" name="txtemail" class="form-control"  value="<?php if($ligne){ echo $ligne[3];}else{echo $_POST['txtemail'];}?>" placeholder="Ex:fleurinekenley@gmail.com">
          <input type="text" name="txttelephone" class="form-control"  value="<?php if($ligne){ echo $ligne[4];}else{echo $_POST['txttelephone'];}?>"  placeholder="Ex:47663774">
            <select  name="txtville" class="form-control">
              <?php foreach(VilleDao::GetVille() as $l):
                if($l[0] ==$ligne[8]){
                  echo "<option selected='selected' value='$l[0]'>$l[2]</option>";
                 }
                 else{
                     echo "<option value='$l[0]'>$l[2]</option>";
                 }
              endforeach;?>
            </select>


          <input type="text" name="txtadressecomp" class="form-control" value="<?php if($ligne){ echo $ligne[5];}else{echo $_POST['txtadressecomp'];}?>"  placeholder="tabarre 36,en face de l'univers market">
          <input type="submit" name="btnmodifier" value="Modifye" class="btn btn-success">



      </form>
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
