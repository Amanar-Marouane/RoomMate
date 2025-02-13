<?php
namespace app\models;
use app\models\Announce;
use PDOException;

 class Offer extends Announce {
    private  $regle_cohabitation;
    private $criteres_colocataires;
    private $equipement;
    private $capacite_accueil;

    public function __construct($type,$localisation, $address, $description, $budget, $available_at, 
                                $regles, $criteres, $equipement, $capacites) {
     
        parent::__construct($type,$localisation, $address, $description, $budget, $available_at);

       
        $this->regle_cohabitation = $regles;
        $this->criteres_colocataires = $criteres;
        $this->equipement = $equipement;
        $this->capacite_accueil = $capacites;
    }
    public function getAttribut() {
        return [
            'localisation' => $this->localisation,
            'address' => $this->address,
            'description' => $this->description,
            'budget' => $this->budget,
            'available_at' => $this->available_at,
            'regle_cohabitation' => $this->regle_cohabitation,
            'criteres_colocataires' => $this->criteres_colocataires,
            'equipement' => $this->equipement,
            'capacite_accueil' => $this->capacite_accueil,
            'annonce_type'=>$this->announce_type
        ];
    }
    public function setAttribut($type,$localisation,$address,$description,$budget,$available_at,
    $regle_cohabitation,$criteres_colocataires,$equipement,$capacite_accueil) {
    return [
         $this->localisation=$localisation,
       $this->address=$address,
        $this->description=$description,
        $this->budget=$budget,
        $this->available_at=$available_at,
       $this->regle_cohabitation=$regle_cohabitation,
        $this->criteres_colocataires=$criteres_colocataires,
        $this->equipement=$equipement,
        $this->capacite_accueil=$capacite_accueil,
        $this->announce_type=$type

      
    ];
}

public function create_annonce($studentid=1){
   try{
    $query="INSERT INTO announce (user_id,localisation,address,description,
    available_at,announce_type,budget,regles_cohabitation,criteres_colocataire,
    capacite_accueil,equipements VALUES (?,?,?,?,?,?,?,?,?,?,?)";
    $params=[$studentid,$this->localisation,$this->address,$this->description,
    $this->available_at,$this->announce_type,$this->budget,$this->regle_cohabitation,
    $this->criteres_colocataires,$this->capacite_accueil,$this->equipement];
    $db = $this->pdo;
    return $db->query($query,$params);
   }
   catch(PDOException $e){ 
    return "erreur".$e->getMessage();}
    
}

    
    public function insert($file) {
        $query = "INSERT INTO galerie (photo) VALUES (?)";
        $params = [$file];
    
        
        $db = $this->pdo;
    
        return $db->query($query, $params);
    }
   
   
    
}













 


?>