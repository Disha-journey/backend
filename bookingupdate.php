<?php
include 'dbconn.php';

if (isset($_POST['submit2'])) {
    $editdata = $_POST['editdata'];
    $query=("SELECT * FROM booking WHERE b_id=$editdata");
    $result=getTable($query);

    if ($row = mysqli_fetch_array($result)) {
        $op_id=$row['p_id'];
        $opUserName = $row['username'];
        $opCheckIn = $row['indate'];
        $opCheckOut = $row['outdate'];
    }
}
?>
<link rel="stylesheet" href="style6.css">
<form action="updatebooking.php" method="post">
    <div class="content"><h2>Booking Update</h2></div>
        <table>
            <tr>
            <td>ID:</td>
            <td><input type="text" name="biddata" value="<?php echo $editdata ?>"></td>
            </tr>
            <tr>
            <td>Property ID:</td>
            <td><input type="text" name="pid" value="<?php echo $op_id ?>"></td>
            </tr>
            <tr>
            <td>Change your username: </td>
            <td><input type="text" name="newusername" value="<?php echo $opUserName ?>"></td>
            </tr>
            <tr>
            <td>Change your check-in date: </td>
            <td><input type="date" name="newindate" value="<?php echo $opCheckIn ?>"></td>
            </tr>
            <tr>
            <td>Change your check-out date: </td>
            <td><input type="date" name="newoutdate" value="<?php echo $opCheckOut ?>"></td>
            </tr>
            <tr>
            <td><input type="submit" value="Submit" name="submit3"></td>
            </tr>
    </table>
</form>