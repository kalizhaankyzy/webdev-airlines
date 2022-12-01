<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/navbar.css">
    <link rel="stylesheet" href="./assets/footer.css">
    <link rel="stylesheet" href="./assets/payment.css">
    <script src="https://kit.fontawesome.com/3a6c74b0d8.js" crossorigin="anonymous"></script>
    <title>Qatar Airways</title>
    <style>
        .header .wave{
        display: none;
        }
        .footer{
            top: 100%;
            margin-top: 40%;
        }
        .footer a{
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php include('./templates/header.php'); ?> 

    <div class="container">
            
            <form action="inserting_data.php" method="post" autocomplete="none" >
                <div class="row">
                <h1>Passanger Details</h1>
                <h4> Name </h4> <input type="text" name="passname" id="passname" required>
               
                <div>
                <h4>Last Name </h4> <input type="text" name="passlastname" id="passlastname" required>
                </div>
                <div >
                        <h4>Nationality</h4><input type="text" name="passnation" id="passnation" required>
                        <ul class="list" style="display: block;"></ul>
                        </div>
                </div>
                <div >
                    
                    <div class="row">
                    <div class="col-half">
                        <h4> Birth Date </h4></label> <input type="date" name="passdate" id="passdate" required>
                    </div>
                    <div class="col-half">
                        <h4>Passport Date</h4>
                
                    <input type="date" name="passportdate" id="passportdate" >
                </div>
                </div>
                <div class="col-half">
                <h4>Passport</h4>
                
                    <input type="text" name="passport" id="passport" required>
                </div>
                <div class="col-half">
                        <div >
                        <h4>Gender </h4> 
                        <input type="radio" name="passgender" id="passmale" value="Male" required> <label for="passmale">  Male </label>
                        <input type="radio" name="passgender" id="passfemale"  value="Female" required><label for="passfemale">  Female </label>
                        </div>   
                        </div>
                <div>
                    <input type="submit" value="Continue" name="passSubmit">
                </div>
                </div>
                
            </form>
        </div>
            
            <script src="scripts/order-nation.js"></script>
                
    <?php include('./templates/footer.php'); ?> 
</body>

</html>