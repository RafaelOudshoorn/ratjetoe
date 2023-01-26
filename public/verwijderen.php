<?php
    include "../private/includes/head.php";
    userManager::ingeloged();
    userManager::checkIfId($_GET["id"]);
    $customer = customerManager::selectOnId($_GET["id"]);
    if(isset($_POST["deleteCustomer"])){
        gamesManager::deleteCustomer($_GET["id"]);
        customerManager::deleteCustomer($_GET["id"]);
        header("location:.");
    }
?>
    <body>
        <div class="main-container">
            <a href="."><h1>Terug</h1></a>
            <form method="POST">
<?php
    echo "<span>Wilt u permanent ". $customer->firstname ." ". $customer->lastname ." verwijderen?</span>";
    echo "<button type='submit' name='deleteCustomer' class='btn btn-danger' style='margin-left:10px;'><span>Click</span></button>";
?>
            </form>
        </div>
    </body>
</html>