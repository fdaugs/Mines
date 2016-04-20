<?php
if(isset($_GET['runFunction']) && function_exists($_GET['runFunction']))
call_user_func($_GET['runFunction']);
else
echo "Function not found or wrong input";
init();




function init() {
    global $fieldArray;
    $fieldArray = fillMineArray(5);
    print_r($fieldArray);
  checkForMine($fieldArray,3);

    
}

function fillMineArray($mineAmount){
	$mineSet = False;
	$minesArr = array_fill(0, 25, 0);
	for ($j = 0; $j < $mineAmount; $j+= 1)
		{
		do
			{
			$rand = rand(0, 24);
			if ($minesArr[$rand] == 0)
				{
				$minesArr[$rand] = 1;
				$mineSet = True;
				}
			}

		while ($mineSet = False);
		$mineSet = False;
		}
    return $minesArr;
	}

function checkForMine($fieldArray,$index){
    return ($fieldArray[$index] == 1);
}