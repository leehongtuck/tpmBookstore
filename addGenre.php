<!DOCTYPE html>
 <?php
include("inc/conn.php");
require_once "inc/managerHeader.php";
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>

	<body>
		<div id="form" style="height: 560px;width:100%">
			<form method="post" action="insertGenre.php">
				<section>
					<table>
						<tr>
							<div class="input">
									<td><label>Genre:</label></td>
									<td><input type='text' name='genre' required /></td>
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
