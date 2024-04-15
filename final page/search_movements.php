<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Movement History of Specific Asset</title>
</head>
<body>
    <h1>Search Movement History of Specific Asset</h1>
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

    // Get the selected asset ID from the form
    $assetID = $_GET['asset'];

    // SQL query to retrieve movement history of a specific asset
    $sql = "SELECT a.AssetID, a.Description, m.Timestamp, m.FromLocationID, m.ToLocationID, a.Status
            FROM movements m
            INNER JOIN assets a
            ON a.AssetID = m.AssetID
            WHERE a.AssetID = $assetID";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table border='1'><tr><th>AssetID</th><th>Description</th><th>Timestamp</th><th>From Location</th><th>To Location</th><th>Status</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["AssetID"]. "</td><td>" . $row["Description"]. "</td><td>" . $row["Timestamp"]. "</td><td>" . $row["FromLocationID"]. "</td><td>" . $row["ToLocationID"]. "</td><td>" . $row["Status"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No movement history found for this asset.";
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>
