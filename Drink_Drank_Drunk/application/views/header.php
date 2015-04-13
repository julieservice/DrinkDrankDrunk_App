<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Drink, Drank, Drunk | App</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/foundation.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/maincss.css" />

    <script src="<?php echo base_url(); ?>js/vendor/modernizr.js"></script>
  </head>
  <body>
    <header>
     <h2 class="hidden">Drink, Drunk, Drunk | Application</h2>

    <div class="row navContainer">

          <nav class="top-bar " data-topbar role="navigation">
            <ul class="title-area">
              <li class="name"></li>
              <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
            </ul>

            <section class="top-bar-section">
              <h2 class="hidden">Navigation</h2>
              <ul class="right">
                
                <div id="currentBAC">
                  <h2><?php echo $name; ?></h2>
                  <h2 class="BACnum">0.08</h2>
                  <p>Blood Alcohol Content</p>
                </div>

                <li><a href="<?php echo base_url(); ?>page/adddrink" class="nav"><img src="<?php echo base_url(); ?>images/beer.png" alt="beer icon" class="navIcon">Add Drink</a></li>
                <li><a href="<?php echo base_url(); ?>page/results" class="nav" id="results"><img src="<?php echo base_url(); ?>images/graph.png" alt="graph icon" class="navIcon">Results</a></li>
                <li><a href="<?php echo base_url(); ?>page/carservices" class="nav" id="carServices"><img src="<?php echo base_url(); ?>images/car.png" alt="car icon" class="navIcon">Car Services</a></li>
                <li><a href="<?php echo base_url(); ?>page/editprofile" class="nav" id="editProfile"><img src="<?php echo base_url(); ?>images/user.png" alt="user icon" class="navIcon">Edit Profile</a></li>
                <li><a href="<?php echo base_url(); ?>logout" class="nav"><img src="<?php echo base_url(); ?>images/logout.png" alt="logout icon" class="navIcon">Log Out</a></li>
              </ul>
            </section>
          </nav>

      </div>

    </header>   
  </body> 
  </html>






 