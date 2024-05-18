<?php
// Récupere la connection à la base de donnée.
require_once('connection.php');


// Modifier un utilisateur.
try {
   $database=new Connection();
   $db=$database->openConnection();

    //Ecrire la requete sql.
    $id=2;
    $stmt=$db->prepare("UPDATE students SET `name`=:name, `lastName`=:lastName, `email`=:email  WHERE `id`=:id");

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

     $stmt->execute([
        ':id'=>$id,
        ':name'=>"Lorince",
        ':lastName'=>"TEBY",
        ':email'=>"Contact12@gmail.com"
    ]);

    echo "Modification etablie sans probleme";


} catch (PDOException $e) {
    die('Erreur :'.$e->getMessage());
}






?>