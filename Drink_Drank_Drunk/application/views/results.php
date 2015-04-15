 <script src="<?php echo base_url(); ?>js/drinkCalculate.js"></script>
  <script src="<?php echo base_url(); ?>js/chart.js"></script>

<div id="pushDown"></div>
<h2>Results</h2>
<p>View current BAC</p>
<section id="currentBAC">
	<h2 class="number">0.08</h2>
	<p>Current Blood Alcohol Content</p>
	<h2>Legally Impaired</h2>
</section>
<!--<img src="<?php echo base_url(); ?>images/graph.jpg" alt="temp chart" id="">-->


<!-- Result Chart based off js values-->
<div class="chart">
			<div>
			<canvas id="canvas" height="450" width="600"></canvas>
			</div>
		</div>


<!-- Recent Drinks consumed -->
<h2>Drinks Consumed</h2>
<p> 11:45 : 1 Jagerbomb</p>
<p> 11:45 : 1 Jagerbomb</p>
<p> 11:45 : 1 Jagerbomb</p>
<p> 11:45 : 1 Jagerbomb</p>




<form method="post" name="bacform">
      <div align="center"><center>
       
          <td align="center">Fluid Ounces Consumed </td>
          <td align="center"><input type="text" name="ounces" size="6"></td>
          <td align="center">Percent Alcohol</td>
          <td align="center"><input type="text" name="percent" size="6"></td>
       
          <td align="center">Your Weight (Lbs)</td>
          <td align="center"><input id="weight" type="text" name="weight" size="6" value="<?php echo $weight; ?>"></td>
          <td align="center">Hours Consuming Drink</td>
          <td align="center"><input type="text" name="hours" size="6"></td>
       
          <td colspan="4" align="center"><input type="button" name="bac"
          value="Calculate Your BAC %" onClick="javascript:solveBAC(this.form)"></td>
        
          <td align="center">BAC Percentage</td>
          <td colspan="3" align="center"><input type="text" name="bacamount" size="21"></td>
        
          <td align="center">BAC Analysis</td>
          <td colspan="3" align="center"><textarea name="message" rows="7" cols="35" wrap="virtual"></textarea></td>
        
      </center></div>
    </form>

