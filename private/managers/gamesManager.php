<?php
    class gamesManager{
        public static function selectAll(){
            global $con;

            $query = "SELECT *, ";
            $query .= "(SELECT name FROM platform WHERE platform.id = game.platform_id) as platform ";
            $query .= "FROM game ";

            $stmt = $con->prepare($query);
            $stmt ->execute();

            return $stmt ->fetchAll(PDO::FETCH_OBJ);
        }
        public static function customer_games($sCustomerId, $sGameId){
            global $con;

            $query = "SELECT * FROM customer_game WHERE customer_id = ? AND game_id = ? ";

            $stmt = $con->prepare($query);
            $stmt ->bindValue(1, htmlspecialchars($sCustomerId));
            $stmt ->bindValue(2, $sGameId);
            $stmt ->execute();

            return $stmt ->fetchObject();
        }
        public static function selectOnId($sId){
            global $con;

            $query = "SELECT *, ";
            $query .= "(SELECT name FROM game WHERE game.id = customer_game.game_id) as name, ";
            $query .= "(SELECT platform_id FROM game WHERE game.id = customer_game.game_id) as platform_id ";
            $query .= "FROM customer_game WHERE customer_id = ? ";

            $stmt = $con->prepare($query);
            $stmt ->bindValue(1, htmlspecialchars($sId));
            $stmt ->execute();

            return $stmt ->fetchAll(PDO::FETCH_OBJ);
        }
        public static function selectPlatform($sId){
            global $con;

            $query = "SELECT * FROM platform WHERE id = ? ";

            $stmt = $con->prepare($query);
            $stmt ->bindValue(1, htmlspecialchars($sId));
            $stmt ->execute();

            return $stmt ->fetchObject();
        }
        public static function insertGameWithCustomer($iId, $iIdGame){
            global $con;

            $query = "INSERT INTO customer_game (customer_id, game_id) VALUES (?,?);";

            $stmt = $con->prepare($query);
            $stmt ->bindValue(1, $iId);
            $stmt ->bindValue(2, $iIdGame);
            $stmt ->execute();
        }
        public static function deleteForCustomer($dId){
            global $con;

            $query = "DELETE FROM customer_game WHERE id = ? ";

            $stmt = $con->prepare($query);
            $stmt ->bindValue(1, $dId);
            $stmt ->execute();
        }
        public static function deleteCustomer($dId){
            global $con;

            $query = "DELETE FROM customer_game WHERE customer_id = ? ";

            $stmt = $con->prepare($query);
            $stmt ->bindValue(1, $dId);
            $stmt ->execute();
        }
    }
?>