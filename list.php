<?php include './db.php';

$statement=  $pdo->prepare("SELECT * FROM customers");
$statement->execute();
$customers = $statement->fetchall(PDO::FETCH_ASSOC);
?>


<table class= "customers-table" border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Controls</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach($customers as $customer):?>
        <tr>
            <td><?php echo $customer["CustomerID"]; ?></td>
            <td><?php echo $customer["FirstName"]; ?></td>
            <td><?php echo $customer["LastName"]; ?></td>
            <td><?php echo $customer["Email"]; ?></td>
            <td class="controls">

                <a href="update.php?id=<?php
                echo $customer["CustomerID"]; ?>">
                    <button class="control-button edit">Edit</button>
                </a>
                
                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $customer ["CustomerID"]; ?>">
                   <button class="control-button delet" type="submit">Delete</button>
                </form>

            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>