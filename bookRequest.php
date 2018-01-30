<!DOCTYPE html>
 <?php
include("inc/conn.php");
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
		<style type="text/css">
			
		table {
			margin:0 auto;
		}
		
		
		</style>
	</head>

	<body>
		<?php
			$query = "SELECT book.*, genre.* FROM book INNER JOIN genre ON book.genreId = genre.genreId ";
			$result = mysqli_query($conn, $query);
			$count=mysqli_num_rows($result);
			
			
			
		?>
		<div class="booklist">
			<table style="width:80%;">
				<tr bgcolor="#7a818c">
				<td>Title</td>
				<td>Genre</td>
				<td>Description</td>
				<td>Price</td>
				<td>Author</td>
				<td>Publisher</td>
				<td>Publish Date</td>
				<td>Quantity</td>
				</tr>
			<form method="POST" action="insertRequest.php">
					<select name='supplierName'>
					<?php 
						$sql="SELECT * FROM supplier";
						$results=mysqli_query($conn,$sql);
						while ($rows=mysqli_fetch_array($results))
						{
						echo "<option value='".$rows['supplierId']."'>".$rows['supplierName']."</option>";
						}
					?>
					</select>
			<?php
				if(mysqli_num_rows($result) > 0)  {				
				while($row=mysqli_fetch_array($result))
				{
					
					echo "<tr bgcolor=#bcc8db>";
					echo "<td>";
					echo $row['bookTitle'];
					echo "</td>";

					echo "<td>";
					echo $row['genre'];
					echo "</td>";

					echo "<td>";
					echo $row['bookDescription'];
					echo "</td>";

					echo "<td>";
					echo $row['bookPrice'];
					echo "</td>";

					echo "<td>";
					echo $row['bookAuthor'];
					echo "</td>";

					echo "<td>";
					echo $row['bookPublisher'];
					echo "</td>";

					echo "<td>";
					echo $row['bookPublishDate'];
					echo "</td>";

					echo "<td>";
					echo "<select name='bookid[".$row['bookId']."]'>";
					echo "<option value=''>0</option>";
					echo "<option value='20'>20</option>";
					echo "<option value='50'>50</option>";
					echo "<option value='70'>70</option>";
					echo "<option value='100'>100</option>";
					echo "</td></tr>";
					


				
				}		
				}
			mysqli_close($conn); //to close the database connection
			?>
			</table>
				<input type="submit" name="Submit" value="Request" />
			</form>
		</div>
	</body>
</html>
