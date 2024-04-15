<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Assets by Location</title>
</head>
<body>
    <h1>Search Assets by Location</h1>
    <form action="search_assets.php" method="get">
        <label for="location">Select Location:</label>
        <select name="location" id="location">
            <option value="101">Receiving</option>
            <option value="102">Storage</option>
            <option value="103">Picking</option>
            <option value="104">Shipping</option>
        </select>
        <input type="submit" value="Search">
    </form>
</body>
</html>
