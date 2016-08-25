<?php
session_start();
include('connection.php');
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$mname=$_POST['mname'];
$address=$_POST['address'];
$contact=$_POST['contact'];
$username=$_POST['username'];
$password=$_POST['password'];
$aks_id=$_POST['aksid'];
if(isset($_FILES['image'])){
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
        move_uploaded_file($file_tmp,"uploads/".$aks_id.".jpg");
        //echo "Success";
    }else{
        print_r($errors);
    }
}
mysql_query("INSERT INTO member_fin(FNAME, LNAME, GENDER, ADDRESS, CONTACT, USERNAME, PASSWORD, AKS_ID)VALUES('$fname', '$lname', '$mname', '$address', '$contact', '$username', '$password', '$aks_id')");




header("location: aks_index.php?remarks=success");
mysql_close($con);
?>