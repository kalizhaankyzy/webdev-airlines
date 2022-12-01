
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="stylesheet" href="./assets/ordering.css">
    <link rel="stylesheet" href="./assets/navbar.css">
    <link rel="stylesheet" href="./assets/footer.css">
    <link rel="stylesheet" href="./assets/payment.css">
    <script src="https://kit.fontawesome.com/3a6c74b0d8.js" crossorigin="anonymous"></script>
    <script src="./scripts/one-way.js"></script>
    
    <title>Qatar Airways</title>
</head>

<body>
    
    
    
        <div class="container">
            
                <form action="inserting_data.php" method="post" autocomplete="none" >
                    <div class="row">
                    <h1>Passanger Details</h1>
                    <h4> Name </h4> <input type="text" name="passname" id="passname" required>
                   
                    <div>
                    <h4>Last Name </h4> <input type="text" name="passlastname" id="passlastname" required>
                    </div>
                    <div >
                            <h4>Nationality</h4><input type="text" name="passnation" id="passnation" required>
                            <ul class="list" style="display: block;"></ul>
                            </div>
                    </div>
                    <div >

                        
                        <div class="row">
                        <div class="col-half">
                            <h4> Birth Date </h4></label> <input type="date" name="passdate" id="passdate" required>
                        </div>
                        <div class="col-half">
                            <h4>Passport Date</h4>
                    
                        <input type="date" name="passportdate" id="passportdate" >
                    </div>

                    </div>
                    <div class="col-half">
                    <h4>Passport</h4>
                    
                        <input type="text" name="passport" id="passport" required>
                    </div>

                    <div class="col-half">
                            <div >
                            <h4>Gender </h4> 
                            <input type="radio" name="passgender" id="passmale" value="Male" required> <label for="passmale">  Male </label>
                            <input type="radio" name="passgender" id="passfemale"  value="Female" required><label for="passfemale">  Female </label>
                            </div>   
                            </div>
                    <div>
                        <input type="submit" value="Continue" name="passSubmit">
                    </div>
                    </div>
                    

                </form>
            </div>
                
                <script src="scripts/order-nation.js"></script>
                
            
        
 
    <script src="./scripts/order-city.js"></script>
    <div class="content" id="news">
        <h1>Start planning your next trip</h1>
        <p>Thinking of travelling somewhere soon? Here are some options to help you get started.</p>
        <div class="news-content">
            <div class="item" id="item1">
                <p>Explore our destinations</p>
                <div class="descr"><a href="./explore/america-explore.html">Find flights and fares <i class="fas fa-long-arrow-alt-right"></i></a></div>
            </div>
            <div class="item" id="item2">
                <p>Your perfect holidays in Bali </p>
                <div class="descr"><a href="./explore/bali-explore.html">Book a package <i class="fas fa-long-arrow-alt-right"></i></a></div>
            </div>
            <div class="item" id="item3">
                <p>Travelling with children</p>
                <div class="descr"><a href="./experience/trvwkids.html">Find out more <i class="fas fa-long-arrow-alt-right"></i></a></div>
            </div>
            <div class="item" id="item4">
                <p>Special services</p>
                <div class="descr"><a href="./experience/services.html">Learn more <i class="fas fa-long-arrow-alt-right"></i></a></div>
            </div>
        </div>
    </div>
    <div class="content" id="places">
        <h1>Let's go places together</h1>
        <p>Discover the latest offers and news and start planning your next trip with us.</p>
        <div class="places-content">
            <div class="item" id="pl-item1">
                <img src="./src/h2-transfer-avios.jpeg">
                <div class="img-descrp">
                    <h3>Your loyalty takes you further</h3>
                    <p>Now that Qmiles have changed to Avios, you can enjoy more rewards than ever for your loyalty with Privilege Club.</p>
                    <a href="#">Discover the possibilities <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
            <div class="item" id="pl-item2">
                <img src="./src/h2-vegan-meal.jpeg">
                <div class="img-descrptn">
                    <h3>What's on the menu?</h3>
                    <p>Use our app to find out what's being served on your trip.</p>
                    <a href="#">Learn more <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
            <div class="item" id="pl-item3">
                <img src="./src/h3-canberra-hot-air-balloon.jpeg">
                <div class="img-descrptn">
                    <h3>Discover Canberra</h3>
                    <p>Explore Australia from its most charming cosmopolitan hub.</p>
                    <a href="#">Book now <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
            <div class="item" id="pl-item4">
                <img src="./src/h2-sc-anniversary-tile-v2.jpeg">
                <div class="img-descrptn">
                    <h3>Join Student Club</h3>
                    <p>Enjoy special fares, extra baggage, complimentary Wi-Fi and more.</p>
                    <a href="#">Join today <i class="fas fa-long-arrow-alt-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="content" id="complement">
        <h1>Complement your journey</h1>
        <p>Upgrade or save up to 20% when you purchase extra baggage, lounge access or meet and assist services online to make your journey even more memorable.</p>
        <div class="cmplmnt-content">
            <div class="item">
                <img src="./src/h2-qsuite-businessman.jpeg">
                <div class="descr"><a href="#">Upgrade to premium <i class="fas fa-long-arrow-alt-right"></i></a></div>
            </div>
            <div class="item">
                <img src="./src/h2-extra-baggage.jpeg">
                <div class="descr"><a href="#">Extra baggage <i class="fas fa-long-arrow-alt-right"></i></a></div>
            </div>
            <div class="item">
                <img src="./src/h1-almourjan-business-class-lounge-business.jpeg">
                <div class="descr"><a href="#">Lounges <i class="fas fa-long-arrow-alt-right"></i></a></div>
            </div>
            <div class="item">
                <img src="./src/h2-Al-Maha-Services.jpeg">
                <div class="descr"><a href="#">Al Maha meet & assist <i class="fas fa-long-arrow-alt-right"></i></a></div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="wave">
            <svg version="1.1" width="2000" height="131" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2000 131.2" style="enable-background:new 0 0 2000 131.2;" xml:space="preserve">
                <path opacity="0.2" fill="#5c0931" class="st0" d="M-0.5,83.4c59.6,40.5,193.3,35,316.7-12.3C525.6-9.2,756.7-9.6,979.8,12.3s445.6,57.9,669.8,54.1C1821.1,63.5,1932,56,2000,53c0,36,0,76.4,0,76.4H1L-0.5,83.4z"></path>
                <path opacity="0.2" fill="#5c0931" class="st1" d="M309.2,46.1c265.1-57.8,453.7-19.6,687.9,6.8c285.1,32.2,564.2,63,863.4,33.4c94-9.3,119.5-19.6,139.5-19c0,32.2,0,63,0,63H0v-66C0,64.3,152.7,80.2,309.2,46.1z"></path>
                <path opacity="0.4" fill="#5c0931" class="st1" d="M344.5,54.9c82.3-26.3,167.2-46,253-36.5S767,51.6,851.9,67.8c272.3,52,522.5,16.7,819.3,5c90-3.5,293.8-13.6,328.8-12.6c0,24,0,71,0,71H-1v-59C-1,72.3,198.7,101.6,344.5,54.9z"></path>
                <path fill="#5c0931" d="M1731.8,97.1c-289.3,18.5-590.4,17.2-873.9-16.8C746,66.9,641.1,42.1,528.5,39.5s-249.3,31-353.7,69.9c-57.5,21.4-164.7,2.3-175.7-4.7c0,8,0,26.5,0,26.5h2003v-58C2002,73.3,1854.2,89.2,1731.8,97.1z"></path>
           </svg>
        </div>
        <div>
            <h3>Qatar Airways</h3>
            <ul>
                <li><a href="#">About us</a></li>
                <li>Awards</li>
                <li>Careers</li>
                <li>Sponsorship</li>
            </ul>
        </div>
        <div>
            <h3>Contact us</h3>
            <ul>
                <li>Help</li>
            </ul>
        </div>
        <div style="width: 20%;">
            <h3>Let's stay connected</h3>
            <ul class="footer-icons">
                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                <li><a href="#"><i class='fab fa-twitter'></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
        </div>
    </div>
</body>

</html>