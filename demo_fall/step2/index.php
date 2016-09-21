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

    <div class="header">
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
        <td><div class="form_mode">
          <p> Would you like to use the preset buttons below, or sensor readings
          and your chosen configuration? </p><br/>
          <form name="mode_form" action="form_mode.php" method='post'>
            <input type="radio" name="mode" value="presets" checked> 
                Presets<br>
            <input type="radio" name="mode" value="sensor">
                Current readings<br><br><br>
            <input type="submit" class="button" name="mode_button" value="OK">
          </form>
        </div> <!-- form_mode --></td>

        <td><div class="form_config">
          <p> Use these options to configure your temperature and humidity tolerances.
              Please ensure that you only enter valid numbers, because I have not coded
              any error handling. Thank you for your understanding.</p><br/>
          <form name="config_form" method='post'>
            <p>It is hot when the temperature is over:
                <input type="text" name="temp_high"> degrees</p>
            <p>It is cold when the temperature is under:
                <input type="text" name="temp_low"> degrees</p>
            <p>It is humid when the humidity is over:
                <input type="text" name="hum_high"> %</p>
            <p>It is dry when the humidity is under:
                <input type="text" name="hum_low"> %</p>
            <input type="submit" class="button" name="config_button" value="OK"><br>
          </form>
  <?php
    if (isset($_POST['config_button'])) {
      echo "You are comfortable when the temperature is between " .
            $_POST['temp_low'] . " and " . $_POST['temp_high'] . ", and when
            humidity is between " . $_POST['hum_low'] . " and " . $_POST['hum_high'] .
            ".";
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
    <br><br><br>
    <p id="Hardware"></p>
    <br><br><br>
  </div> <!-- container -->

</body>

</html>
