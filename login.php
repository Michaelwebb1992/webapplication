<title>D2W Embroidery & Print</title>




			<?php require 'includes/header.php'; ?>
			<?php include 'includes/nav.php'; ?>

			<div id="content" class="two-thrids columns">
				<h3>Log In</h3>

				<?php

				if(session::exists('home')) {
					echo '<p>', session::flash('home'), '</p>'; //displays message after users has register which is removed after page refresh
				}

				if(input::exists()) {
					if(token::check(input::get('token'))) {
						$user = new user();

						$remember = (input::get('remember') === 'on') ? true : false; //detects if users has ticked the remember me box
						$login = $user->login(input::get('username'), input::get('password'), $remember);

						if($login) {
							redirect::to('index.php');
						} else {
							echo '<p>Sorry, that username and password wasn\'t recognised.</p>';
						}
					}
				}

				?>

				<form action="" method="post">
					<div class="field">
						<label for="username">Username:</label>
						<input type="text" name="username" id="username">
					</div>

					<div class="field">
						<label for="password">Password:</label>
						<input type="password" name="password" id="password">
					</div>

					<div class="field">
						<label for="remember">
							<input type="checkbox" name="remember" id="remember">Remember me
						</label>
					</div>

					<input type="submit" value="Log in">
					<input type="hidden" name="token" value="<?php echo token::generate(); ?>">
				</form>

</div

<?php include 'includes/footer.php'; ?>