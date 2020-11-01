<?php

	function solution($num) {
		$arr = [];
		$size = $num;

		for($i=0; $i < $size/2; $i++) {
			$arr[$i] = ($i+1)*-1;
		}

		if($num%2!=0) {
			for($i = $size /2; $i < $size; $i++) {
				$arr[$i] = $i - ($size/2);
			}
		} else {
			for($i = $size /2; $i < $size; $i++) {
				$arr[$i] = $i - (($size/2)-1);
			}
		}

		echo json_encode($arr);
	}

	echo solution(5);