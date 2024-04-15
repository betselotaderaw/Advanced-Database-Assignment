<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Assets by Location</title>
</head>
<body>
    <h1>Search Assets by Location</h1>
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

    // Get the selected location ID from the form
    $locationID = $_GET['location'];

    // SQL query to retrieve assets by location
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
            WHERE m.ToLocationID = $locationID
            AND a.Status = 'In Warehouse'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<table border='1'><tr><th>AssetID</th><th>Timestamp</th><th>ToLocationID</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["AssetID"]. "</td><td>" . $row["Timestamp"]. "</td><td>" . $row["ToLocationID"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No assets found at this location.";
    }

    // Close the connection
    $conn->close();
    ?>
</body>
</html>
