<!DOCTYPE html>
<html lang="en-US">

<head>
	<script src="onClickFunctions.js"></script>
	<link rel="stylesheet" type="text/css" href="weathers.css">
	<link rel="stylesheet" type="text/css" href="format.css">
	
  <!-- omit following line for demo -->
  <link rel="stylesheet" type="text/css" href="../navbar.css"> 
	
  <title>WeatherBox QP Fall 2016</title>

</head>

<body>
	<div class="container">
    <!-- omit following block (3 lines) for demo -->
    <div class="qpheader">
      <?php 
        include "../header.html";
        include "GLOBAL.php";
      ?>
    </div>

    <div class="header">
      <br><br>
      <img src="weatherbox_logo.png" alt="logo" />
    </div>
    <hr>

    <div class="sunrise_time">
      <?php
        date_default_timezone_set('America/Los_Angeles');
        echo "Today (" . date("m/d/y",time()) . ") sunrise for San Diego is at " .
          date_sunrise(time(), SUNFUNCS_RET_STRING, 32, -117, 90, -7);
      ?>
    </div>
    <hr>

    <table class="form_table">
      <tr>
        <td>
        
        <?php

          $db =connectMongo();
          $collection = $db->pref;
          $query = array('name' => 'mode');
          $cursor = $collection->find($query);

          $sensor_status = 'unchecked';
          $preset_status = 'unchecked';

          foreach ($cursor as $doc) {
            if ($doc['mode'] == "sensor") {
              $sensor_status = 'checked';
            } else {
              $preset_status = 'checked';
            }
        ?>
          <div class="form_mode">
            <p> Would you like to use the preset buttons below, or sensor readings
            and your chosen configuration? </p><br/>
            <form name="mode_form" action="form_mode.php" method='post'>
              <input type="radio" name="mode" value="presets" 
                  <?php echo $preset_status ?>> Presets<br>
              <input type="radio" name="mode" value="sensor"
                  <?php echo $sensor_status ?>> Current readings<br><br><br>
              <input type="submit" class="button" name="mode_button" value="OK">
            </form>
          </div> <!-- form_mode --></td>

        <?php
          }
        ?>

        <td>
         
        <?php

          if (isset($_POST['config_button'])) {
            $newdata = array(
                  'temp_high' => $_POST['temp_high'],
                  'temp_low' => $_POST['temp_low'],
                  'hum_high' => $_POST['hum_high'],
                  'hum_low' => $_POST['hum_low']
            );
          
            $db = connectMongo();
            $collection = $db->pref;
            $query = array('name' => 'thresholds');
            $collection->update($query, array('$set' => $newdata));

          }
          
          $db = connectMongo();
          $collection = $db->pref;
          $query = array('name' => 'thresholds');
          $cursor = $collection->find($query);

          foreach ($cursor as $doc) {

        ?>
          <div class="form_config">
            <p> Use these options to configure your temperature and humidity tolerances.
                Please ensure that you only enter valid numbers, because I have not coded
                any error handling. Thank you for your understanding.</p><br/>
            <form name="config_form" method='post'>
              <p>It is hot when the temperature is over:
                  <input type="text" name="temp_high"
                      value=<?php echo $doc['temp_high']; ?>> degrees</p>
              <p>It is cold when the temperature is under:
                  <input type="text" name="temp_low"
                      value=<?php echo $doc['temp_low']; ?>> degrees</p>
              <p>It is humid when the humidity is over:
                  <input type="text" name="hum_high" 
                      value=<?php echo $doc['hum_high']; ?>> %</p>
              <p>It is dry when the humidity is under:
                  <input type="text" name="hum_low"
                      value=<?php echo $doc['hum_low']; ?>> %</p>
              <input type="submit" class="button" name="config_button" value="OK"><br>
            </form>
          
          <?php
            }

            if (isset($_POST['config_button'])) {
              echo "You have successfully updated your preferences.<br>";
            }
          ?>

        </div> <!-- form_config --></td>
    </table>

    <br><br>

    <div class="weathers">
      
      <input class="weatherButton" id="Rain" type="submit" 
          onClick="Rain()" value="Rain">

      <input class="weatherButton" id="Sunrise" type="submit"
          onClick="Sunrise()" value="Sunrise">

      <input class="weatherButton" id="Thunderstorm" type="submit"
          onClick="Thunderstorm()" value="Thunderstorm">

      <input class="weatherButton" id="Fog" type="submit"
          onClick="Fog()" value="Fog">

      <input class="weatherButton" id="Sunny" type="submit"
          onClick="Sunny()" value="Sunny">

    </div> <!-- weathers -->

    <p id="Hardware"></p>
    <br><br><br>
  </div> <!-- container -->

</body>

</html>
