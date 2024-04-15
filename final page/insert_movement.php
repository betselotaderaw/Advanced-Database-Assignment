<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Movement</title>
</head>
<body>
    <h1>Insert Movement</h1>
    <form action="insert_movement.php" method="post">
        <label for="assetID">Asset:</label>
        <select name="assetID" id="assetID" required>
            <?php
            // Connect to the database
            $servername = "localhost";
            $username = "root"; // Assuming your username is root
            $password = "1995"; // Your password
            $dbname = "tsw"; // Change this to your database name
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve assets from the database
            $sql_assets = "SELECT AssetID, Description FROM Assets";
            $result_assets = $conn->query($sql_assets);

            if ($result_assets->num_rows > 0) {
                while($row_assets = $result_assets->fetch_assoc()) {
                    echo "<option value='" . $row_assets["AssetID"] . "'>" . $row_assets["Description"] . "</option>";
                }
            } else {
                echo "<option value=''>No assets found</option>";
            }

            // Close the connection
            $conn->close();
            ?>
        </select><br><br>

        <label for="fromLocationID">From Location:</label>
        <input type="text" id="fromLocationID" name="fromLocationID" required><br><br>
        
        <label for="toLocationID">To Location:</label>
        <input type="text" id="toLocationID" name="toLocationID" required><br><br>
        
        <input type="submit" value="Insert Movement">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connect to the database
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind parameters for the stored procedure
        $stmt = $conn->prepare("CALL InsertMovement(?, ?, ?)");
        $stmt->bind_param("iii", $assetID, $fromLocationID, $toLocationID);

        // Set parameters
        $assetID = $_POST['assetID'];
        $fromLocationID = $_POST['fromLocationID'];
        $toLocationID = $_POST['toLocationID'];

        // Execute the stored procedure
        $stmt->execute();

        echo "<p>New movement inserted successfully!</p>";

        // Close the connection
        $conn->close();
    }
    ?>
</body>
</html>
