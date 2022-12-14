<?php
require('connection.php');
session_start();
$data_arr=array(
    0=>array(),
    1=>array(),
    2=>array(),
    3=>array(),
    4=>array(),
    5=>array(),
    6=>array(),
    7=>array(),
    8=>array(),
    9=>array(),
    10=>array()
);
$order_from=filter_var(trim(strtolower($_SESSION['order-from'])));
$order_to=filter_var(trim(strtolower($_SESSION['order-to'])));

$depart_time= date($_SESSION['time-depart']);
$flight_options = filter_var(trim(strtolower($_SESSION['flight-options'])));
if($flight_options == 'round-trip'){
    $return_time=date($_SESSION['time-return']);
}
$one_way=false;
if($return_time==""){
    $one_way=true;
}

if($one_way){
    $query = "SELECT * FROM flight_details JOIN jet ON flight_details.jet_id=jet.jet_id 
    WHERE flight_details.from_city='$order_from' AND flight_details.to_city='$order_to' AND flight_details.departure_date='$depart_time'";
    $result = mysqli_query($mysql, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
}
else{
    $query = "SELECT * FROM flight_details JOIN jet ON flight_details.jet_id=jet.jet_id 
    WHERE (flight_details.from_city='$order_to' AND flight_details.to_city='$order_from' AND flight_details.departure_date='$return_time') OR (flight_details.from_city='$order_from' AND flight_details.to_city='$order_to' AND flight_details.departure_date='$depart_time')";
    $result = mysqli_query($mysql, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
}

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
    <link rel="stylesheet" href="./assets/choose_time_place.css">
    <script src="https://kit.fontawesome.com/3a6c74b0d8.js" crossorigin="anonymous"></script>
    <title>Qatar Airways</title>
</head>

<body>
    <?php include('./templates/header.php'); ?>
    <div class="content" id="booking">
        <div class="book-cont">           
            <h1>Flight Table</h1>
            <!-- TABLE CONSTRUCTION -->
            <div class="order-container">
            <form action="book_flights.php" method="post" name="book_flights_form" style="text-align: center;">
                <table class="responsive-table">
                    <thead>
                        <tr>
                            <th scope="col">From->To</th>
                            <th scope="col">Flight No</th>
                            <th scope="col">Departure Date</th>
                            <th scope="col">Arrival Date</th>
                            <th scope="col">Airplane</th>
                            <th scope="col">Economy</th>
                            <th scope="col">Business</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <!-- PHP CODE TO FETCH DATA FROM ROWS -->
                    <?php
                    $count=0;
                        if ($rows >= 1) {
                            // LOOP TILL END OF DATA
                            while($row = $result->fetch_assoc()){ 
                    ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?php echo $row['from_city']." - ".$row['to_city'];?></th>
                            <th scope="row"><?php echo $row['flight_no'];?></th>
                            <td data-title="Departure Date"><?php echo($row['departure_date'].' '. $row['departure_time']);?></td>
                            <td data-title="Arrival Date"><?php echo($row['arrival_date'].' '. $row['arrival_time']);?></td>
                            <td data-title="Airplane"><?php echo $row['type'];?></td>
                            <td data-title="Economy" data-type="currency"><?php echo ($row['price_economy']. ' tenge');?></td>
                            <td data-title="Business"><?php echo ($row['price_business']). ' tenge';?></td>
                            <td>
                            <?php
                            array_push($data_arr[$count],$row['flight_no'],$row['from_city'],$row['to_city'],$row['departure_time'],$row['arrival_time'], $row['type'],$row['seats_economy'],$row['price_economy'],$row['seats_business'],$row['price_business'],$row['jet_id']);
                            
                            echo " <input type='submit' name='submit$count' value='Book' style='background-color: #8E2157; color: white;height: 25px;width: 80px;border:none; cursor: pointer;'> ";
                            $count++;
                            ?>
                            </td>

                        </tr>
                    </tbody>
                    <?php
                        }}
                        $_SESSION['book_flights']=$data_arr;
                        if($rows == 0) {
                    ?>
                        <p style="text-align: center;">Unfortunately, there are no flights on the day you have chosen.</p>
                        <a style="color: #5c0931; text-decoration: underline;" href="http://localhost/webdev-airlines/front/book/timetable.php">Book flights</a>
                        
                    <?php
                        }
                    ?>
                </table>
            </form>
            </div>
        </div>
    </div>
    <?php include('./templates/footer.php'); ?>  
</body>
</html>
