<?php

    $Name = $_GET['Name'];
    $con = mysqli_connect("localhost" ,"root" ,"" ,"crudoper");
    $sql = "delete from iud where Name = '$Name'";
    mysqli_query($con ,$sql);

    header("location:read.php");

?>