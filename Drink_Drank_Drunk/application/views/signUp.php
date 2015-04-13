<div id="pushDown"></div>
<section id="login">
		<h2 class="hidden">Register Form</h2>
		<h3>Sign up for Drunk, Drank, Drunk!</h3>
		
		<?php echo form_open('pages/register',array('id'=>'registerForm'));?>
			<br>
			<h3>First Name</h3>
			<input type="text" name="fname" id="fname" placeholder="First Name">
			
			<h3>Age</h3>
			<input type="text" name="age" id="age" placeholder="Age">
			<h3>Gender</h3>
			<input type="text" name="gender" id="gender" placeholder="Gender">
			<h3>Height</h3>
			<input type="text" name="height" id="height" placeholder="Height">
			<h3>Weight</h3>
			<input type="text" name="weight" id="weight" placeholder="Weight">
			<h3>E-mail</h3>
			<input type="text" name="email" id="email" placeholder="E-mail">
			<h3>Password</h3>
			<input type="text" name="password" id="password" placeholder="Password">


			<input id="submit" type="submit" value="Sign Up">
		</form>
	</section>