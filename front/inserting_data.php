<?php
require('connection.php');
session_start();
   $passname=filter_var(trim(strtolower($_POST['passname'])));
   $passlastname=filter_var(trim(strtolower($_POST['passlastname'])));
   $passdate=filter_var(trim(strtolower($_POST['passdate'])));
   $passport=filter_var(trim(strtolower($_POST['passport'])));
   $passnation=filter_var(trim(strtolower($_POST['passnation'])));
   $passportdate=filter_var(trim(strtolower($_POST['passportdate'])));
   $passgender=filter_var(trim(strtolower($_POST['passgender'])));
   $type_place=$_SESSION['type_place'];
   $data_arr=$_SESSION['book_flights'];

   $count_submit=$_SESSION["count_submit"];
   $jet_id=$data_arr[$count_submit][10];
   $flight_no=$data_arr[$count_submit][0];
   $passnum=1;
   $mysql->query("INSERT INTO passengers (first_name,last_name,birth_date,nationality,gender,passport_num,passport_exp_date) VALUES('$passname','$passlastname',
    '$passdate','$passnation','$passgender','$passport','$passportdate')");
    $cur_date=date("Y/m/d");
    $mysql->query("INSERT INTO ticket (rsrv_date,class,booking_status,passengers_num,flight_no,jet_id) 
    VALUES ('$cur_date','$type_place','waiting for payment','1','$flight_no','$jet_id')");

    $mysql_ticketid->query("SELECT pnr FROM ticket ORDER BY pnr DESC LIMIT 1");
    $query = "SELECT pass_id FROM passengers ORDER BY pass_id DESC LIMIT 1";
    $query1 = "SELECT pnr FROM ticket ORDER BY pnr DESC LIMIT 1";
    $result1 = mysqli_query($mysql_passid, $query) or die(mysql_error());
    $result2 = mysqli_query($mysql_ticketid, $query) or die(mysql_error());
    
    while($row = $result1->fetch_assoc()){
        $_SESSION['pass_id']=$row['pass_id'];
    }
    while($row = $result2->fetch_assoc()){
        $_SESSION['ticket_id']=$row['pnr'];
    }

    $mysql->close();
    $mysql_passid->close();


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
    <link rel="stylesheet" href="./assets/payment.css">
    <script src="https://kit.fontawesome.com/3a6c74b0d8.js" crossorigin="anonymous"></script>
    <script>
			setTimeout(function(){
			window.location.href = 'main.php';
			}, 500 * 1000);
		</script>
    <title>Qatar Airways</title>

</head>

<body>
    <?php include('./templates/header.php'); ?>
    <div class="content" id="booking">
        <div class="container">

            <form action="payment_detail.php" method="get">
            <div class="raw">

                      
            <h1>You ordered ticket.<br>Please, select payment</h1>
                <div >
                    <h4>Credit Card</h4>
					<input type="text" name="cardnumber" /><br />
                </div>
                <div class="col-half">
                <h4>Section</h4>
					<select name="section">
						<option value="">(Select a section)</option>
						<option>MA</option>
						<option>MB</option>
						<option>MC</option>
						<option>MD</option>
						<option>ME</option>
						<option>MF</option>
						<option>MG</option>
						<option>MH</option>
					</select>
                </div>

                <div class="col-half">
                <h4>Card Type</h4>
					<input type="radio" name="cardtype" id="visa" value="visa" required/><label for="visa">Visa</label>
					<input type="radio" name="cardtype" id="mastercard" value="mastercard" required/><label for="mastercard">MCard</label>

                </div>
                    
			<div>
				<input type="submit" value="PAY" />
			</div>
		</form>
        </div> 
        </div>
    </div>
    <?php include('./templates/footer.php'); ?>  
</body>
</html>
