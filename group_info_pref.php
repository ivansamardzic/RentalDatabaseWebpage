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
        <li><a href="rental_preferences.php">Update Rental Preferences</a></li>
        <li><a class="active" href="rental_groups.php">Existing Rental Groups</a></li>
        <li><a href="monthly_rent.php">Monthly Rent by Category</a></li>
    </ul>
    <div>
        <a href="rental_preferences.php" class="back-button">&#8249; Back</a>
        <div class="center-div-top">
            <?php
            include 'connect.php';
            $group = $_POST["group"];
            echo "<h1>Group ".$group."</h1>";
            ?>
            <div class="preferences-box">
                <h2>Group Preferences</h2>
                <?php
                $result = $connection->query("SELECT * FROM renter JOIN rentalGroup ON rentalGroup.code=renter.groupCode WHERE code='$group'");
                echo "<table>";
                while ($row = $result->fetch()) {
                    echo "<tr><td><span class='text-important'>Accessible:</span></td><td>".$row["accessibile"]."</td></tr>";
                    echo "<tr><td><span class='text-important'>Number of Bedrooms:</span></td><td>".$row["numBedrooms"]."</td></tr>";
                    echo "<tr><td><span class='text-important'>Number of Bathrooms:</span></td><td>".$row["numBathrooms"]."</td></tr>";
                    echo "<tr><td><span class='text-important'>Maximum Cost:</span></td><td>".$row["maxCost"]."</td></tr>";
                    echo "<tr><td><span class='text-important'>Laundry:</span></td><td>".$row["laundry"]."</td></tr>";
                    echo "<tr><td><span class='text-important'>Parking:</span></td><td>".$row["parking"]."</td></tr>";
                    echo "<tr><td><span class='text-important'>Accommodation Type:</span></td><td>".$row["propertyType"]."</td></tr>";
                }
                echo "</table>";
                ?>
            </div>

            <div class="members-box">
                <h2>Members</h2>
                <?php
                $result = $connection->query("SELECT * FROM person JOIN renter ON person.id=renter.id JOIN rentalGroup ON rentalGroup.code=renter.groupCode WHERE code='$group'");
                while ($row = $result->fetch()) {
                    echo "<h3>".$row["fName"]." ".$row["lName"]."</h3>";
                }
                ?>
            </div>

            <?php
            $connection = NULL;
            ?>
        </div>
    </div>
</body>
</html>
