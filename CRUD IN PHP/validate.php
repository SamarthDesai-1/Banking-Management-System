<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate PHP</title>
    <link rel="stylesheet" href="validate.css">
</head>
<body>
    <div class="container">
        <form action="" method="get">
            <label>Number</label><br>
            <input type="number" name="num"><br><br>
            <input type="submit" name="subbtn">
        </form>
    </div>

    <?php 
        $con = mysqli_connect("localhost" ,"root" ,"" ,"crudoper");
        if (isset($_GET['subbtn']) && $_GET['num'] != "") {
    ?>
        <div class="result">
            <?php
                if ($_GET['num'] > 10) {
                    echo "Invalid number";
                } else {
                    echo "Success";
                }
            ?>
        </div>
    <?php 
        }
    ?>

</body>
</html>