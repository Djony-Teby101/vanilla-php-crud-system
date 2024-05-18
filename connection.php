<?php 

// Connection à la base de donnée
class Connection{
    private $dsn="mysql:host=localhost;dbname=prototype-1";
    private $username="root";
    private $password="";

    // Fonction de connection.
    public function openConnection(){
        // Tentative de connection.
        // Si tous va bien
        try {
            $conn=new PDO($this->dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ERR_NONE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        // Si tous va mal !
        catch (PDOException $e) {
            die('Erreur lors de la connetion à la base de donnée:'.$e->getMessage());
        }
    }

    // Fermer la connexion
    public function closeConnection(){
        $conn=null;
    }
}
?>