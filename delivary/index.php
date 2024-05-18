<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delivary page</title>

</head>

<body>
    <h1>Create an order</h1>
    <form action="delivary.php" method="POST">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        <label for="phone">Phone number: </label>
        <input type="tel" name="phone" id="phone">
        <label for="address">Address: </label>
        <input type="text" name="address" id="address">
        <label for="time">Time: </label>
        <input type="time" name="time" id="time">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>