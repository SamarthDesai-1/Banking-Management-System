<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>
    <link rel="stylesheet" href="/COLLEGE MINI PROJECT/CSS/MyAccount.css">
</head>
<body>
    <div class="container">
        <div class="logo-section">
            <h1 class="text-color-blue">American Express</h1>    
            <!-- Account holder info section starts at here -->
            <div class="account-holder-info">
                <div class="image-section">
                    <img src="./IMAGES/american3.png" alt="" class="custom-image">
                    <!-- <img src="./IMAGES/american2.jpg" alt="" class="custom-image"> -->
                    <!-- <img src="./IMAGES/american.png" alt="" class="custom-image"> -->
                    <!-- <img src="./IMAGES/apple.jpg" alt="" class="custom-image"> -->
                </div>
                <div class="name-section">
                    <h4>Dwayne S J Johnson</h4>
                </div>
            </div>
            <!-- Account holder info section ends at here -->
        </div>

        <!-- Account info section starts at here --> 
        <div class="account-info-section">
            <h4>Dwayne S J Johnson your Account Statement</h4>
            
            <div class="date-section">
                <h4><span id="dynamic-date"></span></h4>
            </div>
        </div>
        <!-- Account info section ends at here --> 

        <div class="display-content-section">
            <div class="box" id="box-1">
                <h1>About Bank Info</h1>
                <h4>Country : </h4>
                <h4>IFSC Code : </h4>
                <h4>MICR : </h4>
                <h4>Customer ID :</h4>
            </div>
            <div class="box" id="box-2">
                <h1>Account Details</h1>
                <h4>Account Type : </h4>
                <h4>Account No : </h4>
                <h4>Account openning date : </h4>
                <h4>Account Name : </h4>
            </div>
            <div class="box" id="box-3">
                <h1>Net Balance</h1>
                <h2>$15,000</h2>
            </div>
            <div class="box" id="box-4">
                <h1>Currency Convertor</h1>
            </div>
            <div class="box" id="box-5">
                <h1>Loan Statement</h1>
                <p>Currently no loan found</p>
            </div>
            <div class="box" id="box-6">box-6</div>
            <div class="box" id="box-7">box-7</div>
            <div class="box" id="box-8">
                <div class="dynamic-progress-bar">
                    <div class="circular-progress">
                        <div class="progress-value">0%</div>
                    </div>
                    <span class="text">Account Verification</span>
                </div>
                <div class="text-area-section">
                    <h1>Your transaction activities</h1>
                </div>
            </div>
            <div class="box" id="box-9">box-9</div>
            <div class="box" id="box-10">box-10</div>
            <div class="box" id="box-11">box-11</div>
            <div class="box" id="box-12">box-12</div>
            <div class="box" id="box-13">box-13</div>
            <div class="box" id="box-14">box-14</div>
            <div class="box" id="box-15">box-15</div>
            <div class="box" id="box-16">box-16</div>
            <div class="box" id="box-17">box-17</div>
            <div class="box" id="box-18">box-18</div>
            <div class="box" id="box-19">box-19</div>
            <div class="box" id="box-20">box-20</div>
            <div class="box" id="box-21">box-21
                <div class="payment-statement-section">

                </div>
            </div>
            <div class="box" id="box-22">box-22</div>
            <div class="box" id="box-23">
                <h1>Cibil Score</h1>
                
            </div>
            <div class="box" id="box-24">box-24</div>
            <div class="box" id="box-25">box-25</div>
            <div class="box" id="box-26">box-26</div>
            <div class="box" id="box-27">box-27</div>
            <div class="box" id="box-28">box-28</div>
            <div class="box" id="box-29">box-29</div>
            <div class="box" id="box-30">box-30</div>
            <!-- <div class="box" id="box-31">box-31</div>
            <div class="box" id="box-32">box-32</div>
            <div class="box" id="box-33">box-33</div>
            <div class="box" id="box-34">box-34</div>
            <div class="box" id="box-35">box-35</div>
            <div class="box" id="box-36">box-36</div>
            <div class="box" id="box-37">box-37</div> -->
        </div>
        <div class="payment-statement-section">
            <h1>Statement</h1>
        </div>
    </div>

    <script src="/COLLEGE MINI PROJECT/JAVASCRIPT/MyAccount.js"></script>

</body>
</html>