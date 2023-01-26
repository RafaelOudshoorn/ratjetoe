<?php
    error_reporting(0);
    include "../private/includes/head.php";
    if(isset($_SESSION["id"])){
        header("location:.");
    }
?>
    <body style="background-color:#D8D8D8;">
        <div class="rounded loginMain">
            <div class="p-4 loginImg">
                <img src="media/EPS_ICTCampus_CMYK.jpg" alt="ICT Campus Logo">
            </div>
            <div class="p-4">
<?php
    if(isset($_POST["inputSubmit"])){
        $email = $_POST["inputEmail"];
        $password = $_POST["inputPassword"];

        $user = userManager::checkIfLogin($email,$password);
        if($email != $user->email){
            $loginEmail = false;
        }else{
            $loginEmail = true;
        }
        if(!password_verify($password, $user->password_hash)){
           $loginPassword = false;
        }else{
            $loginPassword = true;
        }
        if($loginEmail == false or $loginPassword == false){
            echo "<div class='rounded p-1 loginIncorrectMain'>";
                echo "<span class='material-icons align-middle loginIncorrectError'>error</span>";
                echo "<span>Kan niet inloggen met deze gegevens</span>";
            echo "</div><br>";
        }else{
            $_SESSION["id"] = $user->id;
            header("location:.");
        } 
    }
?>
                <form method="POST">
                    <div class="form-group">
                        <label for="inputEmail">E-mailadres</label>
                        <input required type="email" class="form-control" name="inputEmail" placeholder="Voer je e-mailadres in">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="inputPassword">Wachtwoord</label>
                        <input required type="password" class="form-control" name="inputPassword" placeholder="Voer je wachtwoord in">
                    </div>
                    <br>
                    <button type="submit" name="inputSubmit" class="btn btn-primary" style="width:100%;">Inloggen</button>
                </form>
            </div>
        </div>
    </body>
</html>