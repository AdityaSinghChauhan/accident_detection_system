<?php
	require_once('auth.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style1 {
	font-size: 36px;
	font-weight: bold;
}
-->
</style>
</head>
 
<body>
<p align="center" class="style1">Login successfully </p>
<p align="center">This page is the home, you can put some stuff here......</p>
<p align="center"><a href="login_index.php">logout</a></p>
<br>
    
</br>
<?php
require_once('connection.php');
$id=$_SESSION['SESS_MEMBER_ID'];
$result3 = mysql_query("SELECT * FROM member_fin where AKS_ID='$id'");
while($row3 = mysql_fetch_array($result3))
{ 
$fname=$row3['FNAME'];
$lname=$row3['LNAME'];
$address=$row3['ADDRESS'];
$contact=$row3['CONTACT'];
$picture=$row3['picture'];
$gender=$row3['GENDER'];
}
?>
<table width="398" border="0" align="center" cellpadding="0">
  <tr>
    <td height="26" colspan="2">Your Profile Information </td>
	<td><div align="right"><a href="login_index.php">logout</a></div></td>
  </tr>
  <tr>
    <td width="129" rowspan="5"><img src="uploads/IMG-20150301-WA0024.jpg" width="129" height="129" alt="no image found"/></td>
    <td width="82" valign="top"><div align="left">FirstName:</div></td>
    <td width="165" valign="top"><?php echo $fname ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">LastName:</div></td>
    <td valign="top"><?php echo $lname ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Gender:</div></td>
    <td valign="top"><?php echo $gender ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Address:</div></td>
    <td valign="top"><?php echo $address ?></td>
  </tr>
  <tr>
    <td valign="top"><div align="left">Contact No.: </div></td>
    <td valign="top"><?php echo $contact ?></td>
  </tr>
</table>
<p align="center"><a href="login_index.php"></a></p>
</body>
</html>