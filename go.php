<?php
$mines = $_POST["mines"];
$money = $_POST["money"];




$verbindung = mysqli_connect("localhost", "king", "1234") or die ("Fehler im System");

mysqli_select_db($verbindung, "minefield") or die ("Keine Datenbankverbindung");

$query=mysqli_fetch_object(mysqli_query($verbindung, "SELECT `Money` FROM `users` WHERE `User` = 1"));
$guthaben=$query->Money;


if($money>$guthaben){
    print_r("false");
}else{




function fillMineArray($mineAmount){
$minesArr = array_fill(0, 25, 0);
    for ($j = 0; $j <$mineAmount; $j+= 1)
		{
		$minesArr[$j]=1;
		}
    shuffle($minesArr);
    return $minesArr;
}
    
$minesArr=fillMineArray($mines);



$final=implode("-",$minesArr);

mysqli_query($verbindung, "UPDATE `users` SET `CurrentGame`= '".$final."'  WHERE `User` = 1");
mysqli_query($verbindung, "UPDATE `users` SET `Bet`= ".$money."  WHERE `User` = 1");
mysqli_query($verbindung, "UPDATE `users` SET `Chance`= ".$mines."  WHERE `User` = 1");


mysqli_close($verbindung);

print_r("true");

}
    
?>