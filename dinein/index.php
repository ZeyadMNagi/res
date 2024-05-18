<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>

<body>
    <h1>Dine In</h1>
    <form action="dineIn.php" method="POST">
        <label for="number">Number of people: </label>
        <input type="number" name="number" id="number" required>
        <input type="time" name="time" id="time" required>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>