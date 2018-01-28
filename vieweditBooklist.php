<!DOCTYPE html>
 <?php
include("inc/conn.php");
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>

	<body>
		<?php
			$query = "SELECT book.*, genre.* FROM book INNER JOIN genre ON book.genreId = genre.genreId ";
			$result = mysqli_query($conn, $query);
			$count=mysqli_num_rows($result);

		?>

		<table style="width:100%;">
			<tr>
			<td>Title</td>
			<td>Genre</td>
			<td>Description</td>
			<td>Price</td>
			<td>Author</td>
			<td>Publisher</td>
			<td>Publish Date</td>
			<td>Quantity</td>
			</tr>
		<form method="POST" action="updateBooklist.php">
		<?php
			if(mysqli_num_rows($result) > 0)  {				
			while($row=mysqli_fetch_array($result))
			{
				
				echo "<tr>";
				echo "<td>";
				echo "<input type='text' name='booktitle[]' value='".$row['bookTitle']."' />";
				echo "</td>";
				

				echo"<input type='hidden' name='bookid[]' value='".$row['bookId']."' />";

				
				echo "<td>";
				echo "<input type='text' name='bookgenre[]' value='".$row['genre']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookdesc[]' value='".$row['bookDescription']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookprice[]' value='".$row['bookPrice']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookauth[]' value='".$row['bookAuthor']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookpub[]' value='".$row['bookPublisher']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookpubd[]' value='".$row['bookPublishDate']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookq[]' value='".$row['bookQuantity']."' />";
				echo "</td></tr>";
				


			
			}		
			}
		mysqli_close($conn); //to close the database connection
		?>
		</table>
			<input type="submit" name="Submit" value="Update" />
		</form>
		
	</body>
</html>
