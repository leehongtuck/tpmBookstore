<?php 
$title = "Home";
require_once "inc/memberHeader.php";
/*Latest Books*/


?>

<section>       
    <div id="recentlyAdded">
    Recently Added.
    <?php
    $sql = "SELECT * FROM book ORDER BY bookPublishDate DESC LIMIT 5";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0):
        while($row = mysqli_fetch_array($result)):
    ?>
         <div class="bookInfo">
            <div class="bookImage"> 
                <?php
                    echo '<a href="/tpmBookstore/bookDetail.php?id='.$row['bookId'].'">
                    <img src="/tpmBookstore/img/'.$row['bookId'].'.jpg" /></a>';
                ?>
            </div>
            <div class="bookDetail">
                <p><?=$row["bookTitle"]; ?></p>
                <p>Author: <?=$row["bookAuthor"]; ?></p>
                <p>Price: RM<?=$row["bookPrice"]; ?></p>
            </div>
        </div>
    <?php
        endwhile;
    else:
    ?>
        <div class="bookInfo">
            No books to be displayed
        </div>
    <?php
    endif;
    ?>
    </div>
    <div id="topSeller">
    Top Seller.
    <?php
    $sql = "SELECT SUM(bp.purchaseQuantity) AS qty, b.bookId, b.bookTitle, b.bookTitle, b.bookAuthor, b.bookPrice FROM 
        payment AS p INNER JOIN bookpurchase AS bp ON p.paymentId = bp.paymentId 
        INNER JOIN book AS b ON bp.bookId = b.bookId
        GROUP BY bp.bookId ORDER BY qty DESC LIMIT 5";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result)>0):
        while($row = mysqli_fetch_array($result)):
    ?>
        <div class="bookInfo">
            <div class="bookImage"> 
                <?php
                    echo '<a href="/tpmBookstore/bookDetail.php?id='.$row['bookId'].'">
                    <img src="/tpmBookstore/img/'.$row['bookId'].'.jpg" /></a>';
                ?>
            </div>
            <div class="bookDetail">
                <p><?=$row["bookTitle"]; ?></p>
                <p>Author: <?=$row["bookAuthor"]; ?></p>
                <p>Price: RM<?=$row["bookPrice"]; ?></p>
            </div>
        </div>
    <?php
        endwhile;
    else:
    ?>
        <div class="bookInfo">
            No books to be displayed
        </div>
    <?php
    endif;
    ?>
    </div>
</section>
</body>
</html>