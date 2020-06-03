<?php
  class entrepriseDao{
    //fonction pour ajouter une entreprise
    public static function add($entreprise){
    $con=new connexion();
    $resultat=$con->executeactualisation("insert into tblentreprise (id_entreprise,admin_id,nom,logo,ville_id,adresse_complete,etat,date_ajout,date_modifier)
    values('" . $entreprise->ident . "','" . $entreprise->adminid . "','" . $entreprise->nom . "','" . $entreprise->logo . "','" . $entreprise->villeid . "','" . $entreprise->adressecomp . "',1,NOW(),NOW())");
    $con->closeconnexion();

    }

    //fonction pour aficher les entreprises
  public static function getAllEntreprise($id){
    $con=new connexion();
    $cont=$con->executerequete("select e.id_entreprise,e.nom,v.nom_ville,e.adresse_complete,e.etat from tblentreprise e inner join tblville v on v.id_ville=e.ville_id where admin_id='$id'");
    $con->closeconnexion();
    return $cont;
  }

  
  public static function inactif($id){
    $con=new connexion();
    $con->executeactualisation("update tblentreprise set etat=0,date_modifier=NOW() where id_entreprise='$id'");
    $con->closeconnexion();

}
public static function actif($id){
    $con=new connexion();
    $con->executeactualisation("update tblentreprise set etat=1,date_modifier=NOW() where id_entreprise='$id'");
    $con->closeconnexion();

}
public static function getEntrepriseByid($id){
  $con=new connexion();
  $cont=$con->executerequete("select e.id_entreprise,e.nom,e.ville_id,e.adresse_complete,e.etat from tblentreprise e inner join tblville v on v.id_ville=e.ville_id where id_entreprise='$id'");
  $con->closeconnexion();
  return $cont[0];

}

public static function updateEntreprise($entreprise){
  $con=new connexion();
  $con->executeactualisation("update tblentreprise set nom='$entreprise->nom',ville_id=$entreprise->villeid,adresse_complete='$entreprise->adressecomp',date_modifier=NOW() where id_entreprise='$entreprise->ident'");
  $con->closeconnexion();

}

  }
?>
