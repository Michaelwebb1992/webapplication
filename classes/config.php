<?php
class config {
	public static function get($path = null) {
		if($path) {
			$config = $GLOBALS['config'];
			$path = explode('/', $path);

			foreach($path as $bit) {
				if(isset($config[$bit])) {
					$config = $config[$bit]; //sets the config to the bit that i want to extract
				}
			}

			return $config;
		}

		return false;
	}
}

?>