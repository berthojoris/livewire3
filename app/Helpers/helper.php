<?php
if (! function_exists('bintang')) {
    function bintang($value) {
		if($value > 4.1) {
			$bintang = 5;
		} else if($value >= 3.61 && $value <= 4.1) {
			$bintang = 4;
		} else if($value >= 2.21 && $value <= 3.6) {
			$bintang = 3;
		} else if($value >= 1.51 && $value <= 2.2) {
			$bintang = 2;
		} else if($value <= 1.5) {
			$bintang = 1;
		} else {
			$bintang = 0;
		}

		return $bintang;
    }
}
?>