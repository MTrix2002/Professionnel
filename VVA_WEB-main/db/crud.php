<?php
class crud
{
    // private database object\
    private $db;

    //constructor to initialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // function to insert a new record into the attendee database

    public function inserthebergement(

        $codetypeheb,
        $nomheb,
        $bnplaceheb,
        $surfaceheb,
        $internet,
        $anneeheb,
        $secteurheb,
        $orientationheb,
        $etatheb,
        $description,
        $photoheb,
        $tarifsemheb
    ) {
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO `hebergement`( `CODETYPEHEB`, `NOMHEB`, `NBPLACEHEB`, `SURFACEHEB`, `INTERNET`, `ANNEEHEB`, `SECTEURHEB`, `ORIENTATIONHEB`, `ETATHEB`, `DESCRIHEB`, `PHOTOHEB`, `TARIFSEMHEB`) VALUES (:codetypeheb, :nomheb, :bnplaceheb, :surfaceheb, :internet, :anneeheb, :secteurheb, :orientationheb,
            :etatheb, :dscription, :photoheb, :tarifsemheb)";


            //prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':codetypeheb', $codetypeheb);
            $stmt->bindparam(':nomheb', $nomheb);
            $stmt->bindparam(':bnplaceheb', $bnplaceheb);
            $stmt->bindparam(':surfaceheb', $surfaceheb);
            $stmt->bindparam(':internet', $internet);
            $stmt->bindparam(':anneeheb', $anneeheb);
            $stmt->bindparam(':secteurheb', $secteurheb);
            $stmt->bindparam(':orientationheb', $orientationheb);
            $stmt->bindparam(':etatheb', $etatheb);
            $stmt->bindparam(':dscription', $description);
            $stmt->bindparam(':photoheb', $photoheb);
            $stmt->bindparam(':tarifsemheb', $tarifsemheb);

            // execute statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function edithebergement($param)
    {

        try {
            $sql = "UPDATE `hebergement` SET
            codetypeheb     =?,
            nomheb          =?,
            nbplaceheb      =?,
            surfaceheb      =?, 
            internet        =?, 
            anneeheb        =?,
            secteurheb      =?, 
            orientationheb  =?,
            etatheb         =?,
            descriheb       =?,
            photoheb        =?, 
            tarifsemheb     =?
            WHERE 
            noheb           =?";
            $stmt = $this->db->prepare($sql);

            /*$stmt->bindparam(':noheb', $noheb);
            $stmt->bindparam(':codetypeheb', $codetypeheb);
            $stmt->bindparam(':nomheb', $nomheb);
            $stmt->bindparam(':bnplaceheb', $bnplaceheb);
            $stmt->bindparam(':surfaceheb', $surfaceheb);
            $stmt->bindparam(':internet', $internet);
            $stmt->bindparam(':anneeheb', $anneeheb);
            $stmt->bindparam(':secteurheb', $secteurheb);
            $stmt->bindparam(':orientationheb', $orientationheb);
            $stmt->bindparam(':etatheb', $etatheb);
            $stmt->bindparam(':describheb', $description);
            $stmt->bindparam(':photoheb', $photoheb);
            $stmt->bindparam(':tarifsemheb', $tarifsemheb);*/
            // execute statement
            $stmt->execute($param);
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return  false;
        }
    }

    public function gethebergements()
    {
        try {
            $sql = "SELECT `NOHEB`, `NOMHEB`, `NBPLACEHEB`, `SURFACEHEB`, `INTERNET`, `ANNEEHEB`, `SECTEURHEB`, `ORIENTATIONHEB`, `ETATHEB`, `DESCRIHEB`, `PHOTOHEB`, `TARIFSEMHEB`, NOMTYPEHEB FROM `hebergement` , type_heb WHERE hebergement.CODETYPEHEB=type_heb.CODETYPEHEB";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getHebergementById($id)
    {
        try {
            $sql = "SELECT  `NOHEB`, `CODETYPEHEB`, `NOMHEB`, `NBPLACEHEB`, `SURFACEHEB`, `INTERNET`, `ANNEEHEB`, `SECTEURHEB`, `ORIENTATIONHEB`, `ETATHEB`, `DESCRIHEB`, `PHOTOHEB`, `TARIFSEMHEB` FROM `hebergement` WHERE NOHEB=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteHebergement($id)
    {
        try {
            $sql = "DELETE FROM `hebergement` WHERE NOHEB=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAllTypeHebergement()
    {
        try {
            $sql = "SELECT * FROM type_heb ";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getTypeHebById($id)
    {
        try {
            $sql = "SELECT NOMTYPEHEB FROM type_heb where codetypeheb = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function GetSemaine()
    {
        try {
            $sql = "SELECT * FROM semaine ";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function GetNbPlace()
    {
        try {
            $sql = "SELECT DISTINCT NBPLACEHEB FROM `hebergement`";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function GetSecteur()
    {
        try {
            $sql = "SELECT DISTINCT SECTEURHEB FROM `hebergement`";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
