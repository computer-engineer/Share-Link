<?php
class base58
{
	static public $alphabet = "123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";
	public static function encode($int) {
		$base58_string = "";
		$base = strlen(self::$alphabet);
		while($int >= $base) {
			$div =(int) floor($int / $base);
			$mod =(int) ($int - ($base * $div)); // php's % is broke with >32bit int on 32bit proc
			$base58_string = self::$alphabet{$mod} . $base58_string;
			$int = $div;
		}
		if($int) $base58_string = self::$alphabet{$int} . $base58_string;
		return $base58_string;
	}
	
	public static function decode($base58) {
		$int_val = 0;
		for($i=strlen($base58)-1,$j=1,$base=strlen(self::$alphabet);$i>=0;$i--,$j*=$base) {
			$int_val += $j * strpos(self::$alphabet, $base58{$i});
		}
		return $int_val;
	}
}