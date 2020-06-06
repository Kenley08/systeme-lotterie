<?php
session_start();
require_once "../../../api/Modele/Mconnexion.class.php";
require_once "../../../api/Dao/VilleDao.class.php";
require_once "../../../api/Dao/administrationDao.class.php";
require_once "../../../api/Modele/Madministration.class.php";
require_once "../../../api/Modele/Mtypeadministration.class.php";
require_once "../../../api/Dao/TypeadminDao.class.php";
require_once "../../../api/Dao/surcussaleDao.class.php";
require_once "../../../api/Dao/postDao.class.php";
require_once "../../../api/Dao/entrepriseadminDao.class.php";
require_once "../../../api/Modele/Mentrepriseadmin.class.php";
ini_set('display_errors', 'Off');

if(isset($_POST['btnanrejistre']) && isset($_POST['txtnom']) && isset($_POST['txtpin']) && isset($_POST['txtemail']) && isset($_POST['txttelephone'])
 && isset($_POST['txtville']) && isset($_POST['txtadressecomp']) && isset($_POST['txttypeadmin'])){

   //n ap kreye yon instans de obje administrationDao a
    $admin=new administration();
    $pin=rand(1, 10000)."";
    //nou afekte l ak atribi l yo
    $idadmin=time()."".rand(1,100);
    $admin->idadmin=$idadmin;
    $admin->typeadminid=$_POST['txttypeadmin'];
    $admin->nomcomplet=ucwords($_POST['txtnom']);
    $admin->pin=$pin;
    $admin->email=$_POST['txtemail'];
    $admin->telephone=$_POST['txttelephone'];
    $admin->villeid=$_POST['txtville'];
    $admin->adressecomplete=$_POST['txtadressecomp'];
    $admin->etat=1;


    $ident="198122317601";
    $entrepriseadmin=new entrepriseadminDao();
    $entrepriseadmin->$identadmin=time()."".rand(1,100);
    $entrepriseadmin->adminid=$admin->idadmin;
    $entrepriseadmin->entrepriseid=$ident;

//on capte les les donnes dans des sessions
    $_SESSION['nom_complet']=$admin->nomcomplet;
    $_SESSION['pin']=$admin->pin;
    $_SESSION['email']=$admin->email;
    $_SESSION['telephone']=$admin->telephone;
    $_SESSION['adresse_complete']=$admin->adressecomplete;
    $_SESSION['ville']=$_POST['txtville'];

 // on va tester si les attributs liees aux objets cree existent
    if(isset($admin->idadmin) && isset($admin->typeadminid) && isset($admin->nomcomplet) && isset($admin->pin)
    && isset($admin->email) && isset($admin->telephone) && isset($admin->villeid) && isset($admin->adressecomplete)
    && isset($admin->etat) && isset($entrepriseadmin->$identadmin) && isset($entrepriseadmin->adminid) && isset($entrepriseadmin->entrepriseid)){
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
                  //nou pral gade si admin k ap anrejistre a te deja nan base de donne deja
                 $row=administrationDao::getadminbyemailorphone($admin);
                  if($row[0]!=$email){
                     if($row[1]!=$tel){
                         //on cree l'administrateur
                                administrationDao::createadmin($admin);
                                //on ajoute ajoute les donnees dans la table entrepriseadmin
                                entrepriseadminDao::add($entrepriseadmin);
                                $sikse="insesyon an fet.";


                     }else{
                       $mesaj="Gen yon anploye ki anregistre ak telefon sa deja,tanpri mete yon lot.";
                     }

                  }else{
                     $mesaj="Gen yon administrate ki anregistre ak email sa deja,tanpri mete yon lot.";

                  }

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
      $mesaj="li pa fet";
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
      <div class="main-content">
				  <h1>Anrejistre responsab</h1>
					<?php
					if(isset($sikse)){
						echo $sikse;
					}else if(isset($mesaj)){
							echo $mesaj;
					}else{
						$mesaj="";
						$sikse="";
					}

						$ident="198122317601";

					?>

					<form action="" method="post" class="form-inline">
								<input type="text" name="txtnom" class="form-control" value="<?php if(($mesaj)||($_POST['txttypeadmin']==3) || isset($_GET['id_surcussale'])){ echo $_SESSION['nom_complet'];}?>" required  placeholder="Non Konpl&egrave;">
									<select  name="txttypeadmin" class="form-control">
                    <option value='1'>Admin</option>
                    <option value='2'> Sip&egrave; Admin</option>
                    <option value='3'>Sip&egrave;viz&egrave;</option>
									</select>
								<input type="hidden" name="txtpin" class="form-control"  value="<?php if(($mesaj) || ($_POST['txttypeadmin']==3) || isset($_GET['id_surcussale'])){ echo $_SESSION['pin'];}?>" placeholder="Pin">
								<input type="email" name="txtemail" class="form-control"  value="<?php if(($mesaj)||($_POST['txttypeadmin']==3)  || isset($_GET['id_surcussale'])){ echo $_SESSION['email'];}?>" required placeholder="Imel">
									<input type="text" name="txttelephone" class="form-control"  value="<?php if(($mesaj)||($_POST['txttypeadmin']==3)  || isset($_GET['id_surcussale'])){ echo $_SESSION['telephone'];}?>" required placeholder="Telef&ograve;n">
									<select id="txtville" name="txtville" class="form-control">
                    <?php foreach(VilleDao::GetVille() as $li):
                      if(($_POST['txttypeadmin']==3) || isset($_GET['id_surcussale']) ||($mesaj)){
                        if(($li[0]==$_SESSION['ville'])){
                        echo "<option selected='selected' value='$li[0]'>$li[2]</option>";
                      }else{
                          echo "<option value='$li[0]'>$li[2]</option>";
                      }


                      }else{
                          echo "<option value='$li[0]'>$li[2]</option>";
                      }
                       endforeach;?>

									</select>
                  
									<input type="text" name="txtadressecomp" class="form-control" value="<?php if(($mesaj)||($_POST['txttypeadmin']==3) || isset($_GET['id_surcussale'])){ echo $_SESSION['adresse_complete'];}?>"  required placeholder="Adres kopl&egrave;">

							 <input type="submit" name="btnanrejistre" value="Anrejistre" class="btn btn-success">


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
