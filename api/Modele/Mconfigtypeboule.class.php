<?php
  
    class configtypeboule{
        public $idconfig;
        public $entrepriseid;
        public $typebouleid;
        public $max;
        public $min;
        public $etattype;
        public $dateaj;
        public $dateup;
    
    
        public function __construct(){
          $this->idconfig="";
          $this->entrepriseid="";
          $this->typebouleid="";
          $this->max="";
          $this->min="";
          $this->etattype="";
          $this->dateaj="";
          $this->dateup="";
          
        }
      }
  
    
?>