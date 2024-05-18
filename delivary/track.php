<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Order</title>
</head>

<body>
    <?php

    $order_id = $_GET['order_id'];

    $conn = new mysqli("localhost", "root", null, "res");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }



    $sql = "SELECT * FROM delivery WHERE id='$order_id'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $order_status = $row['order_status'];

        if ($row["order_status"] === "In Progress") {
            if (isset($row['Driver_phone'])) {
                $driver_phone = $row['Driver_phone'];

            } else {
                $driver_phone = "Not Assigned";
            }

        } else {
            $driver_phone = 'No Driver yet';
        }
        ?>
        <h2>Order Details</h2>
        <h4>Your order is: <?php echo $row['order_status']; ?></h4>
        <p><strong>Name:</strong> <?php echo $row["name"]; ?></p>
        <p><strong>Phone:</strong> <?php echo $row["phone"]; ?></p>
        <p><strong>Address:</strong> <?php echo $row["address"]; ?></p>
        <p><strong>Order Time:</strong> <?php echo $row["time"]; ?></p>
        <p><strong>Order ID:</strong> <?php echo $row["id"]; ?></p>
        <p><strong>Order Item:</strong> <?php echo $row["order_item"]; ?></p>

        <p><strong>Driver phone:</strong> <?php echo $driver_phone; ?></p>

        <form action="cancel.php" method="post">
            <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="Cancel Order">
        </form>
        <button><a href="#">Edit</a></button><br><br>

        <!-- <form action="start.php" method="post">
            <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
            <input type="submit" value="Start">
        </form> -->
        <?php
    } else {
        echo "<h2>No order found with ID $order_id.</h2>";
    }



    $conn->close();
    ?>

</body>

</html>