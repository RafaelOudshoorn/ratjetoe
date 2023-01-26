<?php
    $con = new PDO("mysql:host=localhost;dbname=ratjetoe;charset=utf8","root","");
    // $con = new PDO("mysql:host=localhost;dbname=s_557283_db2","s_557283","dMuBp");

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>