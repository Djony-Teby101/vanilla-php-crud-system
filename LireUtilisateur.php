<?php
// recuperer la connexion à la base de donnée.
require_once('connection.php');

// Afficher tous les Utilisateurs enregistrer en Base de donnée.

try {
    $database=new Connection();
    $db=$database->openConnection();

    $sql="SELECT * FROM students";
    $stmt=$db->prepare($sql);
    $stmt->execute();
    
    // Vérifier si le tableau est vide.
    if($stmt->rowCount()>0){
        // Si oui recuperer toutes les données enregistrés.
        $students=$stmt->fetchAll(PDO::FETCH_ASSOC);

        // Et les affichées.
        foreach($students as $student){
            echo $student["name"]." ".$student["lastName"]."-".$student["email"]."<br/>";
        }
    }


} catch (PDOException $e) {
    echo "Erreur lors de la connexion: ". $e->getMessage();
}

?>