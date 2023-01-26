<?php
    include "../private/includes/head.php";
    userManager::ingeloged();
    $customers = customerManager::tableSelect();
?>
    <body class="p-3">
        <h1>Klanten</h1>
        <a href="toevoegen" class="btn btn-primary toevoegenKnop">+ Toevoegen</a>
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Premium</th>
                    <th>Land</th>
                    <th>Aantal Games</th>
                    <th style="width:150px;"></th>
                </tr>
            </thead>
            <tbody class="table-striped">
<?php
    foreach($customers as $cus){
        echo "<tr>";
            echo "<td>$cus->firstname</td>";
            echo "<td>$cus->lastname</td>";
            echo "<td>$cus->email</td>";
            echo "<td>$cus->premium_member</td>";
            echo "<td>$cus->country</td>";
            echo "<td>$cus->games_count</td>";
            echo "<td>";
                echo "<div class='dropdown'>";
                    echo "<button class='btn btn-secondary dropdown-toggle btn-info' type='button' data-bs-toggle='dropdown' aria-expanded='false'>Options</button>";
                    echo "<ul class='dropdown-menu'>";
                        echo "<li><a class='dropdown-item' href='wijzigen?id=$cus->id'>klant Wijzigen</a></li>";
                        echo "<li><a class='dropdown-item' href='verwijderen?id=$cus->id'>klant verwijderen</a></li>";
                        echo "<li><a class='dropdown-item' href='gamesKoppelen?id=$cus->id'>Mijn games</a></li>";
                        echo "<li><a class='dropdown-item' href='mail?id=$cus->id'>E-mail versturen</a></li>";
                    echo "</ul>";
                echo "</div>";
            echo "</td>";
        echo "</tr>";
    }
?>
            </tbody>
        </table>
    </body>