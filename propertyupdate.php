
<!-- product name and image edit code -->
<?php
    if(isset($_POST['submit2'])){
        $editid=$_POST['editid'];
        $editimage=$_POST['editimage'];

        include "dbconn.php";
        $query="select * from PropertyDetails where proptery_id=$editid";

        $result=getTable($query);
        while($row=mysqli_fetch_array($result)){
            $type =$row['type']; 
            $price =$row['price']; 
            $area =$row['area'];
            $date =$row['date'];
            $location =$row['location'];
            $bathroom =$row['bathroom'];
            $bedroom =$row['bedroom'];
            $floor =$row['floor'];
            $parking =$row['parking'];
            
        }
         
    }
?> 
<!-- second page html code -->
<link rel="stylesheet" href="style6.css">
<form action="updateproperty.php" method="post" enctype="multipart/form-data">
    <div class="content"><h2>Property Update</h2></div>
    <table >
    <tr>
        <td><b>Property ID :</b></td>
        <td><input type='text' name="pid" value="<?php echo $editid ?>"></td>
    </tr>
    <tr>
        <td><b>Change property type:</b></td>
        <td><input type="text" name="type" value="<?php echo $type ?>"></td>
    </tr>
    <tr>
        <td><b>Change price in Rupees:</b></td>
        <td><input type="text" name="price" value="<?php echo $price ?>"></td>
    </tr>
    <tr>
        <td><b>Change area of property in meter square:</b></td>
        <td><input type="number" name="area" value="<?php echo $area ?>"></td>
    </tr>
    <tr>
        <td><b>Change location of property:</b></td>
        <td><input type="textarea" name="location" value="<?php echo $location ?>"></td>
    </tr>
    <tr>
        <td><b>Change date:</b></td>
        <td><input type="date" name="date" value="<?php echo $date ?>"></td>
    </tr>
    <tr>
        <td><b>Number of Bedrooms:</b></td>
        <td><input type="number" name="bedrooms" value="<?php echo $bedroom ?>"></td>
    </tr>
    <tr>
        <td><b>Number of Bathrooms:</b></td>
        <td><input type="number" name="bathrooms" value="<?php echo $bathroom ?>"></td>
    </tr>
    <tr>
        <td><b>Change the floor number:</b></td>
        <td><input type="number" name="floor" value="<?php echo $floor ?>"></td>
    </tr>
    <tr>
        <td><b>Change number of parking areas available:</b></td>
        <td><input type="number" name="parking" value="<?php echo $parking ?>"></td>
    </tr>
    <tr>
        <td><b>Current Image:</b></td>
        <input type="hidden" name="oimage" value="<?php echo $editimage?>">
        <td><?php echo "<img src='propertyimages/$editimage' height='80px'>" ?></td>
    </tr>
    <tr>
        <td><b>Add Image Again:</b></td>
        <td><input type="file" name="newimage"></td>
    </tr>
    <tr><td><input type="submit" value="submit" name="submit3"></td></tr>
    </table>
</form>