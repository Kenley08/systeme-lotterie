<?php
 class entrepriseadminDao{
   //fonction pour creer typeadmin
   public static function add($entrepriseadmin){
   $con=new connexion();
   $resultat=$con->executeactualisation("insert into tblentrepriseadmin (id_ent_admin,admin_id,entreprise_id,date_ajout,date_modifier)
   values('" . $entrepriseadmin->$identadmin. "','" . $entrepriseadmin->adminid . "','" . $entrepriseadmin->entrepriseid . "',NOW(),NOW())");
   $con->closeconnexion();
        }

        //fonction pour aficher les responsables
          public static function getAllResponsable($ident){
                    $con=new connexion();
                    $cont=$con->executerequete("SELECT a.nom_complet,a.email,a.telephone,a.adresse_complete,a.etat,a.id_admin FROM tbladministration a
                    INNER JOIN tblentrepriseadmin e
                    on e.admin_id=a.id_admin WHERE e.entreprise_id='$ident'");
                    $con->closeconnexion();
                    return $cont;
          }

          //fonction pour aficher un responsables
            public static function getResponsable($ident,$nom){
                      $con=new connexion();
                      $cont=$con->executerequete("SELECT a.nom_complet,a.email,a.telephone,a.adresse_complete,a.etat,a.id_admin FROM tbladministration a
                      INNER JOIN tblentrepriseadmin e
                      on e.admin_id=a.id_admin WHERE e.entreprise_id='$ident' and a.nom_complet='$nom'");
                      $con->closeconnexion();
                      return $cont[0];
            }
   }
?>
