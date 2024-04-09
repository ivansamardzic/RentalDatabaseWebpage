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
    <div class="center-div-top">
      <h1> Choose your Rental Group </h1>
    <form action="group_info.php" method="post">
      <label for="group">Rental Group ID:</label>
      <?php
        include 'connect.php';
        $result = $connection->query("select code from rentalGroup");
        echo "<select name='group'>";
        while ($row = $result->fetch()) {
          echo "<option value='".$row["code"]."'>".$row["code"]."</option>";
        }
        echo "</select>";
        $connection = NULL;
      ?>
      <input type="submit" value="Submit" />
    </form>
      </div>
  </body>
</html>

