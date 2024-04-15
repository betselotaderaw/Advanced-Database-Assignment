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
    $sql = "SELECT m.AssetID, m.Timestamp, m.ToLocationID
            FROM (
                SELECT AssetID, MAX(Timestamp) AS max_date
                FROM movements
                GROUP BY AssetID
            ) AS recent_dates
            JOIN movements AS m 
                ON recent_dates.AssetID = m.AssetID AND recent_dates.max_date = m.Timestamp
            JOIN assets a
                ON a.AssetID = m.AssetID
            WHERE a.Status = 'In Warehouse'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        echo "<table border='1'><tr><th>AssetID</th><th>Timestamp</th><th>ToLocationID</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["AssetID"]. "</td><td>" . $row["Timestamp"]. "</td><td>" . $row["ToLocationID"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>
