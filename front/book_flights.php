<?php
    session_start();
    $count_submit=0;
    $data_arr=$_SESSION['book_flights'];
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        // Something posted
        while(true){
            $submited_name="submit$count_submit";
            if (isset($_POST[$submited_name])){
                break;
            }
            $count_submit++;
        }
        $submited_name=$count_submit;
      }
    else
    $submited_name="-1";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/navbar.css">    
    <link rel="stylesheet" href="./assets/footer.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/3a6c74b0d8.js" crossorigin="anonymous"></script>
    <title>Qatar Airways</title>
</head>

<body>
    <?php include('./templates/header.php'); ?>
    <div class="content" id="booking">
        <div class="book-cont">
            <h1>Flight details</h1>
                <div class="order-container">
                    <div>
                    <form action="" name="flightsClass" method="post" autocomplete="off">
        
                        <div class="order-form">
                            <div class="destination">
                                <div class="grid-order grid-order-1" >
                                    <p class="time"><?php $data_arr[$count_submit][0]; ?></p>
                                    <p class="caption">Almaty</p>
                                </div>
                                <div class="grid-order grid-order-2"  >
                                    <p class="time">11:05</p>
                                    <p class="caption" style="text-align: end;">Almaty</p>
                                </div>
                            </div>
                            <div class="class">
                                <div name="class_economy" id="class_economy" class="customButton" onClick="document.forms['flightsClass'].submit()">
                                    <p>Economy</p>
                                    <p class="price">300,000 tenge</p>
                                </div>
                                <div name="class_business" id="class_business" class="customButton" onClick="document.forms['flightsClass'].submit()">
                                    <p>Business</p>
                                    <p class="price">300,000 tenge</p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
<?php
session_destroy();
?>