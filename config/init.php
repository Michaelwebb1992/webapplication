<?php
session_start();
ob_start();

require_once 'config.php';

$GLOBALS['config'] = array( //establishes connection to DB using OOphp
	'mysql' => array(
		'host' => 'host',
		'username' => 'username',
		'password' => 'password',
		'db' => 'db'
	),
	'remember' => array(
		'cookie_name'	=> 'hash',
		'cookie_expiry' =>  604800 //sets expire time to 1 week (value in seconds)
	),
	'session' => array(
		'session_name'	=> 'user',
		'token_name'	=> 'token'
	)
);

function __autoload($class) { //autoloads all classes in the classes folder
	require_once 'classes/' . $class . '.php';
}
//spl_autoload_register('autoload');

require_once 'functions/sanitize.php';

if(cookie::exists(config::get('remember/cookie_name'))) {  //checks if the cookie exists on the users computer
	$hash = cookie::get(config::get('remember/cookie_name'));  //gets the cookie from the config
	$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));  //checks if the cookies actually exists in the user_session DB and checks if it's the same as the hash grabbed

	if($hashCheck->count()) {
		$user = new user($hashCheck->first()->user_id);  //user id stored along side the has
		$user->login();
	}

}

$mysqli_conn = new mysqli($db['hostname'],$db['username'],$db['password'], $db['database']); //connects to the DB
		if ($mysqli_conn -> connect_errno) {//check the connection
			print "Failed to connect to MySQL: (" . $mysqli_conn -> connect_errno . ") " . $mysqli_conn -> connect_error;
		}

?>
