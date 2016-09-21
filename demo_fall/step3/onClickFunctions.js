<!-- // hide script from old browsers

var hardwareMsg = "Hardware is establishing conditions for ";

function setMsg(text, image) {
	document.getElementById("Hardware").innerHTML = text;
  document.body.style.backgroundImage = image;
  document.getElementsByClassName("form_table")[0].style.backgroundColor = 
      "rgba(135, 135, 135, 0.5)";
}

function Rain() {
  document.body.style.backgroundSize = "contain";
	setMsg(hardwareMsg + "rain.","url('weatherbox_rain.jpg') ");
}

function Sunrise() {
  document.body.style.backgroundSize = "cover";
	setMsg(hardwareMsg + "sunrise.", "url('weatherbox_sunrise.jpg')");
}

function Thunderstorm() {
  document.body.style.backgroundSize = "cover";
	setMsg(hardwareMsg + "a thunderstorm.", "url('weatherbox_thunderstorm.jpg')");
}

function Fog() {
  document.body.style.backgroundSize = "cover";
	setMsg(hardwareMsg + "fog.", "url('weatherbox_fog.jpg')");
}

function Sunny() {
  document.body.style.backgroundSize = "cover";
	setMsg(hardwareMsg + "a sunny day.", "url('weatherbox_sunny.jpg')");
}
// end hiding script from old browsers -->
