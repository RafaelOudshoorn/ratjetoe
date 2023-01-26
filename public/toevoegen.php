<?php
    error_reporting(0);
    include "../private/includes/head.php";
    userManager::ingeloged();
    $countrys = countryManager::selectAll();

    if(isset($_POST["toevoegenForm"])){
        $firstname = $_POST["inputFirstname"];
        $lastname = $_POST["inputLastname"];
        $email = $_POST["inputEmail"];
        if($_POST["inputPremiumMem"] != "on"){
            $premiumMem = 0;
        }else{
            $premiumMem = 1;
        }
        $country = $_POST["inputCountrys"];
        customerManager::insertNewCustomer(
            $firstname,
            $lastname,
            $email,
            $premiumMem,
            $country
        );
        header("location:.");
    }
?>
    <body>
        <div class="main-container">
            <a href="."><h1>Klant toevoegen</h1></a>
            <br>
            <form method="POST">
                <div class="form-group">
                    <label for="inputFirstname">Voornaam</label>
                    <input required type="text" class="form-control" name="inputFirstname" placeholder="Voornaam">
                </div>
                <div class="form-group">
                    <label for="inputLastname">Achternaam</label>
                    <input required type="text" class="form-control" name="inputLastname" placeholder="Achternaam">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input required type="email" class="form-control" name="inputEmail" placeholder="E-mail">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="inputPremiumMem">
                    <label class="form-check-label" for="inputPremiumMem">Premium klant</label>
                </div>
                <label for="inputCountrys">Land</label>
                <select class="form-control" name="inputCountrys">
<?php
    foreach($countrys as $country){
        echo "<option value='$country->id'>$country->name</option>";
    }
?>
                </select>
                <button type="submit" name="toevoegenForm" class="btn btn-primary">Opslaan</button>
            </form>
        </div>
    </body>
</html>