<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="timetable.css">
    <link rel="stylesheet" href="../assets/ordering.css">
    <link rel="stylesheet" href="../assets/footer.css">
    <script src="https://kit.fontawesome.com/3a6c74b0d8.js" crossorigin="anonymous"></script>
    <script src="../scripts/one-way.js"></script>
    <title>Qatar Airways</title>
</head>
<?php
    session_start();
    $errors = [];
    $errors_time = [];
    $fields = ['order-from', 'order-to', 'time-depart', 'time-return', 'flight-options'];
    $optionalFields = [];
    $values = [];
    $isOneWay=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($fields as $field) {
        if (empty($_POST[$field]) && !in_array($field, $optionalFields)) {
        $errors[] = $field;
        }else{
            $values[$field] = $_POST[$field];
            $_SESSION[$field] = $_POST[$field];
        }
    }
    if($_POST[$fields[4]] == 'one-way'){
        $errors = array_diff($errors, [$fields[3]]);
    }else if($_POST[$fields[4]] == 'round-trip' && $_POST[$fields[2]] > $_POST[$fields[3]]){
        $errors_time[] = $fields[2];
    }
    if (empty($errors) && empty($errors_time)) {
        header("Location: http://localhost/webdev-airlines/front/choose_time_place.php");
        exit;
    }
    }
?>
<body>
    <?php include('../templates/header.php'); ?>
    <div class="content" id="booking">
        <div class="book-cont">
            <ul class="nav nav-tabs wizardpane nav-fill" id="myTab" role="tablist">
                <li class="nav-item booking">
                    <a class="nav-link active" id="booking-tab" data-toggle="tab" href="#book" role="tab"
                        aria-controls="book" aria-selected="true"><i class='fas fa-plane'></i> Book</a>
                </li>
                <li class="nav-item managebooking">
                    <a class="nav-link" id="managebooking-tab" data-toggle="tab" href="#managebooking" role="tab"
                        aria-controls="managebooking" aria-selected="false"><i class='far fa-calendar-alt'></i> My Trips
                    </a>
                </li>
                <li class="nav-item check-in">
                    <a class="nav-link" id="checkin-tab" data-toggle="tab" href="#checkin" role="tab"
                        aria-controls="checkin" aria-selected="false"><i class='far fa-check-circle'></i> Check-in</a>
                </li>
                <li class="nav-item flightstatus d-none d-md-block d-lg-block d-xl-block">
                    <a class="nav-link" id="flightstatus-tab" data-toggle="tab" href="#flightstatus" role="tab"
                        aria-controls="flightstatus" aria-selected="false"><i class='	fas fa-map-marker-alt'></i> Flight status</a>
                </li>
            </ul>
            <div class="order-container">
                <div>
                    <form name="flightsOrder" class="wrapper" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="order-select">
                            <label>
                                <input type="radio" name="flight-options" id="flight-option-1" value="round-trip" onclick="hide(0)"
                                <?php if (isset($values['flight-options']) && $values['flight-options'] == "round-trip") echo "checked"; ?>>
                                Round Trip
                                </label>
                                <input type="radio" name="flight-options" id="flight-option-1" value="one-way" onclick="hide(1)"
                                <?php if (isset($values['flight-options']) && $values['flight-options'] == "one-way") echo "checked"; ?>>
                                One Way
                                </label>
                                <?php if (in_array('flight-options', $errors)): ?>
                                <span class="error">Missing</span>
                                <?php endif; ?>
                        </div>

                        <div class="order-form">
                            <div class="grid-order grid-order-1" >
                                <p>From</p>
                                <input type="text" id="input" name="order-from" value="">
                                <ul class="list" style="display: block;"></ul>
                                <?php if (in_array('order-from', $errors)): ?>
                                    <span class="error">Missing</span>
                                <?php endif; ?>
                            </div>
                            <div class="grid-order grid-order-2"  >
                                <p>To</p>
                                <input type="text" id="input-1" autocomplete="off" name="order-to" value=""/>
                                <ul class="list1" style="display: block;"></ul>
                                <?php if (in_array('order-to', $errors)): ?>
                                    <span class="error">Missing</span>
                                <?php endif; ?>
                            </div>
                            <script src="../scripts/order-city.js"></script>

                            <div class="grid-order grid-order-3">
                                <p>Depart</p>
                                <input value="<?php echo htmlspecialchars($values['time-depart']);?>" type="date" name="time-depart" />
                                <?php if (in_array('time-depart', $errors)): ?>
                                    <span class="error">Missing</span>
                                <?php endif; ?>
                                <?php if (in_array('time-depart', $errors_time)):?>
                                    <span class="error">The departure time is latest than return time.</span>
                                <?php endif; ?>
                            </div>
                            <div class="grid-order grid-order-4" id="one-way">
                                <p>Return</p>
                                <input value="<?php echo htmlspecialchars($values['time-return']);?>" type="date" name="time-return" />
                                <?php if (in_array('time-return', $errors)): ?>
                                    <span class="error">Missing</span>
                                <?php endif; ?>
                            </div>
                            <div class="grid-order grid-order-5">
                            </div>
                            <div class="grid-order grid-order-6">
                                <input type="submit" name="submit" value="Find Flights">
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('../templates/footer.php'); ?>
</body>

</html>