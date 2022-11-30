<?php


$mysql = mysqli_connect("localhost","root","qwerty123","airlines");
// Проверяем соединение
if (!$mysql) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM flight_details JOIN jet ON flight_details.jet_id=jet.jet_id 
WHERE flight_details.from_city='almaty' AND flight_details.to_city='india' AND flight_details.departure_date='2022-12-01'";
$result = mysqli_query($mysql, $query) or die(mysql_error());
$rows = mysqli_num_rows($result);

if ($rows >= 1) {
    while($row = $result->fetch_assoc()) {
        $count=0;
        ?>
        <tbody>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $row['flight_no'];?></td>
                <td><?php echo $row['departure_time'];?></td>
                <td><?php echo $row['arrival_time'];?></td>
                <td><?php echo $row['type'];?></td>
                <td><?php echo $row['seats_economy'];?></td>
                <td><?php echo $row['price_economy'];?></td>
                <td><?php echo $row['seats_business'];?></td>
                <td><?php echo $row['price_business'];?></td>
                <td>
                <?php

                // array_push($data_arr[$count],$rows['flight_no'],$rows['departure_time'],$rows['arrival_time'], $rows['type'],$rows['seats_economy'],$rows['price_economy'],$rows['seats_business'],$rows['price_business']);
                
                echo " <input type='submit' name='submit$count' value='Book Ticket'> ";
                $count++;
                ?>
                </td>

            </tr>
        </tbody>
        
        <?php
    }
}
// $row = mysql_fetch_array($result);

//display the results

?>