<div id="pushDown"></div>
<h2>Car Services</h2>
<p>Choose from Local Car Services</p>
<section class="carServices">

<div id="carOptions">

	<?php foreach($alltypes as $row) { ?>
		<a href="<?php echo base_url(); ?>type/<?php echo $row['service_id'];?>"><div class="bars"><p><?php echo $row['carservice'];?></p></div></a>
	<?php } ?>


	<!--<a href="<?php echo base_url(); ?>"><div class="sponsorService"><p>Diamondz DD<p></div></a>

	<a href="<?php echo base_url(); ?>"><div class="bars"><p>AboutTown<p></div></a>
	<a href="<?php echo base_url(); ?>"><div class="bars"><p>Checker<p></div></a>
	<a href="<?php echo base_url(); ?>"><div class="bars"><p>Green Taxi<p></div></a>
	<a href="<?php echo base_url(); ?>"><div class="bars"><p>Robert Q<p></div></a>
	<a href="<?php echo base_url(); ?>"><div class="bars"><p>Yellow Taxi<p></div></a>
	<a href="<?php echo base_url(); ?>"><div class="bars"><p>London Taxi<p></div></a>
	<a href="<?php echo base_url(); ?>"><div class="bars"><p>Yellow and Black Taxi<p></div></a>
-->
</div>
</section>