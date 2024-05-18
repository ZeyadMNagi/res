<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order start</title>
</head>

<body>
    <?php
    $order_id = $_POST['order_id'];

    $conn = new mysqli("localhost", "root", null, "res");
    $drivers_ava = [];

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM `drivers` WHERE `is_available`=1; ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $drivers_ava[] = $row;
        }
    } else {
        echo "";
    }

    if (!empty($drivers_ava)) {
        $driver_id = $drivers_ava[0]["id"];
        $driver_phone = $drivers_ava[0]["phone"];

        $sql = "UPDATE `delivery` SET `Driver_phone` = '$driver_phone' WHERE `id` = $order_id";
        if ($conn->query($sql) === TRUE) {
            echo "<h2>Your order has successfully started</h2>";
            echo "<h2>The Driver's phone number is $driver_phone</h2>";
            echo "<a href='track.php?order_id=$order_id'>Track Your Order</a>";

            $sql = "UPDATE `drivers` SET `is_available` = 0 WHERE `id` = $driver_id";
            $conn->query($sql);
            $sql = "UPDATE `delivery` SET `order_status` = 'In Progress'  WHERE `id` = $order_id";
            $conn->query($sql);

        } else {
            echo "Sorry, we are facing some issues: " . $conn->error;
        }
    } else {
        echo "<h2>No available drivers at the moment. Please try again later.</h2>";
    }

    ?>
</body>

</html>