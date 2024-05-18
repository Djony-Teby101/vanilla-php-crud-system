<?php
// Récupere la connection à la base de donnée.
require_once('connection.php');


// Modifier un utilisateur.
try {
   $database=new Connection();
   $db=$database->openConnection();

    //Ecrire la requete sql.
    $id=2;
    $stmt=$db->prepare("DELETE FROM students WHERE id=:id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute(array(':id'=>$id));

     
    echo "utilisateur Supprimé";


} catch (PDOException $e) {
    die('Erreur :'.$e->getMessage());
}






?>