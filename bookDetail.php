<?php
$title = "Book Detail";
require_once "inc/session.php";
 ?>
<!DOCTYPE html>
<html>
	<head>
	<?php require_once "inc/memberHead.php";?>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<style>
			/****** Rating Starts *****/
			@import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

			fieldset, label { margin: 0; padding: 0; }
			
			.rating { 
				border: none;
				float: left;
			}
			
			.rating > input { display: none; } 
			.rating > label:before { 
				margin: 5px;
				font-size: 1.25em;
				font-family: FontAwesome;
				display: inline-block;
				content: "\f005";
			}

			.rating > label { 
				color: #ddd; 
				float: right; 
			}

			.rating > input:checked ~ label, 
			.rating:not(:checked) > label:hover,  
			.rating:not(:checked) > label:hover ~ label { color: #FFD700;  }

			.rating > input:checked + label:hover, 
			.rating > input:checked ~ label:hover,
			.rating > label:hover ~ input:checked ~ label, 
			.rating > input:checked ~ label:hover ~ label { color: #FFED85;  }

			.rating1 { 
				border: none;
				float: left;
			}
			
			.rating1 > input { display: none; } 
			.rating1 > label:before { 
				margin: 5px;
				font-size: 1.25em;
				font-family: FontAwesome;
				display: inline-block;
				content: "\f005";
			}

			.rating1 > label { 
				color: #ddd; 
				float: right; 
			}

			.rating1 > input:checked ~ label, 
			.rating1:not(:checked) > label:hover,  
			.rating1:not(:checked) > label:hover ~ label { color: #FFD700;  }

			.rating1 > input:checked + label:hover, 
			.rating1 > input:checked ~ label:hover,
			.rating1 > label:hover ~ input:checked ~ label, 
			.rating1 > input:checked ~ label:hover ~ label { color: #FFED85;  }    		
		</style>
	</head>

	<body class="background">
		<?php require_once "inc/memberNav.php";?>
		<section id="bookContent" class="grid">
			<?php	
				$id = $_GET['id'];
				$query = "SELECT book.*, genre.genre FROM book INNER JOIN genre ON book.genreId = genre.genreId WHERE book.bookId='".$id."'"; 
				$result = mysqli_query($conn, $query);  
				$row = mysqli_fetch_array($result);  
			?>  
			<div class="bookDetailImage">
				<?php
					echo '<img src="/tpmBookstore/img/'.$row["bookId"].'.jpg" />'."<br/><br/>";
				?>
			</div>
			<div class="bookDetail">
				<h1><?=$row["bookTitle"]; ?></h1>
				<p>by <?=$row["bookAuthor"]; ?></p>
				<p>Publisher:<?=$row["bookPublisher"]; ?></p>
				<p>Publish Date:<?=$row["bookPublishDate"]; ?></p>
				<p><?=$row["genre"]; ?></p>
				<p><?=$row["bookDescription"]; ?></p>
				<p><?=$row["bookPrice"]; ?></p>
				<form method="POST" action="/tpmBookstore/addToCart.php">
					<label>Quantity:</label>
					<input type="number" name="quantity" min="1" max="10" required> 
					<p>Available Quantity(<?=$row["bookQuantity"]; ?>left)</p>
					<input type="hidden" name="hiddenId" value="<?=$row["bookId"]; ?>">  
					<input type="submit"class="btn" value="Add To Cart">
				</form>
			</div>
			<div class="bookDetailFeedback">
				<!-- for member to give feedback -->
				<h1>Feedback</h1>
					<form action="insertFeedback.php" method="post">
						<script>
							$(document).ready(function () {
								$("#starRating .stars").click(function () {

									var label = $("label[for='" + $(this).attr('id') + "']");
									
									$("#feedback").text(label.attr('title'));
									$(this).attr("checked");
								});
							});
						</script>
						<fieldset id='starRating' class="rating">
							<input class="stars" type="radio" id="star10" name="rating" value="10" />
							<label class = "full" for="star10" title="Masterpiece - 10 stars"></label>
							
							<input class="stars" type="radio" id="star9" name="rating" value="9"  />
							<label class = "full" for="star9" title="9 stars"></label>
						
							<input class="stars" type="radio" id="star8" name="rating" value="8" />
							<label class = "full" for="star8" title="8 stars"></label>

							<input class="stars" type="radio" id="star7" name="rating" value="7" />
							<label class = "full" for="star7" title="7 stars"></label>
							
							<input class="stars" type="radio" id="star6" name="rating" value="6" />
							<label class = "full" for="star6" title="6 stars"></label>
						   
							<input class="stars" type="radio" id="star5" name="rating" value="5" />
							<label class = "full" for="star5" title="5 stars"></label>
								   
							<input class="stars" type="radio" id="star4" name="rating" value="4" />
							<label class = "full" for="star4" title="4 star"></label>
							
							<input class="stars" type="radio" id="star3" name="rating" value="3" />
							<label class = "full" for="star3" title="3 stars"></label>
							
							<input class="stars" type="radio" id="star2" name="rating" value="2" />
							<label class = "full" for="star2" title="2 stars"></label>
							
							<input class="stars" type="radio" id="star1" name="rating" value="1" />
							<label class = "full" for="star1" title="Terrible - 1 stars"></label>
						</fieldset>
						<div id='feedback'></div>
						<input type="hidden" name="hiddenBookId" value="<?=$row["bookId"];?>" />
						<input type="text" name="comment" placeholder="Optional">
						<input type="submit" name="giveFeedback" value="Rate">
					</form>
				</div>
<<<<<<< HEAD
				<div class="viewBookFeedback"> <!-- showing book feedback -->
				<p>User Feedback</p>
=======
				<div> <!-- showing book feedback -->
				<h1>User Feedback</h1>
>>>>>>> f1e8cc450dde92f598735276705e85b24d67802e
					<?php
						$query1 = "SELECT member.*,feedback.*,book.* FROM member INNER JOIN feedback ON member.memberId = feedback.memberId INNER JOIN book ON feedback.bookId = book.bookId WHERE book.bookId='".$id."'" ;
						$result1 = mysqli_query($conn, $query1);
						if(mysqli_num_rows($result1) > 0)  
						{		  
						while($row=mysqli_fetch_array($result1))
						{	
							$starRating= $row['bookRating'];
							echo "<div>";
							echo "<p>".$row['memberName']."</p>";
							echo "<p>Rating Score: ";
							echo $starRating;
							echo "/10</p>";
							echo "<p>";
							echo $row['bookComment'];
							echo "</p>";
							echo "<form method='post' action='insertRating.php'>";
							echo "<label>Rate this feedback: </label>";
							echo "<input type='hidden' name='hiddenMemberId' value='".$row['memberId']."' />";
							echo "<input type='hidden' name='hiddenFeedbackId' value='".$row['feedbackId']."'/>";
							echo "<input type='hidden' name='hiddenBookIdRating' value='".$row['bookId']."'/>";
							echo "<input type='radio' name='feedbackRating' value='1'>Useless<br>";
							echo "<input type='radio' name='feedbackRating' value='2'>Useful<br>";
							echo "<input type='radio' name='feedbackRating' value='3'>Very Useful<br>";
							echo "<input type='submit' name='rateComment' value='Rate'>";
							echo "</form>";
							echo "</div>";
							echo "</br>";
						}
					
						}
						mysqli_close($conn); //to close the database connection						
					?>
				</div>
			
			</div> 
		</section>
	
	</body>

</html>
