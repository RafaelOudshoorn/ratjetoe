<?php
    include "../private/includes/head.php";
    userManager::ingeloged();
    userManager::checkIfId($_GET["id"]);
    $customer = customerManager::selectOnId($_GET["id"]);
    $games = gamesManager::selectOnId($_GET["id"]);
    $mailMsg = "<div style='background:#FFF;'>";
        $mailMsg .= "<h1>Ratjetoe Games</h1>";
        $mailMsg .= "<p>Geachte $customer->firstname $customer->lastname,</p><br>";
        $mailMsg .= "<p>Deze mail bevat alle titels van spellen die u in bezit heeft:</p></br></br>";
        foreach($games as $game){
            $platform = gamesManager::selectPlatform($game->platform_id);
            $mailMsg .= "<p style='font-weight:bold;'>$game->name ($platform->name)</p>";
        }
        $mailMsg .= "</br><p>Met vriendelijke groet, </br> Ratjetoe</p>";
    $mailMsg .= "</div>";
    if(isset($_POST["mailCustomer"])){
        mailManager::sendEmail($mailMsg, $customer->email);
        echo "mail is verstuurt ";
        echo "<a href='.'>ga terug</a>";
        exit;
    }
?>
    <body>
        <div class="main-container">
            <a href="."><h1>Terug</h1></a>
            <form method="POST">
<?php
    echo "<span>Een mail staat klaar om gestuurt te worden naar ".$customer->email."</span>";
    echo "<button type='submit' name='mailCustomer' class='btn btn-danger' style='margin-left:10px;'><span>Verstuur</span></button>";
?>
            </form>
        </div>
    </body>
</html>