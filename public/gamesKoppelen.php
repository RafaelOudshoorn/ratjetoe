<?php
    include "../private/includes/head.php";
    userManager::ingeloged();
    userManager::checkIfId($_GET["id"]);
    $customer = customerManager::selectOnId($_GET["id"]);
    $allGames = gamesManager::selectAll();
    $customerGames = gamesManager::selectOnId($_GET["id"]);

    if(isset($_POST["addGame"])){
        if(!isset($_POST["inputGame"])){
            echo "<script> window.location.href = 'gamesKoppelen?id=".$_GET['id']."' </script>";
        }else{
            gamesManager::insertGameWithCustomer($_GET["id"], $_POST["inputGame"]);
            echo "<script> window.location.href = 'gamesKoppelen?id=".$_GET['id']."' </script>";
        }
    }
?>
    <body>
        <div class="main-container">
            <a href="."><h1><?php echo $customer->firstname ." ". $customer->lastname;?></h1></a>
            <br>
            <form method="POST">
                <label for="inputGame">Games</label>
                <select class="form-control" name="inputGame">
<?php
    foreach($allGames as $game){
        $customerGame = gamesManager::customer_games($_GET["id"], $game->id);
        if($customerGame->game_id == $game->id){
            
        }else{
            echo "<option value='$game->id'>$game->name ($game->platform)</option>";
        }
        
    }
?>
                </select>
                <button type="submit" name="addGame" class="btn btn-primary">Game Toevoegen</button>
            </form>
            <br>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Naam</th>
                        <th>Platform</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
<?php
    foreach($customerGames as $cg){
        $platform = gamesManager::selectPlatform($cg->platform_id);
        echo "<tr>";
            echo "<td>$cg->name</td>";
            echo "<td>$platform->name</td>";
            echo "<td>";
                echo "<form method='POST'>";
                    echo "<button type='submit' name='delete" . $cg->platform_id . $cg->game_id . $cg->platform_id . "' class='btn btn-danger'>X</button>";
                echo "</form>";
            echo "</td>";
        echo "</tr>";
        if(isset($_POST["delete" . $cg->platform_id . $cg->game_id . $cg->platform_id])){
            gamesManager::deleteForCustomer($cg->id);
            echo "<script> window.location.href = 'gamesKoppelen?id=".$_GET['id']."' </script>";
        }
    }
?>
                </tbody>
            </table>
        </div>
    </body>
</html>