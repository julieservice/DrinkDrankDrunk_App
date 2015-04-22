<div id="pushDown"></div>
<a href="<?php echo base_url(); ?>page/adddrink"><img src="<?php echo base_url(); ?>images/arrow.png" alt="back arrow" class="arrow"></a>
<h2> Other Drink</h2>
<p>Enter in your own custom drinks here</p>

<!--Calls to drinks controller, addotherDrink function for form validation rules -->
<?php echo form_open('drinks/addOtherDrink',array('id'=>'drinkForm'));?>
	<h3>Drink Name</h3>
	<input type="text" name="dname" id="dname" placeholder="Drink Name">
	<br><br>
	<h3>Quantity (ml)</h3>
	<input type="text" name="quantity" id="quantity" placeholder="Quantity (ml)">
	<br><br>
	<h3>Alochol Percent %</h3>
	<input type="text" name="apercent" id="apercent" placeholder="Alcohol Percent">
	<br><br>
	<h3>Alochol Type</h3>
	<select name="type" id="type">
		  <option value="1">Beer</option>
		  <option value="2">Wine</option>
		  <option value="3">Shot</option>
		  <option value="4">Martini</option>
		  <option value="5">Mixed Drink</option>
		  <option value="6">Cooler</option>
	</select>
	<input id="submit" type="submit" value="Add Drink">
</form>
