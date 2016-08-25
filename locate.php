
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
// Define the latitude and longitude positions
var latitude = parseFloat("<?php echo $lat; ?>"); // Latitude get from above variable
var longitude = parseFloat("<?php echo $long; ?>"); // Longitude from same
var latlngPos = new google.maps.LatLng(latitude, longitude);
// Set up options for the Google map
var myOptions = {
zoom: 10,
center: latlngPos,
mapTypeId: google.maps.MapTypeId.ROADMAP,
zoomControlOptions: true,
zoomControlOptions: {
style: google.maps.ZoomControlStyle.LARGE
}
};
// Define the map
map = new google.maps.Map(document.getElementById("map"), myOptions);
// Add the marker
var marker = new google.maps.Marker({
position: latlngPos,
map: map,
title: "test"
});
});
</script>
<div id="map" style="width:450px;height:350px; margin-top:10px;"></div> // Div in which <strong>Google Map</strong> will show