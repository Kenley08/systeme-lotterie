<?php
        class configTypeBouleDao{
            //fonction pour add configuration
                public static function add($config){
                    $con=new connexion();
                    $resultat=$con->executeactualisation("insert into tblconfigtypeboule (id_configuration,entreprise_id,type_boule_id,min,max,etat_type_boule,date_ajout,date_modifier)
                    values('" . $config->idconfig . "','" . $config->entrepriseid . "','" . $config->typebouleid. "','" . $config->max . "','" . $config->min . "','" . $config->etattype . "',NOW(),NOW())");
                    $con->closeconnexion();
                
                    }

                    public static function bloke($id){
                        $con=new connexion();
                        $con->executeactualisation("update tblconfigtypeboule set etat_type_boule=0 where id_configuration='$id'");
                        $con->closeconnexion();
                    
                    }
                    
                    public static function Debloke($id){
                      $con=new connexion();
                      $con->executeactualisation("update tblconfigtypeboule set etat_type_boule=1 where id_configuration='$id'");
                      $con->closeconnexion();
                  
                  }

                    public static function getConfigTypeBoule($id){
                        $con=new connexion();
                        $cont=$con->executerequete("SELECT t.id_type_boule,t.type_boule,c.min,c.max,c.id_configuration FROM tbltypeboul t
                        inner JOIN tblconfigtypeboule c
                        on t.id_type_boule=c.type_boule_id where entreprise_id='$id' and c.etat_type_boule=1");
                        $con->closeconnexion();
                        return $cont;
                      }

                      public static function getConfigTypeBoule2($id){
                        $con=new connexion();
                        $cont=$con->executerequete("SELECT c.id_configuration,t.type_boule,c.date_ajout,c.date_modifier,c.etat_type_boule,c.min,c.max FROM tbltypeboul t
                        inner JOIN tblconfigtypeboule c
                        on t.id_type_boule=c.type_boule_id where entreprise_id='$id'");
                        $con->closeconnexion();
                        return $cont;
                      }

                     public static function update($id,$min,$max){
                        $con=new connexion();
                        $con->executeactualisation("UPDATE tblconfigtypeboule SET min=$min,max=$max where id_configuration='$id'");
                        $con->closeconnexion();
                    
                    } 

                    public static function select($id){
                      $con=new connexion();
                      $cont=$con->executerequete("  SELECT c.id_configuration FROM tblconfigtypeboule c inner join tbltypeboul t on c.type_boule_id=t.id_type_boule
                      where t.type_boule='senp' and c.entreprise_id='$id'");
                      $con->closeconnexion();
                      return $cont[0];
                  } 


                   
                      

                      
        }
?>
