<?php
class user {
	private $_db,
			$_sessionName = null,
			$_cookieName = null,
			$_data = array(),
			$_isLoggedIn = false;

	

	public function __construct($user = null) {
		$this->_db = DB::getInstance();
		
		$this->_sessionName = config::get('session/session_name');
		$this->_cookieName = config::get('remember/cookie_name');

		if(session::exists($this->_sessionName) && !$user) { //check if a session exists and show the user is logged in if they are
			$user = session::get($this->_sessionName);

			if($this->find($user)) {  //checks if user exists and grabs user data
				$this->_isLoggedIn = true;
			} else {
				$this->logout();
			}
		} else {
			$this->find($user);
		}
	}

	public function exists() {  //check if the data exists in the data array
		return (!empty($this->_data)) ? true : false; 
	}

	public function find($user = null) { //find a user by their ID and grabs the details.
		if($user) {
			$field = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->_db->get('users', array($field, '=', $user));

			if($data->count()) {
				$this->_data = $data->first();
				return true;
			}
		}
		return false;
	}

	public function create($fields = array()) {
		if(!$this->_db->insert('users', $fields)) {
			throw new exception('There was a problem creating an account.');
		}
	}

	public function update($fields = array(), $id = null) {  //updates details in DB
		if(!$id && $this->isLoggedIn()) {  //uses the current user's id
			$id = $this->data()->id;
		}
		
		if(!$this->_db->update('users', $id, $fields)) {  //
			throw new exception('There was a problem updating.');
		}
	}

	public function login($username = null, $password = null, $remember = false) {

		if(!$username && !$password && $this->exists()) {  //no username or pass word has been defined and the user exists then logg the user is using the dataID
			session::put($this->_sessionName, $this->data()->id);  //sets a session for the user
		} else {
			$user = $this->find($username);

			if($user) {  //if tick box for "remember me" has been ticket run 
				if($this->data()->password === hash::make($password, $this->data()->salt)) {
					session::put($this->_sessionName, $this->data()->id);

					if($remember) {  //stores information to remember the user using cookies
						$hash = hash::unique();  //returns unique id
						$hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));  //checks this has been stored in user session table.

						if(!$hashCheck->count()) {  
							$this->_db->insert('users_session', array(
								'user_id' => $this->data()->id,  //inserts user ID into the user_session DB
								'hash' => $hash  //inserts unique hash into user_session DB
							));
						} else {
							$hash = $hashCheck->first()->hash;
						}

						cookie::put($this->_cookieName, $hash, config::get('remember/cookie_expiry'));  //stores cookie name for the amount of time set in init.php
					}

					return true;
				}
			}
		}

		return false;
	}

	public function hasPermission($key) {  //checks users permission
		$group = $this->_db->query("SELECT * FROM groups WHERE id = ?", array($this->data()->group));  //grabs data from groups table and checks it with the group set in the users table
		
		if($group->count()) {  //check if user is in a group
			$permissions = json_decode($group->first()->permissions, true);  //decodes the permission set in the group us json_decode to convert it into a php array

			if($permissions[$key] === 1) {
				return true;
			}
		}

		return false;
	}

	public function isLoggedIn() {
		return $this->_isLoggedIn;
	}

	public function data() {
		return $this->_data;
	}

	public function logout() {
		$this->_db->delete('users_session', array('user_id', '=', $this->data()->id));  //deletes the cookie hash in the DB from user_session

		cookie::delete($this->_cookieName);  //deletes the cookie
		session::delete($this->_sessionName);  //deletes current session
	}
}

?>