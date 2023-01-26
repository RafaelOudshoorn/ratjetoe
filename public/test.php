<?php
    include "database/database.php";
?>
<!DOCTYPE html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <title>test subject</title>
    </head>
    <body>
        <form method="post">
            <label for="emailInsert">Email</label>
            <input type="email" name="emailInsert">
            <label for="passwordInsert">Password</label>
            <input type="text" name="passwordInsert">
            <button type="submit" class="btn btn-danger" name="insertUser">Insert user</button>
        </form>
<?php
    // if(isset($_POST["insertUser"])){
    //     $email = $_POST["emailInsert"];
    //     $password_hash = password_hash($_POST["passwordInsert"], PASSWORD_DEFAULT);
        
    //     global $con;

    //     $query = "INSERT INTO ";
    //     $query .= "user (email, password_hash) ";
    //     $query .= "VALUES (?,?) ";

    //     $stmt = $con->prepare($query);
    //     $stmt->bindValue(1, $email);
    //     $stmt->bindValue(2, $password_hash);
    //     $stmt->execute();
    //     // echo "<script> alert('".$_POST['emailInsert']." ' + '". password_hash($_POST['passwordInsert'], PASSWORD_DEFAULT) ."');</script>";
    //     echo "<script> location.href = 'test';</script>";
    // }
?>
    </body>
</html>