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
ini_set('display_errors', 'Off');

if(isset($_POST['btnanrejistre']) && isset($_POST['txtnom']) && isset($_POST['txtpin']) && isset($_POST['txtemail']) && isset($_POST['txttelephone'])
 && isset($_POST['txtville']) && isset($_POST['txtadressecomp']) && isset($_POST['txttypeadmin'])){

   //n ap kreye yon instans de obje administrationDao a
    $admin=new administration();

    //nou afekte l ak atribi l yo
    $idadmin=time()."".rand(1,100);
    $admin->idadmin=$idadmin;
    $admin->typeadminid=$_POST['txttypeadmin'];
    $admin->nomcomplet=ucwords($_POST['txtnom']);
    $admin->pin=$_POST['txtpin'];
    $admin->email=$_POST['txtemail'];
    $admin->telephone=$_POST['txttelephone'];
    $admin->villeid=$_POST['txtville'];
    $admin->adressecomplete=$_POST['txtadressecomp'];
    $admin->etat=1;

    $_SESSION['nom_complet']=$admin->nomcomplet;
    $_SESSION['pin']=$admin->pin;
    $_SESSION['email']=$admin->email;
    $_SESSION['telephone']=$admin->telephone;
    $_SESSION['adresse_complete']=$admin->adressecomplete;
    $_SESSION['ville']=$_POST['txtville'];
    if(isset($admin->idadmin) && isset($admin->typeadminid) && isset($admin->nomcomplet) && isset($admin->pin)
    && isset($admin->email) && isset($admin->telephone) && isset($admin->villeid) && isset($admin->adressecomplete)
    && isset($admin->etat)){
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
                  //nou teste si id_surcussale la pase pa get
                          if(isset($_GET['id_surcussale'])){
                                  $idsur=$_GET['id_surcussale'];
                                  $post=new postDao();
                                  $idpost=time()."".rand(1,100);
                                  $post->idpost=$idpost;
                                   $post->adminid=$admin->idadmin;
                                  $post->surcussaleid=$idsur;
                                  $post->etat=1;

                                //  $admin->nomcomplet=$_SESSION['nom_complet'];
                                  //nou ajoute admin la nan base la ak tout type li le tout bagay byen pase
                                  //TypeadminDao::createtypeadmin($typeadmindao);
                                    administrationDao::createadmin($admin);
                                    //n ap insere nan tab post la kounya
                                    postDao::addPost($post);
                                  $sikse="insesyon an fet.";
                                // header("location:./index.php");
                          }else{
                            $mesaj="Ou poko chwazi yon sikisal pou w ka mete kesye a.";
                          }




                     }else{
                       $mesaj="Gen yon anploye ki anregistre ak telefon sa deja,tanpri mete yon lot.";
                     }

                  }else{
                     $mesaj="Gen yon administrate ki anregistre ak email sa deja,tanpri mete yon lot.";

                     //echo $_SESSION['ville']=2;

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
				  <h1>Anrejistre Kesye</h1>
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
								<input type="text" name="txtnom" class="form-control" value="<?php if(($mesaj)||($_POST['txttypeadmin']==3) || isset($_GET['id_surcussale'])){ echo $_SESSION['nom_complet'];}?>" required  placeholder="Ex:Fleurine Kenley">
									<select  name="txttypeadmin" class="form-control">
											<option value='3'>Kesye</option>
									</select>
								<input type="text" name="txtpin" class="form-control"  value="<?php if(($mesaj) || ($_POST['txttypeadmin']==3) || isset($_GET['id_surcussale'])){ echo $_SESSION['pin'];}?>" required placeholder="Ex:0089">
								<input type="email" name="txtemail" class="form-control"  value="<?php if(($mesaj)||($_POST['txttypeadmin']==3)  || isset($_GET['id_surcussale'])){ echo $_SESSION['email'];}?>" required placeholder="Ex:fleurinekenley@gmail.com">
									<input type="text" name="txttelephone" class="form-control"  value="<?php if(($mesaj)||($_POST['txttypeadmin']==3)  || isset($_GET['id_surcussale'])){ echo $_SESSION['telephone'];}?>" required placeholder="Ex:47663774">
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
									<input type="text" name="txtadressecomp" class="form-control" value="<?php if(($mesaj)||($_POST['txttypeadmin']==3) || isset($_GET['id_surcussale'])){ echo $_SESSION['adresse_complete'];}?>"  required placeholder="tabarre 36,en face de l'univers market">

							 <input type="submit" name="btnanrejistre" value="Anrejistre" class="btn btn-success">


					</form>

					<table id="user_adr" class="table table-striped table-bordered">
							<tr>
								<th>ID SURCUSSALE</th>
										<th>Ville</th>
											<th>ADRESSE COMPLETE</th>
													<th>OPTION</th>
							</tr>

							<?php
								if (isset($_SESSION['entreprise_id'])){
									$_SESSION['entreprise_id']="198122317601";
									$ident=$_SESSION['entreprise_id'];
								}
							foreach(surcussaleDao::getAllSurcussale($ident) as $row):?>
								<tr>
										<td><?=$row[0]?></td>
										<td><?= ucwords($row[1])?></td>
										<td><?= ucwords($row[3])?></td>

											<td>
											<a href="?id_surcussale=<?=$row[0]?>&&etat=<?=$row[4]?>"><input type="submit" value="Choisir" name="btnchoisir" class="btn btn-secondary btn-sm" data-toggle="modal"/></a>
											</td>


								</tr>


							<?php endforeach;?>
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
