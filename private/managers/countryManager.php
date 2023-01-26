<?php
    class countryManager{
        public static function selectAll(){
            global $con;

            $query = "SELECT * FROM country ";

            $stmt = $con->prepare($query);
            $stmt -> execute();

            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }
?>