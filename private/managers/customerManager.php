<?php
    class customerManager{
        public static function selectOnId($iId){
            global $con;

            $query = "SELECT * FROM customer WHERE id = ? ";

            $stmt = $con->prepare($query);
            $stmt -> bindValue(1, htmlspecialchars($iId));
            $stmt -> execute();

            return $stmt->fetchObject();
        }
        public static function tableSelect(){
            global $con;

            $query = "SELECT *,";
            $query .= "(SELECT name FROM country WHERE country.id = customer.country_id) as country, ";
            $query .= "(SELECT count(game_id) FROM customer_game WHERE customer_game.customer_id = customer.id) as games_count ";
            $query .= "FROM customer ";

            $stmt = $con->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        public static function insertNewCustomer($iFirstname, $iLastname, $iEmail, $iPremiumMem, $iCountry){
            global $con;

            $query = "INSERT INTO ";
            $query .= "customer (firstname, lastname, email, premium_member, country_id) ";
            $query .= "VALUES (?,?,?,?,?) ";

            $stmt = $con->prepare($query);
            $stmt -> bindValue(1, htmlspecialchars($iFirstname));
            $stmt -> bindValue(2, htmlspecialchars($iLastname));
            $stmt -> bindValue(3, htmlspecialchars($iEmail));
            $stmt -> bindValue(4, $iPremiumMem);
            $stmt -> bindValue(5, $iCountry);
            $stmt -> execute();
        }
        public static function updateCustomer($iId, $iFirstname, $iLastname, $iEmail, $iPremiumMem, $iCountry){
            global $con;

            $query = "UPDATE customer ";
            $query .= "set firstname = ? , lastname = ? , email = ? , premium_member = ? , country_id = ? ";
            $query .= "WHERE id = ? ";

            $stmt = $con->prepare($query);
            $stmt -> bindValue(1, htmlspecialchars($iFirstname));
            $stmt -> bindValue(2, htmlspecialchars($iLastname));
            $stmt -> bindValue(3, htmlspecialchars($iEmail));
            $stmt -> bindValue(4, $iPremiumMem);
            $stmt -> bindValue(5, $iCountry);
            $stmt -> bindValue(6, htmlspecialchars($iId));
            $stmt -> execute();
        }
        public static function deleteCustomer($dId){
            global $con;

            $query = "DELETE FROM customer WHERE id = ? ";

            $stmt = $con->prepare($query);
            $stmt ->bindValue(1, htmlspecialchars($dId));
            $stmt ->execute();
        }
    }
?>