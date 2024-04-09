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
            <li><a class="active" href="property_list.php">Property List</a></li>
            <li><a href="rental_preferences.php">Update Rental Preferences</a></li>
            <li><a href="rental_groups.php">Existing Rental Groups</a></li>
            <li><a href="monthly_rent.php">Monthly Rent by Category</a></li>
        </ul>
        <div class="center-div-top">        
        <h1>Property List</h1>
        <table align="center" border="5" cellpadding="10" cellspacing="0">
            <tr>
            <th>Property ID</th>
            <th>Manager</th>
            <th>Owner</th>
            </tr>
        <?php
            include 'connect.php';
            $query = "select * from property left join (select person.id as managerId, person.fName as managerfName, person.lName as managerlName from person) 
            as manager on property.managerId=manager.managerId left join owns ON property.id = owns.propertyId left join (select person.id as ownerId, person.fName as ownerfName, person.lName as ownerlName from person)
            as owner on owns.ownerId = owner.ownerId";
            $result = $connection->query($query);
            while ($row = $result->fetch()) { echo "
            <tr>
                <td>".$row["id"]."</td>
                <td>".$row["managerfName"]." ".$row["managerlName"]."</td>
                <td>".$row["ownerfName"]." ".$row["ownerlName"]."</td>

            </tr>
        "; } $connection = NULL; ?>
        </table>
        </div>
    </body>
</html>
