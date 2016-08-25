<?php
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_FILES['image'])){
    $errors= array();
    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];   
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    $extensions = array("jpeg","jpg","png"); 		
    if(in_array($file_ext,$extensions )=== false){
     $errors[]="extension not allowed, please choose a JPEG or PNG file.";
    }
    if($file_size > 2097152){
    $errors[]='File size must be excately 2 MB';
    }				
    if(empty($errors)==true){
        move_uploaded_file($file_tmp,"uploads/".$file_name);
        //echo "Success";
    }else{
        print_r($errors);
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <script type="text/javascript">
function validateForm()
{
var a=document.forms["reg"]["fname"].value;
var b=document.forms["reg"]["lname"].value;
var c=document.forms["reg"]["mname"].value;
var d=document.forms["reg"]["address"].value;
var e=document.forms["reg"]["contact"].value;
var f=document.forms["reg"]["pic"].value;
var g=document.forms["reg"]["pic"].value;
var h=document.forms["reg"]["pic"].value;
if ((a==null || a=="") && (b==null || b=="") && (c==null || c=="") && (d==null || d=="") && (e==null || e=="") && (f==null || f==""))
  {
  alert("All Field must be filled out");
  return false;
  }
if (a==null || a=="")
  {
  alert("First name must be filled out");
  return false;
  }
if (b==null || b=="")
  {
  alert("Last name must be filled out");
  return false;
  }
if (c==null || c=="")
  {
  alert("Gender name must be filled out");
  return false;
  }
if (d==null || d=="")
  {
  alert("address must be filled out");
  return false;
  }
if (e==null || e=="")
  {
  alert("contact must be filled out");
  return false;
  }
if (g==null || g=="")
  {
  alert("username must be filled out");
  return false;
  }
if (h==null || h=="")
  {
  alert("password must be filled out");
  return false;
  }
}
</script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Akshara Registration</title>
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

<p>
<form name="reg" action="aks_code_exec.php" onsubmit="return validateForm()" method="post" enctype="multipart/form-data">
<table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td colspan="2">
		<div align="center">
		  <?php 
                if(isset($_POST["submit"]))
                {
		$remarks=$_GET['remarks'];
		if ($remarks==null and $remarks=="")
		{
		echo 'Register Here';
		}
		if ($remarks=='success')
		{
		echo 'Registration Success';
		}
                }
		?>	
	    </div>
     </td>
  </tr>
  <tr>
    <td width="95"><div align="right">ADS ID:</div></td>
    <td width="171"><input type="text" name="aksid" /></td>
  </tr>
  <tr>
    <td width="95"><div align="right">First Name:</div></td>
    <td width="171"><input type="text" name="fname" /></td>
  </tr>
  <tr>
    <td><div align="right">Last Name:</div></td>
    <td><input type="text" name="lname" /></td>
  </tr>
  <tr>
    <td><div align="right">Gender:</div></td>
    <td><input type="text" name="mname" /></td>
  </tr>
  <tr>
    <td><div align="right">Address:</div></td>
    <td><input type="text" name="address" /></td>
  </tr>
  <tr>
    <td><div align="right">Contact No.:</div></td>
    <td><input type="text" name="contact" /></td>
  </tr>
  <tr>
    <td><div align="right">Picture:</div></td>
    <td><input type="file" name="image" />
    </td>
  </tr>
 <tr>
    <td><div align="right">Username:</div></td>
    <td><input type="text" name="username" /></td>
  </tr>
 <tr>
    <td><div align="right">Password:</div></td>
    <td><input type="text" name="password" /></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input name="submit" type="submit" value="Submit" /></td>
  </tr>
</table>
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
<li><a href="http://www.oldwisdom.info">Old Wisdom</a></li>
<li><a href="http://www.supplies4pets.info">Supplies for Pets</a></li>
<li><a href="http://www.viennasights.info">Vienna Sightseeing</a></li>
<li><a href="http://www.florencesightseeing.info">Florence Sightseeing</a></li>
<li><a href="http://www.amsterdamsightseeing.info">Amsterdam</a></li>
<li><a href="http://www.francesightseeing.info">French Cities</a></li>
</ul>

</div>

<div style="clear: both;"> </div>

</div>

<div id="footer">
<p>&copy; Copyright 2016 Accident Detection System </div>

</div>

</body>
</html>
