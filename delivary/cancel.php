<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancel order</title>
</head>

<body>
    <?php
    $order_id = $_POST['order_id'];

    $conn = new mysqli("localhost", "root", null, "res");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE `delivery` SET `order_status` = 'Cancelled' WHERE `delivery`.`id` = $order_id;";
    if ($conn->query($sql) === TRUE) {
        echo "Order cancelled successfully!";
    } else {
        echo "Sorry We are facing some Issues";
    }


    $conn->close();

    ?>


</body>

</html>