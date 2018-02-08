<!DOCTYPE html>
<?php
$title = "Add New Genre";
require_once "inc/managerHeader.php";
?>
<div class="tableHeader">
    <h1>Add New Genre</h1>
</div>

<div id="form" style="height: 560px;width:100%">
    <form method="post" action="insertGenre.php">
        <section>
            <table>
                <tr>
                    <div class="input">
                        <td><label>Genre:</label></td>
                        <td><input type='text' name='genre' required/></td>
                    </div>
                </tr>

                <tr>
                    <div class="input">
                        <td></td>
                        <td><input name="Submit" type="submit" value="Add Genre"></td>
                    </div>
                <tr>
        </section>
    </form>
</div>

</body>
</html>
