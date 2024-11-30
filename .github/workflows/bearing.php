<?php
// Retrieve order details from URL parameters
$name = isset($_GET['name']) ? $_GET['name'] : 'N/A';
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 'N/A';
$cellphone = isset($_GET['cellphone']) ? $_GET['cellphone'] : 'N/A';
$address = isset($_GET['address']) ? $_GET['address'] : 'N/A';
$payment = isset($_GET['payment']) ? $_GET['payment'] : 'N/A';
$fruitName = isset($_GET['fruitName']) ? $_GET['fruitName'] : 'N/A';
$fruitPrice = isset($_GET['fruitPrice']) ? $_GET['fruitPrice'] : 'N/A';

// Remove 'Php' and convert the price to a float
$fruitPriceNumber = floatval(str_replace('Php', '', $fruitPrice));

// Calculate total price
$totalPrice = $quantity * $fruitPriceNumber;
?>

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
            height: 100vh;
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .receipt {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h2>Order Summary</h2>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
        <p><strong>Fruit:</strong> <?php echo htmlspecialchars($fruitName); ?></p>
        <p><strong>Quantity:</strong> <?php echo htmlspecialchars($quantity); ?></p>
        <p><strong>Price:</strong> <?php echo htmlspecialchars($fruitPrice); ?></p>
        <p><strong>Total:</strong> Php <?php echo number_format($totalPrice, 2); ?></p>
        <p><strong>Cellphone:</strong> <?php echo htmlspecialchars($cellphone); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>
        <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($payment); ?></p>
        <button onclick="window.location.href='bearing.php'">Back to Menu</button>
    </div>
</body>
</html>
