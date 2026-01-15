<!-- CLASSE DATABASE -->

<?php

//J'utilise DIR pour que le chemin fonctionne depuis les fichiers dans le dossier pages mais aussi depuis indes
include_once __DIR__ . '/../config/connexionBDD.php';

class Database {

    private $db_host;
    private $db_username;
    private $db_port;
    private $db_password;
    private $db_dbname;
    private $db_conn;


    private static $instance = null;
    private function __construct($dbname)
    {
        // On importe les variables du fichier connexionBDD.php dans l'espace de la fonction
        global $host, $username, $port, $password;
        $this->db_host = $host;
        $this->db_username = $username ;
        $this->db_port = $port;
        $this->db_password = $password;
        $this->db_dbname = $dbname;


        try{
            $dsn = "mysql:host={$this->db_host};port={$this->db_port};dbname={$this->db_dbname};charset=utf8";
            $this->db_conn = new PDO($dsn, $this->db_username, $this->db_password);
        }  
        catch (PDOException $e) {
                die("Erreur de connexion : ". $e->getMessage());
        }
    }


    public static function getInstance($dbname = 'aikido'){
        if (self::$instance === null) {
                self ::$instance = new Database($dbname);
        }
        return self :: $instance;
    }


    public function getObjects($sql, $className, $params = []) {
        $sth = $this->db_conn->prepare($sql);
        $sth->execute($params);
        $data = $sth->fetchAll(PDO::FETCH_CLASS, $className);
        return $data;
    }


    public function getConnect() {
        return $this->db_conn;
    }
}
   
?>

