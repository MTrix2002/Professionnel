<?php

class user
{
    // private database object\
    private $db;

    //funtion constructor to initialize private variable to the database connection
    function __construct($conn)
    {
        $this->db = $conn;
    }

    // function to insert new user in bdd resa (compte)
    public function insertUser($user, $mdp, $nom, $prenom, $dateinscrip, $dateferme, $typecompte, $adrmailcpte,  $notelcompte, $noportcpte)
    {
        try {
            $result = $this->getUserbyUsername($user);
            if ($result['num'] > 0) {
                return false;
            } else {
                $new_password = md5($mdp . $user);
                // define sql statement to be executed
                $sql = "INSERT INTO compte (USER, MDP, NOMCPTE, PRENOMCPTE, DATEINSCRIP, DATEFERME 
                       TYPECOMPTE, ADRMAILCPTE,  NOTELCPTE, NOPORTCPTE) VALUES (:username,:password,:nom,:prenom,:dateinscrip,:dateferme,:typecompte,:adrmailcpte,:notelcpte,noportcpte)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':username', $user);
                $stmt->bindparam(':password', $new_password);
                $stmt->bindparam(':nom', $nom);
                $stmt->bindparam(':prenom', $prenom);
                $stmt->bindparam(':dateinscrip', $dateinscrip);
                $stmt->bindparam(':dateferme', $dateferme);
                $stmt->bindparam(':typecompte', $typecompte);
                $stmt->bindparam(':adrmailcpte', $adrmailcpte);
                $stmt->bindparam(':notelcompte', $notelcompte);
                $stmt->bindparam(':noportcpte', $noportcpte);
                // execute statement
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //function to return results of identification
    public function getUser($user, $password)
    {
        try {
            $sql = "select * from compte where user = :username AND mdp = :password ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $user);
            $stmt->bindparam(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch();
            var_dump($password);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    //function to return one specifie user by id in this case
    public function getUserbyUsername($user)
    {
        try {
            $sql = "select count(*) as num from compte where user = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $user);

            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    // funtion to return all users form rese bd
    public function getUsers()
    {
        try {
            $sql = "SELECT * FROM compte";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteUser($user)
    {
        try {
            $result = $this->getUserbyUsername($user);
            if ($result['num'] <= 0) {
                return false;
            } else {
                $sql = "DELETE FROM compte WHERE user=:user";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':user', $user);
                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
