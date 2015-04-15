<div id="pushDown"></div>
<h2>Car Services</h2>
<p>Choose from Local Car Services</p>
<section class="carServices">

<div id="carOptions">
	<p"<?php echo base_url(); ?>"><div class="sponsorService"><p>Diamondz DD <br> 519-457-9700<p></div></p>
	<?php foreach($services as $row) { ?>
		<p class="<?php echo $row['service_id'];?>"><div class="bars services"><p><?php echo $row['service_name'];?></p></div></p>
		<p class="<?php echo $row['service_id'];?>"><div class="bars servicedetails"><p><?php echo $row['service_phonenumber'];?></p></div></p>
		
	<?php } ?>

<!-- need to change from show all to show indivdual ones-->
	

</div>
</section>
<script src="<?php echo base_url(); ?>js/serviceDetails.js"></script>