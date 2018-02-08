<!DOCTYPE html>
<?php
require_once "inc/managerHeader.php";
?>
<div class="tableHeader">
    <h1>Add New Book</h1>
</div>

<div id="form" style="height: 560px;width:100%">
    <form method="post" enctype='multipart/form-data' action="insertBook.php">
        <section>
            <table>
                <tr>
                    <div class="input">
                        <td><label>Book Image:</label></td>
                        <td><input type='file' name='bookImage'/></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td><label>Book Title:</label></td>
                        <td><input name="bkTitle" type="text" required="required" size="50"></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td><label>Genre:</label></td>
                        <td><select name='bkGenre'>
                                <?php
                                $sql = "SELECT * FROM Genre";
                                $results = mysqli_query($conn, $sql);
                                while($rows = mysqli_fetch_array($results)) {
                                    echo "<option value='" . $rows['genreId'] . "'>" . $rows['genre'] . "</option>";
                                }
                                ?>
                            </select></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td><label>Book Description:</label></td>
                        <td><input name="bkDesc" type="text" required="required"></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td><label>Book Price:</label></td>
                        <td><input name="bkPrice" type="number" required="required"></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td><label>Author:</label></td>
                        <td><input name="bkAuth" type="text" required="required"></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td><label>Publisher:</label></td>
                        <td><input name="bkpub" type="text" required="required"></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td><label>Publish Date:</label></td>
                        <td><input name="bkpubd" type="date" required="required"></td>
                    </div>
                </tr>
                <tr>
                    <div class="input">
                        <td></td>
                        <td><input name="Submit" type="submit" value="Add Book"></td>
                    </div>
                <tr>
        </section>
    </form>
</div>

</body>
</html>
