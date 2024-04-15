<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Asset</title>
</head>
<body>
    <h1>Insert Asset</h1>
    <form action="insert_asset.php" method="post">
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required><br><br>
        <label for="date">Date:</label>
        <input type="date" id="date" name="date" required><br><br>
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="In Warehouse">In Warehouse</option>
            <option value="Checked Out">Checked Out</option>
        </select><br><br>
        <input type="submit" value="Insert Asset">
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

        
        $stmt = $conn->prepare("CALL InsertAsset(?, ?, ?)");
        $stmt->bind_param("sss", $description, $date, $status);

        // Set parameters
        $description = $_POST['description'];
        $date = $_POST['date'];
        $status = $_POST['status'];

        
        $stmt->execute();

        echo "<p>New asset inserted successfully!</p>";

       
        $conn->close();
    }
    ?>
</body>
</html>
