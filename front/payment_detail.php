<?php
	session_start();
	$data_arr=$_SESSION['book_flights'];
	$cur_date=date("Y/m/d");
	$count_submit=$_SESSION["count_submit"];
	$jet_id=$data_arr[$count_submit][10];
	$valid=false;
	$dd="0";
	$pass_id=$_SESSION['pass_id'];
	$type_place=$_SESSION['type_place'];
	$ticket_id=$_SESSION['ticket_id'];
	$ticket_price=$data_arr[$count_submit][7];
?>
<html >
	<head>
		
        <link rel="stylesheet" href="./assets/payment.css">
		<!-- <script>
			setTimeout(function(){
			window.location.href = 'main.php';
			}, 500 * 1000); -->
		<!-- </script>
	</head>


		<?php
		require('connection.php');

		if(isset($_GET["section"])&&isset($_GET["cardnumber"])&&isset($_GET["cardtype"]))
		{
			
			$section_s=$_GET["section"];
			$cardnumber_s=$_GET["cardnumber"];
			$cardtype_s=$_GET["cardtype"];
			
			$defis=false;

			if(!empty($section_s)&&!empty($cardnumber_s)&&!empty($cardtype_s))
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
									$dd="1";
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
				$dd="0";
				$valid=false;
			}
			if($valid){
				$mysql->query("UPDATE ticket SET booking_status='payed' WHERE pnr='$ticket_id'");
				
				$mysql->query("INSERT INTO payments (date,price,pnr,jet_id,pass_id) 
				VALUES ('$cur_date','$ticket_price','$ticket_id','$jet_id','$pass_id')");
				$mysql->close();
			}
			
			
			
			

		}
		?>
	<body>
		<h1><a href=main.php>Back</a></h1>
		<?php
		if($valid==false){
			echo $dd;
			echo "<h1>Sorry</h1>
			<p>You didn't fill out the form completely.  <a href=inserting_data.php>Try again?</a></p>";
		}
		?>
	</body>
</html>
