<div id="pushDown"></div>
<section id="login">
		<h2 class="hidden">Edit Profile Form</h2>
		<h2>Edit Profile</h2>
		<p>Edit Profile settings</p>

		<?php echo form_open('profile/edit'); ?>
			<h3>First Name</h3>
			<input type="text" name="name" id="name" placeholder="First Name" value="<?php echo $name; ?>">
			<br>
			<h3>User Name</h3>
			<input type="text" name="username" id="username" placeholder="User Name" value="<?php echo $username; ?>">
			<br>
			<h3>Age</h3>
			<input type="text" name="age" id="age" placeholder="Age" value="<?php echo $age; ?>">
			<br>
			<h3>Gender</h3>
			<?php if($gender == 'female') { ?>
				<select name="gender" id="gender">
			  		<option value="female" selected>Female</option>
			  		<option value="male">Male</option>
				</select>
			<?php } if($gender == 'male') { ?>
				<select name="gender" id="gender">
			  		<option value="female">Female</option>
			  		<option value="male" selected>Male</option>
				</select>
			<?php } ?>
			<br>
			<h3>Height (cm)</h3>
			<input type="text" name="height" id="height" placeholder="Height" value="<?php echo $height; ?>">
			<br>
			<h3>Weight(lbs)</h3>
			<input type="text" name="weight" id="weight" placeholder="Weight" value="<?php echo $weight; ?>">
			<br>
			<h3>Email</h3>
			<input type="text" name="email" id="email" placeholder="E-mail" value="<?php echo $email; ?>">
			<br>
			<h3>Password</h3>
			<input type="text" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>">
			<br>

			<input id="submit" type="submit" value="Save Changes">
		</form>
	</section>