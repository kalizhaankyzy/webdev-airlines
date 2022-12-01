<?php
   $passname=filter_var(trim(strtolower($_POST['passname'])));
   $passlastname=filter_var(trim(strtolower($_POST['passlastname'])));
   $passdate=filter_var(trim(strtolower($_POST['passdate'])));
   $passport=filter_var(trim(strtolower($_POST['passport'])));
   $passnation=filter_var(trim(strtolower($_POST['passnation'])));
   $passportdate=filter_var(trim(strtolower($_POST['passportdate'])));
   $passgender=filter_var(trim(strtolower($_POST['passgender'])));
   $mysql=new mysqli("localhost","admin","admin","airlines");

    $mysql->query("INSERT INTO passengers (first_name,last_name,birth_date,nationality,gender,passport_num,passport_exp_date) VALUES('$passname','$passlastname',
    '$passdate','$passnation','$passgender','$passport','$passportdate')");
    
    
    $mysql->close();

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
    <title>Qatar Airways</title>
</head>

<body>
    <?php include('./templates/header.php'); ?>
    <div class="content" id="booking">
        <div class="book-cont">           
            <h1>Payment</h1>
            <form action="payment_detail.php" method="get">
			<dl>
				<dt>Section</dt>
				<dd>
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
				</dd>

				<dt>Credit Card</dt>
				<dd>
					<input type="text" name="cardnumber" /><br />
					<label><input type="radio" name="cardtype" value="visa" />Visa</label>
					<label><input type="radio" name="cardtype" value="mastercard" />MasterCard</label>
				</dd>
			</dl>

			<div>
				<input type="submit" value="PAY" />
			</div>
		</form>
        </div>
    </div>
    <?php include('./templates/footer.php'); ?>  
</body>
</html>
