<!-- // hide script from old browsers

var hardwareMsg = "Hardware is establishing conditions for ";

function set(image) {
  document.body.style.backgroundImage = image;
  document.getElementsByClassName("form_table")[0].style.backgroundColor = 
      "rgba(135, 135, 135, 0.5)";
}

function Rain() {
  document.body.style.backgroundSize = "contain";
	set("url('weatherbox_rain.jpg') ");
}

function Sunrise() {
  document.body.style.backgroundSize = "cover";
	set("url('weatherbox_sunrise.jpg')");
}

function Thunderstorm() {
  document.body.style.backgroundSize = "cover";
	set("url('weatherbox_thunderstorm.jpg')");
}

function Fog() {
  document.body.style.backgroundSize = "cover";
	set("url('weatherbox_fog.jpg')");
}

function Sunny() {
  document.body.style.backgroundSize = "cover";
	set("url('weatherbox_sunny.jpg')");
}
// end hiding script from old browsers -->
