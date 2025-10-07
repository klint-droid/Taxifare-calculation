<?php 

$name = isset($_POST['name']) ? trim($_POST['name']) :'';
$distance = filter_input(INPUT_POST, 'distance', FILTER_VALIDATE_FLOAT);
$waiting = filter_input(INPUT_POST, 'waiting', FILTER_VALIDATE_FLOAT);
$night = isset($_POST['night']) ? true : false;


if(empty($name) || $distance == false || $waiting == false || $distance < 0 || $waiting < 0){
    $error = "Invalid input detected. Please fill out all fields correctly.";
}
else{
    $base_fare = 45.00;
    $distance_charge = $distance * 13.50;
    $waiting_charge = $waiting * 2.0;
    $sub_total = $base_fare + $distance_charge + $waiting_charge;

    $night_charge = 0;

    if($night){
        $night_charge = $sub_total * 0.20;
    }

    $total_fare = $sub_total + $night_charge;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taxifare Compute</title>
    <style>
        body{
            font-family: monospace;
            background: #f4f4f4;
            max-width: 500px;
            margin: 50px auto;
            padding: 25px;
            border: 2px solid black;
            border-radius: 10px;
            background-color: white;
        }
        h2{
            text-align: center;
            color: blue
        }
        .error{
            color: red;
            font-weight: bold;
            text-align: center;
        }
        .result{
            background: #e2e2e2;
            padding: 10px;
            border: 1px solid black;
            border-radius: 10px;
        }
        a{
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: lightskyblue;
            font-weight: bold;
        }
        a:hover{
            text-decoration: underline;
            color: green;
        }
    </style>
</head>
<body>
    <div>
        <h2>TaxiFare Result</h2>
        <?php
        if (isset($error)):
        ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <a href="taxiride.php">Go Back</a>
        <?php else: ?>
            <div class="result">
                <h3>Hello, <?php echo htmlspecialchars($name); ?>!</h3>
                <p><strong>TaxiFare Summary</strong></p>
                <hr>
                <p>Base Fare: <?php echo number_format($base_fare, 2); ?></p>   
                <p>Distance Charge (<?php echo htmlspecialchars($distance); ?> km) : PHP <?php echo number_format($distance_charge, 2)?></p>
                <p>Waiting Time Charge (<?php echo htmlspecialchars($waiting) ; ?> mins) : <?php echo number_format($waiting_charge, 2)?></p>
                <?php if($night_charge): ?>
                    <p>Night Trip Surcharg (20%) : <?php echo number_format($night_charge, 2) ; ?></p>
                <?php endif; ?>
                <hr>
                <p><strong>Total Fare: </strong><?php echo number_format($total_fare, 2) ; ?></p>
            </div>
            <a href="taxiride.php">Back to Calculator</a>
        <?php endif; ?>
    </div>
</body>
</html>