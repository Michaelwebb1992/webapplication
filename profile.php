<title>D2W Embroidery & Print</title>




			<?php require 'includes/header.php'; ?>
			<?php include 'includes/nav.php'; ?>

			<div id="content" class="thirteen columns">
				<?php

				$user = new user();

				if(session::exists('home')) {
					echo '<p>', session::flash('home'), '</p>'; //displays message after users has register which is removed after page refresh
				}

				if(!$username = input::get('user')) {  //checks if user name is not supplied
					redirect::to('index.php');
				} else {
					$user = new user($username);

					if(!$user->exists()) {
						redirect::to(404);
					} else {
						$data = $user->data();  //returns the data stored
					}
					?>

					<h3><?php echo escape($data->username); ?></h3>
					<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); //displays users username grabbed from DB ?>"><?php echo escape($user->data()->username); ?></a>!</p> 
					<p>Full name: <?php echo escape($data->name); ?></p>
					<ul>
						<li><a href="logout.php">Log out</a></li>
						<li><a href="changepassword.php">Change password</a></li>
						<li><a href="update.php">Update details</a></li>
					</ul>
					

					<?php
				}
				?>
			</div>
			
			<?php include 'includes/footer.php'; ?>