<?php
$title = "Add New Rewards";
require_once "inc/managerHeader.php";
?>
<div class="tableHeader">
    <h1>Add New Reward</h1>
</div>
<div id="form" style="height: 560px;width:100%">
    <form method="post" enctype='multipart/form-data' action="insertReward.php">
        <section>
            <table>
                <tr>
                    <div class="input">
                        <td><label>Reward Image:</label></td>
                        <td><input type='file' name='rewardImage'/></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td><label>Reward Name:</label></td>
                        <td><input name="rewardName" type="text" required="required" size="50"></td>
                    </div>
                </tr>

                <tr>
                    <div class="input">
                        <td><label>Reward Description:</label></td>
                        <td><input name="rewardDesc" type="text" required="required"></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td><label>Required Point:</label></td>
                        <td><input name="rewardPoint" type="number" required="required"></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td><label>Quantity:</label></td>
                        <td><input name="rewardQuantity" type="number" required="required"></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td></td>
                        <td><input name="Submit" type="submit" value="Add New Reward"></td>
                    </div>
                </tr>
        </section>
    </form>
</div>

</body>
</html>
