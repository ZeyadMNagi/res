<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Review</title>
</head>

<body>
    <?php
    $conn = new mysqli("localhost", "root", null, "res");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $time = $_POST["time"];

    $sql = "INSERT INTO delivery (`name`, `phone`, `address`, `order_item`, `time`) VALUES ('$name', '$phone', '$address', '', '$time')";

    if ($conn->query($sql) === TRUE) {
        $success = true;
    } else {
        $success = false;
    }

    $sql = "SELECT * FROM delivery WHERE name='$name' AND phone='$phone' AND time='$time'";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    $conn->close();
    ?>
    <?php if ($success): ?>
        <h2>Your order have successfully placed </h2>
        <h1>Your order id Is: <?php echo $row["id"] ?></h1>
        <a href="track.php?order_id=<?php echo $row["id"]; ?>">Track Your order</a>
    <?php else: ?>
        <h2>Sorry! We are facing some errors</h2>
    <?php endif; ?>



</body>

</html>