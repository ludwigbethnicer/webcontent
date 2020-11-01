<?php

	$arr=array(100,11,12,3,13,10,15);

	$temp=$arr[0];

	foreach($arr as $x) {
		if($x<$temp) {
			$temp=$x;
		}
	}

	echo "Minimum value of array = ".$temp;