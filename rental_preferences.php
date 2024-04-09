<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Queen's University Student Rentals</title>
    <link rel="stylesheet" href="styles.css?v=1.1" />
</head>
<body>
    <ul>
        <li><a href="rental.php">Home</a></li>
        <li><a href="property_list.php">Property List</a></li>
        <li><a class="active" href="rental_preferences.php">Update Rental Preferences</a></li>
        <li><a href="rental_groups.php">Existing Rental Groups</a></li>
        <li><a href="monthly_rent.php">Monthly Rent by Category</a></li>
    </ul>
    <div class="center-div">
        <div class="form">
            <h1>Update Rental Preferences</h1>
            <form action="rental_preferences_update.php" method="post">
                <label for="code">Group Code:</label>
                <?php
                    include 'connect.php';
                    $result = $connection->query("select code from rentalGroup");
                    echo "<select name='code'>";
                    while ($row = $result->fetch()) {
                        echo "<option value='".$row["code"]."'>".$row["code"]."</option>";
                    }
                    echo "</select>";
                    $connection = NULL;
                ?>
                <br /><br />

                <label for="propertyType">Accommodation Type:</label>
                <select id="propertyType" name="propertyType">
                    <option value="house">House</option>
                    <option value="apartment">Apartment</option>
                    <option value="room">Room</option>
                </select><br /><br />

                <label for="numBedrooms">Number of Bedrooms:</label>
                <input type="number" id="numBedrooms" name="numBedrooms" /><br /><br />

                <label for="numBathrooms">Number of Bathrooms:</label>
                <input type="number" id="numBathrooms" name="numBathrooms" /><br /><br />

                <label for="parking">Parking:</label>
                <select id="parking" name="parking">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select><br /><br />

                <label for="laundry">Laundry:</label>
                <select id="laundry" name="laundry">
                    <option value="ensuite">Ensuite</option>
                    <option value="shared">Shared</option>
                </select><br /><br />

                <label for="maxCost">Maximum Cost:</label>
                <input type="number" id="maxCost" name="maxCost" /><br /><br />

                <label for="accessibile">Accessible:</label>
                <select id="accessibile" name="accessibile">
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select><br /><br />

                <div class="center-text">
                    <input type="submit" value="Submit" />
                </div>
            </form>
        </div>
    </div>
</body>
</html>
