<?php
    class userManager{
        public static function checkIfLogin($sEmail, $sPassword){
            global $con;

            $query = "SELECT * FROM user WHERE email = ? ";
            
            $stmt = $con->prepare($query);
            $stmt->bindValue(1, htmlspecialchars($sEmail));
            $stmt->execute();

            return $stmt->fetchObject();
        }
        public static function ingeloged(){
            if(!isset($_SESSION["id"])){
                return header("location:login");
            }
        }
        public static function logout(){
            session_start();
            session_unset();
            session_destroy();
        
            return header("location:.");
        }
        public static function checkIfId($iId){
            if(!isset($_GET["id"])){
                return header("location:.");
            }else{
                switch($_GET["id"]){
                    default:
                        break;
                    case "":
                        return header("location:.");
                        break;
                }
            }
        }
    }
?>