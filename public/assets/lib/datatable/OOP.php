<?php 
	class Test{
		private $x=20;
		private $y;

		public static function sum($x,$y){
			return $x;

		}
	}

	$obj = new Test();
	echo Test::sum(10,11);
 ?>