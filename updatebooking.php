<?php
include 'dbconn.php';
if (isset($_POST['submit3'])) {
    $biddata = $_POST['biddata'];
    $pid = $_POST['pid'];
    $newUserName = $_POST['newusername'];
    $newCheckIn = $_POST['newindate'];
    $newCheckOut = $_POST['newoutdate'];

    $query = "UPDATE booking SET username='$newUserName',p_id='$pid', indate='$newCheckIn', outdate='$newCheckOut' WHERE b_id=$biddata";
    updateInfo($query);

    header("Location: Bookinglayout.php");
    exit();
}
?>