<?php

	function altChar($num) {
		$str = '';

		for($x=1; $x<=$num; $x++) {
			$str .= ( $x % 2 == 0 ? '-' : '+' );
		}

		return $str;
	}

	echo altChar(5);