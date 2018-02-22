<?php
require_once 'inc/conn.php';
foreach ($_POST['orderStatus'] as $id => $value) {
	echo $value;
	echo $id;
    $sql = "UPDATE stockOrder set orderStatus='$value', arrivalDate = NOW() WHERE orderId='$id'";
    mysqli_query($conn, $sql);
}
echo "<script>
alert('Order status updated.');
window.location.replace('viewArrivedOrders.php');
</script>";

?>