<?php

$a=0;
foreach ($arene as $i) {
	$a=$a+1;
	if($i['type']=="sol"){
		echo "_";
	}else{
		echo"x";
	}	
	if($a==15){
	echo "<br>";
	$a=0;
	}
}


?>