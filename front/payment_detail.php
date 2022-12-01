
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

		}
		?>
	<body>
		<h1><a href=main.html>Back</a></h1>
	</body>
</html>
