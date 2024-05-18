<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dine In</title>
</head>

<body>
    <?php
    $conn = new mysqli("localhost", "root", null, "res");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Tables WHERE is_available = 1";
    $result = $conn->query($sql);
    $tables_a = [];
    $num = $_POST["number"];
    $time = $_POST["time"];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $tables_a[] = $row["id"];
        }
    } else {echo "";}
    

    if (!empty($tables_a)) {
        $table_id = $tables_a[0];

        $time = $conn->real_escape_string($time);
        $sql = "UPDATE `tables` SET is_available=0, num=$num, time_order='$time' WHERE id=$table_id";
        if ($conn->query($sql) === TRUE) {
            $success = true;
        } else {
            $success = false;
        }
    } else {
        $success = false;
    }

    $conn->close();
    ?>
    <?php if ($success): ?>
        <h2>You have dined in for table with id of <?php echo $table_id; ?> at time <?php echo htmlspecialchars($time); ?> for <?php echo $num ?> Persons
        </h2>
    <?php else: ?>
        <h2>Sorry! No available tables right now.</h2>
    <?php endif; ?>
</body>

</html>