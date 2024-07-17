<?php
    if(isset($_POST['submit3']))
    {   $pid=$_POST['pid'];
        $type =$_POST['type']; 
        $price =$_POST['price'];
        $area =$_POST['area'] ;
        $date =$_POST['date'] ;
        $location =$_POST['location'] ;
        $bathroom =$_POST['bathrooms'] ;
        $bedroom =$_POST['bedrooms'] ;
        $floor =$_POST['floor'] ;
        $parking =$_POST['parking'] ;
        $oldimage=$_POST['oimage'];
        $Newimage=$_FILES['newimage']['name'];

        unlink("propertyimages/".$oldimage);
        move_uploaded_file($_FILES["newimage"]["tmp_name"],"propertyimages/".$_FILES["newimage"]["name"]);

        $query="update PropertyDetails set type='$type',price='$price',area='$area',date='$date',location='$location',bathroom='$bathroom',bedroom='$bedroom',
        floor='$floor',parking='$parking',picture='$Newimage' where proptery_id=$pid";
        include "dbconn.php";
        updateInfo($query);

        header("Location:Propertylayout.php");   
    }
?>