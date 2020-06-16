<?php
        require_once "../../api/Modele/Mconnexion.class.php";
        require_once "../../api/Dao/configtypebouleDao.class.php";
        require_once "../../api/Dao/typebouleDao.class.php";
        require_once "../../api/Modele/Mconfigtypeboule.class.php";
      $ident="159224300612";
          if(isset($_GET['id_config']) && isset($_GET['etat'])){
            $idconfig=$_GET['id_config'];
            $etat=$_GET['etat'];
             if($etat==1){
              configTypeBouleDao::Bloke($idconfig);
             }else if ($etat==0){
                configTypeBouleDao::Debloke($idconfig);
             } 
          }

        
            if(isset($_GET['id_config']) && isset($_GET['min']) && isset($_GET['max'])){
              $idconfig=$_GET['id_config'];
              $min=$_GET['min'];
              $max=$_GET['max'];
              configTypeBouleDao::update($idconfig,$min,$max);
              //$sikse="Konfigirasyon reyisi.";
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
      <h1>kongiration Tip boul</h1>
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
      
            <table id="user_adr" class="table table-striped table-bordered">
                <tr>
                  <th>Tip boul</th>
                      <th>Dat ajoute</th>
                      <th>Dat modifye</th>
                      <th>Minimum val&egrave;(Goud)</th>
                      <th>Maximum val&egrave;(Goud)</th>
                      <th></th>
                      <th>Eta</th>
                </tr>
               
                <?php
           
          
                  foreach(configTypeBouleDao::getConfigTypeBoule2($ident) as $row):
                    ?>
                  
                    <tr>
                      <td><?= $row[1] ?></td>
                      <td><?= $row[2] ?></td>
                      <td><?= $row[3] ?></td>
                      <form action="?" method="get">
                      
                      <td>
                      <input type="hidden" name="id_config" value="<?=$row[0]?>">
                       <input type="text" name="min" id="inputmin" class="form-control" value=<?=$row[5]?> placeholder="2000">
                      </td>
                      <td>
                      <input type="text" name="max" class="form-control" id="inputmax" placeholder="5" 
                      value="<?php echo $row[6];?>">
                      </td>
                     
                     
                      <td>

                      <a href="?id_config=<?=$row[0]?>&&min=<?php
                       
                      ?>"><input type="submit" value="Chanje" name="btnupdate" class="btn btn-secondary  btn-sm" data-toggle="modal"/></a>
                      </td>
                     
                      </form> 

                      <td>
                    <a href="?id_config=<?=$row[0]?>&&etat=<?=$row[4]?>"><input type="submit" value="<?php
                        if($row[4]==1){
                            echo"Bloke";
                          }else if($row[4]==0){
                              echo"Debloke";
                            }
                        ?>" name="btnblock" class="btn btn-secondary  btn-sm" data-toggle="modal"/></a>
                    </td>

                      </tr>
                      
                    <?php
                  endforeach;
                ?>
              
                 
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

  <script>
     function enable_input()
    {
      if(document.getElementById("checkbox1").checked){
          document.getElementById("inputmin").disabled=false;
          document.getElementById("inputmax").disabled=false;
      }else{
          document.getElementById("inputmin").disabled=true;
          document.getElementById("inputmax").disabled=true;
      }

    }
  </script>
</body>

</html>
