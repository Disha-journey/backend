<!-- delete code -->
<?php 
    if(isset($_GET['submit1'])){
        $deleteid=$_GET['deleteid'];
        $deleteimage=$_GET['deleteimage'];
        // mysql code
        
        $query="delete from PropertyDetails where proptery_id=$deleteid";

        include "dbconn.php";
        updateInfo($query);
        unlink("propertyimages/".$deleteimage);
        
        header("Location:Propertylayout.php");
    }
?>