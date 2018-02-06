<?php
require_once 'inc/conn.php';
foreach ($_POST['memberTrust'] as $id => $value) {
    $sql = "UPDATE member set memberTrust='$value' WHERE memberId='$id'";
    mysqli_query($conn, $sql);
}
echo "<script>
alert('Changes saved.');
window.location.replace('manageUser.php');
</script>";
?>