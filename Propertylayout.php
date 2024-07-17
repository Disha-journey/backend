<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property</title>
    <link rel="stylesheet" href="style5.css">
</head>
<body>
    <div class="header">
        <h1>DreamRentals -Property</h1> <?php ob_start();
session_start();
echo $_SESSION['username'] ?>
    </div>
    <div class="nav">
        <a href="Propertylayout.php">Property</a>
        <a href="Bookinglayout.php">Booking</a>
        <a href="Logout.php">Logout</a>
    </div>
    <div class="content">
        <div class="form">
            <h2> Property</h2>
            <form action="" method="post" enctype="multipart/form-data" >

                <label for="type">Enter property type:</label>
                <input type="text" id="type" name="type" >

                <label for="price">Enter price in Rupees:</label>
                <input type="text" id="price" name="price" >

                <label for="area">Enter area of property in meter square:</label>
                <input type="number" id="area" name="area" >

                <label for="location">Enter location of property:</label>
                <input type="textarea" id="location" name="location" >

                <label for="date">Enter date:</label>
                <input type="date" id="date" name="date" >

                <label for="bedrooms">Number of Bedrooms:</label>
                <input type="number" id="bedrooms" name="bedrooms" >

                <label for="bathrooms">Number of Bathrooms:</label>
                <input type="number" id="bathrooms" name="bathrooms" >

                <label for="floor">Enter the floor number:</label>
                <input type="number" id="floor" name="floor" >

                <label for="parking">Enter number of parking areas available:</label>
                <input type="number" id="parking" name="parking" >

                <label for="image">Enter image of property:</label>
                <input type="file" id="image" name="image" >

                <input type="submit" value="Submit" name="submit">
            
            </form>
        </div>
 </div>
 <?php
if(isset($_POST['submit'])){

    $PropertyType=$_POST['type'];
    $price=$_POST['price'];
    $area=$_POST['area'];
    $date=$_POST['date'];
    $location=$_POST['location'];
    $bedrooms=$_POST['bedrooms'];
    $bathrooms=$_POST['bathrooms'];
    $floor=$_POST['floor'];
    $parking=$_POST['parking'];
    $file=$_FILES['image']["name"]; 

    move_uploaded_file($_FILES["image"]["tmp_name"],"propertyimages/".$_FILES["image"]["name"]);

    $query="insert into PropertyDetails (type,price,area,date,location,bathroom,bedroom,floor,parking,picture) 
            values('$PropertyType','$price','$area','$date','$location',' $bedrooms','$bathrooms','$floor','$parking','$file')";
    
    include "dbconn.php";
    updateInfo($query);
    header("Location:Propertylayout.php"); 
}
?>    
<h2>Property List</h2>     
<?php 

include "dbconn.php";
$query="select * from PropertyDetails";
$Tresult=getTable($query);
?>
<table>
        <tr>
            <td><h4>Property ID</h4></td>
            <td><h4>Type</h4></td>
            <td><h4>Price</h4></td>
            <td><h4>Area</h4></td>
            <td><h4>Date</h4></td>
            <td><h4>Location</h4></td>
            <td><h4>Bathroom</h4></td>
            <td><h4>Bedroom</h4></td>
            <td><h4>Floor</h4></td>
            <td><h4>Parking</h4></td>
            <td><h4>Image</h4></td>
            <td><h4>Delete</h4></td>
            <td><h4>Edit</h4></td>
        </tr>
    <?php while($row=mysqli_fetch_array($Tresult)){
        $images=$row['picture'];
        ?>
        
        <tr>
            <td><?php echo $row['proptery_id'] ?></td>
            <td><?php echo $row['type'] ?></td>
            <td><?php echo $row['price'] ?></td>
            <td><?php echo $row['area'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td><?php echo $row['location'] ?></td>
            <td><?php echo $row['bathroom'] ?></td>
            <td><?php echo $row['bedroom'] ?></td>
            <td><?php echo $row['floor'] ?></td>
            <td><?php echo $row['parking'] ?></td>
            <td><?php echo "<img src='propertyimages/$images' height='80px'>" ?></td>
            <td>
                <form action="propertydelete.php" method="get">
                <input type="hidden" name="deleteid" value="<?php echo $row['proptery_id'] ?>">
                <input type="hidden" name="deleteimage" value="<?php echo $images ?>">
                <input type="submit" name="submit1" value="Delete" >
                </form>
            </td>
            <td>
            <form action="propertyupdate.php" method="post">
            <input type="hidden" name="editid" value="<?php echo $row['proptery_id'] ?>">
            <input type="hidden" name="editimage" value="<?php echo $images ?>">
            <input type="submit" name="submit2" value="Edit" >
            </form>
            </td>
        </tr>
        
    <?php
    }
        ?>
</table>
       
</body>
</html>