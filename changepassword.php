<title>D2W Embroidery & Print</title>




			<?php require 'includes/header.php'; ?>
			<?php include 'includes/nav.php'; ?>

			<div id="content" class="two-thrids columns">
				<?php

				$user = new user();

				if(!$user->isLoggedIn()) {  //if user not logged in direct ti index/php
					redirect::to('index.php');
				}

				if(input::exists()) {  
					if(token::check(input::get('token'))) {  //checks token matches the one make by the form
						$validate = new validate();
						$validation = $validate->check($_POST, array(  //checks post data validation
							'password_current' => array(
								'required' => true,
								'min' => 8
								),
							'password_new' => array(
								'required' => true,
								'min' => 8
								),
							'password_new_again' => array(
								'required' => true,
								'min' => 8,
								'matches' => 'password_new'
								)
						));

						if($validation->passed()) {
							if(hash::make(input::get('password_current'), $user->data()->salt) !== $user->data()->password) {  //makes a hash from the current password and checks it's the same as the users current password
								echo 'Your current password is wrong.';
							} else {  
								try {
									
									$salt = hash::salt(32);	//new salt 

									$user->update(array(  //updates the password and salt
										'password' => hash::make(input::get('password_new'), $salt),  //makes hash from the new password
										'salt' => $salt
									));
									
									session::flash('home', 'Your password has been changed!');
									redirect::to('index.php');

								} catch(exception $e) {
									die($e->getMessage());
								}
							}
						} else {
							foreach($validate->errors() as $error) {
								echo $error, '<br>';  //display the error depending on the section on the form that wasn't passed
							}
						}
					}
				}
				?>

				<form action="" method="post">
					<div class="field">
						<label for="password_current">Current password:</label>
						<input type="password" name="password_current" id="password_current">
					</div>
					
					<div class="field">
					<label for="password_new">New password:</label>
						<input type="password" name="password_new" id="password_new">
					</div>

					<div class="field">
						<label for="password_new_again">Comfirm new password:</label>
						<input type="password" name="password_new_again" id="password_new_again">
					</div>

					<input type="submit" value="Change">
					<input type="hidden" name="token" value="<?php echo token::generate(); ?>">
				</form>
			</div>
			
			<?php include 'includes/footer.php'; ?>

