<div id="pushDown"></div>
<h2>Car Services</h2>

<p>Choose from Local Car Services</p>
<h2>London, ON</h2>
<section class="carServices">

<div id="carOptions">
	<p"<?php echo base_url(); ?>"><div class="sponsorService"><p>Diamondz DD <br> 519-457-9700<p></div></p>
	<?php foreach($services as $row) { ?>
		<p><div class="bars services service<?php echo $row['service_id']; ?>" onclick="showByID('<?php echo $row['service_id']; ?>')"><p><?php echo $row['service_name'];?></p></div></p>
		<p><div class="bars servicedetails detail<?php echo $row['service_id']; ?>"><p><?php echo $row['service_phonenumber'];?></p></div></p>
		
	<?php } ?>

<!-- need to change from show all to show indivdual ones-->
	

</div>
</section>
<script src="<?php echo base_url(); ?>js/serviceDetails.js"></script>