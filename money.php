<?php
$verbindung = mysqli_connect("localhost", "king", "1234") or die ("Fehler im System");

mysqli_select_db($verbindung, "minefield") or die ("Keine Datenbankverbindung");

$ausgabe = mysqli_query($verbindung, "SELECT `Money` FROM `users` WHERE `User` = 1");



$object = mysqli_fetch_object($ausgabe);


print_r($object->Money);

mysqli_close($verbindung);
?>