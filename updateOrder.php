<?php
require_once 'inc/conn.php';
foreach ($_POST['orderStatus'] as $id => $value) {
    $sql = "UPDATE stockOrder set orderStatus='$value', arrivalDateTime = NOW() WHERE orderId='$id'";
    mysqli_query($conn, $sql);
}
echo "<script>
alert('Order status updated.');
window.location.replace('viewArrivedOrders.php');
</script>";
?>