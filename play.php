<?php
 
// Achtung Sicherheitsrisiko!!! man sollte Input-Werte immer validieren!!!! (wird in diesem Beispiel nicht getan)
// Daten empfangen
$id = $_POST["id"];




 
 
// Inhalt in eine Datei schreiben


//$datei_handle=fopen("log.txt",a); 
//fwrite($datei_handle, "ID: ".$id."\n");  
//fclose($datei_handle);






$verbindung = mysqli_connect("localhost", "king", "1234") or die ("Fehler im System");

mysqli_select_db($verbindung, "minefield") or die ("Keine Datenbankverbindung");


$query=mysqli_fetch_object(mysqli_query($verbindung, "SELECT * FROM `users` WHERE `User` = 1"));

$guthaben = $query->Money;
$money = $query->Bet;
$chance = $query->Chance;

    
$minesArr = explode("-",$query->CurrentGame);


if($minesArr[$id]==1){
    $response = array (   "nr"          => 1, "id" => $id);
    $final=$guthaben-$money;
    mysqli_query($verbindung, "UPDATE `users` SET `Money`= ".$final."  WHERE `User` = 1");
}else{
  $response = array (   "nr"          => 0, "id" => $id);  
    $final=$guthaben+$money*(4*$chance/100);
    mysqli_query($verbindung, "UPDATE `users` SET `Money`=".$final." WHERE `User` = 1");
}
 
// codieren der Daten
mysqli_close($verbindung);



print_r(json_encode($response));
 




?>