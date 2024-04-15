<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Movement History of Specific Asset</title>
</head>
<body>
    <h1>Search Movement History of Specific Asset</h1>
    <form action="search_movements.php" method="get">
        <label for="asset">Select Asset:</label>
        <select name="asset" id="asset">
            <?php
            
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

            // SQL query to retrieve all assets
            $sql = "SELECT AssetID, Description FROM assets";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
               
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["AssetID"] . "'>" . $row["Description"] . "</option>";
                }
            } else {
                echo "<option value=''>No assets found</option>";
            }

            // Close the connection
            $conn->close();
            ?>
        </select>
        <input type="submit" value="Search">
    </form>
</body>
</html>
