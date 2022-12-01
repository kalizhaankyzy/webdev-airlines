<?php
    session_start();
    $count_submit=0;
    $data_arr=$_SESSION['book_flights'];
    $_SESSION['for_ticket']=$_SESSION['book_flights'];
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
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

    $_SESSION["count_submit"]=$count_submit;

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
                    <form action="passenger_details.php" method="post"></form>
                        <div class="order-form">
                            <div class="destination">
                                <div class="grid-order grid-order-1" >
                                    <p class="time"><?php echo $data_arr[$count_submit][3]; ?></p>
                                    <p class="caption"><?php echo strtoupper($data_arr[$count_submit][1]); ?></p>
                                </div>
                                <div class="grid-order grid-order-2"  >
                                    <p class="time"><?php echo $data_arr[$count_submit][4]; ?></p>
                                    <p class="caption" style="text-align: end;"><?php echo strtoupper($data_arr[$count_submit][2]); ?></p>
                                </div>
                            </div>
                            <div class="class">
                                <div name="class_economy" id="class_economy" class="customButton" onClick="document.forms['flightsClass'].submit()">
                                    <p>Economy</p>
                                    <p class="price"><?php echo $data_arr[$count_submit][7]; ?> tenge</p>
                                </div>
                                <div name="class_business" id="class_business" class="customButton" onClick="document.forms['flightsClass'].submit()">
                                    <p>Business</p>
                                    <p class="price"><?php echo $data_arr[$count_submit][9]; ?> tenge</p>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
    <?php include('./templates/footer.php'); ?>  
</body>

</html>
