<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Navigator</title>
    <link rel="stylesheet" href="style5.css">
</head>
<body>
    <div class="header">
        <h1>DreamRentals - Booking</h1>
    </div>
    <div class="nav">
        <a href="PropertyLayout.php">Property</a>
        <a href="BookingLayout.php">Booking</a>
        <a href="Logout.php">Logout</a>
       
    </div>
    <div class="content">
        <div class="form">
            <h2> Booking</h2>
            <form action="" method="post">
                <label for="p_id">Enter the Property id:</label>
                <input type="number" id="p_id" name="p_id" >
                <label for="user_name">Enter username:</label>
                <input type="text" id="user_name" name="user_name" >
                <label for="indate">Enter check-in date:</label>
                <input type="date" id="indate" name="indate" >
                <label for="outdate">Enter check-out date:</label>
                <input type="date" id="outdate" name="outdate" >
                <input type="submit" value="Book" name="submit">
            </form>
        </div>
    </div>
    <?php
        if(isset($_POST['submit'])){

            $p_id = $_POST['p_id'];
            $user_name = $_POST['user_name'];
            $indate = $_POST['indate'];
            $outdate = $_POST['outdate'];

            $query = "insert into  booking (p_id, username, indate, outdate) values ('$p_id', '$user_name', '$indate', '$outdate')";
            include "dbconn.php";
            updateInfo($query);
            header("Location:BookingLayout.php");

        }
    ?>


    <h2>Booking List</h2>
        <?php 
            include "dbconn.php";
            $query="select * from booking";
            $Tresult=getTable($query);
        ?>
        <table>
            <tr>
                <th>Booking ID</th>
                <th>Property ID</th>
                <th>Username</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Timestamp</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        <?php 
            while($row = mysqli_fetch_array($Tresult)) { ?>
                <tr>
                    <td><?php echo $row['b_id']; ?></td>
                    <td><?php echo $row['p_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['indate']; ?></td>
                    <td><?php echo $row['outdate']; ?></td>
                    <td><?php echo $row['timestamp']; ?></td>
                    <td>
                    <form action="bookingdelete.php" method="get">
                        <input type="hidden" name="deleteid" value="<?php echo $row['b_id']; ?>">
                        <input type="submit" name="submit1" value="Delete">
                        </form>
                    </td>
                    <td>
                        <form action="bookingupdate.php" method="post">
                            <input type="hidden" name="editdata" value="<?php echo $row['b_id']; ?>">
                            <input type="submit" name="submit2" value="Edit">
                        </form>
                    </td>
                </tr>
                <?php } ?>
        </table>
            
       
</body>
</html>