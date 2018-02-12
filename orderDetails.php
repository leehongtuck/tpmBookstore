<?php
$title = "Order Details";
require_once "inc/managerHeader.php";
$query = "SELECT * FROM stockOrderInfo AS s INNER JOIN book AS b ON s.bookId = b.bookId
WHERE orderId = '$_GET[id]' ";
$result = mysqli_query($conn, $query);
?>
<div class="tableHeader">
    <h1>Order Details: <?= $_GET['id'] ?></h1>
</div>

<table>
    <tr>
        <th>Book Id</th>
        <th>Book Title</th>
        <th>Order Quantity</th>
    </tr>
    <?php
        while($row = mysqli_fetch_array($result)):?>
            <tr>
                <td>
                    <?= $row['bookId']?>
                </td>

                <td>
                    <?= $row['bookTitle'] ?>
                </td>
                <td>
                    <?= $row['orderQuantity'] ?>
                </td>

            </tr>

        <?php
        endwhile;
    mysqli_close($conn); //to close the database connection
    ?>
</table>
