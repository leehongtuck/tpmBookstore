
<?php
$title = "Manage User";
require_once("inc/managerHeader.php");
?>

<?php
$query = "SELECT * FROM member";
$result = mysqli_query($conn, $query);
$count=mysqli_num_rows($result);



?>
<div class="tableHeader">
    <h1>Manage User</h1>
</div>
<table>
    <tr>
        <th>Member Id</th>
        <th>Member Email</th>
        <th>Member Name</th>
        <th>Member Address</th>
        <th>Member Phone</th>
        <th>Member Point</th>
        <th>Member Trust</th>
    </tr>
    <form method="POST" action="updateUser.php">
        <?php
        if(mysqli_num_rows($result) > 0)  {
            while($row=mysqli_fetch_array($result)):?>


                <tr>
                    <td><?=$row['memberId']?></td>
                    <td><?=$row['memberEmail']?></td>
                    <td><?=$row['memberName']?></td>
                    <td><?=$row['memberAddress']?></td>
                    <td><?=$row['memberPhone']?></td>
                    <td><?=$row['memberPoint']?></td>
                    <td>
                        <select name='memberTrust[<?=$row['memberId']?>]'>
                            <option value='0' <?php if($row['memberTrust'] == 0)echo "selected";?> >Not Trusted</option>
                            <option value='1' <?php if($row['memberTrust'] == 1)echo "selected";?>>Trusted</option>
                        </select>
                    </td>
                </tr>

        <?php endwhile;
        }
        mysqli_close($conn); //to close the database connection
        ?>
</table>
<div class="middle">
    <input type="submit" name="Submit" value="Update" />
</div>
</form>

</body>
</html>

