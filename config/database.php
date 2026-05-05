<?php  

class Transaction {
    private $pdo;

    function __construct(){
        global $bdd_dsn, $bdd_user, $bdd_pass;
        require_once __DIR__ . '/db_config.php';
        try{
            $options = 
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', //utf8
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, //ERRMODE_WARNING ou _SILENT, comment son gérer les erreurs de exception à 
                //silent (plus faible ie les erreurs sotn cachés) 
                //Options facultatives
                // PDO::ATTR_PERSISTENT => true //pour une connexion persistante
                PDO::ATTR_EMULATE_PREPARES => false,
    
            ];
            $PDO= new PDO($bdd_dsn, $bdd_user, $bdd_pass, $options);
            $this->pdo = $PDO;
        }
        catch(PDOException $pe){
            die("Erreur : ".$pe->getMessage());
        };
    }   

    public function close(){
        try{
            $this->pdo=null;
        }
        catch(PDOException $pe){
            die("Erreur : ".$pe->getMessage());
        };
    }

    public function init_request(string $request){
        $pstmt = $this->pdo->prepare($request);  
        return $pstmt;
    }

    public function make_request($pstmt, ...$data){
        try{
            $res = $pstmt->execute($data);
            return $pstmt;
        }
        catch(PDOException $pe){
            die("Erreur : ".$pe->getMessage());
        };
    }

}

?>