<?php
require_once "api/Modele/Mconnexion.class.php";
require_once "api/Dao/configtypebouleDao.class.php";
require_once "api/Dao/configtypebouleDao.class.php";
require_once "api/Modele/Mconfigtypeboule.class.php";
$ident="198122317601";
$antre=3000;
$ligne=configTypeBouleDao::select($ident);
//echo $ligne[0];
 foreach(configTypeBouleDao::getConfigTypeBoule($ident) as $row):
      if($ligne[0]==$row[4]){
            if($row[2]>$antre){
              echo $mesaj="ou antre tro piti pou min.";
            }else if($row[3]<$antre){
               echo $mesaj="ou antre trop pou max.";
            }else{
               echo $mesaj="tout bagay ok.";
            }
    
      }
   endforeach;
 
                  

?>
