<?php
class token {

	public static function generate() {
		return session::put('token', md5(uniqid()));
	}

	public static function check($token) {
		$tokenName = config::get('session/token_name');  //checks the input token and session toke are the same
		
		if(session::exists($tokenName) && $token === session::get($tokenName)) { //checks if the generate token match the session CSRF token
			session::delete($tokenName);
			return true;
		}
		
		return false;
	}
}

?>