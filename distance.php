<?php
$dist1=0;
$i=0;
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST["calculate"]))
{
    $lat1=$_POST["corx1"];
    $lon1=$_POST["cory1"];
    $lat2=$_POST["corx2"];
    $lon2=$_POST["cory2"];
    $unit="K";
    
    
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
	 
	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);
	 // return $miles;
	  if ($unit == "K") {
              //echo "answer is in Km <br>";
	    return ($miles * 1.609344);
	  } else if ($unit == "N") {
	      return ($miles * 0.8684);
	    } else {
	        return $miles;
	      }
	}
	//$dist1=distance($lat1, $lon1, $lat2, $lon2, $unit);
        $con=mysql_connect("localhost","aditya","psw");
        if(!$con)
        {
            
            die('connection error'.mysql_error());
            
        }
        mysql_select_db("sjs",$con);
         for($i = 1; $i < 4; $i++)
         {
              $query=mysql_query("select * from distance where ID='$i' ");
              $row=mysql_fetch_array($query);
       
             $x_cor=$row['COR_X'];
             $y_cor=$row['COR_Y'];
             //echo $x_cor[$i];
             echo "<br>";
            // echo $y_cor[$i];
             echo "<br>";
             $dist_arr[$i]=distance($lat1, $lon1, $x_cor, $y_cor, $unit);
             //echo "distance from  police station is ".$dist_arr[$i]." Km" ;
             echo "<br>";
             //echo "distance in array is ".$dist_arr[$i];
             
         }
        $small=$dist_arr[1];
        for( $j=1;$j<4;$j++)
        {
            if($dist_arr[$j]<$small)
            {
                $small=$dist_arr[$j];
            }
        }
        echo "the smallest distance is ".$small."<br>";
        for( $j=1;$j<4;$j++)
        {
            //$id=1;
            if($dist_arr[$j]==$small)
            {
                echo "the nearest police station has id ".$j."<br>";
                break;
            }
            
            
        }
       
        echo "<br>";
        $query=mysql_query("select * from distance where ID='$j' ");
              $row=mysql_fetch_array($query);
              $address=$row['ADDRESS'];
              $email=$row['EMAIL'];
              $phone=$row['PHONE_NO'];
              echo "<br>";
              echo "adress : ".$address;
               echo "<br>";
             
              echo "email id : ".$email;
               echo "<br>";
             
              echo "phone : ".$phone;
        
        
         
}
        
?>
<html>
    <head><title>distance</title></head>
    <body align="center">
       <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            Enter coordinates of x of 1st <input type="text" name="corx1" value="" /><br>
            Enter coordinates of y of 2nd <input type="text" name="cory1" value="" /><br>
            Enter coordinates of x of 2nd <input type="text" name="corx2" value="" /><br>
            Enter coordinates of y of 2nd <input type="text" name="cory2" value="" /><br>
           
            Distance <input type="text" name="dist" value="<?php echo $dist1 ?> " /><br>
            <input type="submit" value="Calculate" name="calculate" />
        </form> 
    </body>
</html>