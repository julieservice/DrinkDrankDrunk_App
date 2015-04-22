<div id="pushDown"></div>
<h2>Add Drink</h2>
<p>Add Drinks throughout the night to calculate your BAC</p>
<div id="pushDown"></div>
<section id="recentDrinks">
<h3>Recent Drinks</h3>
<?php foreach($dinfo as $row){ ?>
<a href="<?php echo base_url(); ?>drinks/addToSession/<?php echo $row['drink_id']; ?>"><?php echo $row['title']; ?></p></a>
<?php } ?>
</section>
<div id="pushDown"></div>

<section id="drinkOptions">
	<?php foreach($alltypes as $row) { ?>
		<a href="<?php echo base_url(); ?>type/<?php echo $row['drinktype_id'];?>"><div class="bars"><p><?php echo $row['drinktype'];?></p></div></a>
	<?php } ?>
	<a href="<?php echo base_url(); ?>page/drinkother" ><div class="bars"><p>Other</p></div></a>
</section>
	
