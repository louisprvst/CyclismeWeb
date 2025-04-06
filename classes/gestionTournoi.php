<?php

require_once('../config/init.conf.php');

class GestionTournoi
{
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    // Ajouter un membre au tournoi
    public function addMember($name, $date_naissance)
    {
        $query = "INSERT INTO tournois_members (name, date_naissance) VALUES (:name, :date_naissance)";
        $stmt = $this->bdd->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':date_naissance', $date_naissance);
        return $stmt->execute();
    }

    // Ajouter un résultat pour un membre
    public function addResult($etape_id, $member_id, $temps)
    {
        $query = "INSERT INTO tournois_result (etape_id, member_id, temps) VALUES (:etape_id, :member_id, :temps)";
        $stmt = $this->bdd->prepare($query);
        $stmt->bindParam(':etape_id', $etape_id);
        $stmt->bindParam(':member_id', $member_id);
        $stmt->bindParam(':temps', $temps);
        return $stmt->execute();
    }

    // Récupérer le classement pour une étape donnée
    public function getRanking($etape_id)
    {
        $query = "SELECT tr.classement, tm.name, tm.date_naissance, tr.temps 
                  FROM tournois_result tr
                  JOIN tournois_members tm ON tr.member_id = tm.id
                  WHERE tr.etape_id = :etape_id
                  ORDER BY tr.classement ASC";
        $stmt = $this->bdd->prepare($query);
        $stmt->bindParam(':etape_id', $etape_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}