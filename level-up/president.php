<?php
require_once('entends.php');

class President extends Person {

	private static $president;
				  
	private function __construct( $name, $dob ) {
		// private to prevent outside instantiation 
		parent::__construct( $name, $dob );
	}
	  
	public static function inauguration( $name, $dob) {
		if ( ! isset( self::$president ) ) {
			self::$president = new President( $name, $dob );
		}

		return self::$president;
	}
}