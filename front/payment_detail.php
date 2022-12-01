<?php
	session_start();
	$data_arr=$_SESSION['book_flights'];
	$cur_date=date("Y/m/d");
	$count_submit=$_SESSION["count_submit"];
	$jet_id=$data_arr[$count_submit][10];
	$mysql = mysqli_connect("localhost","admin","admin","airlines");
			if (!$mysql) {
				die("Connection failed: " . mysqli_connect_error());
			}
	$mysql->query("UPDATE ticket SET booking_status='payed' WHERE pnr='102'");
			
	$mysql->query("INSERT INTO payments (date,price,pnr,jet_id,pass_id) 
	VALUES ('$cur_date','25000','102','$jet_id','1')");
	$mysql->close();
?>
<html >
	<head>
		
        <link rel="stylesheet" href="./assets/payment.css">
	</head>


		<?php

		if(isset($_GET["name"])&&isset($_GET["section"])&&isset($_GET["cardnumber"])&&isset($_GET["cardtype"]))
		{
			$name_s=$_GET["name"];
			$section_s=$_GET["section"];
			$cardnumber_s=$_GET["cardnumber"];
			$cardtype_s=$_GET["cardtype"];
			$valid=false;
			$defis=false;

			if(!empty($name_s)&&!empty($section_s)&&!empty($cardnumber_s)&&!empty($cardtype_s))
			{
				if(substr($cardnumber_s,0,1)=="4" && $cardtype_s=="visa" || (substr($cardnumber_s,0,1)=="5" && $cardtype_s=="mastercard"))
				{
					if(is_numeric($cardnumber_s) && strlen($cardnumber_s)==16)
					$valid=true;
					else if(strlen($cardnumber_s)==19){
						
						for($i=0;$i<19;$i++){
					
							if($i==4||$i==9||$i==14){
								if(substr($cardnumber_s,$i,1)=="-"){
									$valid=true;
									
								}
							}
							else if(!is_numeric(substr($cardnumber_s,$i,1))){
								$valid=false;
								break;}
						
							}
						
					}
					
				}


			
			}
			else{
				$valid=false;
			}
			
			if($valid==false){
				echo "<h1>Sorry</h1>
				<p>You didn't fill out the form completely.  <a href=buyagrade.html>Try again?</a></p>";
			}
			else{
				

			}
			
			

		}
		?>
	<body>
		<h1><a href=main.html>Back</a></h1>
	</body>
</html>
