<title>D2W Embroidery & Print</title>




			<?php require 'includes/header.php'; ?>
			<?php include 'includes/nav.php'; ?>
			<div id="content" class="two-thrids columns">
				<h3>Register</h3>

				<?php

				if(input::exists()) {

					if(token::check(input::get('token'))) {
						$validate = new validate();
						$validation = $validate->check($_POST, array( //define rules for the fields
							'username' => array(
								'required' => true,
								'min' => 2,
								'max' => 20,
								'unique' => 'users' //checks users table to ensure not a duplicate
								),
							'password' => array(
								'required' => true,
								'min' => 8
								),
							'password_again' => array(
								'required' => true,
								'matches' => 'password'
								),
							'name' => array(
								'required' => false,
								'min' => 2,
								'max' => 50
								)
						));

						if($validation->passed()) {
							$user = new user();

							$salt = hash::salt(32);

							try {
								$user->create(array(
									'username' 	=> input::get('username'),
									'password' 	=> hash::make(input::get('password'), $salt),
									'salt'		=> $salt,
									'name' 		=> input::get('name'),
									'joined'	=> date('Y-m-d H:i:s'),
									'group'		=> 1
								));

								session::flash('home', 'You have been registered and can now log in!');
								redirect::to('login.php');

							} catch(exception $e) {
								die($e->getMessage());
							}

						} else {
							foreach($validate->errors() as $error) {
								echo $error, '<br>';
							}
						}
					}
				}
				?>

				<form action="" method="post">
					
					<div class="field">
						<label for="username">Username:</label>
						<input type="text" name="username" id="username" value="<?php echo escape(input::get('username')); ?>">
					</div>

					<div class="field">
						<label for="password">Choose a Password:</label>
						<input type="password" name="password" id="password">
					</div>

					<div class="field">
						<label for="password_again">Confirm Password:</label>
						<input type="password" name="password_again" id="password_again">
					</div>

					<div class="field">
						<label for="name">Name:</label>
						<input type="text" name="name" id="name" value="<?php echo escape(input::get('name')); ?>">
					</div>

					<input type="submit" value="Register">
					<input type="hidden" name="token" value="<?php echo token::generate(); ?>">
				</form>

</div>

<?php include 'includes/footer.php'; ?>