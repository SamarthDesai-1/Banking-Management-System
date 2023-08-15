<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form method="post">
            <label>Email : <input type="email" name="email"></label>
            <input type="submit" value="Verify" name="btn">
        </form>
    </div>
</body>
</html>

<?php

    $con = mysqli_connect("localhost" ,"root" ,"" ,"emaildemo");
    
    if (isset($_POST['btn'])) {
        $Email = $_POST['email'];
        $sql = "select * from et where email = '$Email'";

        $rows = mysqli_query($con ,$sql);
    
        $result = mysqli_num_rows($rows);
        if ($result > 0) {
            ?>
                <script>alert("Email already exists")</script>
            <?php

        } else {
            ?>
                <script>alert("Email not exists")</script>
            <?php
                $sql = "insert into et (email) values('$Email')";
                mysqli_query($con ,$sql);
            ?>

            <?php
        }
    }

?>