<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="./CSS/Payment.css">
</head>

<body>
    <div class="container">

        <div class="box-1">
            <div class="header-section">
                <h1>Payment Details</h1>
            </div>

            <form class="form-section" method="post">

                <div class="sender-info-section">

                    <div class="email-enter flex">
                        <label>Email Address</label>
                        <input type="email" class="format">
                    </div>

                    <div class="account-number-sender flex">
                        <label>Your Account Number</label>
                        <input type="number" class="format" placeholder="*** *** *** ***">
                    </div>

                    <div class="account-number-recevier flex">
                        <label>Recevier Account Number</label>
                        <input type="number" class="format" placeholder="*** *** *** ***">
                    </div>

                    <div class="cvv-amount-section">

                        <div class="cvv-section flex">
                            <label>CVV</label>
                            <input type="password" class="format format-cvv" maxlength="5">
                        </div>

                        <div class="amount-section flex">
                            <label>Transfer Amount</label>
                            <input type="number" class="format" maxlength="10">
                        </div>

                    </div>
                   

                    <div class="spacer"></div>

                    <div class="btn-section">
                        <button type="button" class="btn">Make Payment</button>
                    </div>

                </div>

            </form>

        </div>

        <div class="box-2">
            <div class="img-section">
                <img src="./IMAGES/pay1.webp" alt="">
            </div>
            <div class="info-section">
                <h1>Beaware from frauds.</h1>
                <ul>
                    <li>Lorem ipsum dolor sit amet.</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta, accusamus?</li>
                    <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsa, nisi?</li>
                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                </ul>
            </div>
        </div>

    </div>
</body>

</html>