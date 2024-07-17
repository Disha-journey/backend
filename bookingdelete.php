<?php
if(isset($_GET['submit1'])){
    include 'dbconn.php';
    $deleteid = $_GET['deleteid'];

    updateInfo("delete from  booking where b_id=$deleteid");
    
    header("Location: Bookinglayout.php");
}
?>