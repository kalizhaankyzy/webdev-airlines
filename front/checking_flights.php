<?php
    session_start();
    $order_from=filter_var(trim(strtolower($_POST['order-from'])));
    $order_to=filter_var(trim(strtolower($_POST['order-to'])));
    $depart_time=$_POST['time-depart'];
    $return_time=$_POST['time-return'];
    $mysql=new mysqli("localhost","admin","admin","airlines_new");
    if ($mysql->connect_error) {
        echo "doesnt connect";
        die("Connection failed: " . $mysql->connect_error);

      }
    
    $result=$mysql->query("SELECT*FROM flight_details WHERE from_city='$order_from' AND to_city='$order_to' AND departure_time='$depart_time'");
    $flight=$result->fetch_assoc();
    if(count($flight)==0){
        var_dump("Invalid");
        echo $order_from ,$order_to;
        $_SESSION['Inv']=true;
        // header('Location: ./main.html');
        exit;}
    echo "Choose your jet and time";

        
?>