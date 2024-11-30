<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Receipt</title>
    <style>
        body {
            background: rgb(193, 154, 114);
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        .receipt-details {
            margin: 20px 0;
        }

        .receipt-details p {
            margin: 5px 0;
        }

        .button {
            display: block;
            width: 97%;
            padding: 10px;
            margin-top: 20px;
            background-color: green;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
	 <script>
        window.onload = function() {
            alert("Thank you for purchasing!");
        };
    </script>
</head>
<body>

<div class="container">
    <h1>Order Information</h1>

    <div class="receipt-details">
<?php

if (isset($_GET['name'], $_GET['quantity'], $_GET['cellphone'], $_GET['address'], $_GET['payment'], $_GET['flowerName'])) {
 
    $name = htmlspecialchars($_GET['name']);
    $quantity = intval($_GET['quantity']);
    $cellphone = htmlspecialchars($_GET['cellphone']);
    $address = htmlspecialchars($_GET['address']);
    $payment = htmlspecialchars($_GET['payment']);
    $flowerName = htmlspecialchars($_GET['flowerName']);

  
    $flowerPrice = 0; 
    $driverName = "N/A"; 
    $driverPlateNumber = "N/A"; 

    if ($flowerName === 'Narra') {
        $flowerPrice = 190;
        $driverName = "Chel Diokno";
        $driverPlateNumber = "BDB 255";
    } elseif ($flowerName === 'Balitbitan') {
        $flowerPrice = 150;
        $driverName = "John Michael Dela Cruz";
        $driverPlateNumber = "KRT 198";
    } elseif ($flowerName === 'Donya Aurora') {
        $flowerPrice = 220;
        $driverName = "John Daryl Mayonaise";
        $driverPlateNumber = "NAX 260";
    }

    $totalPrice = $flowerPrice * $quantity;
    $deliveryDate = "December 6, 2024";

    echo "<p><strong>Name:</strong> $name</p>";
    echo "<p><strong>Quantity:</strong> $quantity</p>";
    echo "<p><strong>Cellphone:</strong> $cellphone</p>";
    echo "<p><strong>Address:</strong> $address</p>";
    echo "<p><strong>Payment Method:</strong> $payment</p>";
    echo "<p><strong>Tree Name:</strong> $flowerName</p>";
    echo "<p><strong>Tree Price:</strong> Php $flowerPrice</p>"; 
    echo "<p><strong>Total Price:</strong> Php $totalPrice</p>"; 
    echo "<p><strong>Delivery Date:</strong> $deliveryDate</p>"; 
    echo "<p><strong>Driver Name:</strong> $driverName</p>";
    echo "<p><strong>Driver Plate Number:</strong> $driverPlateNumber</p>";  
} else {
    echo "<p>Error: Missing order information.</p>";
}
?>

    </div>

    <a href="home.html" class="button">Return to Home</a>
</div>

</body>
</html>
