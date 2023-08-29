<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="/COLLEGE MINI PROJECT/CSS/Admin.css">
</head>
<body>
    <div class="container">
        <div class="info-section-1">
            <div class="header-section">
                <h1>Admin</h1>
            </div>

            <div class="admin-rules-section">
                <div class="rules-section">
                    <h2>Rules & Regulations</h2>
                </div>
                <ul>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                    <li>Lorem, ipsum.</li>
                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe, rem.</li>
                    <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vel, iusto saepe.</li>
                </ul>

                <div class="company-section">
                    <p class="company">American Express</p>
                </div>
            </div>
        </div>
        <div class="info-section-2">

            <form action="/COLLEGE MINI PROJECT/CRUD IN PHP/delmul.php" method="post">
                <div class="header-section">
                    <h1>Customer Basic Details</h1>
                </div>
                <div class="customer-details">

                    <table class="main-table" border="0px">
                        <div class="table-head-section">
                            <tr>

                                <td class="inner-data table-data">Delete</td>
                                <td class="inner-data table-data">Firstname</td>
                                <td class="inner-data table-data">Middlename</td>
                                <td class="inner-data table-data">Lastname</td>
                                <td class="inner-data table-data">Currency</td>
                                <td class="inner-data table-data">Account</td>
                                <td class="inner-data table-data">Mobile</td>
                                <td class="inner-data table-data">Email</td>
                                <td class="inner-data table-data">Nominee</td>
                                <td class="inner-data table-data">Address</td>

                            </tr>
                        </div>
                    

                </div>
                <?php

                    $con = mysqli_connect("localhost" ,"root" ,"" ,"accountopen_db");
                    $sql = "select * from accountinfo";
                    $rows = mysqli_query($con ,$sql);

                    while($result = mysqli_fetch_array($rows))
                    {
                ?>
                        <tr>
                            <td class="inner-data chk-cen"><input type="checkbox" name="delete_data[]" value="<?php echo $result['ID']; ?>"></td>
                            <td class="inner-data"><?php echo $result['Firstname']; ?></td>
                            <td class="inner-data"><?php echo $result['Middlename']; ?></td>
                            <td class="inner-data"><?php echo $result['Lastname']; ?></td>
                            <td class="inner-data"><?php echo $result['Currency']; ?></td>
                            <td class="inner-data"><?php echo $result['AccountType']; ?></td>
                            <td class="inner-data"><?php echo $result['Mobile']; ?></td>
                            <td class="inner-data"><?php echo $result['Email']; ?></td>
                            <td class="inner-data"><?php echo $result['Nominee']; ?></td>
                            <td class="inner-data"><?php echo $result['Address']; ?></td>
                        </tr>
                <?php
                    }
                ?>
                    </table>

                <div class="btn-section">
                    <button class="btn" type="submit" name="del">Delete</button>            
                </div>

            </form>
            

        </div>

        <div class="info-section-2">
            <div class="header-section">
                <h1>Customer Account Details</h1>
            </div>
            <div class="customer-details">

                <table class="main-table" border="0px">
                    <div class="table-head-section">
                        <tr>

                            <!-- <td class="inner-data table-data">Delete</td> -->
                            <td class="inner-data table-data">Email</td>
                            <td class="inner-data table-data">MICR</td>
                            <td class="inner-data table-data">Account No</td>
                            <td class="inner-data table-data">IFSC</td>
                            <td class="inner-data table-data">Balance</td>
                            <td class="inner-data table-data">Min Balance</td>
                            <td class="inner-data table-data">Loan</td>

                        </tr>
                    </div>
                

            </div>
            <?php

                $con = mysqli_connect("localhost" ,"root" ,"" ,"customerbankdetails_db");
                $sql = "select * from customerinfo";
                $rows = mysqli_query($con ,$sql);

                while($result = mysqli_fetch_array($rows))
                {
            ?>
                    <tr>
                        <td class="inner-data"><?php echo $result['Email']; ?></td>
                        <td class="inner-data"><?php echo $result['MICR']; ?></td>
                        <td class="inner-data"><?php echo $result['AccountNo']; ?></td>
                        <td class="inner-data"><?php echo $result['IFSC']; ?></td>
                        <td class="inner-data"><?php echo $result['CurrentBalance']; ?></td>
                        <td class="inner-data"><?php echo $result['MinBalance']; ?></td>
                        <td class="inner-data"><?php echo $result['Loan']; ?></td>
                    </tr>
            <?php
                }
            ?>
                </table>

           

          
            
        </div>
    </div>
</body>
</html>