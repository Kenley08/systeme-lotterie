<?php
    require_once "../../api/Modele/Mconnexion.class.php";
    require_once "../../api/Dao/ficheDao.class.php";
    require_once "../../api/Dao/surcussaleDao.class.php";
    require_once "../../api/Dao/villeDao.class.php";
    $ident='198122317601';
     if(isset($_GET['t'])){
      //echo $_GET['t'];
      $idsur=$_GET['t'];
    }
     if(isset($_POST['btnrechercher'])){
      $debut = date("y-m-d",strtotime($_POST['txtdebut']));
      $fin= date("y-m-d",strtotime($_POST['txtfin']));
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
	<!-- Javascript -->
  <script src="../../assets/vendor/jquery/jquery.min.js"></script>
  	<!-- Javascript -->
	<script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="../../assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <script src="../../assets/scripts/klorofil-common.js"></script>
  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  
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
<select  name="txtsurcussale" onclick="selecttest();" id ="idsur" class="form-control">
<?php
        if(!isset($_GET['t'])){
           echo "<option  selected='selected' value='tout'>Tout</option>";
       }else if($idsur=='tout'){
        echo "<option  selected='selected' value='tout'>Tout</option>";
       }else{
        echo "<option value='tout'>Tout</option>";
       }
?>
                    <?php foreach(surcussaleDao::getAllSurcussale($ident)as $l):
                    if($idsur==$l[0]){
                      echo "<option  selected='selected' value='$l[0]'>$l[1],".$l[3]."</option>";
                    }else{
                      echo "<option value='$l[0]'>$l[1],".$l[3]."</option>";
                    }
                         
                       endforeach;

                       ?>
									</select>

                  <label for="checkbox1" class="form-check-label">
            <input type="checkbox" id="checkbox1" name="checkbox1" value="option1" onchange="showDateForm()" class="form-check-input">
             Triye pa Dat.
        </label>
</form>

<form action="?" id="fmdate" method="post">
  <table>
    <tbody>
      <tr>
        <td>
          <label for="txtdebut">Debut</label>
        </td>
        <td>   
            <input id="input" width="312" name="txtdebut" />
        </td>
        <td>    
        <script>
            $('#input').datetimepicker({ footer: true, modal: true });
        </script>
        </td>
        
      </tr>

      <tr>
        <td>
          <label for="txtfin">Fin</label>
        </td>
        <td>   
            <input id="input1" width="312" name="txtfin" />
        </td>
        <td>    
        <script>
            $('#input1').datetimepicker({ footer: true, modal: true });
        </script>
        </td>
        <td>
        <input type="submit" name="btnrechercher" value="Ch&egrave;che" class="btn btn-success">
        </td>
      </tr>
    </tbody>
  </table>


</form>
 

            <table id="user_adr" class="table table-striped table-bordered">
                <tr>
                  <th>ID Fich</th>
                    <th>Pri total(G)</th>
                      <th>Eta</th>
                        <th>Peye</th>
                          <th>Dat anrejistre</th>
                            <th>kesye</th>
                </tr>
                
                <tbody>

             
                  <?php
                  //nou teste si get la egziste
                  if(!isset($_GET['t'])){
                  //Nou pral teste si bouton recheche a egziste
                  if(!isset($_POST['btnrechercher'])){
                    foreach (ficheDao::GetAllFiche($ident) as $row):
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
                  }else{
                    //sinon sa se pou si bouton recheche a egziste
                    foreach (ficheDao::GetAllFicheByDate($debut,$fin,$ident) as $row):
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

                
              }else {
                //kounya id sikisal la egziste
                //nou pral fe yon test pou nou ka gade si get la egal a tout
              if($idsur=='tout'){

                 //Nou pral teste si bouton recheche a egziste
                 if(!isset($_POST['btnrechercher'])){
                  foreach (ficheDao::GetAllFiche($ident) as $row):
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
                }else{
                  //sinon sa se pou si bouton recheche a egziste
                  foreach (ficheDao::GetAllFicheByDate($debut,$fin,$ident) as $row):
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

              }else {
                if(!isset($_POST['btnrechercher'])){
                //nou fe rechech la a pati de yon sikisal ki seleksyone
                foreach (ficheDao:: GetFicheBySurcusale($ident,$idsur) as $row):
             
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
                }else{
                  //nou fe rechech la a pati de yon sikisal ki seleksyone
                foreach (ficheDao:: GetFicheByDate($debut,$fin,$idsur,$ident) as $row):
             
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
              }
            }
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

</body>

 <script>
 //fonksyon pou teste sikisal ki seleksyone nan select la
 function selecttest(){
  $(document).ready(function(){
		$('#idsur').change(function()
		{
     //nou teste si select option an gen yon vale ki seleksyone
			if($(this).val() =="")
			{
        //nou stoke nan varyab t a yo string ki rele tout
        var t="tout";
			 // alert("Tout");
        window.location.href = "../../fiche/list/index.php?t="+ t;
			}else{
      //nou kapte vale nan yon varyab
        var l=$(this).val();
        //alert("lot");
        window.location.href = "../../fiche/list/index.php?t="+ l;
      }
			
		});
  });
 }
	//nou mete form ki kenbe dat la display none pa defo
 $('#fmdate').css('display','none');
 //fonksyon ki pou afiche fom dat la
 function showDateForm() {
 	if($('#checkbox1').prop('checked')) {
         $('#fmdate').css('display','block');
       } else {
   	    $('#fmdate').css('display','none');
       }
}
       
	</script> 

</html>
