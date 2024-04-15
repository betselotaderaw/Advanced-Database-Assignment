<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve Total Asset Count in Warehouse</title>
</head>
<body>
    <h1>Retrieve Total Asset Count in Warehouse</h1>
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

    // SQL query to retrieve total asset count in warehouse
    $sql = "SELECT count(*) as TotalAssetInWarehouse
            FROM assets
            WHERE Status = 'In Warehouse'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            echo "Total Assets in Warehouse: " . $row["TotalAssetInWarehouse"];
        }
    } else {
        echo "0 results";
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>
