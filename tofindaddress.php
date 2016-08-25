<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<?php
include 'connection.php';
$i=0;
$adrs_echo;
if($_SERVER['REQUEST_METHOD']=='GET'&&isset($_GET["find"]))
{
    $lat=$_GET["corx1"];
    $lon=$_GET["cory1"];
    $id=$_GET["aksid"];
    function getaddress($lat,$lng)
{
$url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($lat).','.trim($lng).'&sensor=false';
$json = @file_get_contents($url);
$data=json_decode($json);
$status = $data->status;
if($status=="OK")
return $data->results[0]->formatted_address;
else
return false;
}
function converter($num)
    {
    $num4=$num/100;
    $intpart= floor($num4);
    //echo " Degree part is :$intpart";
    $num4=$num4*100;
    $intpart1=$intpart*100;
    $minute=$num4-$intpart1;
    $minute1= floor($minute);
    //echo "<br>";
    //echo "Minute part is :$minute1";
    $minute=$minute*100;
    $minute2=$minute1*100;
    $second=$minute-$minute2;
    $second= floor($second);
   // echo "<br>";
   // echo "Second part is:$second";
    $decimal=($intpart + $minute1/60 + $second/3600);
    //echo "<br>";
   // echo "The converted value in decimal:$decimal";
    return $decimal;
    }
      $lat1=($lat/100);
    $lon1=($lon/100);

$address= getaddress($lat1,$lon1);
if($address)
{
$adrs_echo=$address;
}
else
{
    $adrs_echo="Sorry ! Address not found";
}
   
       $result3 = mysql_query("SELECT * FROM member_fin where AKS_ID='$id'");
        while($row3 = mysql_fetch_array($result3))
        { 
            $fname=$row3['FNAME'];
            $lname=$row3['LNAME'];
            $address=$row3['ADDRESS'];
            $contact=$row3['CONTACT'];
         
            $gender=$row3['GENDER'];
$email=$row3['EMAIL'];
        }
        $msg=" Dear sir, your ward ".$fname." ".$lname." is at ".$adrs_echo;

$emailto=$email;

$link="http://ads.cgvigyansabha.in/tofindaddress.php?corx1=".$lat."&cory1=".$lon."&aksid=".$id."&find=find";    
$headers = 'From: aditya@cgvigyansabha.in' . "\r\n" .
    'Reply-To: astroadityachauhan@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
$emailmsg=$msg."\n".$link."\n\n Regards,\nAccident Detection System";

mail($emailto, 'ADS ALERT', $emailmsg);


        
              
        
        
         
}
        
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Accident Detection System</title>
</head>
<body>

<div id="wrap">

<div id="header">
<h1><a href="#">Accident Detection System</a></h1>
</div>

<div id="menu">

<ul>
<li><a href="index.html">Home</a></li>
<li><a href="about.html">About</a></li>
<li><a href="aks_index.php">Registration</a></li>
<li><a href="#">Discussions</a></li>
<li><a href="#">Downloads</a></li>
<li><a href="tofindaddress.php">Find Location</a></li>
<li><a href="find.php">Find</a></li>
<li><a href="#">Contact</a></li>
</ul>
</div>

<div id="contentwrap"> 

<div id="content">

<h2>Accident Detection System</h2>
<p align="justify">
    <font style="bold">
        <b>
<?php 
if($_SERVER['REQUEST_METHOD']=='GET'&&isset($_GET["find"]))
{ 
    echo $msg;
}
?>
            
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
// Define the latitude and longitude positions
var latitude = parseFloat("<?php echo $lat1; ?>"); // Latitude get from above variable
var longitude = parseFloat("<?php echo $lon1; ?>"); // Longitude from same
var latlngPos = new google.maps.LatLng(latitude, longitude);
// Set up options for the Google map
var myOptions = {
zoom: 15,
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
<div id="map" style="width:450px;height:350px; margin-top:10px;"></div>
        </b>
    </font>
</p>
<p>
    
    
</p>
<p>
<img style="float: left; padding: 0 10px 10px 0;" src="akshara.gif" width="180" height="200" alt="astro image example" />
<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
            Enter coordinates of x <input type="text" name="corx1" value="" /><br>
            Enter coordinates of y <input type="text" name="cory1" value="" /><br>
            Enter ADS Number      <br> <input type="text" name="aksid" value="" /><br>
              
            <input type="submit" value="find" name="find" />
        </form> 
</p>

</div>

<div id="sidebar">
<h3>What's New</h3>
<marquee direction="up" behavior="scroll" scrolldelay="1" scrollamount="2">
<ul>
<li><a href="#">ADS trends in the market</a></li>
<li><a href="#">ADS awarded best product award</a></li>
<li><a href="#">ADS saves 9999 lives so far</a></li>
<li><a href="#">ADS been catalyzed by a lot of NGOs</a></li>
<li><a href="#">ADS seems to be the new fashion</a></li>
<li><a href="#">Developers working on other versions of ADS</a></li>
</ul>
</marquee>
<h3>Useful Resources</h3>
<ul>
<li><a href="#">Old Wisdom</a></li>
</ul>

</div>

<div style="clear: both;"> </div>

</div>

<div id="footer">
<p>&copy; Copyright 2015 Accident Detection System </div>

</div>

</body>
</html>
