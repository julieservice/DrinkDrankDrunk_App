<div id="pushDown"></div>
<a href="<?php echo base_url(); ?>page/adddrink"><img src="<?php echo base_url(); ?>images/arrow.png" alt="back arrow" class="arrow"></a>

<h2><?php echo $type['drinktype']; ?> List</h2>
	<p>Choose from the list of popular <span class="lowercase"><?php echo $type['drinktype']; ?></span></p>

<section id="drinkOptions">
	<?php foreach($drinks as $row) { ?>
		<a href="<?php echo base_url(); ?>drinks/addToSession/<?php echo $row['drink_id']; ?>"><div class="bars"><p><?php echo $row['title']; ?></p></div></a>
	<?php } ?>
</section>