<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Location</title>
</head>
<body>
    <h1>Insert Location</h1>
    <form action="insert_location.php" method="post">
        <label for="area">Area:</label>
        <input type="text" id="area" name="area" required><br><br>
        <label for="shelf">Shelf:</label>
        <input type="number" id="shelf" name="shelf" required><br><br>
        <label for="zone">Zone:</label>
        <input type="text" id="zone" name="zone" maxlength="1" required><br><br>
        <input type="submit" value="Insert Location">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $servername = "localhost";
        $username = "root"; 
        $password = "1995"; 
        $dbname = "tsw"; 
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind parameters for the stored procedure
        $stmt = $conn->prepare("CALL InsertLocation(?, ?, ?)");
        $stmt->bind_param("sis", $area, $shelf, $zone);

        // Set parameters
        $area = $_POST['area'];
        $shelf = $_POST['shelf'];
        $zone = $_POST['zone'];

        
        $stmt->execute();

        echo "<p>New location inserted successfully!</p>";

        
        $conn->close();
    }
    ?>
</body>
</html>
