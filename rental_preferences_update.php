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
        <a href="rental_preferences.php" class="back-button">&#8249; Back</a>
    <div class="center-div-top">
     <?php
        include 'connect.php';
        $code = $_POST["code"];
        if (empty($code)) {
          echo "<h1>Error. Retry.</h1>";
          exit();
        }
        $accessibile = $_POST["accessibile"];
        $numBedrooms = $_POST["numBedrooms"];
        $numBathrooms = $_POST["numBathrooms"];
        $maxCost = $_POST["maxCost"];
        $laundry = $_POST["laundry"];
        $parking = $_POST["parking"];
        $propertyType = $_POST["propertyType"];
        $query = "update rentalGroup set accessibile='".$accessibile."', numBedrooms='".$numBedrooms."', numBathrooms='".$numBathrooms."', maxCost='".$maxCost."', laundry='".$laundry."', parking='".$parking."', propertyType='".$propertyType."' where code='".$code."'";
        $result = $connection->query($query);

          echo "<h1>Group $code Preferences Updated.</h1>";
          $result = $connection->query("select * from renter join rentalGroup on rentalGroup.code=renter.groupCode where code='".$code."'");
          echo "<form action='group_info_pref.php' method='post'>";
          echo "<input type='hidden' id='group' name='group' value='".$code."' />";
          echo "<input type='submit' value='View Updated Preferences' />";
          echo "</form>";

        $connection = NULL;
       
      ?>
</div>
  </body>
</html>
