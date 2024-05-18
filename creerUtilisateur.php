<?php
require_once('connection.php');


// Créer un nouvel utilisateur.

try {
    // Creer une instance (instance) de la classe Connection(parent).
    $database=new Connection();

    // Etablir une connection à la base de donnée.
    $db=$database->openConnection();

    // Ecrire la requete d'insertion de donnée.
    $sql="INSERT INTO students (id, name, lastName, email) VALUES (:id, :name, :lastName, :email)";
    $stm=$db->prepare($sql);
    // var_dump($stm);

    // Executer la requete sql.
    $stm->execute([
        ':id'=>0,
        ':name'=>'Payrolle',
        ':lastName'=>'Teby',
        ':email'=>'emailContact@gmail.com'
    ]);
    
    echo"Operation réussie !";

} catch (PDOException $e) {
    echo("Erreur lors de la connexion: ". $e->getMessage());
}



?>