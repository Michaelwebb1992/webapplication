<title>D2W Embroidery & Print</title>




			<?php require 'includes/header.php'; ?>
			<?php include 'includes/nav.php'; ?>

			<div id="content" class="two-thrids columns">
				<?php

				$user = new user();

				if(!$user->isLoggedIn()) {  //if users not logged in redirect user to index.php
					redirect::to('index.php');
				}

				if(input::exists()) {  
					if(token::check(input::get('token'))) {  //checks the token is the same as the seesion
						$validate = new validate();
						$validation = $validate->check($_POST, array(  //same validation as the user registration form
							'name' => array(
								'required' => true,
								'min' => 2,
								'max' => 50
								)
						));

						if($validation->passed()) {  //checks if validation is passed

							try {
								$user->update(array(  //calls update method
									'name' => input::get('name')
								));
							} catch(exception $e) {
								die($e->getMessage());  //error if database fails
							}

							session::flash('home', 'Your details have been updated.');  
							redirect::to('profile.php');
						} else {
							foreach($validate->errors() as $error) {
								echo $error, '<br>';  //if not display error
							}
						}
					}
				}

				?>

				<form action="" method="post">
					<label for="name">Name:</label>
					<input type="text" name="name" id="name" value="<?php echo escape($user->data()->name); //puts users current name in the text box ?>">
					<br>
					<input type="submit" value="Update">
					<input type="hidden" name="token" value="<?php echo token::generate(); ?>">
				</form>
			</div>
			
			<?php include 'includes/footer.php'; ?>

