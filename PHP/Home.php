<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/COLLEGE MINI PROJECT/CSS/Home.css">
    <title>Home</title>
</head>
<body>
    <!-- Navbar ends here -->
    <div class="container">
        <div class="logo-section">
            <?xml version="1.0" encoding="utf-8"?>
                <svg width="85px" height="100px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill="#002663" fill-rule="evenodd" d="M4.31351102,11.9651322 L3.49408345,9.96838176 L2.67933919,11.9651322 L4.31351102,11.9651322 Z M12.1730058,14.1264026 L12.1684736,10.2036046 L10.4324776,14.1264026 L9.38130189,14.1264026 L7.64077369,10.2001299 L7.64077369,14.1264026 L5.20575645,14.1264026 L4.74573489,13.0092074 L2.25300723,13.0092074 L1.78830236,14.1264026 L0.488004966,14.1264026 L2.63190183,9.11768179 L4.41065186,9.11768179 L6.44683267,13.8599073 L6.44683267,9.11768179 L8.40082901,9.11768179 L9.96762165,12.5154962 L11.4069075,9.11768179 L13.4001832,9.11768179 L13.4001832,14.1264026 L12.1730058,14.1264026 Z M15.3055732,13.1015049 L15.3055732,12.104716 L17.9339657,12.104716 L17.9339657,11.0825466 L15.3055732,11.0825466 L15.3055732,10.171719 L18.3071194,10.171719 L19.6166324,11.6317021 L18.2491069,13.1015049 L15.3055732,13.1015049 Z M23.4171068,14.1455801 L21.8614469,14.1455801 L20.3872629,12.4870853 L18.8552174,14.1455801 L14.1129918,14.1455801 L14.1129918,9.13565077 L18.9281863,9.13565077 L20.4011617,10.7778295 L21.9239917,9.13565077 L23.488005,9.13565077 L21.1613628,11.6406155 L23.4171068,14.1455801 Z"/>
                </svg>
        </div>
        <div class="link-section">
            <nav>
                <ul class="navbar-li">
                    <form method="post">
                        <li><input type="submit" value="My Account" name="account" class="btn btn-primary"></li>
                    </form>

                    <?php
                        session_start();
                        if (isset($_POST['account'])) {
                            $con = mysqli_connect("localhost" ,"root" ,"" ,"signup_db");

                            $email = $_SESSION['email'];

                            $sql = "select * from signup where Email = '$email'";
                            $rows = mysqli_query($con ,$sql);
                            $result = mysqli_num_rows($rows);
                            if ($result > 0) {
                                header("location:Login.php");

                                // $con = mysqli_connct("localhost" ,"root" ,"" ,"accountopen_db");
                                // $sql = "select * from accountinfo where Email = '$email'";
                                // $rows = mysqli_query($con ,$sql);
                                // $result = mysqli_num_rows($rows);

                                // if ($result > 0) {
                                //     header("Authentication.php");
                                // }

                            } 
                        }
                    ?>

                    <li class="btn primary">Payments</li>
                    <li class="link hover-links">Cards
                        <div class="megamenu">
                            <div class="megamenu-items">
                                <h3>TOP LINKS</h3>
                                <ul>
                                    <li>View All Cards</li>
                                    <li>Credit Cards</li>
                                    <li>Charge Cards</li>
                                    <li>Cardmember Benefits</li>
                                </ul>
                            </div>
                            <div class="megamenu-items">
                                <h3>GET CARDS</h3>
                                <ul>
                                    <li>Premium Cards</li>
                                    <li>Travel Cards</li>
                                    <li>Rewards Cards</li>
                                    <li>Corporate Cards</li>
                                    <li>Add Someone to Your Account</li>
                                </ul>
                            </div>
                            <div class="megamenu-items">
                                <h3>MANAGE MY CARDS </h3>
                                <ul>
                                    <li>View My Card Activity</li>
                                    <li>Check my Spending Power</li>
                                    <li>Pay My Card Bill</li>
                                    <li>Replace or Track my Card</li>
                                    <li>Manage my Card</li>
                                </ul>
                            </div>
                            <div class="megamenu-items">
                                <h3>HELP WITH MY CARD</h3>
                                <ul>
                                    <li>What are the annual fees that I need to pay ?</li>
                                    <li>How do report a lost stolen or damage Card ?</li>
                                    <li>How can I enroll for EMI ?</li>
                                    <li>View all FAQs</li>
                                </ul>
                            </div>
                            <div class="footer">
                                <p class="black-font">Not currently a Cardmember ? Check out Insurance for <a href="">Non-Cardmembers.</a></p>
                            </div>
                        </div>
                    </li>
                   <li class="link"><a href="ContactUs.html" class="link-tag hover-links">Contact us</a></li>
                    <li class="link hover-links">Insurance
                        <div class="megamenu">
                            <div class="megamenu-items">
                                <h3>TOP LINKS</h3>
                                <ul>
                                    <li>Insurance Homepage</li>
                                </ul>
                            </div>
                            <div class="megamenu-items">
                                <h3>INSURE MYSELF</h3>
                                <ul>
                                    <li>Health Insurance</li>
                                    <li>Personal Accident Insurance</li>
                                    <li>Life Insurance</li>
                                    <li>Critical Illness Insurance</li>
                                    <li>Travel Insurance</li>
                                </ul>
                            </div>
                            <div class="megamenu-items">
                                <h3>INSURE MY POSSESSIONS</h3>
                                <ul>
                                    <li>Car Insurance</li>
                                    <li>Two Wheeler Insurance</li>
                                    <li>Home Insurance</li>
                                </ul>
                            </div>
                            <div class="megamenu-items">
                                <h3>HELP WITH INSURANCE</h3>
                                <ul>
                                    <li>How do I make an insurance claim ?</li>
                                    <li>Do I need to be a cardmember to purchase insurance ?</li>
                                    <li>View all FAQs</li>
                                </ul>
                            </div>
                            <div class="footer">
                                <p class="black-font">Not currently a Cardmember ? Check out Insurance for <a href="">Non-Cardmembers.</a></p>
                            </div>
                        </div>
                    </li>
                    <li class="link hover-links">Help ?</li>
                   <a href="Login.html" style="text-decoration: none;"><li class="btn btn-primary">Log in</li></a>
                   <a href="Signup.html" style="text-decoration: none;"><li class="btn primary">Signup</li></a>
                </ul>
            </nav>
        </div>
    </div>
    <!-- Navbar ends here -->

    <!-- About section -->
    <div class="container">
        <div class="box-1">
            <img src="/COLLEGE MINI PROJECT/IMAGES/american3.png" alt="" class="company-img">
            <div class="content-box-1">
                <h1>World's fastest growing bank.</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident possimus numquam iure debitis a tenetur modi omnis reiciendis, animi natus!</p><br>
                <div class="auto-type-setting">
                    <span class="auto-type"></span>
                </div>
                <div class="get-start btn-primary btn">Get start</div>
            </div>
        </div>
    </div>
    <!-- About section -->
    
    <!-- About company logos section -->
    <div class="about-company-logos">
        <p>The worlds's best companies rely on <span style="color: #4361ee;">AMEX</span> to make better financial decisions.</p>
    </div>
    <div class="container-2">
        <div class="box-2">
            <div class="logos">
                <svg class="log-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M257.2 162.7c-48.7 1.8-169.5 15.5-169.5 117.5 0 109.5 138.3 114 183.5 43.2 6.5 10.2 35.4 37.5 45.3 46.8l56.8-56S341 288.9 341 261.4V114.3C341 89 316.5 32 228.7 32 140.7 32 94 87 94 136.3l73.5 6.8c16.3-49.5 54.2-49.5 54.2-49.5 40.7-.1 35.5 29.8 35.5 69.1zm0 86.8c0 80-84.2 68-84.2 17.2 0-47.2 50.5-56.7 84.2-57.8v40.6zm136 163.5c-7.7 10-70 67-174.5 67S34.2 408.5 9.7 379c-6.8-7.7 1-11.3 5.5-8.3C88.5 415.2 203 488.5 387.7 401c7.5-3.7 13.3 2 5.5 12zm39.8 2.2c-6.5 15.8-16 26.8-21.2 31-5.5 4.5-9.5 2.7-6.5-3.8s19.3-46.5 12.7-55c-6.5-8.3-37-4.3-48-3.2-10.8 1-13 2-14-.3-2.3-5.7 21.7-15.5 37.5-17.5 15.7-1.8 41-.8 46 5.7 3.7 5.1 0 27.1-6.5 43.1z"/></svg>

                <svg class="log-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M470.1 231.3s7.6 37.2 9.3 45H446c3.3-8.9 16-43.5 16-43.5-.2.3 3.3-9.1 5.3-14.9l2.8 13.4zM576 80v352c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h480c26.5 0 48 21.5 48 48zM152.5 331.2L215.7 176h-42.5l-39.3 106-4.3-21.5-14-71.4c-2.3-9.9-9.4-12.7-18.2-13.1H32.7l-.7 3.1c15.8 4 29.9 9.8 42.2 17.1l35.8 135h42.5zm94.4.2L272.1 176h-40.2l-25.1 155.4h40.1zm139.9-50.8c.2-17.7-10.6-31.2-33.7-42.3-14.1-7.1-22.7-11.9-22.7-19.2.2-6.6 7.3-13.4 23.1-13.4 13.1-.3 22.7 2.8 29.9 5.9l3.6 1.7 5.5-33.6c-7.9-3.1-20.5-6.6-36-6.6-39.7 0-67.6 21.2-67.8 51.4-.3 22.3 20 34.7 35.2 42.2 15.5 7.6 20.8 12.6 20.8 19.3-.2 10.4-12.6 15.2-24.1 15.2-16 0-24.6-2.5-37.7-8.3l-5.3-2.5-5.6 34.9c9.4 4.3 26.8 8.1 44.8 8.3 42.2.1 69.7-20.8 70-53zM528 331.4L495.6 176h-31.1c-9.6 0-16.9 2.8-21 12.9l-59.7 142.5H426s6.9-19.2 8.4-23.3H486c1.2 5.5 4.8 23.3 4.8 23.3H528z"/></svg>

                <svg class="log-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z"/></svg>

                <svg class="log-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z"/></svg>

                <svg class="log-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M0 32h214.6v214.6H0V32zm233.4 0H448v214.6H233.4V32zM0 265.4h214.6V480H0V265.4zm233.4 0H448V480H233.4V265.4z"/></svg>

                <svg class="log-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path d="M111.4 295.9c-3.5 19.2-17.4 108.7-21.5 134-.3 1.8-1 2.5-3 2.5H12.3c-7.6 0-13.1-6.6-12.1-13.9L58.8 46.6c1.5-9.6 10.1-16.9 20-16.9 152.3 0 165.1-3.7 204 11.4 60.1 23.3 65.6 79.5 44 140.3-21.5 62.6-72.5 89.5-140.1 90.3-43.4.7-69.5-7-75.3 24.2zM357.1 152c-1.8-1.3-2.5-1.8-3 1.3-2 11.4-5.1 22.5-8.8 33.6-39.9 113.8-150.5 103.9-204.5 103.9-6.1 0-10.1 3.3-10.9 9.4-22.6 140.4-27.1 169.7-27.1 169.7-1 7.1 3.5 12.9 10.6 12.9h63.5c8.6 0 15.7-6.3 17.4-14.9.7-5.4-1.1 6.1 14.4-91.3 4.6-22 14.3-19.7 29.3-19.7 71 0 126.4-28.8 142.9-112.3 6.5-34.8 4.6-71.4-23.8-92.6z"/></svg>

                <svg class="log-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"/></svg>

                <svg class="log-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M104.9 352c-34.1 0-46.4-30.4-46.4-30.4L2.6 210.1S-7.8 192 13 192h32.8c10.4 0 13.2 8.7 18.8 18.1l36.7 74.5s5.2 13.1 21.1 13.1 21.1-13.1 21.1-13.1l36.7-74.5c5.6-9.5 8.4-18.1 18.8-18.1h32.8c20.8 0 10.4 18.1 10.4 18.1l-55.8 111.5S174.2 352 140 352h-35.1zm395 0c-34.1 0-46.4-30.4-46.4-30.4l-55.9-111.5S387.2 192 408 192h32.8c10.4 0 13.2 8.7 18.8 18.1l36.7 74.5s5.2 13.1 21.1 13.1 21.1-13.1 21.1-13.1l36.8-74.5c5.6-9.5 8.4-18.1 18.8-18.1H627c20.8 0 10.4 18.1 10.4 18.1l-55.9 111.5S569.3 352 535.1 352h-35.2zM337.6 192c34.1 0 46.4 30.4 46.4 30.4l55.9 111.5s10.4 18.1-10.4 18.1h-32.8c-10.4 0-13.2-8.7-18.8-18.1l-36.7-74.5s-5.2-13.1-21.1-13.1c-15.9 0-21.1 13.1-21.1 13.1l-36.7 74.5c-5.6 9.4-8.4 18.1-18.8 18.1h-32.9c-20.8 0-10.4-18.1-10.4-18.1l55.9-111.5s12.2-30.4 46.4-30.4h35.1z"/></svg>
            </div>
        </div>
    </div>
    <!-- About company logos section -->

    <div class="box-3">
        <div class="img-1">
            <h1>Earn up to 5X* bonus points with Reward Multiplier</h1>
            <p>Choose from 50+ brands like Apple, Croma, Flipkart, MakeMyTrip, Nykaa, Tanishq and many more.</p>
            <button class="spec-btn">Shop Now</button>
            <p class="small-font">*Terms & Conditions apply</p>
            <p>Don't live life without it</p>
        </div>
    </div>

    <div class="cards">
        <div class="card-section-left">
            <div class="boxy">
                <img src="/COLLEGE MINI PROJECT/IMAGES/cardimg1.avif" alt="" class="card-class">
                <div class="content">
                    <h3>Check Card Eligiblity</h3>
                    <p class="font-style">Choose the American Exprees Credit Card that suits you best.</p>
                </div>
            </div>
            <div class="boxy">
                <img src="/COLLEGE MINI PROJECT/IMAGES/cardimg2.avif" alt="" class="card-class">
                <div class="content">
                    <h3>Check Card Eligiblity</h3>
                    <p class="font-style">Choose the American Exprees Credit Card that suits you best.</p>
                </div>
            </div>
        </div>
        <div class="info-section-right">
            <h1>Exclusive benefits, rewards and offers from American Express.</h1><br>
            <p>Whether your business takes you across the globe or you simply wish to get more out of your everyday expenses, our Cards are designed with benefits that are most useful to you and offer you an upgraded lifestyle.</p><br>
            <button class="spec-btn-2">Your Card Benefits</button>
        </div>
    </div>

    <!-- Card section starts here -->
    <div class="card-section">
        <div class="header-section">
            <h1>Latest Offers and Updates from American Express</h1>
        </div>

        <div class="inner-card-section">
            <div class="offers-cards">
                <img src="https://www.americanexpress.com/content/dam/amex/en-in/homepage/offers/Eligibility-Test1.jpg" alt="" class="card-img">
                <h3 class="card-heading">Check your eligibility for our Cards</h3>
                <div class="card-button">Learn More</div>
            </div>
            <div class="offers-cards">
                <img src="https://www.americanexpress.com/content/dam/amex/en-in/homepage/offers/referfriend.jpg" alt="" class="card-img">
                <h3 class="card-heading">Membership Benefits</h3>
                <div class="card-button">Learn More</div>
            </div>
            <div class="offers-cards">
                <img src="https://www.americanexpress.com/content/dam/amex/en-in/homepage/offers/PlatinumBenefits.jpg" alt="" class="card-img">
                <h3 class="card-heading">Get special benefits with premium cards</h3>
                <div class="card-button">Learn More</div>
            </div>
        </div>
    </div>
    <!-- Card section ends here -->

    <!-- Card section-2 start here -->
    <div class="card-section-2">
        <div class="security-cards">
            <h1>Manage your Pin</h1>
            <h3>Create, View or Change your PIN with a few simple steps</h3>
            <div class="card-security-button">Learn More</div>
        </div>
        <div class="security-cards">
            <h1>Replace your Card</h1>
            <h3>Request for a replacement Card in case your Card was lost, stolen, damaged.</h3>
            <div class="card-security-button">Learn More</div>
        </div>
        <div class="security-cards">
            <h1>Learn about Card Security</h1>
            <h3>Our features and tips, all designed to help you stay safe.</h3>
            <div class="card-security-button">Learn More</div>
        </div>
    </div>
    <!-- Card section-2 ends here -->

    <!-- nav-section starts here -->
    <div class="items">
        <div class="section">
            <ul>
                <h3>TOP LINKS</h3>
                <li>View Personal Cards</li>
                <li>Most Important Terms and Conditions</li>
                <li>Schedule of Fees and Charges</li>
            </ul>
        </div>
        <div class="section">
            <ul>
                <h3>BUSINESS LINKS</h3>
                <li>View Corporate Cards</li>
                <li>Corporate Travel</li>
                <li>Merchant Know Your Customer (KYC)</li>
                <li>Corporate Know Your Customer (KYC)</li>
                <li>Know Your Customer (KYC)</li>
            </ul>
        </div>
        <div class="section">
            <ul>
                <h3>COMPANY INFORMATION</h3>
                <li>Vision and Mission Statement</li>
                <li>Customer Service Committee</li>
                <li>Complaints</li>
                <li>Contact Us</li>
                <li>Careers</li>
                <li>COVID-19 FAQs</li>
            </ul>
        </div>
        <div class="section">
            <ul>
                <h3>POLICY AND REGULATION</h3>
                <li>Notice Board</li>
                <li>Financial Disclosure</li>
                <li>Our Codes and Policies</li>
                <li>Do Not Call Registry</li>
                <li>Card Fraud</li>
                <li>Regulatory Notifications</li>
            </ul>
        </div>
    </div>
    <!-- nav-section endss here -->

    <!-- Footer starts here -->
    <div class="footer-section">
        <h2>AMERICAN EXPRESS</h2>
        <div class="border-style"></div>
        <div class="footer-1">
            <p>Website Rules and Regulations</p>
            <p>Trademarks</p>
            <p>Privacy Centre</p>
            <p>Sitemap</p>
        </div>
        <div class="footer-2">
            <h5>Copyright © 2023 American Express Company | American Express Banking Corp.</h5>
        </div>
    </div>
    <!-- Footer ends here -->


    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    <script>
        let typed = new Typed(".auto-type", {
            strings: ["Serves 1 billion active user.", "Your trust our responsiblity.", "Be a member of our family." ,"Across 150+ countries"],
            typeSpeed: 50,
            backSpeed: 50,
            loop: true
        })
    </script>
    
</body>
</html>

