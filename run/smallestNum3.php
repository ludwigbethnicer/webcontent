<?php

	function smallNumb($num) {
		$arr = array_flip($num);

		for($i=1; isset($arr[$i]);$i++);

		return $i;
	}

	echo smallNumb('7, 3, 6, 4, 8, 2');