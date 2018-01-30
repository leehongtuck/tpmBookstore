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
			
			.input {
				margin: 50px 0;
				text-align:center;
				line-height:1.625;
			}

			input[type=text], input[type=number], input[type=submit], input[type=date] {
				padding:10px;
			}

			input[type=text], input[type=number], input[type=date],select {
				border: 1px solid #ccc;
				background-color: transparent;
				color: #000;
				border-radius: 5px;
				-moz-box-sizing: border-box;
				-webkit-box-sizing: border-box;
				box-sizing: border-box;
				margin:0 auto;
			}

			input[type=submit] {
				background: black;
				font-family: Roboto,sans-serif;
				font-weight: 700;
				color: #fff;
				-webkit-appearance: none;
				padding: 0 30px;
				font-size: 16px;
				border-radius: 5px;
				height: 40px;
				display: inline-block;
				cursor: pointer;
				border: none;
				font-size: 14px;
				letter-spacing: 0.1em;
				text-transform: uppercase;
				margin:25px;
			}
		</style>
	</head>

	<body>
		<?php
			$query = "SELECT book.*, genre.* FROM book INNER JOIN genre ON book.genreId = genre.genreId ";
			$result = mysqli_query($conn, $query);
			$count=mysqli_num_rows($result);
			
			
			
		?>

		<table>
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
				echo "<input type='text' name='booktitle[".$row['bookId']."]' value='".$row['bookTitle']."' />";
				echo "</td>";
				

				echo"<input type='hidden' name='bookid[".$row['bookId']."]' value='".$row['bookId']."' />";

				
				echo "<td>";
				echo "<select name='bookgenre[".$row['bookId']."]'>";
				echo "<option hidden disabled selected value='".$row['genre']."'>".$row['genre']."</option>";
				$sql="SELECT * FROM Genre";
				$results=mysqli_query($conn,$sql);
				while ($rows=mysqli_fetch_array($results))
				{
				echo "<option value='".$rows['genreId']."'>".$rows['genre']."</option>";
				}
				echo "</select>";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookdesc[".$row['bookId']."]' value='".$row['bookDescription']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookprice[".$row['bookId']."]' value='".$row['bookPrice']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookauth[".$row['bookId']."]' value='".$row['bookAuthor']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookpub[".$row['bookId']."]' value='".$row['bookPublisher']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookpubd[".$row['bookId']."]' value='".$row['bookPublishDate']."' />";
				echo "</td>";

				echo "<td>";
				echo "<input type='text' name='bookq[".$row['bookId']."]' value='".$row['bookQuantity']."' />";
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
