<?php
// recuperer la connexion à la base de donnée.
require_once('connection.php');

// Afficher tous les Utilisateurs enregistrer en Base de donnée.

try {
    $database=new Connection();
    $db=$database->openConnection();


    $id=8;
    $sql="SELECT * FROM students WHERE id=:id";
    $stmt=$db->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    $stmt->execute(array(
        ':id'=>$id
    ));
    
    // Vérifier si le tableau est vide.
    if($stmt->rowCount()>0){
        // Si oui recuperer toutes les données enregistrés.
        $students=$stmt->fetchAll(PDO::FETCH_ASSOC);

        // Et les affichées.
        foreach($students as $student){
            echo $student["name"]." ".$student["lastName"]."-".$student["email"]."<br/>";
        }
    }else{
        echo 'veuillez renseigner un utilisateur valide';
    }


} catch (PDOException $e) {
    echo "Erreur lors de la connexion: ". $e->getMessage();
}

?>