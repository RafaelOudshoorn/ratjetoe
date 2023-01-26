<?php
    include "../private/includes/head.php";
    userManager::ingeloged();
    userManager::checkIfId($_GET["id"]);
    $customer = customerManager::selectOnId($_GET["id"]);
    $countrys = countryManager::selectAll();

    if(isset($_POST["updatenForm"])){
        $firstname = $_POST["inputFirstname"];
        $lastname = $_POST["inputLastname"];
        $email = $_POST["inputEmail"];
        if($_POST["inputPremiumMem"] != "on"){
            $premiumMem = 0;
        }else{
            $premiumMem = 1;
        }
        $country = $_POST["inputCountrys"];
        customerManager::updateCustomer(
            $_GET["id"],
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
            <a href="."><h1>Klant wijzigen</h1></a>
            <br>
            <form method="POST">
                <div class="form-group">
                    <label for="inputFirstname">Voornaam</label>
                    <input required type="text" class="form-control" name="inputFirstname" value="<?php echo $customer->firstname; ?>" placeholder="Voornaam">
                </div>
                <div class="form-group">
                    <label for="inputLastname">Achternaam</label>
                    <input required type="text" class="form-control" name="inputLastname" value="<?php echo $customer->lastname; ?>" placeholder="Achternaam">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input required type="email" class="form-control" name="inputEmail" value="<?php echo $customer->email; ?>" placeholder="E-mail">
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="inputPremiumMem" <?php if($customer->premium_member == 1){echo "checked";} ?>>
                    <label class="form-check-label" for="inputPremiumMem">Premium klant</label>
                </div>
                <label for="inputCountrys">Land</label>
                <select class="form-control" name="inputCountrys">
<?php
    foreach($countrys as $country){
        if($customer->country_id != $country->id){
            echo "<option value='$country->id'>$country->name</option>";
        }else{
            echo "<option value='$country->id' selected>$country->name</option>";
        }
        
    }
?>
                </select>
                <button type="submit" name="updatenForm" class="btn btn-primary">Opslaan</button>
            </form>
        </div>
    </body>
</html>