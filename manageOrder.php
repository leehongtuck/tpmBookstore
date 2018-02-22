<?php
$title = "Manage Orders";
require_once "inc/managerHeader.php";
$query = "SELECT * FROM stockOrder WHERE orderStatus = 0 ";
$result = mysqli_query($conn, $query);
?>
<div class="tableHeader">
    <h1>Manage Orders</h1>
</div>
<form method="POST" action="updateOrder.php">
    <table>
        <tr>
            <th>Order Id</th>
            <th>Order Date Time</th>
            <th>Manager Id</th>
            <th>Supplier Id</th>
            <th>Order Status</th>
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
                        <select name='orderStatus[<?= $row['orderId'] ?>]'>
                            <option value='0' <?php if($row['orderStatus'] == 0) echo "selected"; ?> >Pending
                            </option>
                            <option value='1' <?php if($row['orderStatus'] == 1) echo "selected"; ?>>Arrived</option>
                        </select>
                    </td>
                </tr>

            <?php
            endwhile;
        }
        mysqli_close($conn); //to close the database connection
        ?>
    </table>
    <div class="middle">
        <input type="submit" name="Submit" value="Update"/>
    </div>
</form>
