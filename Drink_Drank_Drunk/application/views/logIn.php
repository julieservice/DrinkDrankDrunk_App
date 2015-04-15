<div id="pushDown"></div>
<img src="images/DDD_logo.svg" alt="Logo" width="500px" id="logoImg">
<h2>Sponsered by Diamondz DD</h2>
<section id="login">
	<h2>Login</h2>
	<?php
		if($error == TRUE) {
			echo $user_error;
		} 
	?>

	<?php echo validation_errors();?>

	<?php echo form_open('login'); ?>

		<input type="text" name="username" placeholder="User Name:">
		<br>
		<input type="password" name="password" placeholder="Password:">
		<br>
		<input id="submit" type="submit" value="Submit">
	</form>
	<p>New User?</p>
	<a href="<?php echo base_url(); ?>signup"><p>Sign up!</p></a>

	<p class="warning">This conversion is not completely accurate and should be used at your own risk.</p>

</section>