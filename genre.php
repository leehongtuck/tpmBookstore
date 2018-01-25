
<?php
$title = "Genre";
require_once "inc/memberHeader.php";
?>

		<section>

			<div>
			<?php	
				$id = $_GET['id'];
				$query1 = "SELECT * FROM genre WHERE genreId='".$id."'";
				$result1=mysqli_query($conn,$query1);
				$row1=mysqli_fetch_array($result1);
				echo $row1['genre'];
			?>
			</div>
			<?php	
				$id = $_GET['id'];
				$query = "SELECT book.*, genre.genre FROM book INNER JOIN genre ON book.genreId = genre.genreId WHERE book.genreId='".$id."'"; 
				$result = mysqli_query($conn, $query);  
				if(mysqli_num_rows($result) > 0)  
				{  
					while($row = mysqli_fetch_array($result))  
				{
			?>
			<div>
				<div>
					<?php
						$imageId=$row["bookId"];
						$files = glob("/tpmBookstore/img/*.*");
						echo '<a href="/tpmBookstore/bookDetail.php?id='.$row['bookId'].'"><img src="/tpmBookstore/img/'.$imageId.'.jpg" /></a>';
					?>
				</div>
				<div>
					<p><?php echo $row["bookTitle"]; ?></p>
					<p>Author: <?php echo $row["bookAuthor"]; ?></p>
					<p>Price: <?php echo $row["bookPrice"]; ?></p>
				</div>
			</div>s
			<?php
				}
				}
			?>
	</body>
</html>

