  <script src="<?php echo base_url(); ?>js/chart.js"></script>

<div id="txtHint"></div>

<div id="pushDown"></div>
<h2>Results</h2>
<p>View current BAC</p>
<section id="currentBAC">
	<h2 class="number">
    <?php 
      $numItems = count($currBAC);
      if($numItems == 0) {
        echo "0";
        $message = " ";
        $submessage = " ";
      }
      $i = 0;
      foreach($currBAC as $row) {
        if(++$i === $numItems) {

          echo $row['CurrentBAC'];

          if($row['CurrentBAC'] < 0.08 && $row['CurrentBAC'] > 0) {
            $message = "Not legally Intoxicated";
            $submessage = "0";
          }
          if($row['CurrentBAC'] >= 0.02) {
            $message = "Not legally Intoxicated";
            $submessage = "Relaxation occurs";
          } 

          if($row['CurrentBAC'] >= 0.04) {
            $message = "Not legally Intoxicated";
            $submessage = "Relaxation occurs";
          } 
          if($row['CurrentBAC'] >= 0.06) {
            $message = "Not legally Intoxicated";
            $submessage = "Judgement is somewhat impaired";
          } 
          if($row['CurrentBAC'] >= 0.08) {
            $message = "Legally Intoxicated";
            $submessage = "Coordination is Impaired";
          } 
          if($row['CurrentBAC'] >= 0.10) {
            $message = "Intoxicated";
            $submessage = "Reaction Time is Impaired";
          }
          if($row['CurrentBAC'] >= 0.2) {
            $message = "Intoxicated";
            $submessage = "Blackout is possible";
          }
          if($row['CurrentBAC'] >= 0.3) {
            $message = "Intoxicated";
            $submessage = "Loss of Consciousness";
          }
          if($row['CurrentBAC'] >= 0.4) {
            $message = "Intoxicated";
            $submessage = "Death is possible";
          }

          

        }
      }
    ?>
  </h2>
	<p class="baclabel">Current Blood Alcohol Content</p>
	<h2><?php echo $message ?></h2>
    <p class="submessage"><?php echo $submessage ?></p>

</section>



<!-- Result Chart based off js values-->
<div class="chart">
			<div>
			<canvas id="canvas" height="450" width="600"></canvas>
			</div>
		</div>
<div id="pushDown"></div>


<!-- Recent Drinks consumed -->
<h2>Drinks Consumed</h2>

<?php foreach($dinfo as $row){ ?>
<p><?php echo $row['title']; ?></p>
<?php } ?>

<div id="txtHint"></div>


<form class="hidden" method="post" name="bacform" id="bacform">
      <div align="center"><center>
       
          <td align="center">Gender</td>
          <td align="center"><input type="text" name="gender" size="6" value="'<?php foreach($oz as $result) {echo $gender;} ?>'"></td>
          <td align="center">Percent Alcohol</td>
          <td align="center"><input type="text" name="percent" size="6"value="<?php foreach($percent as $result) {echo round($result, 3);} ?>"></td>
       
          <td align="center">Your Weight (Lbs)</td>
          <td align="center"><input id="weight" type="text" name="weight" size="6" value="<?php echo $weight; ?>"></td>
          <td align="center">Hours Consuming Drink</td>
          <td align="center"><input type="text" name="hours" size="6"></td>
       
          <td colspan="4" align="center"><input type="button" name="bac"
          value="Calculate Your BAC %"</td>
        
          <td align="center">BAC Percentage</td>
          <td colspan="3" align="center"><input type="text" name="bacamount" size="21"></td>
        
          <td align="center">BAC Analysis</td>
          <td colspan="3" align="center"><textarea name="message" rows="7" cols="35" wrap="virtual"></textarea></td>
        
      </center></div>
    </form>

    <script src="<?php echo base_url(); ?>js/drinkCalculation.js"></script>
