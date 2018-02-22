
<?php
$title = "Genre";
require_once "inc/memberHeader.php";
$id = $_GET['id'];
$query = "SELECT * FROM genre WHERE genreId='".$id."'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_array($result);
$genre = $row['genre'];
$query = "SELECT book.*, genre.genre FROM book INNER JOIN genre ON book.genreId = genre.genreId WHERE book.genreId='".$id."'"; 
$result = mysqli_query($conn, $query);  ?>

		<div id="genreHeader">
			<h1><?=$genre;?></h1>
		</div>
		<div class="grid" id="genreContent">
		<?php  
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
					<p style="font-weight:bold"><?=$row["bookTitle"]; ?></p>
					<p>Author: <?=$row["bookAuthor"]; ?></p>
					<p>Price: RM<?=$row["bookPrice"]; ?></p>
				</div>
			</div>
		<?php
		endwhile;		
		?>
		</div>
	</body>
</html> 

<?php
include_once("inc/memberFooter.php");
?>

