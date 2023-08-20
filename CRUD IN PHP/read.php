<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="read.css">
    <title>Data</title>
</head>
<body>
    <div class="container">

        <table class="border-h">
            <tr class="table-h">
                <td class="inner-data">Name</td>
                <td class="inner-data">Email</td>
                <td class="inner-data">Mobile</td>
                <td class="inner-data">Address</td>
                <td class="inner-data">Gender</td>
                <td class="inner-data">Update</td>
                <td class="inner-data">Delete</td>
            </tr>

            <?php
                $con = mysqli_connect("localhost" ,"root" ,"" ,"crudoper");
                $sql = "select * from iud";
                $res = mysqli_query($con ,$sql);
                while ($row = mysqli_fetch_array($res)) 
                {
            ?>
            
                <tr>
                    <td class="inner-data"><?php echo $row['Name']?></td>
                    <td class="inner-data"><?php echo $row['Email']?></td>
                    <td class="inner-data"><?php echo $row['Mobile']?></td>
                    <td class="inner-data"><?php echo $row['Address']?></td>
                    <td class="inner-data"><?php echo $row['Gender']?></td>
                    <td><button class="btn-update"><a class="link" href="update.php?Name=<?php echo $row['Name']; ?>">Update</a></button></td>
                    <td><button class="btn-delete"><a class="link" href="delete.php?Name=<?php echo $row['Name']; ?>">Delete</a></button></td>
                </tr>

            <?php 
                }
            ?>
        </table>

    </div>
</body>
</html>

<?php
    while ($row = mysqli_fetch_array($res)) {
        echo $row['Name']."     ".$row['Email']."   ".$row['Mobile']."  ".$row['Address']."     ".$row['Gender']."<br>";
    }
    
?>
