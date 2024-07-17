<?php 
$con=mysqli_connect("localhost","root","","projectwork");
if(!$con){
     echo mysqli_connect_error($con);
}

function updateInfo($query)
{
    global $con;
    mysqli_query($con,$query);

}
function getTable($query)
{
    global $con;
    $result=mysqli_query($con,$query);
    return $result;
}
function checkInfo($query){
    global $con;
    $result=mysqli_query($con,$query);
    return $result;
}

?>