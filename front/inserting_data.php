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
    
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body>
    <div class="phppot-container text-center">
        <div class="success inline-block">You are successfully Booked</div>
    </div>
</body>
</html>