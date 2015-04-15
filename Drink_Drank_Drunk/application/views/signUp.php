<div id="pushDown"></div>
<section id="login">
		<h2 class="hidden">Register Form</h2>
		<h3>Sign up for Drink, Drank, Drunk!</h3>

		<?php
			if($error == TRUE) {
				echo $user_error;
			} 
		?>

		<?php echo validation_errors();?>

		<?php echo form_open('pages/register',array('id'=>'registerForm'));?>
			<br>
			<h3>First Name</h3>
			<input type="text" name="name" id="name" placeholder="First Name" value="<?=!form_error('name')?set_value('name'):''?>">
			<h3>User Name</h3>
			<input type="text" name="uname" id="uname" placeholder="User Name" value="<?=!form_error('uname')?set_value('uname'):''?>">
			
			<h3>Age</h3>
			<input type="text" name="age" id="age" placeholder="Age" value="<?=!form_error('age')?set_value('age'):''?>">
			<h3>Gender</h3>
			<select name="gender" id="gender">
					<option value="Male">Male</option>
				 	<option value="Female">Female</option>
			</select>
			<h3>Height (cm)</h3>
			<input type="text" name="height" id="height" placeholder="Height" value="<?=!form_error('height')?set_value('height'):''?>">
			<h3>Weight (lbs)</h3>
			<input type="text" name="weight" id="weight" placeholder="Weight" value="<?=!form_error('weight')?set_value('weight'):''?>">
			<h3>E-mail</h3>
			<input type="text" name="email" id="email" placeholder="E-mail" value="<?=!form_error('email')?set_value('email'):''?>">
			<h3>Password</h3>
			<input type="text" name="password" id="password" placeholder="Password" value="<?=!form_error('password')?set_value('password'):''?>">


			<input id="submit" type="submit" value="Sign Up">
		</form>
		<br>
		<a href="<?php echo base_url(); ?>login"><p>Back to Log in!</p></a>
	</section>