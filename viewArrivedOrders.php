<?php
$title = "Arrived Orders";
require_once "inc/managerHeader.php";
$query = "SELECT * FROM stockOrder WHERE orderStatus = 1 ";
$result = mysqli_query($conn, $query);
?>
    <div class="tableHeader">
        <h1>Arrived Orders</h1>
    </div>

    <table>
        <tr>
            <th>Order Id</th>
            <th>Order Date Time</th>
            <th>Manager Id</th>
            <th>Supplier Id</th>
            <th>Arrival Date Time</th>
        </tr>
        <?php
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)):?>
                <tr>
                    <td>
                        <a href="orderDetails.php?id=<?= $row['orderId'] ?>"><?= $row['orderId'] ?></a>
                    </td>

                    <td>
                        <?= $row['orderDate'] ?>
                    </td>
                    <td>
                        <?= $row['managerId'] ?>
                    </td>

                    <td>
                        <?= $row['supplierId'] ?>
                    </td>

                    <td>
                        <?= $row['arrivalDate'] ?>
                    </td>
                </tr>

            <?php
            endwhile;
        }
        mysqli_close($conn); //to close the database connection
        ?>
    </table>
