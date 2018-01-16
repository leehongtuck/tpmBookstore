<!DOCTYPE html>
 <!-- <?php
 /*Add To Cart */
 include("conn.php");
 session_start();  
 
 if(isset($_POST["addToCart"]))  
 {  
      if(isset($_SESSION["shoppingCart"]))  
      {  
           $item_array_id = array_column($_SESSION["shoppingCart"], "bookId");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shoppingCart"]);  
                $item_array = array(  
                     'bookId'               =>     $_GET["id"],
                     'bookTitle'               =>     $_POST["hidden_name"],  
                     'bookPrice'          =>     $_POST["hidden_price"],  
                     'bookQuantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shoppingCart"][$count] = $item_array;  
                
                 
           }  
           else  
           {
              echo '<script>alert("Item already added, If you wish to increase the quantity please use the +- button.")</script>';

           }  
      }  
      else  
      {  
           $item_array = array(  
                'bookId'               =>     $_GET["id"],  
                'bookTitle'               =>     $_POST["hidden_name"],  
                'bookPrice'          =>     $_POST["hidden_price"],  
                'bookQuantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shoppingCart"][0] = $item_array; 
      }
      			 
  			echo '<script>window.location=""</script>';
 } 
 
 
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shoppingCart"] as $keys => $values)  
           {  
                if($values["bookId"] == $_GET["id"])  
                {  
                     unset($_SESSION["shoppingCart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location=""</script>';  
                }  
           }  
      }  
 }  
 
 
 ?>
 -->
<html lang="en">
	<head>
	<meta content="en-us" http-equiv="Content-Language">
	<meta charset="utf-8">
	<title></title>
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
    </style>
	</head>

	<body>
		<section>
			<?php	
				$id = $_GET['id'];
				$query = "SELECT book.*, genre.genre FROM book INNER JOIN genre ON book.genreId = genre.genreId WHERE book.bookId='".$id."'"; 
				$imageId= $row["bookId"];
				$result = mysqli_query($con, $query);  
				if(mysqli_num_rows($result) > 0)  
				{  
					while($row = mysqli_fetch_array($result))  
				{
			?>  
			<div>
				<?php
					$files = glob("img/*.*");
					echo '<img src="'.$imageId.'" />'."<br /><br />";
				?>
			</div>
			<div>
				<h1><?php echo $row["bookTitle"]; ?></h1>
				<p>by<<?php echo $row["bookAuthor"]; ?></p>
				<p>Publisher:<?php echo $row["bookPublisher"]; ?></p>
				<p>Publish Date:<<?php echo $row["bookPublishDate"]; ?></p>
				<p><?php echo $row["genre"]; ?></p>
				<p><?php echo $row["bookDescription"]; ?></p>
				<p><?php echo $row["bookPrice"]; ?></p>
				<form action="addtocart.php?action=add&id=<?php echo $row["bookId"]; ?>" method="post">
					<label id="quantity">Quantity:</label><input type="number" name="quantity" min="1"><p>available quantity(<?php echo $row["bookQuantity"]; ?>left)</p>
					<input type="hidden" name="hidden_name" value="<?php echo $row["bookTitle"]; ?>" />  
					<input type="hidden" name="hidden_price" value="<?php echo $row["bookPrice"]; ?>" />
					<input name="addToCart" type="submit" value="Add to Cart">
				</form>
			</div>
			<div>
				<h1>Feedback</h1>
				<div> <!-- for member to give feedback -->
					<form>
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
							
							<input class="stars" type="radio" id="star9" name="rating" value="9" />
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
						<input type="text" name="comment" value="optional">
						<input type="submit" value="Rate">
					</form>
				</div>
				<div> <!-- showing book feedback -->
					<?php
						$query = "SELECT member.*,feedbackRating.*,feedback.*,book.* FROM member INNER JOIN feedbackRating ON member.memberId = feedbackRating.memberId INNER JOIN feedback ON feedbackRating.feedbackId = feedback.feedbackId INNER JOIN book ON feedback.bookId = book.bookId WHERE book.bookId='".$id."'" ;
						$result = mysqli_query($conn, $query); 
						$starRating= $row['bookRating'];
						while($row=mysqli_fetch_array($result))
						{
							echo "<div>";
							echo'<fieldset id="starRating" class="rating">
									<input class="stars" type="radio" id="star10m" name="rating" value="10" />
									<label class = "full" for="star10" title="Masterpiece - 10 stars"></label>
									<input class="stars" type="radio" id="star9m" name="rating" value="9" />
									<label class = "full" for="star9" title="9 stars"></label>
									<input class="stars" type="radio" id="star8m" name="rating" value="8" />
									<label class = "full" for="star8" title="8 stars"></label>
									<input class="stars" type="radio" id="star7m" name="rating" value="7" />
									<label class = "full" for="star7" title="7 stars"></label>
									<input class="stars" type="radio" id="star6m" name="rating" value="6" />
									<label class = "full" for="star6" title="6 stars"></label>
									<input class="stars" type="radio" id="star5m" name="rating" value="5" />
									<label class = "full" for="star5" title="5 stars"></label>   
									<input class="stars" type="radio" id="star4m" name="rating" value="4" />
									<label class = "full" for="star4" title="4 star"></label>
									<input class="stars" type="radio" id="star3m" name="rating" value="3" />
									<label class = "full" for="star3" title="3 stars"></label>		
									<input class="stars" type="radio" id="star2m" name="rating" value="2" />
									<label class = "full" for="star2" title="2 stars"></label>
									<input class="stars" type="radio" id="star1m" name="rating" value="1" />
									<label class = "full" for="star1" title="Terrible - 1 stars"></label>
								</fieldset>';
							switch ($starRating){
								case 1
								echo '<script>var x=document.getElementById("star1m"); x.checked=true;</script>'; break;
								case 2
								echo '<script>var x=document.getElementById("star2m"); x.checked=true;</script>'; break;
								case 3
								echo '<script>var x=document.getElementById("star3m"); x.checked=true;</script>'; break;
								case 4
								echo '<script>var x=document.getElementById("star4m"); x.checked=true;</script>'; break;
								case 5
								echo '<script>var x=document.getElementById("star5m"); x.checked=true;</script>'; break;
								case 6
								echo '<script>var x=document.getElementById("star6m"); x.checked=true;</script>'; break;
								case 7
								echo '<script>var x=document.getElementById("star7m"); x.checked=true;</script>'; break;
								case 8
								echo '<script>var x=document.getElementById("star8m"); x.checked=true;</script>'; break;
								case 9
								echo '<script>var x=document.getElementById("star9m"); x.checked=true;</script>'; break;
								case 10
								echo '<script>var x=document.getElementById("star10m"); x.checked=true;</script>'; break;
							}
							echo "<p>" $row['bookComment']; "</p>";
							echo "<form>"
							echo "<label>Rate this feedback: </label>";
							echo "<input type='radio' name='feedbackRating' value='useless'>Useless<br>";
							echo "<input type='radio' name='feedbackRating' value='useful'>Useful<br>";
							echo "<input type='radio' name='feedbackRating' value='veryUseful'>Very Useful<br>";
							echo "<input type='submit' value='Rate'>";
							echo "</form>";
							echo "</div>";
							

						}
						mysqli_close($conn); //to close the database connection						
					?>
				</div>
			
			</div>
				<?php  
							 }  
						}  
				?>  
		</section>
	</body>

</html>
