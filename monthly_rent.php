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
            <li><a href="rental_groups.php">Existing Rental Groups</a></li>
            <li><a class="active" href="monthly_rent.php">Monthly Rent by Category</a></li>
        </ul>
    <div class="center-div-top">
      <h1>Average Monthly Rent by Category</h1>
      <table align="center" border="5" cellpadding="10" cellspacing="0">
      <tr>
        <th>House</th>
        <th>Apartment</th>
        <th>Room</th>
      </tr>
      <?php
        include 'connect.php';
        $result = $connection->query("select AVG(cost) as avg from property join house on property.id=house.id");
        $row = $result->fetch();
        echo "<tr><td>".number_format($row["avg"],2)."</td>";
        $result = $connection->query("select AVG(cost) as avg from property join apartment on property.id=apartment.id");
        $row = $result->fetch();
        echo "<td>".number_format($row["avg"],2)."</td>";
        $result = $connection->query("select AVG(cost) as avg from property join room on property.id=room.id");
        $row = $result->fetch();
        echo "<td>".number_format($row["avg"],2)."</td></tr>";
        $connection = NULL;
        
      ?>
      </table>
      </div>
  </body>
</html>
